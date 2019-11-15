<?php
if (isset($_POST['btn-registration'])) {
    $firstname = strip_tags($_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']);
    $idnumber = strip_tags($_POST['idnumber']);
    $email = strip_tags($_POST['email']);
    $phonenumber = strip_tags($_POST['phonenumber']);
    $password = strip_tags($_POST['password']);
    $repeatpassword = strip_tags($_POST['repeatpassword']);

    if($firstname == "") { $alert = "Provide first name"; }
    elseif($lastname == "") { $alert = "provide last name !"; }
    elseif($idnumber == "") { $alert = "provide ID number !"; }
    elseif($email == "") { $alert = "provide email !"; }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { $alert = 'Please enter a valid email address !'; }  
    elseif($phonenumber == "") { $alert = "provide phone numner !"; }
    elseif($password == "") { $alert = "provide password !"; }
    elseif($repeatpassword == "") { $alert = "Re-enter password !"; } 
    elseif($password != $repeatpassword) { $alert="Passwords entered do not match"; }
    else
    {
      try
      {
        $stmt = $user->runQuery("SELECT idnumber, email FROM users WHERE idnumber=:idnumber OR email=:email");
        $stmt->execute(array(':idnumber'=>$idnumber, ':email'=>$email));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
          
        if($row['idnumber']==$idnumber) {
          $alert = "sorry idnumber already taken !";
        }
        else if($row['email']==$email) {
          $alert = "sorry email id already taken !";
        }
        else
        {
              if($user->register($firstname, $lastname, $idnumber, $email, $phonenumber, $password)){  
                $alert = "Account created for new tenant";
              }


        }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	


?>