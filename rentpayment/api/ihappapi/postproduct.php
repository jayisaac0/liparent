<?php
if (isset($_POST['postproduct'])) {
	$productname = strip_tags($_POST['productname']);
	$productcategory = strip_tags($_POST['productcategory']);
	$productcurrency = strip_tags($_POST['productcurrency']);
	$productcost = strip_tags($_POST['productcost']);
	$productdescription = strip_tags(base64_encode($_POST['productdescription']));
	$productimage = $_POST['productimage'];

	if ($productname == "") { $alert = "provide product name"; }
	elseif ($productcategory == "") { $alert = "provide product category"; }
	elseif ($productcurrency == "") { $alert = "provide product currency"; }
	elseif ($productcost == "") { $alert = "provide product cost"; }
	elseif ($productdescription == "") { $alert = "provide product description"; }
	elseif (empty($_FILES['productimage']['name']) === true) { $alert = "Provide image"; }
    else
    {
        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['productimage']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['productimage']['tmp_name'];
                if (in_array($file_extn, $allowed) === true)
        {
            $file_path = 'uploads/products/' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);
		      try
		      {


				$stmt = $auth_user->runQuery("SELECT productname FROM businesses_products WHERE productname=:productname ");
				$stmt->execute(array(':productname'=>$productname));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() == 1)
				{
					$alert = "Duplicate product names not allowed";
				}else{
			        if($user->postproduct($productname, $productcategory, $productcurrency, $productcost, $productdescription, $file_path)){  
			            $alert = "Product posted";
			          }
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
