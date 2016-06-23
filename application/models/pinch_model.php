<?php 
class Pinch_Model extends CI_Model {

	function clean($string)
	{
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	
	function login($params = array()){
		$email = $params['email'];
		$pass = md5($params['pass']);
		
		$stmt = $this->db->conn_id->prepare("SELECT email FROM user WHERE email=? AND password=? AND status IN ('Active', 'Pinch1', 'Pinch2')");
		$stmt->execute(array($email, $pass));
		$num_row = $stmt->rowCount();
		$data['num_row'] = $num_row;
		return $data;
	}
	
	function register($params = array()){
		$first_name = $this->clean($params['first_name']);
		$last_name = $this->clean($params['last_name']);
		$contact = $this->clean($params['contact']);
		$email = $params['email'];
		$pass = md5($params['pass']);
		$gender = $this->clean($params['gender']);
		
		$userArr['email'] = $email;
		$user = $this->user_details($userArr);
		if(isset($user['email']) && $user['email'] != ''){
			$data['last_id'] = '';
		}else{
			$stmt = $this->db->conn_id->prepare("INSERT INTO user (created_date, first_name, last_name, contact, email, password, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->execute(array(date('Y-m-d h:i:s'), $first_name, $last_name, $contact, $email, $pass, $gender));
			//echo var_export($stmt->errorInfo());
			$last_id = $this->db->insert_id();
			$data['last_id'] = $last_id;
		}
		return $data;
	}
	
	function update_profile($params = array()){
		$user_id = $this->clean($params['user_id']);
		$first_name = $this->clean($params['first_name']);
		$last_name = $this->clean($params['last_name']);
		$gender = $this->clean($params['gender']);
		$contact = $this->clean($params['contact']);
		$alt_email = $params['alt_email'];
		$occupation = $this->clean($params['occupation']);
		$address = $this->clean($params['address']);
		$city = $this->clean($params['city']);
		$pin_code = $this->clean($params['pin_code']);
		
		if($user_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET first_name=?, last_name=?, gender=?, contact=?, alt_email=?, occupation=?, address=?, city=?, pin_code=? WHERE user_id=?");
			$stmt->execute(array($first_name, $last_name, $gender, $contact, $alt_email, $occupation, $address, $city, $pin_code, $user_id));
			//echo var_export($stmt->errorInfo());
		}
		$data['status'] = 'success';
		return $data;
	}
	
	function get_top_experts($params = array()){
		$stmt = $this->db->conn_id->prepare("SELECT job.user_id, user.first_name, user.photo, count(*) as tasks 
												FROM `job` 
												inner join user on job.user_id = user.user_id
												group by `user_id` order by tasks desc limit 6");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function update_about_me($params = array()){
		$user_id = $this->clean($params['user_id']);
		$about_me = $this->clean($params['about_me']);		
		if($user_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET about_me=? WHERE user_id=?");
			$stmt->execute(array($about_me, $user_id));
		}
		$data['status'] = 'success';
		return $data;
	}
	
	function update_skills($params = array()){
		$user_id = $this->clean($params['user_id']);
		$skills = $this->clean($params['skills']);
		if($user_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET skills=? WHERE user_id=?");
			$stmt->execute(array($skills, $user_id));
		}
		$data['status'] = 'success';
		return $data;
	}
	
	function change_password($params = array()){
		$user_id = $this->clean($params['user_id']);
		$old_pass = md5($params['old_pass']);
		$new_pass = md5($params['new_pass']);
		$stmt = $this->db->conn_id->prepare("SELECT email FROM user WHERE user_id=? AND password=?");
		$stmt->execute(array($user_id, $old_pass));
		$num_row = $stmt->rowCount();		
		if($num_row > 0){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET password=? WHERE user_id=?");
			$stmt->execute(array($new_pass, $user_id));
			$data['status'] = 'success';
		}else{
			$data['status'] = 'error';
		}
		return $data;
	}
	
	function new_password($params = array()){
		$reset_email = $params['reset_email'];
		$reset_pass = md5($params['reset_pass']);
		if($reset_email != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET password=? WHERE email=?");
			$stmt->execute(array($reset_pass, $reset_email));
			$data['status'] = 'success';
			//echo var_export($stmt->errorInfo());
		}
		return $data;
	}
	
	function check_email($params = array()){
		$email = $params['email'];
		$stmt = $this->db->conn_id->prepare("SELECT COUNT(*) AS email_count FROM user WHERE email=?");
		$stmt->execute(array($email));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo var_export($stmt->errorInfo());
		return $data[0];
	}
	
	function user_details($params = array()){
		$user_id = isset($params['user_id'])? $params['user_id'] : '';
		$email = isset($params['email'])? $params['email'] : '';
		
		$stmt = $this->db->conn_id->prepare("SELECT user_id, email, gender, occupation, alt_email, first_name, last_name, about_me, skills, address, city, pin_code, contact, photo, status, sms_subscribe, mob_veri_code
											FROM user WHERE (user_id=? OR email=?)");
		$stmt->execute(array($user_id, $email));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($data)){
			return $data[0];
		}else{
			return $data;
		}
	}
	
	function get_experts_count($params = array()){
		$stmt = $this->db->conn_id->prepare("SELECT count(user_id) as user_count FROM user");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0]['user_count'];
	}
	
	function get_bid_count($params = array()){
		$stmt = $this->db->conn_id->prepare("SELECT count(job_bid_id) as bid_count FROM job_bid");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0]['bid_count'];
	}
	
	function get_feedback_count($params = array()){
		$stmt = $this->db->conn_id->prepare("SELECT count(feedback_id) as feedback_count FROM feedback");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0]['feedback_count'];
	}
	
