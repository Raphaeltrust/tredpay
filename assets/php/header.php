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
			/*mobile */
        	@media only screen and (max-width: 767.98px) {
        		.header .header-left .logo{
        			padding-right: 100rem !important;
        		}

        		.header-left .logo.logo-small {
				    display: inline-block;
				}
				.d-only{
					display:none;
				}
        	}
			/* desktop */
			@media screen and (min-width: 768px) {
				.d-container {
					width:50%;
					margin: 0 auto;
}
.logo{
        		margin-left:15px;
				
        		}
				.footer-nav{
					display:none;
				}
 }
			.copy-text{
				width:300px;
			    border:none;
				outline:none;
			}
.navmenu{
	height:100%;
	width:100%;
	position:fixed;
	background: #fff;
	top:0;
	left:0;
	z-index: 10000;
	overflow-y:scroll;
	display:none;
}
.navmenu .profile-block{
	text-align:center;
	padding:15px;
}
 .profile-block  .profile-img{
	border-radius:100%;
}
.menu-header{
	padding:15px 15px 0px 15px;
}
.menu-header button{
	border:none;
	border-radius:100%;
	height:30px;
	width:30px;
}
.navmenu .line{
	height:1px;
	width:100%;
	background:rgba(0,0,0,0.1)
}
.menu-links{
	
	width: 100%;
}
.menu-links a{
	padding:15px 15px;
	width: 100%;
	display: block;
	font-size:18px;
}
.menu-links svg{
	margin-right:15px;
	position: relative;
	top:-3px;
}
.menu-footer{
	padding:15px;
}
.menu-footer ul{
	list-style-type: none;
	padding:0;
	margin:0;
}
.menu-footer li{
	float:left;
	margin-right:15px;
}
        </style>
        <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
		<script>var clipboard = new ClipboardJS('.copy');</script>

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <div class="navmenu">
		<div class="menu-header">
			<button id="closemenu"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none" opacity=".87"/><path d="M17.51 3.87L15.73 2.1 5.84 12l9.9 9.9 1.77-1.77L9.38 12l8.13-8.13z"/></svg>
</button>
</div>
		<div class="profile-block">
		<a href="/profile" class="">
							<span>
								<!-- <img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"> -->
								<?php if(!$cphoto): ?>
									<img class="profile-img" alt="User Image" height="100" width="100" src="assets/img/profiles/avatar.png">
								<?php else: ?>
									<img class="profile-img" alt="User Image" height="100" width="100" src="<?= 'assets/php/'.$cphoto; ?>">
								<?php endif; ?>	
							</span>
						</a>
						<div>
							<span style="font-size:12px;background:lightgray;border-radius:10px;padding:0px 5px;"><?=$cemail;?></span>
							<h3><?=$cname;?></h3>
								</div>
</div>
<div class="line">
								</div>
<div class="menu-links">
<a href="/dashboard" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
Dashboard 
	 </a>
<a href="/profile#wallet_tab" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
 Wallet
</a>
<a href="/transactions" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2zm-5 12H9v-2h6v2zm5-7H4V4l16-.02V7z"/></svg>
	Transactions
								</a>			
	
 <a href="/logout" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><rect fill="none" height="24" width="24" x="0"/></g><g><g><polygon points="18,12 22,8 18,4 18,7 3,7 3,9 18,9"/><polygon points="6,12 2,16 6,20 6,17 21,17 21,15 6,15"/></g></g></svg>		
	Transactions log
								</a>
	<a href="/profile#edit_tab" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/></g></svg>
	Settings
								</a>
	<a href="/logs" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>	Logout
								</a>		
</div>
<div class="menu-footer">
	<ul>
		<li>
<a href="#">About TredPay</a>
								</li>
								<li>
	 <a href="#">Privacy</a>
								</li>
								<li>
	 <a href="#">Terms</a>
								</li>
								</ul>
								<br>
	<span>copywrite &copy 2022 - TredPay </span>
								</div>
		</div>
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
					<!-- desktop only -->
					<li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Dashboard">
	<a href="/dashboard" class="nav-link d-only">
	<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
	</a>
	</li>
		<li class="nav-item d-only" data-toggle="tooltip" data-placement="bottom" title="Sell">
		<a href="/sell" class="nav-link" >
		<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24" y="0"/><path d="M21,7l-9-5L3,7v10l9,5l9-5L21,7z M12,4.29l5.91,3.28L14.9,9.24C14.17,8.48,13.14,8,12,8S9.83,8.48,9.1,9.24L6.09,7.57 L12,4.29z M11,19.16l-6-3.33V9.26l3.13,1.74C8.04,11.31,8,11.65,8,12c0,1.86,1.27,3.43,3,3.87V19.16z M10,12c0-1.1,0.9-2,2-2 s2,0.9,2,2s-0.9,2-2,2S10,13.1,10,12z M13,19.16v-3.28c1.73-0.44,3-2.01,3-3.87c0-0.35-0.04-0.69-0.13-1.01L19,9.26l0,6.57L13,19.16 z"/></svg>
		</a>
		</li>
		<li class="nav-item d-only" data-toggle="tooltip" data-placement="bottom" title="Buy">
		<a href="/buy" class="nav-link">
		<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><ellipse cx="12" cy="12" rx="3" ry="5.74"/><path d="M7.5,12c0-0.97,0.23-4.16,3.03-6.5C9.75,5.19,8.9,5,8,5c-3.86,0-7,3.14-7,7s3.14,7,7,7c0.9,0,1.75-0.19,2.53-0.5 C7.73,16.16,7.5,12.97,7.5,12z"/><path d="M16,5c-0.9,0-1.75,0.19-2.53,0.5c2.8,2.34,3.03,5.53,3.03,6.5c0,0.97-0.23,4.16-3.03,6.5C14.25,18.81,15.1,19,16,19 c3.86,0,7-3.14,7-7S19.86,5,16,5z"/></g></g></svg>
		</a>
		</li>
	
					<li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Market">
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
                   <!-- main menu -->
					<li class="nav-item d-only">
		<a href="#" class="nav-link">
		<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
		</a>
		</li>
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
			