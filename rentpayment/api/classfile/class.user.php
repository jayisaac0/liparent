<?php
//error_reporting (0);
require_once('database/dbconfig.php');

class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	// public function setupcategories($productcategories)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO my_categories(productcategories) VALUES(:productcategories)");

	// 		$stmt->bindparam(":productcategories", $productcategories);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }

	public function payment($public_id, $appartmentprice, $appartments_id, $month)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO payments(public_id, appartmentprice, appartments_id, month) VALUES(:public_id, :appartmentprice, :appartments_id, :month)");
			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":appartmentprice", $appartmentprice);
			$stmt->bindparam(":appartments_id", $appartments_id);
			$stmt->bindparam(":month", $month);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function onlineupdate($public_id, $appartmentprice, $appartments_id, $month, $status, $pesapal_transaction_tracking_id)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO payments(public_id, appartmentprice, appartments_id, month, status, pesapal_transaction_tracking_id) VALUES(:public_id, :appartmentprice, :appartments_id, :month, :status, :pesapal_transaction_tracking_id)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":appartmentprice", $appartmentprice);
			$stmt->bindparam(":appartments_id", $appartments_id);
			$stmt->bindparam(":month", $month);
			$stmt->bindparam(":status", $status);
			$stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function addtoproperty($propertyname)
	{

		try
		{
			$stmt = $this->conn->prepare("INSERT INTO properties(propertyname) VALUES(:propertyname)");
			$stmt->bindparam(":propertyname", $propertyname);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $alert = $e->getMessage();
		}
	}	

	public function addtoappartments($property_id, $appartment, $appartmenttype, $appartmentlocation, $appartmentprice, $appartmentarea, $appartmentbedrooms, $appartmentbathrooms, $message, $geocomplete, $lng, $lat, $roomimage)
	{

		try
		{
			$stmt = $this->conn->prepare("INSERT INTO appartments(property_id, appartment, appartmenttype, appartmentlocation, appartmentprice, appartmentarea, appartmentbedrooms, appartmentbathrooms, message, geocomplete, lng, lat, roomimage) VALUES(:property_id, :appartment, :appartmenttype, :appartmentlocation, :appartmentprice, :appartmentarea, :appartmentbedrooms, :appartmentbathrooms, :message, :geocomplete, :lng, :lat, :roomimage)");

			$stmt->bindparam(":property_id", $property_id);
			$stmt->bindparam(":appartment", $appartment);
			$stmt->bindparam(":appartmenttype", $appartmenttype);
			$stmt->bindparam(":appartmentlocation", $appartmentlocation);
			$stmt->bindparam(":appartmentprice", $appartmentprice);
			$stmt->bindparam(":appartmentarea", $appartmentarea);
			$stmt->bindparam(":appartmentbedrooms", $appartmentbedrooms);
			$stmt->bindparam(":appartmentbathrooms", $appartmentbathrooms);
			$stmt->bindparam(":message", $message);
			$stmt->bindparam(":geocomplete", $geocomplete);
			$stmt->bindparam(":lng", $lng);
			$stmt->bindparam(":lat", $lat);
			$stmt->bindparam(":roomimage", $roomimage);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $alert = $e->getMessage();
		}
	}	































	public function register($firstname, $lastname, $idnumber, $email, $phonenumber, $password)
	{
		try
		{
			$new_password = password_hash($password, PASSWORD_DEFAULT);

			$stmt = $this->conn->prepare("INSERT INTO users(firstname, lastname, idnumber, email, phonenumber, password)VALUES(:firstname, :lastname, :idnumber, :email, :phonenumber, :password)");

			$stmt->bindparam(":firstname", $firstname);
			$stmt->bindparam(":lastname", $lastname);
			$stmt->bindparam(":idnumber", $idnumber);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":phonenumber", $phonenumber);
			$stmt->bindparam(":password", $new_password);
			$stmt->execute();
			return $stmt;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}


	public function doLogin($email, $password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:email ");
			$stmt->execute(array(':email'=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($password, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['public_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
