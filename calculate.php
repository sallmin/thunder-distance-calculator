<?php
	$temperature = $_POST['temperature'];
	if($temperature == ""){
		$temperature = 20; //approximate room temperature
	}

	if(isset($_POST['secondsCount'])){
		if(!is_numeric($_POST['secondsCount'])){
			die ("Write some numbers!");
		}
		if($_POST['secondsCount'] < 0 || $_POST['temperature'] < 0){
			echo "Don't count backwards.<br> Write some positive numbers!";
			die;
		}

		$speed = 331.4 + 0.6 * $temperature; //general formula for calculating sound speed depending on temperature

		//Final result calculation
		$result = $_POST['secondsCount'] * $speed;
		if($result == 0){
			die("You have to provide seconds counted!");
		}

		if($result > 343){
			echo $result." m <br>(".(number_format($result/1000, 2))." km)<br>";
		}elseif($result > 0.1 && $result <= 343){
	  		echo $result." m <br>(".(number_format($result/1000, 2))." km)";
	  		echo "<div class=\"alert alert-danger\">
	  			  <strong>Be aware!</strong> Thunder is very close. </div>";
		}

	}
?>