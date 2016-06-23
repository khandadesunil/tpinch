<?php
class get_ratings {
    
	private $widget_id;
    private $data = array();
	private $email;
    
function __construct($wid='',$email_val='') {	
    $this->widget_id = $wid;
    $this->email = $email_val;
    
}

public function get_ratings() {
	error_reporting(0);
	$ci =& get_instance();
    $task_ins = "select rating from rating where email = '".$this->email."' order by created ASC";
	$res1 = mysql_query($task_ins);
		
	if(mysql_num_rows($res1) > 0) {			
		$result = mysql_fetch_assoc($res1);	
		
		// First check whether the rating is of json_encode means if it is first created
		/*
		$json_data = @json_decode($result['rating']);
		if ($json_data === null && json_last_error() !== JSON_ERROR_NONE) {
			$this->data = unserialize($result['rating']); //Unserialaize data is existing.. Rate is done for this task by rater
		} else {
			$this->data = $result['rating'];
		}
		*/
		if (unserialize($result['rating'])) {
			$this->data = unserialize($result['rating']);
		} else {
			$this->data = $result['rating'];
		}
	}	
	
    if(isset($this->data[$this->widget_id]) && $this->data[$this->widget_id]) {
        echo json_encode($this->data[$this->widget_id]);
    }
    else {
        $data['widget_id'] = $this->widget_id;
        $data['number_votes'] = 0;
        $data['total_points'] = 0;
        $data['dec_avg'] = 0;
        $data['whole_avg'] = 0;
        echo json_encode($data);
    } 
}
# end class
}
?>