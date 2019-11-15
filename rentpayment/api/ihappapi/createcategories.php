<?php
if (isset($_POST['categorybutton'])) {
	$productcategories = strip_tags($_POST['productcategories']);

	if($productcategories == "") { $alert = "provide category"; }
    else
    {
      try
      {
        if($user->setupcategories($productcategories)){  
            $alert = "Category added";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	

?>

