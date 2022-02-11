<?php
	require_once 'assets/php/session.php';
	require_once 'assets/php/functions.php';
	if(isset($_GET["id"]) && $_GET["id"] == $cid && !isset($_GET["action"]) ){ //&& isset($_GET["action"]) && $_GET["action"] !== "following" || $_GET["action"] !== "followers"){
		header("location:profile");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Tredpay - <?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?></title>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">

        <!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

        <style type="text/css">
        	@media only screen and (max-width: 767.98px) {
        		.header .header-left .logo{
        			padding-right: 100rem !important;
        		}

        		.header-left .logo.logo-small {
				    display: inline-block;
				}
        	}
        </style>
        <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
	
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    
    <body class="mini-sidebar">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
					<a href="dashboard" class="logo logo-small">
						<img src="assets/img/logo.png" alt="Logo" width="25" height="25">
					</a>
                </div>
				<!-- /Logo -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
					<li class="nav-item">
						<a href="/market" class="nav-link">
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18.36 9l.6 3H5.04l.6-3h12.72M20 4H4v2h16V4zm0 3H4l-1 5v2h1v6h10v-6h4v6h2v-6h1v-2l-1-5zM6 18v-4h6v4H6z"/></svg>
						
                    	</a>
					</li>
					
					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="notification" class="nav-link" title="Notifications">
						 <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
						 <span id="checkNotification"></span>
						</a>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img">
								<!-- <img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"> -->
								<?php if(!$cphoto): ?>
									<img class="rounded-circle" alt="User Image" height="31" width="31" src="assets/img/profiles/avatar.png">
								<?php else: ?>
									<img class="rounded-circle" alt="User Image" height="31" width="31" src="<?= 'assets/php/'.$cphoto; ?>">
								<?php endif; ?>	
							</span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<!-- <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle"> -->
									<?php if(!$cphoto): ?>
									<img class="rounded-circle" alt="User Image" width="31" src="assets/img/profiles/avatar.png">
									<?php else: ?>
										<img class="rounded-circle" alt="User Image" width="31" src="<?= 'assets/php/'.$cphoto; ?>">
									<?php endif; ?>	
								</div>
								<div class="user-text">
									<h6 class="pt-2">Hello, <?= $fname; ?></h6>
								</div>
							</div>
							<a class="dropdown-item" href="profile">My Profile</a>
							<a class="dropdown-item" href="logout">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
            <div style="height:50px;width:100%;"></div>
			<!-- /Header -->
			