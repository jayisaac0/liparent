<?php  
if(!$session->is_loggedin())
  {
    $session->redirect('login');
  }
?>
