<?php
	//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	$sess_id = session_id();
	if(empty($sess_id)) {
		session_start();
	}
	$sess_user_id = $this->session->userdata('sess_user_id');
	$sess_user_email = $this->session->userdata('sess_user_email');
	$sess_user_name = $this->session->userdata('sess_user_name');
	$sess_status = $this->session->userdata('sess_status');
	$sess_photo = $this->session->userdata('sess_photo');
	$this->benchmark->mark('code_start');
?>