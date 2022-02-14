<?php require_once 'assets/php/header.php'; 
 require_once 'assets/php/functions.php';
?>

			<!-- Page Wrapper -->
                <div class="content container" style="padding-top: 5em;">

                	<div class="row">
                		<div class="col-lg-12">
                			<?php if($verified == 'Not Verified'): ?>
                			<div class="alert alert-danger text-center m-2 m-0">
                				<strong>Your E-mail is not verified! We have sent you verification link on your email, check and verify now.</strong>
                			</div>
                			<?php endif; ?>
                		</div>
                	</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mt-2">
								<div class="card-header">
									<h4 class="card-title float-left mt-2">All Products</h4>
									<button id="refreshBtn" class="btn btn-warning float-right">Refresh <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8 0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8 0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8 0 3.31-2.69 6-6 6v-3l-4 4 4 4v-3c4.42 0 8-3.58 8-8 0-1.57-.46-3.03-1.24-4.26z"/></svg></button>
	<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#generateTokenModal">Generate Token<svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg></a>
								</div>
								<div class="card-body">
									<div class="table-responsive" id="showTrans">
										<h4 class="text-center text-lead mt-2">Getting Products <i class="fas fa-spinner fa-pulse"></i></h4>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->

		<!-- Start Add New Note Modal -->
			<div class="modal fade" id="generateTokenModal">
				<div class="modal-dialog modal-dialog-center">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title text-dark">Generate Seller Token</h4>
							<button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="#" method="post" id="transaction-form" class="px-3">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Item name" required>
								</div>
								<div class="form-group">
								<input type="number" name="price" class="form-control" placeholder="Item price($1)" required>
								</div>
								<div class="form-group">
								<input type="hidden" name="sellerToken" class="form-control" value="<?=getToken(30);?>" required>
								</div>
								<div class="form-group">
								<input type="hidden" name="serviceKey" class="form-control" value="<?=getToken(102);?>" required>
								</div>
								<div class="form-group">
									<textarea name="description" class="form-control" placeholder="Item description" rows="6" required></textarea>
								</div>
								<div class="form-group">
								<div class="form-check">
								<input class="form-check-input" name="list" type="checkbox" value="1" id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
								Post on market
								</label>
								</div>
								</div>
								
								<div class="form-group">
									<button type="submit" name="submit" id="submitBtn" class="btn btn-block btn-primary">Generate&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="add-note-spinner"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- End Add New Note Modal -->

		<!-- Start Edit Note Modal -->
			<div class="modal fade" id="editNoteModal">
				<div class="modal-dialog modal-dialog-center">
					<div class="modal-content">
						<div class="modal-header bg-info">
							<h4 class="modal-title text-light">Edit Note</h4>
							<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="#" method="post" id="edit-note-form" class="px-3">
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
								</div>
								<div class="form-group">
									<textarea name="note" id="note" class="form-control" placeholder="Write Your Note Here..." rows="6" required></textarea>
								</div>
								<div class="form-group">
									<button type="submit" name="editNote" id="editNoteBtn" class="btn btn-block btn-info">Edit Note&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-note-spinner"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		
		<script src="assets/php/js/transaction.js"></script>
		<?php
		include('assets/php/footer.php');
		?>
    </body>

</html>