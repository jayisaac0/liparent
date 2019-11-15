<?php
if (isset($_POST['deleteproduct'])) {
    $businesses_products_id = trim(htmlspecialchars($_POST['businesses_products_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `businesses_products` WHERE `businesses_products_id`= '$businesses_products_id' ");
        $stmt->execute();
        $alert = "product deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>

<?php
if (isset($_POST['removecartproduct'])) {
    $businesses_cart_id = trim(htmlspecialchars($_POST['businesses_cart_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `businesses_cart` WHERE `businesses_cart_id`= '$businesses_cart_id' ");
        $stmt->execute();
        $alert = "product removed from cart";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>
