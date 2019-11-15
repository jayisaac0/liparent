<?php
if (isset($_GET['pesapal_transaction_tracking_id'])) {
  $pesapal_transaction_tracking_id = $_GET['pesapal_transaction_tracking_id'];
  $pesapal_merchant_reference = $_GET['pesapal_merchant_reference'];
  
    try
    {
        $stmt = $auth_user->runQuery(" UPDATE `payments` SET status='1', pesapal_transaction_tracking_id='$pesapal_transaction_tracking_id' WHERE appartments_id='$pesapal_merchant_reference' ");
        $stmt->bindparam("1", $status); 
        $stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id); 
        $stmt->execute();
        $alert = "Payment received";
    }
    catch(PDOException $e)
    {
        $alert =  $e->getMessage();
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Apartment - Premium Real Estate HMTL Site Template</title>
	<meta name="keywords" content="Download, Apartment, Premium, Real Estate, HMTL, Site Template, property, mortgage, CSS" />
	<meta name="description" content="Download Apartment - Premium Real Estate HMTL Site Template" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">    
	<link rel="stylesheet" href="apartment-font/css/font-awesome.min.css">  
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,500italic,700,700italic&amp;subset=latin,latin-ext'>
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/apartment-layout.css">
    <link id="skin" rel="stylesheet" type="text/css" href="css/apartment-colors-blue.css">
	
<style>
	#switcher{display: none !important;}
	#switcher-button{display: none !important;}
</style>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>