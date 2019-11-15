<?php
if(isset($_POST['loginbutton']))
{
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);
    
  if ($email =="") { $alert = "Provide email"; }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { $alert = 'Please enter a valid email address !'; }  
  elseif ($password =="") { $alert = "Provide password"; }
  else{
    if($user->doLogin($email, $password))
    {
      $alert = "Successful login";
      
      if ($userRow['isadmin'] == 0) {
        //header("Location: manage");
         echo '<script type="text/javascript">window.location = "profile.php"</script>';
      }else{
        //header("Location: ./");
         echo '<script type="text/javascript">window.location = "estates"</script>';
      }
    }
    else
    {
      $alert = "Error loging in";
    } 
  }
}
?>