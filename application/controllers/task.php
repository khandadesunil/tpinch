<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Task extends CI_Controller {

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
	
	public function index()
	{
		$result = $this->get_tasks();
		$result['top_experts'] = $this->get_top_experts();
		$this->load->view('pinch/tasks_home', $result);
	}
	
	public function tasks_home()
	{
		$result = $this->get_tasks();
		$result['top_experts'] = $this->get_top_experts();
		$this->load->view('pinch/tasks_home', $result);
	}
	
	public function search_tasks()
	{
		$result = $this->get_tasks();
		$this->load->view('pinch/search_tasks', $result);
	}
	
	public function get_tasks_main_categories(){
		$result = $this->pinchModel->get_tasks_main_categories();
		$option = "";
		foreach($result as $main_cat){
			$job_cat_id = $main_cat['job_cat_id'];
			$category_name = $main_cat['category_name'];
			$option .= "<optgroup label=".$category_name.">";
			$res = $this->pinchModel->get_tasks_sub_categories($main_cat);
			foreach($res as $sub_cat){
				$sub_job_cat_id = $sub_cat['job_cat_id'];
				$sub_category_name = $sub_cat['category_name'];
				$option .= "<option value='".$sub_job_cat_id."'>".$sub_category_name."</option>";
			}
			$option .= "</optgroup>";
		}
		$data['option'] = $option;
		return $data;
	}
	
	public function get_tasks(){
		$search = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';
		if($this->uri->segment(2) == 'tasks-home' || $this->uri->segment(2) == '') {
			$t_status = "Active";
			$limit = 8;
		}elseif($this->uri->segment(2) == 'search-tasks') {
			$t_status = "Active";
			$limit = 20;
		}else {
			$t_status = "Active";
			$limit = 8;
		}
		$jobArr['search'] = $search;
		$jobArr['status'] = $t_status;		
		$jobArr['limit'] = $limit;
		$result['tasks'] = $this->pinchModel->get_tasks($jobArr);
		$result['search'] = $search;
		return $result;
	}
	
	public function get_auto_tasks(){
		$params['search'] = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';
		$result = $this->pinchModel->get_auto_tasks($params);
		$arr = array();
		for($i = 0; $i < count($result); $i++){
			$arr[] = $result[$i]['skills'];
		}
		echo json_encode($arr);
	}
	
	public function task_details()
	{
		$task_id = $this->uri->segment(3);
		$jobArr['task_id']	= $task_id;
		$result['task'] = $this->pinchModel->task_details($jobArr);
		$result['all_bid'] = $this->get_bidding($jobArr);
		if(!empty($result['task']) || !empty($result['all_bid']))
			$this->load->view('pinch/task_details', $result);
		else
			redirect('user/login');
	}
	
	public function get_bidding($params = array())
	{
		$params['task_id'] = isset($_REQUEST['task_id']) ? $_REQUEST['task_id'] : $params["task_id"];
		$result = $this->pinchModel->get_bidding($params);
		return $result;
	}
	
	public function get_top_experts($params = array())
	{
		$top_experts = $this->pinchModel->get_top_experts($params);
		return $top_experts;
	}
	
	public function post()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id){
			$result = $this->get_tasks_main_categories();
			$this->load->view('pinch/post', $result);
		}else{
			redirect('user/login');
		}
	}
	
	public function showcase_a_task()
	{
		$user_id = $this->session->userdata('sess_user_id');
		if($user_id){
			$result = $this->get_tasks_main_categories();
			$this->load->view('pinch/showcase_a_task', $result);
		}else{
			$this->load->view('pinch/login');
		}
	}
	
	public function post_task()
	{
		$title = $_REQUEST['title'];
		$budget = $_REQUEST['budget'];
		$required_days = isset($_REQUEST['required_days']) ? $_REQUEST['required_days'] : 0;
		$job_type = $_REQUEST['job_type'];
		$job_cat_id = $_REQUEST['job_cat_id'];
		$city = $_REQUEST['city'];
		$area = $_REQUEST['area'];
		$pincode = $_REQUEST['pincode'];
		$userArr['email'] = $this->session->userdata('sess_user_email');
		$userArr['user_id'] = null;
		$posterData = get_user_details($userArr);
		
		if($job_type == 'pinch'){
			$success_msg = POSTAPINCH_SUCC_MSG;
			$failure_msg = POSTAPINCH_FAIL_MSG;
			
			// Call email template
			$getEmailArr['email_type'] = 'OfferaPinch';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$email_body = str_replace('[USERNAME]', $posterData['first_name'], $email_body);
			$email_body = str_replace('[PINCHNAME]', $title, $email_body);
			$email_body = str_replace('[PINCHCAT]', $job_cat_id, $email_body);
			$email_body = str_replace('[PINCHBUDGET]', $budget, $email_body);
			$email_body = str_replace('[PINCHAREA]', $area, $email_body);
			$email_body = str_replace('[PINCHCITY]', $city, $email_body);
			$email_body = str_replace('[PINCHPINCODE]', $pincode, $email_body);				
				
		}else{
			$success_msg = POSTAJOB_SUCC_MSG;
			$failure_msg = POSTAJOB_FAIL_MSG;
			
			// Call email template
			$getEmailArr['email_type'] = 'PostaJob';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$email_body = str_replace('[USERNAME]', $posterData['first_name'], $email_body);
			$email_body = str_replace('[JOBNAME]', $title, $email_body);
			$email_body = str_replace('[JOBCAT]', $job_cat_id, $email_body);
			$email_body = str_replace('[JOBBUDGET]', $budget, $email_body);
			$email_body = str_replace('[JOBDAYS]', $required_days, $email_body);
			$email_body = str_replace('[JOBAREA]', $area, $email_body);
			$email_body = str_replace('[JOBCITY]', $city, $email_body);
			$email_body = str_replace('[JOBPINCODE]', $pincode, $email_body);	
		}
		
		if($title != '' && $budget != ''){		
			$result = $this->pinchModel->post_task($_REQUEST);
			if($result['last_id'] != '' && $result['last_id'] > 0){
				$data['status'] = 'success';
				$data['msg'] = $success_msg;
				
				//Send mail
				$sendMailArr['email_to'] = $userArr['email'];
				$sendMailArr['email_subject'] = $emailArr['email_subject'];
				$sendMailArr['email_body'] = $email_body;
				$sendMailArr['email_from'] = $emailArr['email_from'];
				$sendMailArr['email_cc'] = $emailArr['email_cc'];
				$sendMailArr['email_type'] = $getEmailArr['email_type'];
				send_mail($sendMailArr);
			}else{
				$data['status'] = 'error';
				$data['msg'] = $failure_msg;
			}	
		}else{
			$data['status'] = 'error';
			$data['msg'] = $failure_msg;
		}
		print json_encode($data);
	}
	
	public function get_in_touch()
	{
		$job_bid_id = $_REQUEST["job_bid_id"];
		$result = $this->pinchModel->get_in_touch($_REQUEST);
		if($result['num_row'] != '' && $result['num_row'] > 0){
			// Call email template
			$getEmailArr['email_type'] = 'GetInTouch';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$userArr['email'] = $this->session->userdata('sess_user_email');
			$userArr['user_id'] = null;
			$posterData = get_user_details($userArr);
			$p_address = $posterData['address'].'<br />'.$posterData['city'].'<br />'. $posterData['pin_code'];				
			$email_body = str_replace('[POSTERNAME]', $posterData['first_name'], $email_body);
			$email_body = str_replace('[POSTEREMAIL]', $posterData['email'], $email_body);
			$email_body = str_replace('[POSTERCONTACT]', $posterData['contact'], $email_body);
			$email_body = str_replace('[POSTERADDRESS]', $p_address, $email_body);
			
			$sendMailArr['email_to'] = $this->session->userdata('sess_user_email');
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];
			send_mail($sendMailArr);
			
			$getEmailArr['email_type'] = 'GetInTouch';
			$emailArr = $this->pinchModel->get_email_template($getEmailArr);
			$email_body = $emailArr['email_body'];
			$bidDetArr = $this->pinchModel->get_bid_details($_REQUEST);
			$userArr['email'] = null;
			$userArr['user_id'] = $bidDetArr['user_id'];
			$bidderData = get_user_details($userArr);
			$b_address = $bidderData['address'].'<br />'.$bidderData['city'].'<br />'. $bidderData['pin_code'];				
			$email_body = str_replace('[BIDDERNAME]', $bidderData['first_name'], $email_body);
			$email_body = str_replace('[BIDDEREMAIL]', $bidderData['email'], $email_body);
			$email_body = str_replace('[BIDDERCONTACT]', $bidderData['contact'], $email_body);
			$email_body = str_replace('[BIDDERADDRESS]', $b_address, $email_body);
			
			$sendMailArr['email_to'] = $this->session->userdata('sess_user_email');
			$sendMailArr['email_subject'] = $emailArr['email_subject'];
			$sendMailArr['email_body'] = $email_body;
			$sendMailArr['email_from'] = $emailArr['email_from'];
			$sendMailArr['email_cc'] = $emailArr['email_cc'];
			$sendMailArr['email_type'] = $getEmailArr['email_type'];
			send_mail($sendMailArr);
		}
		return $result;
	}
	
	public function bid(){
		$task_id = $_REQUEST['task_id'];
		$bid_amount = $_REQUEST['bid_amount'];
		if($task_id != ''){
			$result = $this->pinchModel->bid($_REQUEST);
			if($result['last_id'] != '' && $result['last_id'] > 0){
				$_REQUEST['job_bid_id'] = $result['last_id'];
				$data['status'] = 'success';
				$data['msg'] = BIDSUCCESS;
				
				// Call email template
				$getEmailArr['email_type'] = 'Bid';
				$emailArr = $this->pinchModel->get_email_template($getEmailArr);
				$email_body = $emailArr['email_body'];
				$userArr['email'] = $this->session->userdata('sess_user_email');
				$userArr['user_id'] = null;
				$bidderData = get_user_details($userArr);
				$jobArr = $this->pinchModel->task_details($_REQUEST);
				$email_body = str_replace('[USERNAME]', $bidderData['first_name'], $email_body);
				$email_body = str_replace('[BIDAMOUNT]', $bid_amount, $email_body);
				$email_body = str_replace('[JOBNAME]', $jobArr['title'], $email_body);
				$email_body = str_replace('[POSTER]', $jobArr['first_name'], $email_body);
				$email_body = str_replace('[POSTDATE]', $jobArr['created_date'], $email_body);
				$email_body = str_replace('[PRICE]', $jobArr['budget'], $email_body);
				
				$sendMailArr['email_to'] = $bidderData['email'];
				$sendMailArr['email_subject'] = $emailArr['email_subject'];
				$sendMailArr['email_body'] = $email_body;
				$sendMailArr['email_from'] = $emailArr['email_from'];
				$sendMailArr['email_cc'] = $emailArr['email_cc'];				
				$sendMailArr['email_type'] = $getEmailArr['email_type'];				
				send_mail($sendMailArr);
				
				$getEmailArr['email_type'] = 'BidReceived';
				$emailArr = $this->pinchModel->get_email_template($getEmailArr);
				$email_body = $emailArr['email_body'];
				$bidDetArr = $this->pinchModel->get_bid_details($_REQUEST);
				$userArr['email'] = null;
				$userArr['user_id'] = $bidDetArr['user_id'];
				$bidderData = get_user_details($userArr);
				$b_address = $bidderData['address'].'<br />'.$bidderData['city'].'<br />'. $bidderData['pin_code'];				
				$email_body = str_replace('[BIDDERNAME]', $bidderData['first_name'], $email_body);
				$email_body = str_replace('[BIDDEREMAIL]', $bidderData['email'], $email_body);
				$email_body = str_replace('[BIDDERCONTACT]', $bidderData['contact'], $email_body);
				$email_body = str_replace('[BIDDERADDRESS]', $b_address, $email_body);
				
				$sendMailArr['email_to'] =  $emailArr['email_cc'];
				$sendMailArr['email_subject'] = $emailArr['email_subject'];
				$sendMailArr['email_body'] = $email_body;
				$sendMailArr['email_from'] = $emailArr['email_from'];
				$sendMailArr['email_cc'] = $emailArr['email_cc'];				
				$sendMailArr['email_type'] = $getEmailArr['email_type'];				
				send_mail($sendMailArr);
			}else{
				$data['status'] = 'error';
				$data['msg'] = BIDERROR;
			}	
		}
		print json_encode($data);
	}
}