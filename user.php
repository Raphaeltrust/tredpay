<?php 
if(!isset($_GET["id"])){
	header("location:dashboard");
	exit();
}
require_once 'assets/php/header.php';
if(isset($_GET["action"]) && $_GET["action"] == "following" && isset($_GET["id"])){
	$id = $_GET["id"];
	echo '<div class="content container" style="padding-top: 3em;">
	<h4>Following</h4>
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			
		</div>
	
	<!-- /Page Header -->
';
	$sql = "SELECT follower_id FROM user_follow  WHERE following_id = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$rowid = $row["follower_id"];
	//user details
	$sql = "SELECT * FROM users WHERE id = $rowid";
	$uresult = $conn->query($sql);
	if ($uresult->num_rows > 0) {
	while($urow = $uresult->fetch_assoc()) {
		if($urow["photo"] == ""){
			$image = "assets/img/profiles/avatar.png";
		}
		else{
			$image = "assets/php/".$urow['photo'];
		}
		if($urow['badge'] == 1){
			$verified_user = '<svg style="margin-left:5px;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" width="18px" fill="green"><g><rect fill="none" height="20" width="20"/></g><g><path d="M23,12l-2.44-2.79l0.34-3.69l-3.61-0.82L15.4,1.5L12,2.96L8.6,1.5L6.71,4.69L3.1,5.5L3.44,9.2L1,12l2.44,2.79l-0.34,3.7 l3.61,0.82L8.6,22.5l3.4-1.47l3.4,1.46l1.89-3.19l3.61-0.82l-0.34-3.69L23,12z M10.09,16.72l-3.8-3.81l1.48-1.48l2.32,2.33 l5.85-5.87l1.48,1.48L10.09,16.72z"/></g></svg>';
			}
			else{
			$verified_user = "";
			}
	echo '<div class="card mt-2 col-lg-6" style="border-radius: 10px;">
	<div class="row" style="padding:15px">
	<div class="col-9">
	<img style="height:50px;width:50px;border-radius:100%;" src="'.$image.'"> <span><strong>'.$urow["name"].$verified_user.'</stong></span>
</div>
	<div class="col-3">
	<a href="/user?id='.$rowid.'" class="btn btn-primary">View</a>
	</div>
	</div>
	</div>';
	}
	}
}}
	else{
		echo '<div class="card mt-2 col-lg-6" style="border-radius: 10px;">
		<div class="row" style="padding:15px">
		<div class="col-9">
		<h4>This user is not following anayone.</H4>
		</div>
		</div>
		</div>';
	}
	
	 }
	 //User followers
