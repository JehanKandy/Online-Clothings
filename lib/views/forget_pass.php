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

            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-from">
                    <input type="text" name="username" id="" required="required">
                    <span>Username</span>
                </div> 
                <div class="login-from">
                    <input type="password" name="pass" id="" required="required">
                    <span>Password</span>
                </div> 

                <input type="submit" value="Login" class="login-btn" name="login">
            </form>
            
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
