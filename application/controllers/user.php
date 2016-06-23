<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('pinch_model', 'pinchModel');
		$this->load->library('session');
		$this->load->helper('generic');
	} 
	
	public function user_login()
	{
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['pass'];
		if($email != '' && $pass != ''){
			$result = $this->pinchModel->login($_REQUEST);
			if($result['num_row'] > 0){
				$this->session->set_userdata('sess_user_email', $email);
				$userArr['email'] = $this->session->userdata('sess_user_email');
				$userArr['user_id'] = null;
				$userData = get_user_details($userArr);
				$this->session->set_userdata('sess_user_id', $userData['user_id']);
				$this->session->set_userdata('sess_user_name', $userData['first_name']);
				$this->session->set_userdata('sess_photo', $userData['photo']);
				$this->session->set_userdata('sess_status', $userData['status']);
				$this->pinchModel->user_session($userData);
				$data['user_status'] = $userData['status'];
				$data['status'] = 'success';
				$data['msg'] = LOGIN_SUCC_MSG;
			}else{
				$data['status'] = 'error';
				$data['msg'] = LOGIN_FAIL_MSG;
			}	
		}else{
			$data['status'] = 'error';
			$data['msg'] = LOGIN_FAIL_MSG;
		}
		print json_encode($data);
	}
	
	public function user_register()
	{
		$reg_email = $_REQUEST['email'];
		$reg_pass = $_REQUEST['pass'];
		if($reg_email != '' && $reg_pass != ''){
			$result = $this->pinchModel->register($_REQUEST);
			if($result['last_id'] != '' && $result['last_id'] > 0){
				$last_id = base64_encode($result['last_id']);
				$data['status'] = 'success';
				$data['msg'] = REG_SUCC_MSG;
				
				// Call email template
				$getEmailArr['email_type'] = 'Registration';
				$emailArr = $this->pinchModel->get_email_template($getEmailArr);
				$email_body = $emailArr['email_body'];
				$user_name = $_REQUEST['first_name'];
				$link = base_url().'email-verification/'.$last_id;
				$email_body = str_replace('[USERNAME]', $user_name, $email_body);
				$email_body = str_replace('[LINK]', $link, $email_body);
				
				$sendMailArr['email_to'] = $reg_email;
				$sendMailArr['email_subject'] = $emailArr['email_subject'];
				$sendMailArr['email_body'] = $email_body;
				$sendMailArr['email_from'] = $emailArr['email_from'];
				$sendMailArr['email_cc'] = $emailArr['email_cc'];
				$sendMailArr['email_type'] = $getEmailArr['email_type'];				
				send_mail($sendMailArr);
			}else{
				$data['status'] = 'error';
				$data['msg'] = REG_FAIL_MSG;
			}	
		}else{
			$data['status'] = 'error';
			$data['msg'] = REG_FAIL_MSG;
		}
		print json_encode($data);
	}
	
	public function check_email(){
		$dataArr['email'] = $_REQUEST['reg_email'];
		$data = $this->pinchModel->check_email($dataArr);
		if($data['email_count'] > 0){
			$data['status'] = 'error';
			$data['msg'] = 'exists';
			echo json_encode(FALSE);
		}else{
			$data['status'] = 'success';
			$data['msg'] = 'not';
			echo json_encode(TRUE);
		}
		//print json_encode($data);
	}
	
	public function check_email_forgot(){
		$dataArr['email'] = $_REQUEST['forgot_email'];
		$data = $this->pinchModel->check_email($dataArr);
		if($data['email_count'] > 0){
			$data['status'] = 'success';
			$data['msg'] = 'exists';
			echo json_encode(TRUE);
		}else{
			$data['status'] = 'error';
			$data['msg'] = 'not';
			echo json_encode(FALSE);
		}
		//print json_encode($data);
	}
	
	public function password_reset_link()
	{
		$forgot_email = $_REQUEST['forgot_email'];
		if($forgot_email != ''){
			$last_id = base64_encode($forgot_email);
			$data['status'] = 'success';
			$data['msg'] = PASS_RESET_SUCC_MSG;
			
			// Call email template
			$getEmailArr['email_type'] = 'ForgotPassword';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$userArr['email'] = $forgot_email;
			$userArr['user_id'] = null;
			$userData = get_user_details($userArr);
			$user_name = $userData['first_name'];
			$link = base_url().'password-reset/'.$last_id;
			$email_body = str_replace('[USERNAME]', $user_name, $email_body);
			$email_body = str_replace('[LINK]', $link, $email_body);
			
			$sendMailArr['email_to'] = $forgot_email;
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];				
			send_mail($sendMailArr);
		}else{
			$data['status'] = 'error';
			$data['msg'] = PASS_RESET_FAIL_MSG;
		}
		print json_encode($data);
	}
	
	public function password_reset(){
		$this->session->sess_destroy();
		$forgot_email = base64_decode($this->uri->segment(3));
		$userArr['data'] = $forgot_email;
		$this->load->view('pinch/password_reset', $userArr);
	}
	
	public function new_password(){
		$userArr['reset_email'] = $_REQUEST['reset_email'];
		$userArr['reset_pass'] = $_REQUEST['reset_pass'];
		$result = $this->pinchModel->new_password($userArr);
		if($result['status'] == 'success'){
			$data['status'] = 'success';
			$data['msg'] = CHANGEPASS_SUCCESS;
		}else{
			$data['status'] = 'error';
			$data['msg'] = CHANGEPASS_FAILURE;
		}
		print json_encode($data);
	}
	
	public function email_verification(){
		$this->session->sess_destroy();
		$user_id = base64_decode($this->uri->segment(3));
		if($user_id != ''){
			$userArr['user_id'] = $user_id;
			$result = $this->pinchModel->user_details($userArr);
			if(!empty($result)){
				$data['status'] = 'success';
				$res = $this->pinchModel->user_activation($userArr);
				if($res['num_row'] == '' || $res['num_row'] <= 0){
					$data['status'] = 'error';
				}
			}else{
				$data['status'] = 'error';
			}	
		}
		$this->load->view('pinch/email_verification', $data);
	}
	
	public function profile()
	{
		$uri_user_id = $this->uri->segment(3);
		if($uri_user_id != '')
			$user_id = $uri_user_id;
		else
			$user_id = $this->session->userdata('sess_user_id');
		$userArr['user_id']	= $user_id;
		$result = $this->pinchModel->user_details($userArr);
		if(!empty($result))
			$this->load->view('pinch/profile', $result);
		else
			$this->load->view('pinch/register');
	}
	
	public function update_profile()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$userArr['user_id']	= $user_id;
		$userArr['first_name'] = $_REQUEST['first_name'];
		$userArr['last_name'] = $_REQUEST['last_name'];
		$userArr['gender'] = $_REQUEST['gender'];
		$userArr['contact'] = $_REQUEST['contact'];
		$userArr['alt_email'] = $_REQUEST['alt_email'];
		$userArr['occupation'] = $_REQUEST['occupation'];
		$userArr['address'] = $_REQUEST['address'];
		$userArr['city'] = $_REQUEST['city'];
		$userArr['pin_code'] = $_REQUEST['pin_code'];
		$result = $this->pinchModel->update_profile($userArr);
		$result['status'] = 'success';
		$result['msg'] = UPDATEPROFILE_SUCCESS;
		echo json_encode($result);
	}
	
	public function update_about_me()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$userArr['user_id']	= $user_id;
		$userArr['about_me'] = $_REQUEST['about_me'];
		$result = $this->pinchModel->update_about_me($userArr);
		$result['status'] = 'success';
		$result['msg'] = ABOUTME_SUCCESS;
		echo json_encode($result);
	}

	public function update_skills()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$userArr['user_id']	= $user_id;
		$userArr['skills'] = $_REQUEST['skills'];
		$result = $this->pinchModel->update_skills($userArr);
		$result['status'] = 'success';
		$result['msg'] = SKILLS_SUCCESS;
		echo json_encode($result);
	}
	
	public function change_password()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$userArr['user_id']	= $user_id;
		$userArr['old_pass'] = $_REQUEST['old_pass'];
		$userArr['new_pass'] = $_REQUEST['new_pass'];
		$result = $this->pinchModel->change_password($userArr);
		if($result['status'] == 'success'){
			$result['status'] == 'success';
			$result['msg'] = CHANGEPASS_SUCCESS;
		}else{
			$result['status'] == 'error';
			$result['msg'] = CHANGEPASS_FAILURE;
		}	
		echo json_encode($result);
	}
	
	public function set_rating()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$rating_to_user_id = $_REQUEST["rating_to_user_id"];
		$rating = $_REQUEST["rating"];
		$action = $_REQUEST["action"];
		$userArr['user_id'] = $user_id;
		$userArr['rating_to_user_id'] = $rating_to_user_id;
		$userArr['rating'] = $rating;
		$userArr['action'] = $action;		
		$json = array();
		
		$result = $this->pinchModel->set_rating($userArr);				
		$votecount = $result['votecount'];
		$rating = $result['rating'];
		$average = 0;
		if($votecount > 0)
			$average = $rating/$votecount;
		$average=Round($average,2);

		$responsetext =   "";
		for($i=1;$i<=5;$i++){
			if($average >= $i)
				$responsetext .=  '<img src="'.base_url().'theme/site/idream/images/rate1.png" class="rating_img" hspace="1" vspace="0"  alt="'.$average.'%"/>';
			else{
			  if($i == intval($average + .7))
				$responsetext .=  '<img src="'.base_url().'theme/site/idream/images/rate.png" class="rating_img" hspace="1" alt="'.$average.'%"/>';
			  else
				$responsetext .=  '<img src="'.base_url().'theme/site/idream/images/rate0.png" class="rating_img" hspace="1" alt="'.$average.'%"/>';
			}
		}
		$responsetext .=  " <font class='esd'><strong>".$average." / 5</strong></font>";

		header("Content-type: application/json");
		$json['responsetext'] = $responsetext;			
		echo json_encode($json);
	}
	
	public function upload_photo()
	{
		$uploaddir = './uploads/profile_images/';
		$file_name = basename($_FILES['uploadfile']['name']);
		$file_extn = substr($file_name, strrpos($file_name, '.')+1);
		$new_name = $this->session->userdata('sess_user_id').'_user_profile.'.strtolower($file_extn);
		@rename($name, $new_name);
		$file      = $uploaddir . $new_name;
		if (@move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
			$img = @imagecreatefromjpeg("{$file}");
			$width = @imagesx($img);
			$height = @imagesy($img);
			$thumbWidth = THUMBWIDTH;
			
			if($width > $thumbWidth || $height > $thumbWidth){
				$new_width = $thumbWidth;
				$new_height = $thumbWidth;
				$tmp_img = @imagecreatetruecolor($new_width,$new_height);
				@imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				@imagejpeg($tmp_img,"{$file}");
			}
			$data['status'] = 'success';
			$data['file'] = $new_name;
		} else {
			$data['status'] = 'success';
			$data['file'] = '';
		}
		print json_encode($data);
	}
	
	public function save_uploaded_photo()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$userArr['photo']	= basename($_REQUEST['photo']);
		$userArr['user_id']	= $user_id;
		$result = $this->pinchModel->user_change_photo($userArr);
		if($result['num_row'] != ''){
			$this->session->set_userdata('sess_photo', $userArr['photo']);
			$data['status'] = 'success';
		}else{
			$data['status'] = 'error';
		}
		print json_encode($data);
	}
	
	public function logout()
	{
		$this->load->view('pinch/logout');
	}
	
	public function set_like_profile(){
		$liked_to_user_id = $_REQUEST['liked_to_user_id'];
		if($liked_to_user_id != ''){
			$result = $this->pinchModel->set_like_profile($_REQUEST);
			$data['status'] = 'success';
			$data['msg'] = $result['total_likes']. ' Likes';
		}
		print json_encode($data);
	}
	
	public function get_total_like_profile(){
		$liked_to_user_id = $_REQUEST['liked_to_user_id'];
		if($liked_to_user_id != ''){
			$result = $this->pinchModel->get_total_like_profile($_REQUEST);
			$data['status'] = 'success';
			$data['msg'] = $result['total_likes']. ' Likes';
		}
		print json_encode($data);
	}
	
	public function get_testimonials(){
		$testimonials_to_user_id = $_REQUEST['testimonials_to_user_id'];
		$result = $this->pinchModel->get_testimonials($_REQUEST);
		$data['testi'] = '';
		foreach($result as $res){
			$usr_data = $this->pinchModel->user_details($res);
			if($usr_data['photo'] == '')
				$photo = base_url().'theme/site/idream/images/avatar_big.png';
			else
				$photo = base_url().'uploads/profile_images/'.$usr_data['photo'];
			$data['testi'] .='
					<div class="bidlist">
						<div style="float:left;width:11%;text-align:center;">
							<img src="'.$photo.'" alt="'.$usr_data['first_name'].'" class="img-rounded thumb" width="70" height="70">
						</div>
						<div style="float:left;width:79%;border:0px solid;margin-left:10px">
							<h3>
								<a href="'.base_url().'user/profile/'.$res['user_id'].'/'.$usr_data['first_name'].'">'.$usr_data['first_name'].' '.$usr_data['last_name'].'</a>
							</h3>
							<p><strong>Testimonials :</strong> '.$res['testimonials'].'</p>
						</div>
					</div>
					';
		}
		$data['status'] = 'success';
		print json_encode($data);
	}
	
	public function submit_testimonials(){
		$testimonials_to_user_id = $_REQUEST['testimonials_to_user_id'];
		if($testimonials_to_user_id != ''){
			$result = $this->pinchModel->submit_testimonials($_REQUEST);
			$data['status'] = 'success';
			$data['msg'] = TESTIMINIALS_SUCCESS;
		}
		print json_encode($data);
	}
	
	public function login()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id == '')
			$this->load->view('pinch/login');
		else
			redirect('task');
	}
	
	public function register()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id == '')
			$this->load->view('pinch/register');
		else
			redirect('task');
	}
	
	public function forgot_password()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id == '')
			$this->load->view('pinch/forgot_password');
		else
			redirect('task');
	}
	
	public function search_suggest()
	{
		$result = $this->pinchModel->search_suggest($_REQUEST);
		$res_data = '';
		foreach ($result as $key=>$value) {
			$sep_title = '';
			$sep_desc = '';
			$title = $value['title'];
			if($value['parent_cat_id'] == 0)
				$cat_id = $value['job_cat_id'];
			else
				$cat_id = $value['parent_cat_id'];
			$searchtype = ucfirst($value['searchtype']);
			$description = $value['description'];			
			if(strlen($title) > TITLELIMIT)
				$sep_title = '...';
			$title = substr($title, 0, TITLELIMIT). $sep_title;							
			if(strlen($description) > DESCLIMIT)
				$sep_desc = '...';
			$description = substr($description, 0, DESCLIMIT).$sep_desc;
			
			$res_data .= "$title|$description|Category : $searchtype|$cat_id\n\n";
		}
		print_r($res_data);
	}
	
	public function search()
	{
		$searchArr['search'] = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$searchArr['jobs'] = $this->pinchModel->search_suggest(str_replace("...", "", $searchArr));
		$this->load->view('pinch/search', $searchArr);
	}
	
	public function premium_membership()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id){
			$this->load->view('pinch/premium_membership');
		}else{
			redirect('login');
			//$this->load->view('pinch/login');
		}
	}
	
	public function how_it_works()
	{
		$this->load->view('pinch/how_it_works');
	}
	
	public function feedback()
	{
		$this->load->view('pinch/feedback');
	}
	public function send_feedback()
	{
		$email = $_REQUEST['email'];
		if($email != ''){
			$result = $this->pinchModel->send_feedback($_REQUEST);
			$data['status'] = 'success';
			$data['msg'] = FEEDBACK_SUCCESS;
			
			// Call email template
			$getEmailArr['email_type'] = 'Feedback';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$name = $_REQUEST['name'];
			$email_body = str_replace('[USERNAME]', $name, $email_body);
			
			$sendMailArr['email_to'] = $email;
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];				
			send_mail($sendMailArr);
		}
		print json_encode($data);
	}
	
	public function why_taskpinch()
	{
		$this->load->view('pinch/why_taskpinch');
	}
	
	public function about_taskpinch()
	{
		$this->load->view('pinch/about_taskpinch');
	}
	
	public function team()
	{
		$this->load->view('pinch/team');
	}
	
	public function contact_taskpinch()
	{
		$this->load->view('pinch/contact_taskpinch');
	}
	
	public function share()
	{
		$this->load->view('pinch/share');
	}
	
	
	public function ads_request()
	{
		$this->load->view('pinch/ads_request');
	}
	
	public function post_ad_request()
	{
		$req_name = $_REQUEST['req_name'];
		$req_email = $_REQUEST['req_email'];
		$adsArr['req_name'] = $_REQUEST['req_name'];
		$adsArr['req_email'] = $_REQUEST['req_email'];
		$adsArr['req_desc'] = $_REQUEST['req_desc'];
		if($req_email != ''){
			$result = $this->pinchModel->post_ad_request($adsArr);
			$data['status'] = 'success';
			$data['msg'] = ADS_SUCCESS;
			
			// Call email template
			$getEmailArr['email_type'] = 'AdsUserRequest';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$email_body = str_replace('[USERNAME]', $req_name, $email_body);
			
			$sendMailArr['email_to'] = $req_email;
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];				
			send_mail($sendMailArr);
			
			// Call email template
			$getEmailArr['email_type'] = 'AdsRequest';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$email_body = str_replace('[REQNAME]', $req_name, $email_body);
			$email_body = str_replace('[REQEMAIL]', $req_email, $email_body);
				
			$sendMailArr['email_to'] = $emailArr['email_cc'];
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];				
			send_mail($sendMailArr);
		}
		print json_encode($data);
	}
	
	public function share_link()
	{
		$friend_email = $_REQUEST['friend_email'];
		$shareArr['name'] = $_REQUEST['name'];
		$shareArr['email'] = $_REQUEST['email'];
		$shareArr['friend_email'] = $_REQUEST['friend_email'];
		$shareArr['comments'] = $_REQUEST['comments'];
		$shareArr['link'] = LINK;
		if($friend_email != ''){
			$result = $this->pinchModel->share_link($shareArr);
			$data['status'] = 'success';
			$data['msg'] = SHARE_SUCCESS;
			
			// Call email template
			$getEmailArr['email_type'] = 'Share';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$name = $_REQUEST['name'];
			$email_body = str_replace('[USERNAME]', $name, $email_body);
			
			$sendMailArr['email_to'] = $email;
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];				
			send_mail($sendMailArr);
		}
		print json_encode($data);
	}
	
	public function privacy_policy()
	{
		$this->load->view('pinch/privacy_policy');
	}
	
	public function terms()
	{
		$this->load->view('pinch/terms');
	}
	
	public function faq()
	{
		$this->load->view('pinch/faq');
	}
	
	public function safety_policy()
	{
		$this->load->view('pinch/safety_policy');
	}
	
	public function my_activities()
	{
		$params['user_id'] = $this->session->userdata('sess_user_id');
		$result['my_jobs'] = $this->pinchModel->my_jobs($params);
		$result['my_bids'] = $this->pinchModel->my_bids($params);
		$result['my_pinches'] = $this->pinchModel->my_pinches($params);
		$this->load->view('pinch/my_activities', $result);
	}
	
	public function buy_subscription()
	{
		$sub_from = date('y-m-d h:i:s');
		$sub_to = date('y-m-d h:i:s', strtotime('+6 months'));
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id != '' || $user_id > 0){
			$result = $this->pinchModel->buy_subscription($_REQUEST);
			if($result['last_id'] != '' && $result['last_id'] > 0){
				$data['status'] = 'success';
				$data['msg'] = PREMIUM_SUCCESS;
			}else{
				$data['status'] = 'error';
				$data['msg'] = PREMIUM_FAILURE;
			}
		}else{
			$data['status'] = 'error';
			$data['msg'] = PREMIUM_LOGIN_FAILURE;
		}
		print json_encode($data);
	}
	
	public function close_job()
	{
		$user_id = $this->session->userdata('sess_user_id');
		$jobArr['user_id']	= $user_id;
		$jobArr['job_id'] = $_REQUEST['job_id'];
		$jobArr['status'] = $_REQUEST['status'];
		$jobArr['comments'] = $_REQUEST['comments'];
		if($user_id != '' && $jobArr['job_id'] != ''){
			$result = $this->pinchModel->close_job($jobArr);
			$result['status'] = 'success';
			$result['msg'] = UPDATEJOBSTATUS_SUCCESS;
		}else{
			$result['status'] = 'error';
			$result['msg'] = UPDATEJOBSTATUS_FAILURE;
		}
		echo json_encode($result);
	}
		
	public function suspend_account($params = array())
	{
		$params['email'] = $_REQUEST['email'];
		$result = $this->pinchModel->suspend_account($params);
		if($result){
			$data['status'] = 'success';
			$data['msg'] = SUSPEND_ACCOUNT;
			$this->session->sess_destroy();
		}
		echo json_encode($data);
	}
	
	function validate_captcha()
	{
		$session = $this->session->userdata('sess_captcha_code');
		if(empty($session) || strcasecmp($session, $_REQUEST['captcha']) != 0){
			echo 'false';
		}else{
			echo 'true';
		}
	}
	
	function _404()
	{
		$this->load->view("pinch/my404_view");
	}
}