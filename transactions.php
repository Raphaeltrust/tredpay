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
									<h4 class="card-title float-left mt-2">All Transactions</h4>
									<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNoteModal">&nbsp;Logs</a>
								</div>
								<div class="card-body">
									<div class="table-responsive" id="showTrans">
										<h4 class="text-center text-lead mt-2">Getting Transactions <i class="fas fa-spinner fa-pulse"></i></h4>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->

		
		
				<script src="assets/php/js/my-transaction.js"></script>
		<?php
		include('assets/php/footer.php');
		?>
    </body>

</html>