<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="login-content">
    <div class="container">
        <div class="body">
            <div class="title">Login Here</div>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="login-from">
                    <input type="text" name="username" id="" required="required">
                    <span>Username</span>
                </div> 
                <div class="login-from">
                    <input type="password" name="pass" id="" required="required">
                    <span>Password</span>
                </div> 

                <input type="submit" value="login" class="login-btn" name="login">
            </form>
            <a href="forget_pass.php" style="color: orange;">Forget Password</a>
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>

