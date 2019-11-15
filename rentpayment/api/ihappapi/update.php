<?php

	if (isset($_POST['passreset'])) {
		$password = trim(htmlspecialchars($_POST['password']));
        $repeatpassword = trim(htmlspecialchars($_POST['repeatpassword']));

        if ($password == "") { $alert = "Empty password field"; }
        elseif ($repeatpassword == "") { $alert = "Empty repeat password field"; }
        elseif ($password != $repeatpassword) { $alert = "Passwords dont match"; }
        else {
            try
            {
                $new_password = password_hash($password, PASSWORD_DEFAULT);

            	$stmt = $auth_user->runQuery(" UPDATE `users` SET `password`=:password WHERE public_id='".$userRow['public_id']."' ");
    			$stmt->bindparam(":password", $new_password); 
    			$stmt->execute();
                $alert = "Password successfuly changed";
    			//return $stmt;
            }
            catch(PDOException $e)
            {
                $alert =  $e->getMessage();
        	}
        }

	}

    if (isset($_POST['newmanager'])) {
        
        $public_id = trim(htmlspecialchars($_POST['public_id']));
        $property_id = trim(htmlspecialchars($_POST['property_id']));
        try
        {

            $stmt = $auth_user->runQuery(" UPDATE `users` SET `isadmin`='2', property_id='$property_id' WHERE public_id=$public_id ");
            $stmt->bindparam("2", $isadmin);
            $stmt->bindparam(":property_id", $property_id); 
            $stmt->execute();
            $alert = "New property manager created";
        }
        catch(PDOException $e)
        {
            $alert =  $e->getMessage();
        }
    }

    if (isset($_POST['updatetenantoccupancy'])) {
        
        $appartments_id = trim(htmlspecialchars($_POST['appartments_id']));
        $public_id = trim(htmlspecialchars($_POST['public_id']));
        try
        {

            $stmt = $auth_user->runQuery(" UPDATE `appartments` SET public_id='$public_id' WHERE appartments_id='$appartments_id' ");
            $stmt->bindparam(":public_id", $public_id); 
            $stmt->execute();
            $alert = "Tenant assigned appartment";
        }
        catch(PDOException $e)
        {
            $alert =  $e->getMessage();
        }
    }



    if (isset($_POST['uservacation'])) {
        $appartments_id = trim(htmlspecialchars($_POST['appartments_id']));
        try
        {

            $stmt = $auth_user->runQuery(" UPDATE `appartments` SET `public_id`=NULL WHERE appartments_id=$appartments_id ");
            $stmt->bindparam(":NULL", $public_id); 
            $stmt->execute();
            $alert = "Checkout successful";
            //return $stmt;
        }
        catch(PDOException $e)
        {
            $alert =  $e->getMessage();
        }
    }



    if (isset($_POST['pupdate'])) {
        $agentphoto = trim(htmlspecialchars($_POST['agentphoto']));
        $firstname = trim(htmlspecialchars($_POST['firstname']));
        $lastname = trim(htmlspecialchars($_POST['lastname']));
        $email = trim(htmlspecialchars($_POST['email']));
        $phonenumber = trim(htmlspecialchars($_POST['phonenumber']));

        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['agentphoto']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['agentphoto']['tmp_name'];
        if (in_array($file_extn, $allowed) === true)
        {
            $file_path = 'uploads/' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);
            
            try
            {

                $stmt = $auth_user->runQuery(" UPDATE `users` SET agentphoto='$file_path', firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber' WHERE public_id='".$userRow['public_id']."' ");

                $stmt->bindparam(":file_path", $agentphoto); 
                $stmt->bindparam(":firstname", $firstname); 
                $stmt->bindparam(":lastname", $lastname); 
                $stmt->bindparam(":email", $email); 
                $stmt->bindparam(":phonenumber", $phonenumber);
                $stmt->execute();
                $alert = "Profile updated";
                echo '<script type="text/javascript">window.location = "profile.php"</script>';
            }
            catch(PDOException $e)
            {
                $alert =  $e->getMessage();
            }
        }
    }
?>


