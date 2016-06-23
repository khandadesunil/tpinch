<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProfilerEnabler
{
	function EnableProfiler()
	{
		$CI = &get_instance();
		$CI->output->enable_profiler( config_item('enable_profiling') );
	}
}

/* End of file autoload.php */
/* Location: ./application/config/autoload.php */