<?php require_once 'assets/php/header.php';
//profile count
$sql = "SELECT count(following_id) FROM user_follow WHERE follower_id = $cid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$followers = $row['count(following_id)'];
}
}
else{
$followers = "0";
}

//following
$sql = "SELECT count(follower_id) FROM user_follow WHERE following_id = $cid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$following = $row['count(follower_id)'];
}
}
else{
$following = "0";
}
//get verification badge
$sql = "SELECT * FROM users WHERE id = $cid";
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

}}
?>
			
			<!-- Page Wrapper -->
                <div class="content container">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header" style="background:#fff;">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<?php if(!$cphoto): ?>
												<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar.png">
											<?php else: ?>
												<img class="rounded-circle" alt="User Image" src="<?= 'assets/php/'.$cphoto; ?>">
											<?php endif; ?>	
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?= $cname.$verified_user; ?></h4>

										<?php if($city): ?>
											<div class="user-Location">
												<i class="fa fa-map-marker"></i> <?= $city; ?>, <?= $country; ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="col-auto profile-btn">
										<br>
											<span style="margin-right:10px"><strong><a href="/user?id=<?=$cid;?>&action=followers" class="text-dark"><?=fcount($followers);?></strong> Followers</span> <span></a> <strong><a href="/user?id=<?=$cid;?>&action=following" class="text-dark"><?=fcount($following);?></strong> Following</span></a>
											
									</div>
								</div>
							</div>
							<div class="profile-nav" style="background:red !important;">
								<ul class="nav nav-tabs nav-tabs-solid" id="myTab">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab"><i class="fas fa-info-circle"></i> About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#wallet_tab"><i class="fas fa-wallet"></i> Wallet</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab"><i class="fas fa-user-lock"></i> Security</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#edit_tab"><i class="fas fa-edit"></i> Edit</a>
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
														<span class="mb-4">Personal Details:</span>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9"><?= $cname; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9"><?= $cemail; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-9"><?= $cphone; ?></p>
													</div>
													<div class="row mb-4">
														<p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
														<?php if($address): ?>
															<p class="col-sm-9 mb-0"><?= $address; ?>,<br>
															<?= $city; ?>,<br>
															<?= $state; ?> - <?= $zipcode; ?>,<br>
															<?= $country; ?>.</p>
														<?php endif; ?>	
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
								
								<!-- Wallet -->
								<div id="wallet_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-10 col-lg-6">
												  <div class="col text-center">
												      <h2><strong>&#8358;</strong> <?=$wallet;?></h2>
												      </div>
												</div>
												<div class="col-md-10 col-lg-6" style="margin-top: 125px;">
													<div id="changePassError"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Edit profile Tab -->
								
									<!-- Wallet -->
								<div id="edit_tab" class="tab-pane fade">
								
									<div class="card">
									    <div class="card-body">
											<form action="#" method="post" enctype="multipart/form-data" id="profile-update-form">
																<input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
																<div class="row form-row">
																	<div class="col-12">
																		<div class="form-group">
																			<label for="profilePhoto">Upload Profile Image</label>
																			<input type="file" class="form-control" name="image" id="profilePhoto">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="name">Full Name</label>
																			<input type="text" class="form-control" name="name" id="name" value="<?= $cname; ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="gender">Gender</label>
																			<select class="form-control" name="gender" id="gender">
																				<option value="" disabled <?php if($cgender == null){echo 'selected';} ?> >Select Gender</option>
																				<option value="Male" <?php if($cgender == 'Male'){echo 'selected';} ?> >Male</option>
																				<option value="Female" <?php if($cgender == 'Female'){echo 'selected';} ?> >Female</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="dob">Date of Birth</label>
																			<input type="date" name="dob" id="dob" value="<?= $cdob; ?>" class="form-control">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="phone">Mobile</label>
																			<input type="number" name="phone" id="phone" value="<?= $cphone; ?>" class="form-control" placeholder="Mobile">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label for="address">Address</label>
																			<input type="text" name="address" id="address" class="form-control" value="<?= $address; ?>" placeholder="Address">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="city">City</label>
																			<input type="text" name="city" id="city" class="form-control" value="<?= $city; ?>" placeholder="City">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="state">State</label>
																			<input type="text" name="state" id="state" class="form-control" value="<?= $state; ?>" placeholder="State">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="zipcode">Zip Code</label>
																			<input type="number" name="zipcode" id="zipcode" class="form-control" value="<?= $zipcode; ?>"  placeholder="Zip Code">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="country">Country</label>
																			<input type="text" name="country" id="country" class="form-control" value="<?= $country; ?>" placeholder="Country">
																		</div>
																	</div>
																</div>
																<button type="submit" name="profile_update" class="btn btn-primary btn-block" id="profileUpdateBtn">Save Changes&nbsp;<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-profile-spinner"></span></button>
															</form>
									</div>
									</div>
								</div>
								<!-- /Edit profile Tab -->
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
		include('assets/php/footer.php');
		?>
    </body>

<!-- Mirrored from dreamguys.co.in/demo/ventura/profile.html by HTTrack Website Copier/3.x [XR&CO'2017], Sat, 18 Apr 2020 05:51:42 GMT -->
</html>