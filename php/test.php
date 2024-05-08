<?php

   $data = array();
   if(isset($_POST['randomAnswer']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
   $data = 'You number is: ' . $_POST['randomAnswer'];       
   echo json_encode($data);  
   die();      
    }
 ?>
