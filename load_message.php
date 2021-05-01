<?php
	session_start();
  	include_once 'dbcon.php';
  	$conn = connect();

  	$id = $_SESSION['id'];

  	if(isset($_SESSION['receiver_id'])) {

	  	$receiver_id = $_SESSION['receiver_id'];

	    $sql= "SELECT * FROM messages WHERE sender_id = '$id' AND receiver_id = '$receiver_id' OR sender_id = '$receiver_id' AND receiver_id = '$id'";
	    $result = $conn->query($sql);
	                                    
	    foreach ($result as $row) {
	        if ($row['sender_id'] == $id) { ?>
	            <div class="msg-right">
	                <p class="card-text"><?=$row['text_message']?></p>
	                <div class="date-time text-right">
	                	<small class="text-right">- <?=$row['time_stamp']?></small>
	             	</div>
	            </div>
	 <?php }
	        elseif ($row['sender_id'] != $id) { ?>
	            <div class="msg-left">
	                <p class="card-text"><?=$row['text_message']?></p>
	                <div class="date-time">
	                    <small class="text-right">- <?=$row['time_stamp']?></small>
	                </div>
	            </div>
	  <?php }
	    }

  	} else { ?>
  		<p>Select a conversation</p>
<?php }


?>