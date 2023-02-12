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
			<?php profile_img();?>
			<p class="profile-name"><?php user_id_loged();?></p>
			<a href="admin.php" class="menu-item"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
			<a href="members.php" class="menu-item"><i class="fas fa-user-alt"></i>Members &nbsp; <span class="count"><?php //count_members(); ?></span></a>
			<a href="admins.php" class="menu-item"><i class="fas fa-user-tie"></i>Admin  &nbsp; <span class="count"><?php //count_admins(); ?></span></a>
			<a href="products.php" class="menu-item"><i class="fas fa-gifts"></i>Prodcuts  &nbsp; <span class="count"><?php //count_products(); ?></span></a>
   			<a href="my_account_admin.php" class="menu-item"><i class="fas fa-user-cog"></i>Account Settings</a>
		</nav>
		
	</aside>

	<main class="content">
		<h1>Welcome, To Admin Dashboard</h1>
		<hr>
		<table class="table">
			<thead class="table-dark">
				<tr>
					<td>NIC Number</td>
					<td>Username</td>
					<td>Email</td>
					<td>Active Status</td>
					<td>Pending Status</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php ?>
			</tbody>
		</table>


	</main>
</div>

<script src="../../js/script.js"></script>