if(isset($_GET["action"]) && $_GET["action"] == "followers" && isset($_GET["id"])){
	$id = $_GET["id"];
	echo '<div class="content container" style="padding-top: 3em;">
	<h4>Followers</h4>
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			
		</div>
	
	<!-- /Page Header -->
';
	$sql = "SELECT following_id FROM user_follow  WHERE follower_id = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$rowid = $row["following_id"];
	//user details
	$sql = "SELECT * FROM users WHERE id = $rowid";
	$uresult = $conn->query($sql);
	if ($uresult->num_rows > 0) {
	while($urow = $uresult->fetch_assoc()) {
		if($urow["photo"] == ""){
			$image = "assets/img/profiles/avatar.png";
		}
		else{
			$image = "assets/php/".$urow['photo'];
		}
		if($urow['badge'] == 1){
			$verified_user = '<svg style="margin-left:5px;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" width="18px" fill="green"><g><rect fill="none" height="20" width="20"/></g><g><path d="M23,12l-2.44-2.79l0.34-3.69l-3.61-0.82L15.4,1.5L12,2.96L8.6,1.5L6.71,4.69L3.1,5.5L3.44,9.2L1,12l2.44,2.79l-0.34,3.7 l3.61,0.82L8.6,22.5l3.4-1.47l3.4,1.46l1.89-3.19l3.61-0.82l-0.34-3.69L23,12z M10.09,16.72l-3.8-3.81l1.48-1.48l2.32,2.33 l5.85-5.87l1.48,1.48L10.09,16.72z"/></g></svg>';
			}
			else{
			$verified_user = "";
			}
	echo '<div class="card mt-2 col-lg-6" style="border-radius: 10px;">
	<div class="row" style="padding:15px">
	<div class="col-9">
	<img style="height:50px;width:50px;border-radius:100%;" src="'.$image.'"> <span><strong>'.$urow["name"].$verified_user.'</stong></span>
</div>
	<div class="col-3">
	<a href="/user?id='.$rowid.'" class="btn btn-primary">View</a>
	</div>
	</div>
	</div>';
	}
	}
}}
	else{
		echo '<div class="card mt-2 col-lg-6" style="border-radius: 10px;">
		<div class="row" style="padding:15px">
		<div class="col-9">
		<h4>No followers yet!</H4>
		</div>
		</div>
		</div>';
	}
	
	 }

					if(isset($_GET["id"]) && !isset($_GET["action"])){
					    $id = $_GET["id"];
					   
					    
					
					$sql = "SELECT name, city, state, country, photo, badge FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	if($row['badge'] == 1){
		$verified_user = '<svg style="margin-left:5px;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="18px" viewBox="0 0 24 24" width="18px" fill="green"><g><rect fill="none" height="20" width="20"/></g><g><path d="M23,12l-2.44-2.79l0.34-3.69l-3.61-0.82L15.4,1.5L12,2.96L8.6,1.5L6.71,4.69L3.1,5.5L3.44,9.2L1,12l2.44,2.79l-0.34,3.7 l3.61,0.82L8.6,22.5l3.4-1.47l3.4,1.46l1.89-3.19l3.61-0.82l-0.34-3.69L23,12z M10.09,16.72l-3.8-3.81l1.48-1.48l2.32,2.33 l5.85-5.87l1.48,1.48L10.09,16.72z"/></g></svg>';
		}
		else{
		$verified_user = "";
		}
  if($row["photo"] ==""){
  $row["photo"]= "uploads/default-avatar.png";
  }
    $name =$row["name"];
    $photo = $row["photo"];
    $Ucity = $row["city"];
    $Ustate = $row["state"];
    $Ucountry = $row["country"];
    if($Ucity !==""){
    $Ucity .=",";
    }
  }
} else {
  echo "0 results";
}
include 'assets/php/follow.php';
?>
			
			<!-- Page Wrapper -->
                <div class="content container">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header" style="background:#fff;">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<?php if(!$photo): ?>
												<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar.png">
											<?php else: ?>
												<img class="rounded-circle" alt="User Image" style="height:100px;width:100px;" src="<?= 'assets/php/'.$photo; ?>">
											<?php endif; ?>	
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?= $name.$verified_user; ?></h4>

										<?php if($cid): ?>
											<div class="user-Location">
												<?php if(!empty($Ucity)){?><i class="fas fa-map-marker"></i><?php }?> <?= $Ucity; ?> <?= $Ucountry; ?>
										  	<br>
										  	<strong><a href="/user?id=<?=$id;?>&action=followers" class="text-dark"><span id="followers"><?=fcount($followers);?></strong></span> <span style="margin-right:10px">Followers</span></a> <a href="/user?id=<?=$id;?>&action=following" class="text-dark"><span><strong><?=fcount($following);?></strong> Following</span></a>
										  	
											</div>
										<?php endif; ?>
									</div>
									
									<div class="col-auto profile-btn">
									<?=$follow_btn;?>
									
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">Product Feed</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">About</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div id="verifyEmailAlert"></div>
										</div>
										<div class="col-lg-1"></div>
										<div class="col-lg-7">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span class="mb-4">Products</span>
													</h5>
													<div class="royw">
													<!-- products list -->
											<?php
 $sql = "SELECT users.id, transaction.itemName, transaction.price, transaction.itemDesc, transaction.created_at, users.name, users.email, users.photo FROM transaction INNER JOIN users ON transaction.uid = users.id WHERE users.id = $id ORDER BY transaction.created_at DESC";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 if($row["photo"] == ""){
 $row["photo"]= "uploads/default-avatar.png";
 }?>
 <div class="post-card">
 <div class="post-header ">
 <a href="/user?id=<?=$row['id'];?>"><img class="rounded-circle" height="50" width="50" src="/assets/php/<?=$row['photo'];?>">
 <span class="username"><?=$row['name'].$verified_user;?></span></a> .
 <span class="time"><?=$cuser->timeInAgo($row['created_at']);?></span>
 <span class ="nav-item post-menu"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
 
 </div>
 <div class ="post-body">
 <h4><?=$row['itemName'];?></h4>
 <p><?=$row['itemDesc'];?></p>
 <span>Price</span> <span class="price"> &#8358;<?=$row['price'];?></span>
 </div>
 <div class ="post-footer nav">
 <li class="nav-item">
 <button class="post-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/></svg>
 </button>
 <button class="post-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
 </button>
 <button class="post-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92c0-1.61-1.31-2.92-2.92-2.92zM18 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM6 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm12 7.02c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/></svg>
 </button>
 </li>
 <li class="nav-item">
 <button class="msg-btn btn btn-success">Message <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><rect fill="none" height="24" width="24"/></g><g><path d="M20,2H4.01c-1.1,0-2,0.9-2,2L2,22l4-4h14c1.1,0,2-0.9,2-2V4C22,2.9,21.1,2,20,2z M20,16H5.17L4,17.17V4h16V16z M12,10 c1.1,0,2-0.9,2-2s-0.9-2-2-2s-2,0.9-2,2S10.9,10,12,10z M16,13.43c0-0.81-0.48-1.53-1.22-1.85C13.93,11.21,12.99,11,12,11 c-0.99,0-1.93,0.21-2.78,0.58C8.48,11.9,8,12.62,8,13.43V14h8V13.43z"/></g></svg>
 </button>
 </li>
 </div>
 </div>
 
 <?php
 }
 } else {
 echo "0 results";
 }
 $conn->close();
 ?>
 <!-- product list/ -->
													</div>
												</div>
											</div>
											
													
										</div>

										<div class="col-lg-3">
											
											<!-- Account Status -->
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>E-Mail Verified: </span>
													</h5>
													<button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> <?= $verified; ?></button>
													<?php if($verified == 'Not Verified'): ?>
														<a href="#" id="verify-email" class="float-right pt-2">Verify Now!</a>
													<?php endif; ?>
												</div>
											</div>
											<!-- /Account Status -->

											<!-- Skills -->
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>More Info:</span>
													</h5>
													<div class="row">
														<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-6"><?= $cdob; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Gender </p>
														<p class="col-sm-6"><?= $cgender; ?></p>
													</div>
													<div class="row" style="margin-bottom: -0.65rem;">
														<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Registred on</p>
														<p class="col-sm-6"><?= $reg_on; ?></p>
													</div>
												</div>
											</div>
											<!-- /Skills -->

										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="#" method="post" id="change-pass-form">
														<div class="form-group">
															<label for="curpass">Current Password</label>
															<input type="password" class="form-control" name="curpass" id="curpass" required minlength="6">
														</div>
														<div class="form-group">
															<label for="newpass">New Password</label>
															<input type="password" class="form-control" name="newpass" id="newpass" required minlength="6">
														</div>
														<div class="form-group">
															<label for="cneewpass">Confirm Password</label>
															<input type="password" class="form-control" name="cnewpass" id="cnewpass" required minlength="6">
														</div>
														<button class="btn btn-primary" type="submit" name="changepass" id="changePassBtn">Save Changes&nbsp;<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="change-pass-spinner"></span></button>
													</form>
												</div>
												<div class="col-md-10 col-lg-6" style="margin-top: 125px;">
													<div id="changePassError"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
	
		<script src="assets/php/js/profile.js"></script>
		<?php
					}
	include('assets/php/footer.php');
													
	?>
			<style>
	.post-card a{
	color:#000;
	}
	.post-card{
	background-color:#fff;
	padding:15px;
	margin-bottom:10px;
	}
	.post-header{
	margin-bottom:10px;
	}
	.post-menu{
	float:right;
	}
	.post-header .username{
	font-weight:bold;
	font-size:18px;
	}
	.post-header .time{
	
	font-size:14px;
	}
	.post-footer{

	}
	.post-footer .nav-item {
	width:50%;
	}
	.post-footer .post-icon{
	height:40px;
	width:40px;
	border-radius:100%;
	border:none;
	margin-right:10px;
	}
	.msg-btn{
	float:right;
	height:40px;
	border:none;
	}
	.price{
	font-weight:bold;
	color:red;
	}
	</style>
		
    </body>
</html>