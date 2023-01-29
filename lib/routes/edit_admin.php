<link rel="stylesheet" href="../../css/dashboard.css">
<?php include("../function/function.php"); ?>
<?php include("../layouts/header.php"); ?>
<?php include("../layouts/loged_nav.php"); ?>

<?php 

    if(empty($_SESSION['LoginSession'])){
        header("location:../views/logout.php");
    }
    admin_access();

?>

<div class="app">
	<div class="menu-toggle">
		<div class="hamburger">
			<span></span>
		</div>
	</div>

	<aside class="sidebar">
		<nav class="menu">
			<?php //profile_img();?>
			<p class="profile-name"><?php //user_id_loged();?></p>
			<a href="admin.php" class="menu-item"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
			<a href="members.php" class="menu-item"><i class="fas fa-user-alt"></i>Members 
			<a href="admins.php" class="menu-item"><i class="fas fa-user-tie"></i>Admin   
			<a href="products.php" class="menu-item"><i class="fas fa-gifts"></i>Prodcuts  
            <a href="plans.php" class="menu-item"><i class="fas fa-book-reader"></i>Plans  
			<a href="my_account_admin.php" class="menu-item"><i class="fas fa-user-cog"></i>Account Settings</a>
		</nav>
		
	</aside>

	<main class="content">
		<h1>Edit Admin,</h1>
		<hr>
		<a href="my_account_admin.php"><button class="btn btn-primary">Back</button></a>
		<?php user_data_edit(); ?>
	</main>
</div>

<?php include("../layouts/page_footer.php"); ?>
