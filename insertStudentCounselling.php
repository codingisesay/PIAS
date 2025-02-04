<?php 
include('connection.php');

$courseId = mysqli_real_escape_string($conn,$_REQUEST['courseId']);
$name = mysqli_real_escape_string($conn,$_REQUEST['name']);
$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
$phone = mysqli_real_escape_string($conn,$_REQUEST['phone']);
$message = mysqli_real_escape_string($conn,$_REQUEST['message']);


if(filter_var($email, FILTER_VALIDATE_EMAIL) AND strlen($phone)==10){

    $query = "INSERT INTO `counselling_student` (`course_id`, `enq_per_name`, `enq_per_email`, `enq_per_phone`, `enq_per_msg`, `counselling_status`, `counselling_comment`, `counselling_done_by`,`counsellingDateTime`) 
                                    VALUES ('$courseId', '$name', '$email', '$phone', '$message', '0', null, null,null)";
                                    $run = mysqli_query($conn,$query);
                                    if($run){?>
                                    
                                    <script>

                                        alert('Thank You For Writing Us, We Will Get Back Soon!');
                                        location.replace('index.php');
                                    </script>
                                    
                                    
                                    <?php

                                    }

}else{?>
                                    <script>
                                        alert("Please Enter Valid Inputs");
                                        location.replace('index.php');
                                    </script>
                                    
                                    <?php
                                        
                                    }
                                  




?>