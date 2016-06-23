<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| User Defined Constants
|--------------------------------------------------------------------------
*/
define('SITETHEME',					'theme/site/idream/');
define('ADMINTHEME',				'theme/admin/iadmin/');
define('SITETITLE',					'Taskpinch.com - Your online workplace');
define('LINK',						'http://www.taskpinch.com');
define('LOGIN_SUCC_MSG',			'Login Successful.');
define('LOGIN_FAIL_MSG',			'Login failed!');
define('REG_SUCC_MSG',				'Registration done! Check your mailbox for activation link.');
define('REG_FAIL_MSG',				'Registration failed!');
define('FORGOT_MSG',				'Password reset email sent to registered email');
define('POSTAJOB_SUCC_MSG',			'Task posted. Please wait a while to appear your job in search.');
define('POSTAJOB_FAIL_MSG',			'Sorry! Task could not post!');
define('POSTAPINCH_SUCC_MSG',		'Pinch posted. Please wait a while to appear your pinch in search.');
define('POSTAPINCH_FAIL_MSG',		'Sorry! Pinch could not post!');
define('TITLELIMIT',				'45');
define('DESCLIMIT',					'220');
define('BIDSUCCESS',				'Your bid was successful.');
define('BIDERROR',					'Your bid was failed!');
define('THUMBWIDTH',				'70');
define('TESTIMINIALS_SUCCESS',		'Testimonial submitted and awaiting for approval.');
define('TESTIMINIALS_FAILURE',		'Testimonial could not submit.');
define('FEEDBACK_SUCCESS',			'Thank you for Feedback. We will get back to you on your Query/Comments/Problem.');
define('FEEDBACK_FAILURE',			'Oops! There is a problem while sending your feedback.');
define('SHARE_SUCCESS',				'Thank you for Sharing.');
define('ADS_SUCCESS',				'Thank you for your Advertisement request.');
define('UPDATEPROFILE_SUCCESS',		'Profile updated successfully!');
define('UPDATEPROFILE_FAILURE',		'Sorry! Could not update your profile!');
define('ABOUTME_SUCCESS',			'Information updated successfully!');
define('SKILLS_SUCCESS',			'Skills updated successfully!');
define('CHANGEPASS_SUCCESS',		'Password changed successfully!');
define('CHANGEPASS_FAILURE',		'Sorry! Password could not changed!');
define('PREMIUM_SUCCESS',			'Congratulations! You are now premium member of Taskpinch.com');
define('PREMIUM_FAILURE',			'Sorry! There was a problem while adding the subscription details!');
define('PREMIUM_LOGIN_FAILURE',		'Please login to be a Premium member.');
define('UPDATEJOBSTATUS_SUCCESS',	'Status and comments are updated successfully');
define('UPDATEJOBSTATUS_FAILURE',	'Sorry! Could not update Status and comments');
define('PASS_RESET_SUCC_MSG',		'We have sent reset link to your Email');
define('PASS_RESET_FAIL_MSG',		'Sorry! Could not send reset link');
define('SUSPEND_ACCOUNT',			'Your account is suspended');
define('DBUSER',					'root');
define('DBPASS',					'');
define('DBNAME',					'taskpinch');

/* End of file constants.php */
/* Location: ./application/config/constants.php */