<?php
class ratings {
    private $widget_id;
    private $data = array();
    private $rated_data = array();
	private $rating_by;		
	private $email;
	private $tasksid;
	
	function __construct($wid='',$email_val='',$ratingby='',$taskid='') {	
		error_reporting(0);
		$this->widget_id = $wid;
		$this->email = $email_val;
		$this->rating_by = $ratingby;
		$this->tasksid = $taskid;

		$ci =& get_instance();
	    $task_ins = "select rating from rating 
	    			 where email = '".$this->email."' AND rating_by='".$this->rating_by."'
	    			 AND task_id = '".$this->tasksid."'";
	    //echo $task_ins;exit;
		$res1 = mysql_query($task_ins);
		if(mysql_num_rows($res1) > 0) {			
			$result = mysql_fetch_assoc($res1);		
			//print_r($result['rating']);exit;
			
			// First check whether the rating is of json_encode means if it is first created
			$json_data = @json_decode($result['rating']);
		    if ($json_data === null && json_last_error() !== JSON_ERROR_NONE) {
		    	$this->data = unserialize($result['rating']); //Unserialaize data is existing.. Rate is done for this task by rater
			} else {
				$this->data = $result['rating'];
			}
		}
	}
	
	public function get_ratings() {		
		$email = $this->email;
		$ratings_by = $this->rating_by;
		$task_id = $this->tasksid;
		
		$json_data = @json_decode($this->data);
		if($json_data && (count($json_data) > 0 ) ) {
			//print_r($this->data);exit;
			echo $this->data;
		} else if(isset($this->data[$this->widget_id]) && $this->data[$this->widget_id]) {
        	echo json_encode($this->data[$this->widget_id]);
    	} else {
    		/*
    		// CODE FOR UPDATE RATING IF EXISTS, ELSE CREATE A NEW RATING
	    	$ci =& get_instance();
		    $task_ins = "select rating from rating 
		    			 where email = '".$this->email."'";
			$res1 = mysql_query($task_ins);
			if(mysql_num_rows($res1) > 0) {		
				$result = mysql_fetch_assoc($res1);		
				$this->data = unserialize($result['rating']);	
				$data = $result['rating'];
				$data_array = array(
			   	'email' => $email,
			   	'rating_by' => $ratings_by,
		 		'task_id' => $task_id,
			  	'rating' => $result['rating']
				);
			} else {
			*/
				$data['widget_id'] = $this->widget_id;
		        $data['number_votes'] = 0;
		        $data['total_points'] = 0;
		        $data['dec_avg'] = 0;
		        $data['whole_avg'] = 0;	
		        $data = json_encode($data);
		        $data_array = array(
			   	'email' => $email,
			   	'rating_by' => $ratings_by,
		 		'task_id' => $task_id,
			  	'rating' => $data
				);
			//}
    		
			$ci =& get_instance();
			$ci->db->insert('rating', $data_array); 		
			
			//print $ci->db->last_query();exit;
	        echo $data; 
    	}
	}
	
	public function vote($email,$ratings_by='',$task_id='') {
	    $this->email = $email;
	    $this->rating_by = $ratings_by;
	    $this->tasksid = $task_id;
	    
	    # Get the value of the vote
	    preg_match('/star_([1-5]{1})/', $_POST['clicked_on'], $match);
	    $vote = $match[1];
	    
	    $ID = $this->widget_id;
	    # Update the record if it exists
	    
	    $task_ins = "select rating,rated from rating 
	    			 where email = '".$this->email."' 
	    			 AND rating_by='".$this->rating_by."'
	    			 AND task_id = '".$this->tasksid."'
	    			 ";
		$res1 = mysql_query($task_ins);
	    
	    if(mysql_num_rows($res1)) {
	    	$result = mysql_fetch_assoc($res1);
	    	//$this->data = json_decode($result['rating']);
	    	$json_data = json_decode($result['rating']);
	    	
			//if ($json_data === null && json_last_error() !== JSON_ERROR_NONE) {
			if (unserialize($result['rating'])) {
				//Unserialaize data is existing.. Rate is done for this task by rater
				// Update the rating again..
		    	//$this->data = unserialize($result['rating']);
				//print_r($this->data[$this->widget_id]);exit;
				
				$this->data = unserialize($result['rating']);
				$prev_rating = $result['rated'];
				$this->data[$ID]['total_points'] -= $prev_rating;
				$this->data[$ID]['total_points'] += $vote;
					
			} else { 
				
				$task_ins = "select rating from rating where email = '".$this->email."' and status='complete'
							 ORDER BY created ASC";      // Lookup for the rating exists for the user
				$res1 = mysql_query($task_ins);	
				$result_exists = mysql_fetch_assoc($res1);		
					
				if(unserialize($result_exists['rating'])) { // Updating rating by checking the previous rating
					$this->data = unserialize($result_exists['rating']);
					
					$this->data[$ID]['number_votes'] += 1;
		       		$this->data[$ID]['total_points'] += $vote;
				} else {
					$this->data = array();
					$this->data[$ID]['number_votes'] = 1;
					$this->data[$ID]['total_points'] = $vote;
				}
				//print_r($this->data[$ID]);exit;
			}
	    }
	    
		$this->data[$ID]['dec_avg'] = round( $this->data[$ID]['total_points'] / $this->data[$ID]['number_votes'], 3);
		//$this->data[$ID]['whole_avg'] = round( $this->data[$ID]['dec_avg'] );
		$this->data[$ID]['whole_avg'] = floor( $this->data[$ID]['dec_avg'] ); // To rate down (in stars) - Using floor method

	    // To display the current rating
	    $this->rated_data[$ID]['number_votes'] = 1;
	    $this->rated_data[$ID]['total_points'] = $vote;
	    $this->rated_data[$ID]['dec_avg'] = round( $this->rated_data[$ID]['total_points'] / $this->rated_data[$ID]['number_votes'], 1 );
	    $this->rated_data[$ID]['whole_avg'] = round( $this->rated_data[$ID]['dec_avg'] );
	       
		$data = array(
	            'rating' => serialize($this->data),            
	            'rated' => $vote	
		);
		
		$ci =& get_instance();	
		$ci->db->where('email', $email);	
		$ci->db->where('rating_by', $ratings_by);	
		$ci->db->where('task_id', $task_id);
		$ci->db->update('rating', $data); 	
		//print $ci->db->last_query();exit;		
		
		$ci =& get_instance();	
		$data = array(            
			'rating' => serialize($this->data)	
		);	
		$ci->db->where('email', $email);	
		$ci->db->update('rating', $data); 	

		/*
		// Display the rating by using this code again
		$ci =& get_instance();
	    $task_ins = "select rating from rating 
	    			 where email = '".$this->email."' 
	    			 AND rating_by='".$this->rating_by."'";
		$res1 = mysql_query($task_ins);
		if(mysql_num_rows($res1) > 0) {			
			$result = mysql_fetch_assoc($res1);		
			$this->data = unserialize($result['rating']);	
			echo json_encode($this->data[$this->widget_id]);
		}
		*/
		// To display current ratings. This is not the one which is saved in DB
		echo json_encode($this->rated_data[$this->widget_id]);
	}

# end class
}
?>