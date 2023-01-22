<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="forget-pass-content">
    <div class="container">
        <div class="body">
            <div class="title">
                <i class="fa fa-key"></i> Forget Password
            </div>
            <?php 
                if(isset($_POST['otp'])){
                    $result = request_otp($_POST['nic'], $_POST['email']);
                    echo $result;
                }
            ?>

            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-from">
                    <input type="text" name="nic" id="" required="required">
                    <span>NIC Number</span>
                </div> 
                <div class="login-from">
                    <input type="email" name="email" id="" required="required">
                    <span>Email</span>
                </div> 

                <input type="submit" value="Request OTP" class="login-btn" name="otp">
            </form>
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
