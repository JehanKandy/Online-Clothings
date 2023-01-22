<link rel="stylesheet" href="../../css/style.css">
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/login_nav.php"); ?>
<?php include("../function/function.php"); ?>

<div class="update-pass">
    <div class="container">
        <div class="body">
            <div class="title">
                <i class="fas fa-key"></i> Update Password
            </div>
            <?php 
                if(isset($_POST['update_pass'])){
                    
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
                <div class="login-from">
                    <input type="password" name="pass" id="" required="required">
                    <span>New Password</span>
                </div>
                <div class="login-from">
                    <input type="password" name="cpass" id="" required="required">
                    <span>Confirm New Password</span>
                </div>
                <input type="submit" value="Update Password" class="login-btn" name="update_pass">
            </form>
        </div>
    </div>
</div>
<?php include("../layouts/page_footer.php"); ?>
<script src="../../js/script.js"></script>
