<link rel="stylesheet" href="../../css/dashboard.css">
<?php include("../function/function.php"); ?>
<?php include("../layouts/header.php"); ?>

<?php 

    if(empty($_SESSION['LoginSession'])){
        header("location:../views/logout.php");
    }
    admin_access();

?>

<div class="admin-content">
    <div class="container">
        <a href="add_product.php"><button class="btn btn-primary">Add Product</button></a>
    </div>
</div>

<script src="../../js/script.js"></script>
