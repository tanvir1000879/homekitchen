<?php include_once 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
                  <div class="row m-0">
                    <div class="col-4">
                      <div class="card">
                        <div class="card-header">
                          Conversations
                        </div>
                        <div class="card-body card-body-inbox overflow-auto">
                          <div class="list-group list-group-flush">

                            <?php
                              include_once '../dbcon.php';
                              $conn = connect();

                              if (isset($_SESSION['receiver_id'])) {
                                $receiver_id = $_SESSION['receiver_id'];
                              }

                              $sql = "SELECT * FROM conversations WHERE user_id = '$id' ORDER BY id DESC";

                              $result = $conn->query($sql);

                              if ($result->num_rows < 1) { ?>
                                <p class="text-center mt-3">No conversation found</p>
                        <?php }
                              elseif ($result->num_rows > 0) {
                                foreach ($result as $row) { ?>
                                  <a href="set_receiver.php?receiver_id=<?=$row['chef_id']?>" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <div class="text-truncate">
                                      <span class=""><?=$row['last_text']?></span>
                                      <?php
                                        $temp_receiver = $row['chef_id'];
                                        $sql2 = "SELECT * FROM chefs WHERE chef_id = '$temp_receiver'";
                                        $result2 = $conn->query($sql2);
                                        while($row2 = $result2->fetch_assoc()) { ?>
                                      <div class="small text-gray-500"><b><?=$row2['chef_name']?></b> · <?=$row['time_stamp']?></div>
                                    <?php } ?>
                                    </div> 
                                  </a>
                        <?php   }
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="card card-conversation">
                        <div class="card-header">
                        <?php
                          if (isset($_SESSION['receiver_id'])) {
                            $sql = "SELECT * FROM chefs WHERE chef_id = '$receiver_id'";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) { ?>
                              <?=$row['chef_name']?>            
                          <?php }
                          }
                        ?>  
                        </div>
                        <div class="card-body overflow-auto" id="chat-history">
                          <!-- dynamic part -->
                        </div>
                        <div class="card-footer">
                          <form id="send-message">
                            <div class="input-group input-group-lg">
                              <input type="text" class="form-control" id="text-send" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Type a message...">
                                <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-send" onclick="return false;">Send</i></button>
                              </div>
                            </div>
                            <small class="text-danger" id="invalid-msg"></small>
                          </form>
                        </div>
                      </div>
                    </div>
	
                  </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <script src="../assets/js/jquery.min.js"></script>


    <script type="text/javascript">

      setInterval(function(){
         $('#chat-history').load('../load_message.php');
         $('#chat-history').animate({scrollTop: $("#chat-history").prop("scrollHeight")}, 500);
       }, 2000) /* time in milliseconds (ie 2 seconds)*/

        $('.btn-send').click(function(){
          var text = $('#text-send').val();
      
      if(text == ''){
        $('#text-send').focus();
        $('#text-send').addClass('is-invalid');
        document.getElementById("invalid-msg").innerHTML = "Enter text as message body";
      }
      else {
       // alert(text);
		//exit;
        $.ajax({
          url: "send_message.php",
          type: "POST",
          data: {text: text},
          success: function (response) {
            if(response == 1){
              $('#text-send').val('');
              document.getElementById("invalid-msg").innerHTML = "";
            }
            else if (response == 0) {
             document.getElementById("invalid-msg").innerHTML = "Message not sent";
            }
            else if (response = 2) {
              document.getElementById("invalid-msg").innerHTML = "Message not sent. Select a recipient";
            }
			/*else{
				alert(response);
			}*/
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
        });
        $('#text-send').removeClass('is-invalid');
      }
    });

    </script>

<?php include_once 'footer.php'; ?>