<?php
	class Logs
	{
		public static function writeLogToDB($rms_num, $temperature){
            global $connect;
            
            $insert_log_query = "INSERT INTO `logs` (`rms_num`, `date_time`, `temperature`) VALUES (".$rms_num.", NOW(), '".$temperature."')"; 
            $apply_insert_log = mysqli_query($connect,$insert_log_query);
            
            
        }
        
	}
?>
 