	function user_activation($params = array())
	{
		$user_id = $this->clean($params['user_id']);
		if($user_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET status = 'Pinch1' WHERE user_id = ?");
			$stmt->execute(array($user_id));
			//echo var_export($stmt->errorInfo());
			$num_row = $stmt->rowCount();
			$data['num_row'] = $num_row;
		}else{
			$data['num_row'] = '';
		}	
		return $data;
	}
	
	function user_change_photo($params = array())
	{
		$user_id = isset($params['user_id'])? $this->clean($params['user_id']) : '';
		$photo = isset($params['photo'])? $params['photo'] : '';
		if($user_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET photo = ? WHERE user_id = ?");
			$stmt->execute(array($photo, $user_id));
			//echo var_export($stmt->errorInfo());
			$num_row = $stmt->rowCount();
			$data['num_row'] = $num_row;
		}else{
			$data['num_row'] = '';
		}	
		return $data;
	}
	
	function set_rating($params = array()){
		$user_id = $this->clean($params["user_id"]);
		$rating_to_user_id = $this->clean($params["rating_to_user_id"]);
		$rating = $this->clean($params["rating"]);
		$action = $this->clean($params["action"]);
		if($action == 'submit'){
			$stmt = $this->db->conn_id->prepare("INSERT INTO user_rating (user_id, rating_to_user_id, rating) VALUES (?, ?, ?)");
			$stmt->execute(array($user_id, $rating_to_user_id, $rating));
		}	
		$stmt = $this->db->conn_id->prepare("SELECT COUNT(*) AS votecount, SUM(rating) AS rating FROM user_rating WHERE rating_to_user_id=?");
		$stmt->execute(array($rating_to_user_id));
		//echo var_export($stmt->errorInfo());
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	
	function set_like_profile($params = array()){
		$user_id = $this->session->userdata('sess_user_id');
		$liked_to_user_id = $_REQUEST['liked_to_user_id'];
		
		$params['user_id'] = $this->clean($user_id);
		$params['liked_to_user_id'] = $this->clean($liked_to_user_id);
		$data = $this->get_like_profile($params);

		if($data['total_likes'] <= 0){
			$stmt = $this->db->conn_id->prepare("INSERT INTO user_likes (user_id, liked_to_user_id) VALUES (?, ?)");
			$stmt->execute(array($user_id, $liked_to_user_id));
		}
		//echo var_export($stmt->errorInfo());
		$data = $this->get_total_like_profile($_REQUEST);
		return $data;
	}
	
	function get_like_profile($params = array()){
		$user_id = $params['user_id'];
		$liked_to_user_id = $params['liked_to_user_id'];
		$stmt = $this->db->conn_id->prepare("SELECT COUNT(*) AS total_likes FROM user_likes WHERE liked_to_user_id=? AND user_id=?");
		$stmt->execute(array($liked_to_user_id, $user_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	
	function get_total_like_profile($params = array()){
		$liked_to_user_id = isset($_REQUEST['liked_to_user_id']) ? $_REQUEST['liked_to_user_id'] : $params['liked_to_user_id'];
		$stmt = $this->db->conn_id->prepare("SELECT COUNT(*) AS total_likes FROM user_likes WHERE liked_to_user_id=?");
		$stmt->execute(array($liked_to_user_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	
	function submit_testimonials($params = array()){
		$user_id = $this->session->userdata('sess_user_id');
		$testimonials_to_user_id = $this->clean($_REQUEST['testimonials_to_user_id']);
		$testimonials = $this->clean($_REQUEST['testimonials']);
		$stmt = $this->db->conn_id->prepare("INSERT INTO user_testimonials (user_id, testimonials_to_user_id, testimonials) VALUES (?, ?, ?)");
		$stmt->execute(array($user_id, $testimonials_to_user_id, $testimonials));
		//echo var_export($stmt->errorInfo());
		$data = $this->get_testimonials($_REQUEST);
		return $data;
	}
	
	function get_testimonials($params = array()){
		$testimonials_to_user_id = $params['testimonials_to_user_id'];
		$stmt = $this->db->conn_id->prepare("SELECT user_id, testimonials_to_user_id, testimonials FROM user_testimonials WHERE testimonials_to_user_id=? AND status='Active' ORDER BY created_date DESC");
		$stmt->execute(array($testimonials_to_user_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function post_task($params = array()){
		$job_type = $this->clean($_REQUEST['job_type']);
		$job_cat_id = $this->clean($_REQUEST['job_cat_id']);
		$title = $this->clean($_REQUEST['title']);
		$city = $this->clean($_REQUEST['city']);
		$area = $this->clean($_REQUEST['area']);
		$pincode = $this->clean($_REQUEST['pincode']);
		$description = $this->clean($_REQUEST['description']);
		$user_id = $this->session->userdata('sess_user_id');
		$budget = $this->clean($_REQUEST['budget']);
		$required_days = isset($_REQUEST['required_days']) ? $this->clean($_REQUEST['required_days']) : 0;

		$stmt = $this->db->conn_id->prepare("INSERT INTO job (title, description, job_type, user_id, job_cat_id, city, area, pincode, budget, required_days) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->execute(array($title, $description, $job_type, $user_id, $job_cat_id, $city, $area, $pincode, $budget, $required_days));
		//echo var_export($stmt->errorInfo());
		$last_id = $this->db->insert_id();
		$data['last_id'] = $last_id;
		return $data;
	}
	
	function get_tasks_count($params = array()){
		$this->db->cache_on();
		$stmt = $this->db->conn_id->prepare("SELECT max(job_id) as task_count FROM job");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$task_count = $data[0]['task_count'];
		return $task_count;
	}
	
	function get_search_count($params = array()){
		$this->db->cache_on();
		$stmt = $this->db->conn_id->prepare("SELECT max(search_history_id) as search_count FROM search_history");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$search_count = $data[0]['search_count'];
		return $search_count;
	}
	
	function get_tasks_main_categories($params = array()){
		$this->db->cache_on();
		$stmt = $this->db->conn_id->prepare("SELECT job_cat_id, parent_cat_id, category_name, status FROM job_category WHERE parent_cat_id = 0 AND status = 'Active' ORDER BY category_name");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function get_tasks_sub_categories($params = array()){
		$job_cat_id = $params['job_cat_id'];
		$stmt = $this->db->conn_id->prepare("SELECT job_cat_id, parent_cat_id, category_name, status FROM job_category WHERE parent_cat_id = ? AND status = 'Active' ORDER BY category_name");
		$stmt->execute(array($job_cat_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function get_tasks($params = array()){
		$search = $params['search'];
		$status = $params['status'];
		$limit = $params['limit'];
		$stmt = $this->db->conn_id->prepare("SELECT j.job_id, j.created_date, j.title, j.description, j.user_id, u.first_name, jc.parent_cat_id, j.job_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, jc.category_name
											FROM job j
											INNER JOIN user u ON u.user_id = j.user_id
											INNER JOIN job_category jc ON jc.job_cat_id = j.job_cat_id
											WHERE j.status = ? AND
											(j.title LIKE ? OR j.description LIKE ? OR j.skills LIKE ?)
											ORDER BY j.created_date DESC LIMIT $limit");
		$stmt->execute(array($status, "%$search%", "%$search%", "%$search%"));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function get_auto_tasks($params = array()){
		$search = $params['search'];
		$stmt = $this->db->conn_id->prepare("SELECT distinct j.skills FROM job j
											WHERE j.status = 'Active' AND
											(j.title LIKE ? OR j.description LIKE ? OR j.skills LIKE ?)
											ORDER BY j.created_date DESC");
		$stmt->execute(array("%$search%", "%$search%", "%$search%"));
		//echo var_export($stmt->errorInfo());
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function task_details($params = array()){
		$task_id = $params['task_id'];
		$stmt = $this->db->conn_id->prepare("SELECT j.job_id, j.created_date, j.title, j.description, j.user_id, u.first_name, u.status user_status, j.job_cat_id, jc.parent_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, jc.category_name
											FROM job j
											INNER JOIN user u ON u.user_id = j.user_id
											INNER JOIN job_category jc ON jc.job_cat_id = j.job_cat_id
											WHERE j.job_id = ?");
		$stmt->execute(array($task_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($data)){
			return $data[0];
		}else{
			return $data;
		}
	}
	
	function get_bidding($params = array()){
		$task_id = $params['task_id'];
		$stmt = $this->db->conn_id->prepare("SELECT jb.job_bid_id, jb.created_date, jb.job_id, jb.bid_amount, jb.status, u.user_id, u.first_name, u.last_name, u.about_me, u.skills, u.photo, u.address, u.city
											FROM job_bid jb
											INNER JOIN user u ON u.user_id = jb.user_id
											WHERE jb.job_id = ?
											ORDER BY jb.created_date DESC");
		$stmt->execute(array($task_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function bid($params = array()){
		$task_id = $this->clean($_REQUEST['task_id']);
		$bid_amount = $this->clean($_REQUEST['bid_amount']);
		$user_id = $this->session->userdata('sess_user_id');
		
		$stmt = $this->db->conn_id->prepare("SELECT user_id FROM job_bid WHERE user_id = ? AND job_id = ?");
		$stmt->execute(array($user_id, $task_id));
		$num_row = $stmt->rowCount();
		if($num_row == '' && $num_row <= 0){
			$stmt = $this->db->conn_id->prepare("INSERT INTO job_bid (user_id, job_id, bid_amount) VALUES (?, ?, ?)");
			$stmt->execute(array($user_id, $task_id, $bid_amount));
			//echo var_export($stmt->errorInfo());
			$last_id = $this->db->insert_id();
			$data['last_id'] = $last_id;
		}else{
			$data['last_id'] = '';
		}	
		return $data;
	}
	
	function get_bid_details($params = array()){
		$job_bid_id = $params['job_bid_id'];
		$stmt = $this->db->conn_id->prepare("SELECT job_bid_id, created_date, job_id, user_id, bid_amount, status 
											FROM  job_bid
											WHERE job_bid_id = ?");
		$stmt->execute(array($job_bid_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	
	function get_in_touch($params = array())
	{
		$job_bid_id = $this->clean($params['job_bid_id']);
		if($job_bid_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE job_bid SET status = 'Contacted' WHERE job_bid_id = ?");
			$stmt->execute(array($job_bid_id));
			$num_row = $stmt->rowCount();
			$data['num_row'] = $num_row;
		}else{
			$data['num_row'] = '';
		}	
		return $data;
	}
	
	function get_email_template($params = array()){
		$email_type = $params['email_type'];
		$stmt = $this->db->conn_id->prepare("SELECT email_template_id, created_date, email_type, email_from, email_cc, email_subject, email_body 
											FROM email_template
											WHERE email_type = ? AND status = 'Active'");
		$stmt->execute(array($email_type));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo var_export($stmt->errorInfo());
		return $data[0];
	}
	
	function search_suggest($params = array()){
		$search = isset($params['search'])? $params['search'] : '';
		$stmt = $this->db->conn_id->prepare("SELECT j.title, j.description, job_type as searchtype, j.created_date, j.budget, j.job_id, j.job_cat_id, jc.parent_cat_id, u.first_name, u.last_name 
												FROM job j INNER JOIN user u ON j.user_id = u.user_id
												LEFT OUTER JOIN job_category jc ON jc.job_cat_id = j.job_cat_id
												WHERE j.status = 'Active' AND (j.title LIKE ? OR j.description LIKE ?) ORDER BY created_date");
		$stmt->execute(array("%$search%", "%$search%"));
		//echo var_export($stmt->errorInfo());
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function send_feedback($params = array()){
		$name = $this->clean($_REQUEST['name']);
		$email = $_REQUEST['email'];
		$type = $this->clean($_REQUEST['type']);
		$comments = $this->clean($_REQUEST['comments']);
		$stmt = $this->db->conn_id->prepare("INSERT INTO feedback (name, email, type, comments) VALUES (?, ?, ?, ?)");
		$stmt->execute(array($name, $email, $type, $comments));
		//echo var_export($stmt->errorInfo());
		$last_id = $this->db->insert_id();
		$data['last_id'] = $last_id;
		return $data;
	}

	function user_session($params = array()){
		$user_id = $this->clean($params['user_id']);
		$ip_addr = $_SERVER['SERVER_ADDR'];
		$stmt = $this->db->conn_id->prepare("INSERT INTO user_session (user_id, ip_addr) VALUES (?, ?)");
		$stmt->execute(array($user_id, $ip_addr));
		$last_id = $this->db->insert_id();
		$data['last_id'] = $last_id;
		return $data;
	}
	
	function share_link($params = array()){
		$name = $this->clean($params['name']);
		$email = $params['email'];
		$friend_email = $params['friend_email'];
		$comments = $this->clean($params['comments']);
		$link = $this->clean($params['link']);
		$stmt = $this->db->conn_id->prepare("INSERT INTO share_link (name, email, friend_email, link, comments) VALUES (?, ?, ?, ?, ?)");
		$stmt->execute(array($name, $email, $friend_email, $link, $comments));
		$last_id = $this->db->insert_id();
		$data['last_id'] = $last_id;
		return $data;
	}
	
	function buy_subscription($params = array()){
		$sub_from = date('y-m-d h:i:s');
		$sub_to = date('y-m-d h:i:s', strtotime('+6 months'));
		$user_id = $this->session->userdata('sess_user_id');
		$stmt = $this->db->conn_id->prepare("SELECT * FROM user_subscription WHERE user_id = ? AND status = 'Active'");
		$stmt->execute(array($user_id));
		$num_row = $stmt->rowCount();
		if($num_row == '' || $num_row <= 0){
			$stmt = $this->db->conn_id->prepare("INSERT INTO user_subscription (user_id, sub_from, sub_to) VALUES (?, ?, ?)");
			$stmt->execute(array($user_id, $sub_from, $sub_to));
			//echo var_export($stmt->errorInfo());
			$last_id = $this->db->insert_id();
			if($last_id != ''){
				$userArr['user_id'] = $user_id;
				$userArr['status'] = 'Pinch2';
				$this->update_user_status($userArr);
			}
			$data['last_id'] = $last_id;
		}else{
			$data['last_id'] = '';
		}
		return $data;
	}
	
	function update_user_status($params = array()){
		$user_id = $this->clean($params['user_id']);
		$status = $this->clean($params['status']);
		if($user_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET status=? WHERE user_id=?");
			$stmt->execute(array($status, $user_id));
			$this->session->set_userdata('sess_status', $status);
		}
		$data['status'] = 'success';
		return $data;
	}
	
	function close_job($params = array())
	{
		$task_id = $this->clean($params['task_id']);
		$status = $this->clean($params['status']);
		$comments = $params['comments'];
		if($task_id != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE job SET status = ?, close_comments = ? WHERE job_id = ?");
			$stmt->execute(array($status, $comments, $task_id));
			$num_row = $stmt->rowCount();
			$data['num_row'] = $num_row;
		}else{
			$data['num_row'] = '';
		}	
		return $data;
	}
	
	function email_log($params = array()){
		$email_type = $this->clean($params['email_type']);
		$email_to = $params['email_to'];
		$email_cc = $params['email_cc'];
		$email_subject = $this->clean($params['email_subject']);
		$stmt = $this->db->conn_id->prepare("INSERT INTO email_log (email_type, email_to, email_cc, email_subject) VALUES (?, ?, ?, ?)");
		$stmt->execute(array($email_type, $email_to, $email_cc, $email_subject));
		//echo var_export($stmt->errorInfo());
		$last_id = $this->db->insert_id();
		$data['last_id'] = $last_id;
		return $data;
	}
	
	function post_ad_request($params = array()){
		$req_name = $this->clean($params['req_name']);
		$req_email = $params['req_email'];
		$req_desc = $this->clean($params['req_desc']);
		$stmt = $this->db->conn_id->prepare("INSERT INTO ads_request (req_name, req_email, req_desc) VALUES (?, ?, ?)");
		$stmt->execute(array($req_name, $req_email, $req_desc));
		//echo var_export($stmt->errorInfo());
		$last_id = $this->db->insert_id();
		$data['last_id'] = $last_id;
		return $data;
	}
	
	function get_ads_right($params = array()){
		$stmt = $this->db->conn_id->prepare("SELECT ads_id, created_date, ad_name, ad_company, ad_email, ad_contact, ad_link, ad_banner, ad_position, ad_type, ad_from, ad_upto, ad_price, status
												FROM ads
												WHERE ad_position = 'Right' AND status = 'Active' ORDER BY ad_price DESC");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function suspend_account($params = array()){
		$email = $params['email'];
		if($email != ''){
			$stmt = $this->db->conn_id->prepare("UPDATE user SET status='Suspended' WHERE email=?");
			$stmt->execute(array($email));
		}
		$data['status'] = 'success';
		return $data;
	}
	
	function my_jobs($params = array()){
		$user_id = $params['user_id'];
		$stmt = $this->db->conn_id->prepare("SELECT job_id, created_date, title, description, job_type, job_picture, user_id, job_cat_id, city, area, pincode, budget, required_days, status, close_comments
												FROM job
												WHERE job_type = 'job' AND user_id = ? ORDER BY created_date DESC LIMIT 5");
		$stmt->execute(array($user_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function my_bids($params = array()){
		$user_id = $params['user_id'];
		$stmt = $this->db->conn_id->prepare("SELECT jb.job_bid_id, jb.created_date, jb.job_id, jb.user_id, jb.bid_amount, j.title, j.description, j.job_type, j.job_picture, j.job_cat_id, j.city, j.area, j.pincode, j.budget, j.required_days, j.status, j.close_comments
												FROM job_bid jb INNER JOIN job j ON jb.job_id = j.job_id
												WHERE jb.user_id = ? ORDER BY created_date DESC LIMIT 5");
		$stmt->execute(array($user_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function my_pinches($params = array()){
		$user_id = $params['user_id'];
		$stmt = $this->db->conn_id->prepare("SELECT job_id, created_date, title, description, job_type, job_picture, user_id, job_cat_id, city, area, pincode, budget, required_days, status, close_comments
												FROM job
												WHERE job_type = 'service' AND user_id = ? ORDER BY created_date DESC LIMIT 5");
		$stmt->execute(array($user_id));
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
}