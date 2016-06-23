<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('pinch_adminModel', 'pinchAdminModel');
		$this->load->helper('jqgrid_dist.php');
		$this->load->library('session');
	} 
	
	public function index()
	{
		$this->load->view('admin/index');
	}
	
	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}
	
	public function areas()
	{
		$this->load->view('admin/areas');
	}
	
	public function user_login()
	{
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['pass'];
		if($email != '' && $pass != ''){
			$result = $this->pinchAdminModel->login($_REQUEST);
			if($result['num_row'] > 0){
				$this->session->set_userdata('sess_admin_email', $email);
				$userArr['admin_email'] = $this->session->userdata('sess_admin_email');
				$userArr['user_admin_id'] = null;
				$userData = $this->get_user_details($userArr);
				$this->session->set_userdata('sess_admin_id', $userData['user_admin_id']);
				$this->session->set_userdata('sess_admin_name', $userData['admin_name']);
				$this->session->set_userdata('sess_admin_role', $userData['admin_role']);
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
	
	public function get_user_details($userArr){
		$admin_email = $userArr['admin_email'];
		if($admin_email != ''){
			$result = $this->pinchAdminModel->user_details($userArr);
		}
		return $result;
	}
	
	public function logout()
	{
		$this->load->view('admin/logout');
	}
	
	public function database_backup()
	{
		//get all of the tables
		$result = mysql_query('SHOW TABLES');
		$row = mysql_fetch_row($result);
		while($row = mysql_fetch_row($result)){
			$tables[] = $row[0];
		}
		
		$return = '';
		foreach($tables as $table){
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);			
			for ($i = 0; $i < $num_fields; $i++){
				while($row = mysql_fetch_row($result)){
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++){
						$row[$j] = addslashes($row[$j]);
						//$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$msg = $table. " backup successfull!<br />";
		}
		
		//save file
		$file_name = '../database/backup/db-backup-'.date('dmYHis').'-'.(md5(time())).'.sql';
		$handle = fopen($file_name, 'w+');
		fwrite($handle,$return);
		fclose($handle);
	}
	
	public function get_grid($params = array())
	{
		$connection = mysql_pconnect('localhost', DBUSER, DBPASS) or die ("Could not connect to server ... \n" . mysql_error ());
		mysql_select_db(DBNAME) or die ("Could not connect to database ... \n" . mysql_error ());
		
		$g = new jqgrid();
		$grid["rowNum"] = 30; // by default 20
		$grid["sortname"] = $params['sortname']; // by default sort grid by this field
		$grid["sortorder"] = "desc"; // ASC or DESC
		$grid["caption"] = $params['caption']; // caption of grid
		$grid["autowidth"] = true; // expand grid to screen width
		$grid["multiselect"] = true; // allow you to multi-select through checkboxes
		$grid["altRows"] = true; 
		$grid["altclass"] = "myAltRowClass"; 
		$grid["rowactions"] = true; // allow you to multi-select through checkboxes
		$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");
		$g->set_options($grid);
		$g->set_actions(array(	
								"add"=>false, // allow/disallow add
								"edit"=>false, // allow/disallow edit
								"delete"=>false, // allow/disallow delete
								"rowactions"=>true, // show/hide row wise edit/del/save option
								"export"=>false, // show/hide export to excel option
								"autofilter" => true, // show/hide autofilter for search
								"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
							) 
						);
		return $g;				
	}
	
	public function active_users()
	{
		$col = array();
		$col["title"] = "User ID";
		$col["name"] = "user_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "First Name";
		$col["name"] = "first_name";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Last Name";
		$col["name"] = "last_name";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Email";
		$col["name"] = "email";
		$col["width"] = "30";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/{user_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Contact";
		$col["name"] = "contact";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Registered Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'user_id';
		$params['caption'] = 'Active Users';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_active_users();
		$g->table = "user";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/active_users', $out);
	}
	
	public function admin_users()
	{
		$col = array();
		$col["title"] = "User Admin ID";
		$col["name"] = "user_admin_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Created Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Name";
		$col["name"] = "admin_name";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Email";
		$col["name"] = "admin_email";
		$col["width"] = "30";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/{user_admin_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "admin_status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'user_admin_id';
		$params['caption'] = 'Admin Users';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_admin_users();
		$g->table = "admin_user";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/admin_users', $out);
	}
	
	public function user_subscriptions()
	{
		$col = array();
		$col["title"] = "Subscription ID";
		$col["name"] = "sub_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "User Name";
		$col["name"] = "first_name";
		$col["width"] = "20";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Subscription From";
		$col["name"] = "sub_from";
		$col["width"] = "20";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Subscription Upto";
		$col["name"] = "sub_to";
		$col["width"] = "20";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/{sub_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'sub_id';
		$params['caption'] = 'User subscriptions';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_user_subscriptions();
		$g->table = "admin_user";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/user_subscriptions', $out);
	}
	
	public function pending_user_approval()
	{
		$col = array();
		$col["title"] = "User ID";
		$col["name"] = "user_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "First Name";
		$col["name"] = "first_name";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Last Name";
		$col["name"] = "last_name";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Email";
		$col["name"] = "email";
		$col["width"] = "30";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/{user_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Contact";
		$col["name"] = "contact";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Registered Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'user_id';
		$params['caption'] = 'Pending User Approval';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_pending_users();
		$g->table = "user";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/pending_user_approval', $out);
	}
	
	public function active_pinches()
	{
		$col = array();
		$col["title"] = "Task ID";
		$col["name"] = "job_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Title";
		$col["name"] = "title";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{job_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Posted by";
		$col["name"] = "first_name";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Budget";
		$col["name"] = "budget";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;

		$col = array();
		$col["title"] = "Area";
		$col["name"] = "area";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "City";
		$col["name"] = "city";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Pincode";
		$col["name"] = "pincode";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'job_id';
		$params['caption'] = 'Active Pinches';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_active_pinches();
		$g->table = "job";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/active_pinches', $out);
	}
	
	public function pending_pinches_approval()
	{
		$col = array();
		$col["title"] = "Task ID";
		$col["name"] = "job_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Title";
		$col["name"] = "title";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{job_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Posted by";
		$col["name"] = "first_name";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Budget";
		$col["name"] = "budget";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;

		$col = array();
		$col["title"] = "Area";
		$col["name"] = "area";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "City";
		$col["name"] = "city";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Pincode";
		$col["name"] = "pincode";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'job_id';
		$params['caption'] = 'Pending Pinches Approval';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_pending_pinches();
		$g->table = "job";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/pending_pinches_approval', $out);
	}
	
	public function active_jobs()
	{
		$col = array();
		$col["title"] = "Task ID";
		$col["name"] = "job_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Title";
		$col["name"] = "title";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{job_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Posted by";
		$col["name"] = "first_name";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Budget";
		$col["name"] = "budget";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;

		$col = array();
		$col["title"] = "Area";
		$col["name"] = "area";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "City";
		$col["name"] = "city";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Pincode";
		$col["name"] = "pincode";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'job_id';
		$params['caption'] = 'Active Tasks';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_active_jobs();
		$g->table = "job";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/active_jobs', $out);
	}
	
	public function pending_jobs_approval()
	{
		$col = array();
		$col["title"] = "Task ID";
		$col["name"] = "job_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Title";
		$col["name"] = "title";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{job_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Posted by";
		$col["name"] = "first_name";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Budget";
		$col["name"] = "budget";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;

		$col = array();
		$col["title"] = "Area";
		$col["name"] = "area";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "City";
		$col["name"] = "city";
		$col["width"] = "20";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Pincode";
		$col["name"] = "pincode";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'job_id';
		$params['caption'] = 'Pending Tasks Approval';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_pending_jobs();
		$g->table = "job";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/pending_jobs_approval', $out);
	}
	
	public function job_category()
	{
		$col = array();
		$col["title"] = "Task Cat ID";
		$col["name"] = "job_cat_id";
		$col["width"] = "10";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Created On";
		$col["name"] = "created";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Category Name";
		$col["name"] = "category_name";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{job_cat_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'job_cat_id';
		$params['caption'] = 'Task Categories';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_job_category();
		$g->table = "job_category";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/job_category', $out);
	}
	
	public function active_testimonials()
	{
		$col = array();
		$col["title"] = "User Testimonials ID";
		$col["name"] = "user_testimonials_id";
		$col["width"] = "15";
		$col["align"] = "center";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Created On";
		$col["name"] = "created_date";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Testimonials By";
		$col["name"] = "byname";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Testimonials To";
		$col["name"] = "toname";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Testimonials";
		$col["name"] = "testimonials";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{user_testimonials_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'user_testimonials_id';
		$params['caption'] = 'Active Testimonials';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_active_testimonials();
		$g->table = "user_testimonials";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/active_testimonials', $out);
	}
	
	public function pending_testimonials_approval()
	{
		$col = array();
		$col["title"] = "User Testimonials ID";
		$col["name"] = "user_testimonials_id";
		$col["width"] = "15";
		$col["align"] = "center";
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Created On";
		$col["name"] = "created_date";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Testimonials By";
		$col["name"] = "byname";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Testimonials To";
		$col["name"] = "toname";
		$col["width"] = "15";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Testimonials";
		$col["name"] = "testimonials";
		$col["width"] = "100";
		$col["align"] = "left";
		$col["search"] = true;
		$col["sortable"] = false;
		$col["link"] = base_url()."admin/edit_active_pinches/{user_testimonials_id}";
		$col["linkoptions"] = "target='_blank'";
		$col["default"] = "View More";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$col["editable"] = false;
		$col["align"] = "left"; 
		$col["search"] = true;
		$cols[] = $col;
		
		$params['sortname'] = 'user_testimonials_id';
		$params['caption'] = 'Pending Testimonials Approval';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_pending_testimonials();
		$g->table = "user_testimonials";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/pending_testimonials_approval', $out);
	}
	
	public function recent_logins()
	{
		$col = array();
		$col["title"] = "User Session ID";
		$col["name"] = "user_sess_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "User ID";
		$col["name"] = "user_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "First Name";
		$col["name"] = "first_name";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Last Name";
		$col["name"] = "last_name";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Email";
		$col["name"] = "email";
		$col["width"] = "15";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "IP Address";
		$col["name"] = "ip_addr";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Logged In time";
		$col["name"] = "time";
		$col["width"] = "20";
		$cols[] = $col;
		
		$params['sortname'] = 'user_sess_id';
		$params['caption'] = 'Recent Logins';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_recent_logins();
		$g->table = "user_session";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/recent_logins', $out);
	}
	
	public function feedback()
	{
		$col = array();
		$col["title"] = "Feedback ID";
		$col["name"] = "feedback_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Created Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$col["align"] = "left"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Name";
		$col["name"] = "name";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Email";
		$col["name"] = "email";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Feedback Type";
		$col["name"] = "type";
		$col["width"] = "15";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Comments";
		$col["name"] = "comments";
		$col["width"] = "30";
		$cols[] = $col;
		
		$params['sortname'] = 'feedback_id';
		$params['caption'] = 'Feedback';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_feedback();
		$g->table = "feedback";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/feedback', $out);
	}
	
	public function email_templates()
	{
		$col = array();
		$col["title"] = "Template ID";
		$col["name"] = "email_template_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Created Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$col["align"] = "left"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Eamil Type";
		$col["name"] = "email_type";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Email From";
		$col["name"] = "email_from";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "CC To";
		$col["name"] = "email_cc";
		$col["width"] = "15";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Email Subject";
		$col["name"] = "email_subject";
		$col["width"] = "30";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'email_template_id';
		$params['caption'] = 'Feedback';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_email_templates();
		$g->table = "email_template";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/email_templates', $out);
	}
	
	public function ads_request()
	{
		$col = array();
		$col["title"] = "Ads Request ID";
		$col["name"] = "ad_req_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Requested Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$col["align"] = "left"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Requester Name";
		$col["name"] = "req_name";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Requester Email";
		$col["name"] = "req_email";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'ad_req_id';
		$params['caption'] = 'Ads Request (Active)';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_ads_request();
		$g->table = "ads_request";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/ads_request', $out);
	}
	
	public function ads_request_all()
	{
		$col = array();
		$col["title"] = "Ads Request ID";
		$col["name"] = "ad_req_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Requested Date";
		$col["name"] = "created_date";
		$col["width"] = "10";
		$col["align"] = "left"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Requester Name";
		$col["name"] = "req_name";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Requester Email";
		$col["name"] = "req_email";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'ad_req_id';
		$params['caption'] = 'Ads Requests (All)';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_ads_request();
		$g->table = "ads_request";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/ads_request', $out);
	}
	
	public function ads_active()
	{
		$col = array();
		$col["title"] = "Ads ID";
		$col["name"] = "ads_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Ad Name";
		$col["name"] = "ad_name";
		$col["width"] = "10";
		$col["align"] = "left"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Ad For";
		$col["name"] = "ad_company";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Ad Position";
		$col["name"] = "ad_position";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad Type";
		$col["name"] = "ad_type";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad From";
		$col["name"] = "ad_from";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad Upto";
		$col["name"] = "ad_upto";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad Price";
		$col["name"] = "ad_price";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'ads_id';
		$params['caption'] = 'Active Ads';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_active_ads();
		$g->table = "ads";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/ads', $out);
	}
	
	public function ads_history()
	{
		$col = array();
		$col["title"] = "Ads ID";
		$col["name"] = "ads_id";
		$col["width"] = "10";
		$col["align"] = "center"; 
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Ad Name";
		$col["name"] = "ad_name";
		$col["width"] = "10";
		$col["align"] = "left"; 
		$cols[] = $col;		

		$col = array();
		$col["title"] = "Ad For";
		$col["name"] = "ad_company";
		$col["width"] = "10";
		$cols[] = $col;	
		
		$col = array();
		$col["title"] = "Ad Position";
		$col["name"] = "ad_position";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad Type";
		$col["name"] = "ad_type";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad From";
		$col["name"] = "ad_from";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad Upto";
		$col["name"] = "ad_upto";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Ad Price";
		$col["name"] = "ad_price";
		$col["width"] = "10";
		$cols[] = $col;
		
		$col = array();
		$col["title"] = "Status";
		$col["name"] = "status";
		$col["width"] = "10";
		$cols[] = $col;
		
		$params['sortname'] = 'ads_id';
		$params['caption'] = 'Ads History';
		$g = $this->get_grid($params);
		$g->select_command = $this->pinchAdminModel->get_ads_history();
		$g->table = "ads";
		$g->set_columns($cols);
		$out['out'] = $g->render("list1");
		$this->load->view('admin/ads', $out);
	}
}