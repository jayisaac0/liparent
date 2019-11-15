<?php
if (isset($_POST['submitnewappartment'])) {

	$property_id = strip_tags($_POST['property_id']);
	$appartment = strip_tags($_POST['appartment']);
	$appartmenttype = strip_tags($_POST['appartmenttype']);
	$appartmentlocation = strip_tags($_POST['appartmentlocation']);
	$appartmentprice = strip_tags($_POST['appartmentprice']);
	$appartmentarea = strip_tags($_POST['appartmentbedrooms']);
	$appartmentbedrooms = strip_tags($_POST['appartmentbedrooms']);
	$appartmentbathrooms = strip_tags($_POST['appartmentbathrooms']);
	$message = strip_tags($_POST['message']);
	$geocomplete = strip_tags($_POST['geocomplete']);
	$lng = strip_tags($_POST['lng']);
	$lat = strip_tags($_POST['lat']);
	@$roomimage = $_POST['roomimage'];

	if($property_id == "") { $alert = "Provide property ID"; }
	elseif($appartment == "") { $alert = "Select appartment"; }
	elseif($appartmenttype == "") { $alert = "Provide appartment type"; }
	elseif($appartmentlocation == "") { $alert = "Set appartment location"; }
	elseif($appartmentprice == "") { $alert = "Set appartment price"; }
	elseif($appartmentarea == "") { $alert = "Enter appartment area"; }
	elseif($appartmentbedrooms == "") { $alert = "Provide number of bedrooms"; }
	elseif($appartmentbathrooms == "") { $alert = "Provide number of bathrooms"; }
	elseif($message == "") { $alert = "Enter description"; }
	elseif($geocomplete == "") { $alert = "Provide geolocation"; }
	elseif($lng == "") { $alert = "lng needed"; }
	elseif($lat == "") { $alert = "lat needed"; }
	elseif(empty($_FILES['roomimage']['name']) === true) { $error[] = "Provide image!"; }
	else
	{

        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['roomimage']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['roomimage']['tmp_name'];
        if (in_array($file_extn, $allowed) === true)
        {
            $file_path = 'uploads/' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);
			try
			{
				if($user->addtoappartments($property_id, $appartment, $appartmenttype, $appartmentlocation, $appartmentprice, $appartmentarea, $appartmentbedrooms, $appartmentbathrooms, $message, $geocomplete, $lng, $lat, $file_path)){  
			        $alert = "New appartment added to system";
			      }

			}
			catch(PDOException $e)
			{
			$alert = $e->getMessage();
			}  	

		}		
	} 
}	

?>