<?php require_once 'assets/php/header.php'; ?>
			
			<!-- Page Wrapper -->
                <div class="content container" style="padding-top: 3em;">

                	<div class="row">
                		<div class="col-lg-12">
                			<?php if($verified == 'Not Verified'): ?>
                			<div class="alert alert-danger text-center m-2 m-0">
                				<strong>Your E-mail is not verified! We have sent you verification link on your email, check and verify now.</strong>
                			</div>
                			<?php endif; ?>
                			
                		</div>
                	</div>
					
					<div class="card lil-border mt-2">
					<div class="row" style="padding:15px">
					<div class="col" style="border-right:1px solid rgba(0,0,0,0.1);">
					<button class="icon-btn"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
					</button>
					<h5>WALLET BALANCE</h5>
					<span style="font-size:24px;font-weight:bold;"><?=$currencyCode.$wallet;?></span>
					</div>
					<div class="col">
					<button class="icon-btn"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M13,10h-2V8h2V10z M13,6h-2V1h2V6z M7,18c-1.1,0-1.99,0.9-1.99,2S5.9,22,7,22s2-0.9,2-2S8.1,18,7,18z M17,18 c-1.1,0-1.99,0.9-1.99,2s0.89,2,1.99,2s2-0.9,2-2S18.1,18,17,18z M8.1,13h7.45c0.75,0,1.41-0.41,1.75-1.03L21,4.96L19.25,4l-3.7,7 H8.53L4.27,2H1v2h2l3.6,7.59l-1.35,2.44C4.52,15.37,5.48,17,7,17h12v-2H7L8.1,13z"/></svg>				
					</button>
					<h5>PRODUCTS</h5>
					<span style="font-size:24px;font-weight:bold;">0</span>
					</div>
					</div>
					</div>
					
					<div class="card lil-border mt-2">
					<div class="row" style="padding:15px">
					<div class="col">
					<button class="icon-btn-normal">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 14V6c0-1.1-.9-2-2-2H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zm-9-1c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm13-6v11c0 1.1-.9 2-2 2H4v-2h17V7h2z"/></svg>
					
					</button> 
					
				
					</div>
					<div class="col-9">
					<span>You can easily send money to anyone on TredPay for free</span> <a href="#">Try it</a>
					</div>
					</div>
					</div>
					
					<div class="card lil-border mt-2">
					<div class="row" style="padding:15px">
					<div class="col-8">
					<h4>TREDPAY ID</h4>
					<p>TredPay ID is a unique identification number assigned to every TredPay user. Your TredPay ID let you recieve money from other TredPay users</p>
					</div>
					<div class="col">
					<button class="icon-btn">
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="green"><path d="M0 0h24v24H0z" fill="none" fill-rule="evenodd"/><g fill-rule="evenodd"><path d="M9 17l3-2.94c-.39-.04-.68-.06-1-.06-2.67 0-8 1.34-8 4v2h9l-3-3zm2-5c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4"/><path d="M15.47 20.5L12 17l1.4-1.41 2.07 2.08 5.13-5.17 1.4 1.41z"/></g></svg>
				
				</button>
					<h6>Your TredPay ID is TRED-UID-<?=$cid;?></h6>
					</div>
					</div>
					</div>
					
					<div class="card lil-border mt-2">
					<div class="row" style="padding:15px">
					<div class="col-8">
                    <button class="icon-btn"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M12.88,17.76V19h-1.75v-1.29 c-0.74-0.18-2.39-0.77-3.02-2.96l1.65-0.67c0.06,0.22,0.58,2.09,2.4,2.09c0.93,0,1.98-0.48,1.98-1.61c0-0.96-0.7-1.46-2.28-2.03 c-1.1-0.39-3.35-1.03-3.35-3.31c0-0.1,0.01-2.4,2.62-2.96V5h1.75v1.24c1.84,0.32,2.51,1.79,2.66,2.23l-1.58,0.67 c-0.11-0.35-0.59-1.34-1.9-1.34c-0.7,0-1.81,0.37-1.81,1.39c0,0.95,0.86,1.31,2.64,1.9c2.4,0.83,3.01,2.05,3.01,3.45 C15.9,17.17,13.4,17.67,12.88,17.76z"/></g></svg>
                    </button>
                    <h4>TRANSACTIONS</h4>
					<p>View all onging transactions</p>
					</div>
					<div class="col">
					  <a href="transactions" class="btn btn-primary">
					View all
					</a>
				
					</div>
					</div>
					</div>
				</div>
			<style>
			.icon-btn{
			border:none;
			outline:none;
			padding:10px;
			border-radius:100%;
			margin-bottom:15px;
			}
			.icon-btn-normal{
			border:none;
			outline:none;
			padding:10px;
			border-radius:100%;
			
			}
			.lil-border{
			border-radius:10px;
			}
			</style>
		<!-- End Edit Note Modal -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="assets/php/js/home.js"></script>
			<?php include('assets/php/footer.php');
								?>
    </body>

</html>