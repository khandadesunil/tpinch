<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * CodeIgniter
	 *
	 * An open source application development framework for PHP 5.1.6 or newer
	 *
	 * @package		CodeIgniter
	 * @author		ExpressionEngine Dev Team
	 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
	 * @license		http://codeigniter.com/user_guide/license.html
	 * @link		http://codeigniter.com
	 * @since		Version 1.0
	 * @filesource
	 */

	// ------------------------------------------------------------------------

	/**
	 * CodeIgniter Generic Helpers
	 *
	 * @package		CodeIgniter
	 * @subpackage	Helpers
	 * @category	Helpers
	 * @author		ExpressionEngine Dev Team
	 * @link		http://codeigniter.com/user_guide/helpers/html_helper.html
	 */

	// ------------------------------------------------------------------------

	/**
	 * Heading
	 *
	 * Generates an HTML heading tag.  First param is the data.
	 * Second param is the size of the heading tag.
	 *
	 * @access	public
	 * @param	string
	 * @param	integer
	 * @return	string
	 */
	function didyouknow($params = array()){
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');	
		$result['user_count'] = $CI->pinchModel->get_user_count($params);
		$result['job_count'] = $CI->pinchModel->get_job_count($params);
		$result['pinch_count'] = $CI->pinchModel->get_pinch_count($params);
		$result['bid_count'] = $CI->pinchModel->get_bid_count($params);
		$result['feedback_count'] = $CI->pinchModel->get_feedback_count($params);
		return $result;
	}

	function get_ads_right($params = array()){
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$result = $CI->pinchModel->get_ads_right($params);
		return $result;
	}

	function send_mail($params = array()){
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$email_to = $params['email_to'];
		$subject = $params['email_subject'];		
		$message = $params['email_body'];
		$email_from = $params['email_from'];
		$email_cc = $params['email_cc'];		
		$email_type = $params['email_type'];		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:".$email_from."\r\n";
		$headers .= "bcc:".$email_cc."\r\n";
		if(@mail($email_to, $subject, $message, $headers)){
			$CI->pinchModel->email_log($params);
		}
	}

	function get_user_details($userArr = array()){
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$email = $userArr['email'];
		if($email != ''){
			$result = $CI->pinchModel->user_details($userArr);
			return $result;
		}
	}

	function rand_color() {
		return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}
	
	function get_tasks_count() {
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$result['tasks_count'] = $CI->pinchModel->get_tasks_count($params = null);
		return $result;
	}

	function get_experts_count() {
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$result['experts_count'] = $CI->pinchModel->get_experts_count($params = null);
		return $result;
	}
	
	function get_bid_count() {
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$result['bids_count'] = $CI->pinchModel->get_bid_count($params = null);
		return $result;
	}
	
	function get_search_count() {
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$result['search_count'] = $CI->pinchModel->get_search_count($params = null);
		return $result;
	}
	
	function get_tasks_main_categories_list() {
		$CI =& get_instance();
		$CI->load->model('pinch_model', 'pinchModel');
		$result['categories'] = $CI->pinchModel->get_tasks_main_categories($params = null);
		return $result;
	}

	/* End of file html_helper.php */
	/* Location: ./system/helpers/html_helper.php */