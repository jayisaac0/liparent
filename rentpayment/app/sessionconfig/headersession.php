<?php
require_once 'api/classfile/class.user.php';
require_once ("session.php");
$auth_user = new USER();
$user = new USER();
@$gandertech_public_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE public_id=:public_id");
$stmt->execute(array(":public_id"=>$gandertech_public_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>