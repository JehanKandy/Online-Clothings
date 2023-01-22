<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="update-pass">
    <div class="container">
        <div class="body">
            <div class="title">
                <i class="fas fa-key"></i>Update Password
            </div>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-from">
                    <input type="password" name="cpass" id="" required="required">
                    <span>Confirm Password</span>
                </div> 
                <div class="login-from">
                    <input type="password" name="cpass" id="" required="required">
                    <span>Confirm Password</span>
                </div>
                <div class="login-from">
                    <input type="password" name="cpass" id="" required="required">
                    <span>Confirm Password</span>
                </div>
                <div class="login-from">
                    <input type="password" name="cpass" id="" required="required">
                    <span>Confirm Password</span>
                </div>
                <input type="submit" value="Sign Up" class="login-btn" name="register">
            </form>
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
