<?php 
class Pinch_adminModel extends CI_Model {

	function login($params = array()){
		$email = $_REQUEST['email'];
		$pass = md5($_REQUEST['pass']);		
		$stmt = $this->db->conn_id->prepare("SELECT admin_email FROM  admin_user WHERE admin_email=? AND admin_password=? AND admin_status IN ('Active')");
		$stmt->execute(array($email, $pass));
		//echo var_export($stmt->errorInfo());
		$num_row = $stmt->rowCount();
		$data['num_row'] = $num_row;
		return $data;
	}
	
	function user_details($params = array()){
		$user_admin_id = isset($params['user_admin_id'])? $params['user_admin_id'] : '';
		$admin_email = isset($params['admin_email'])? $params['admin_email'] : '';
		
		$stmt = $this->db->conn_id->prepare("SELECT user_admin_id, admin_name, admin_email, admin_role, admin_status
											FROM admin_user WHERE (user_admin_id=? OR admin_email=?)");
		$stmt->execute(array($user_admin_id, $admin_email));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($data)){
			return $data[0];
		}else{
			return $data;
		}
	}
	
	function get_active_users($params = array()){
		$stmt = "SELECT user_id, created_date, email, first_name, last_name, contact, status FROM user WHERE status != 'Pending'";
		return $stmt;
	}
	
	function get_admin_users($params = array()){
		$stmt = "SELECT user_admin_id, created_date, admin_name, admin_email, admin_status FROM admin_user";
		return $stmt;
	}
	
	function get_user_subscriptions($params = array()){
		$stmt = "SELECT us.sub_id, us.user_id, u.first_name, us.sub_from, us.sub_to, us.status 
				FROM user_subscription us INNER JOIN user u ON us.user_id = u.user_id";
		return $stmt;
	}
	
	function get_recent_logins($params = array()){
		$stmt = "SELECT us.user_sess_id, us.user_id, u.first_name, u.last_name, u.email, us.ip_addr, us.time
				FROM user_session us INNER JOIN user u ON us.user_id = u.user_id";
		return $stmt;
	}
	
	function get_pending_users($params = array()){
		$stmt = "SELECT user_id, created_date, email, first_name, last_name, contact, status FROM user WHERE status = 'Pending'";
		return $stmt;
	}
	
	function get_active_pinches($params = array()){
		$stmt = "SELECT j.job_id, j.created_date, j.title, j.user_id, u.first_name, j.job_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, j.close_comments 
				FROM job j INNER JOIN user u ON j.user_id = u.user_id
				WHERE j.job_type = 'service' AND j.status = 'Active'";
		return $stmt;
	}
	
	function get_pending_pinches($params = array()){
		$stmt = "SELECT j.job_id, j.created_date, j.title, j.user_id, u.first_name, j.job_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, j.close_comments 
				FROM job j INNER JOIN user u ON j.user_id = u.user_id
				WHERE j.job_type = 'service' AND j.status = 'Moderation'";
		return $stmt;
	}
	
	function get_active_jobs($params = array()){
		$stmt = "SELECT j.job_id, j.created_date, j.title, j.user_id, u.first_name, j.job_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, j.close_comments 
				FROM job j INNER JOIN user u ON j.user_id = u.user_id
				WHERE j.job_type = 'job' AND j.status = 'Active'";
		return $stmt;
	}
	
	function get_pending_jobs($params = array()){
		$stmt = "SELECT j.job_id, j.created_date, j.title, j.user_id, u.first_name, j.job_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, j.close_comments 
				FROM job j INNER JOIN user u ON j.user_id = u.user_id
				WHERE j.job_type = 'job' AND j.status = 'Moderation'";
		return $stmt;
	}
	
	function get_job_category($params = array()){
		$stmt = "SELECT job_cat_id, created, category_name, status FROM job_category";
		return $stmt;
	}
	
	function get_active_testimonials($params = array()){
		$stmt = "SELECT ut.user_testimonials_id, ut.created_date, ut.user_id, ut.testimonials_to_user_id, u1.first_name as byname, u2.first_name as toname, ut.testimonials, ut.status 
				FROM user_testimonials ut 
				LEFT OUTER JOIN user u1 ON ut.user_id = u1.user_id
				LEFT OUTER JOIN user u2 ON ut.testimonials_to_user_id = u2.user_id
				WHERE ut.status = 'Active'";
		return $stmt;
	}
	
	function get_pending_testimonials($params = array()){
		$stmt = "SELECT ut.user_testimonials_id, ut.created_date, ut.user_id, ut.testimonials_to_user_id, u1.first_name as byname, u2.first_name as toname, ut.testimonials, ut.status 
				FROM user_testimonials ut 
				LEFT OUTER JOIN user u1 ON ut.user_id = u1.user_id
				LEFT OUTER JOIN user u2 ON ut.testimonials_to_user_id = u2.user_id
				WHERE ut.status = 'Pending'";
		return $stmt;
	}
	
	function get_feedback($params = array()){
		$stmt = "SELECT feedback_id, created_date, name, email, type, comments FROM feedback";
		return $stmt;
	}
	
	function get_email_templates($params = array()){
		$stmt = "SELECT email_template_id, created_date, email_type, email_from, email_cc, email_subject, email_body, status FROM email_template";
		return $stmt;
	}
	
	function get_ads_request($params = array()){
		$stmt = "SELECT ad_req_id, created_date, req_name, req_email, req_desc, status FROM ads_request WHERE status = 'Active'";
		return $stmt;
	}
	
	function get_ads_request_all($params = array()){
		$stmt = "SELECT ad_req_id, created_date, req_name, req_email, req_desc, status FROM ads_request";
		return $stmt;
	}
	
	function get_active_ads($params = array()){
		$stmt = "SELECT ads_id, created_date, ad_name, ad_company, ad_position, ad_type, ad_from, ad_upto, ad_price, status FROM ads WHERE status = 'Active'";
		return $stmt;
	}
	
	function get_ads_history($params = array()){
		$stmt = "SELECT ads_id, created_date, ad_name, ad_company, ad_position, ad_type, ad_from, ad_upto, ad_price, status FROM ads";
		return $stmt;
	}
}
