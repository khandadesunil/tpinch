<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pinch extends CI_Controller {

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
		
	public function logout()
	{
		$this->load->view('pinch/logout');
	}
	
	public function login()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id == '')
			$this->load->view('pinch/login');
		else
			$this->offered_tasks();
	}
	
	public function register()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id == '')
			$this->load->view('pinch/register');
		else
			$this->offered_tasks();
	}
	
	public function forgot_password()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id == '')
			$this->load->view('pinch/forgot_password');
		else
			$this->offered_tasks();
	}
	
	public function premium_membership()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id){
			$this->load->view('pinch/premium_membership');
		}else{
			redirect('user/login');
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