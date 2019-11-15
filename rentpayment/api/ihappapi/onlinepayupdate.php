<?php
if (isset($_POST['makepayupdate'])) {
	$public_id = strip_tags($_POST['public_id']);
	$appartmentprice = strip_tags($_POST['appartmentprice']);
	$appartments_id = strip_tags($_POST['appartments_id']);
	$month = strip_tags($_POST['month']);
	$status = strip_tags($_POST['status']);
	$pesapal_transaction_tracking_id = strip_tags($_POST['pesapal_transaction_tracking_id']);

	if($public_id =="") { $alert = "Provide ID"; }
	elseif($appartmentprice =="") { $alert = "Provide price"; }
	elseif($appartments_id =="") { $alert = "Provide ID"; }
	elseif($month =="") { $alert = "Month"; }
	elseif($status =="") { $alert = "Status"; }
	elseif($pesapal_transaction_tracking_id =="") { $alert = "Track ID "; }
    else
    {
      try
      {

          if($user->onlineupdate($public_id, $appartmentprice, $appartments_id, $month, $status, $pesapal_transaction_tracking_id)){  
            $alert = "Processed";
          }



      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	


?>