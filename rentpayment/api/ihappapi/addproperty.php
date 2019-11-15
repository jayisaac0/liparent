<?php
if (isset($_POST['newproperty'])) {
$propertyname = strip_tags($_POST['propertyname']);


if ($propertyname == "") { $alert = "No property name provided"; }
else
{
	try
	{

		if($user->addtoproperty($propertyname)){  
	        $alert = "New property added to system";
	      }

	}
	catch(PDOException $e)
	{
	$alert = $e->getMessage();
	}  	
} 
}	

?>

