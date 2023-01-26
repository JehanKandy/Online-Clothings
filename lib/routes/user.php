<link rel="stylesheet" href="../../css/dashboard.css">
<?php include("../function/function.php"); ?>
<?php include("../layouts/header.php"); ?>

<?php 

    if(empty($_SESSION['LoginSession'])){
        header("location:../views/logout.php");
    }
    user_access();
?>

<div class="product-view">
    <div class="container">
        Hi
    </div>
</div>


<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
