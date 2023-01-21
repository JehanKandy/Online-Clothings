<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="reg-content">
    <div class="container">
        <div class="body">
            <div class="title"> <i class="fas fa-user-plus"></i> &nbsp; Sign Up</div>
            <?php 
                if(isset($_POST['register'])){
                    $result = reg_user($_POST['username'], $_POST['email'], md5($_POST['pass']), md5($_POST['cpass']));
                    echo $result;
                }
            ?>

            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="login-from">
                    <input type="text" name="nic" id="" required="required">
                    <span>NIC Number</span>
                </div> 
                <div class="login-from">
                    <input type="text" name="username" id="" required="required">
                    <span>Username</span>
                </div> 
                <div class="login-from">
                    <input type="email" name="email" id="" required="required">
                    <span>Email</span>
                </div> 
                <div class="login-from">
                    <input type="password" name="pass" id="" required="required">
                    <span>Password</span>
                </div> 
                <div class="login-from">
                    <input type="password" name="cpass" id="" required="required">
                    <span>Confirm Password</span>
                </div> 
                <input type="submit" value="Sign Up" class="login-btn" name="register">
            </form>
            <p style="color: white;">Already have an Account ? <a href="login.php" style="color: orange;">Login</a></p>
        </div>
    </div>
</div>

<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
