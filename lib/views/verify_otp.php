<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="verify-content">
    <div class="container">
        <div class="body">
            <div class="title">
                <i class="fa fa-key"></i> Verify OTP
            </div>
            <?php 
                if(isset($_POST['']))            
            
            ?>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-from">
                    <input type="number" name="otp_no" id="" required="required">
                    <span>OTP Number</span>
                </div> 
                <input type="submit" value="Verify OTP" class="login-btn" name="otp_check">
            </form>
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
