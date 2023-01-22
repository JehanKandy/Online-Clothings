<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="waiting-content">
    <div class="container">
        <div class="body">
            <div class="title"> <i class="fas fa-user-clock"></i> &nbsp; Waiting User</div>
            <hr class="waiting-hr">
            <h4>Hi <?php waiting_user(); ?>...!</h4>
            <p>Your Account Approval is Still Pending</p>
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
