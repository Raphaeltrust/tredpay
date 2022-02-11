<?php require_once 'assets/php/header.php'; 
 require_once 'assets/php/functions.php';
 
 ?>
 <div class="content container" style="padding-top: 5em;">
 
 <?php
 if(isset($_POST['submit'])){
 $token = htmlspecialchars($_POST['token']);
 $sql = "SELECT users.id, transaction.tid, transaction.uid, transaction.buyer, transaction.sellerToken,  transaction.itemName, transaction.price, transaction.itemDesc, transaction.created_at, users.name, users.email, users.photo FROM transaction INNER JOIN users ON transaction.uid = users.id WHERE transaction.sellerToken = '$token'";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 $price = $row["price"];
 $serviceFee = $price * 4 / 100;
 $total = $serviceFee + $price;
 if($row["photo"] ==""){
 $row["photo"]= "uploads/default-avatar.png";
 }
 if($cid == $row['uid']){?>
 <div class="alert alert-danger text-center m-2 m-0"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 24 24" width="15px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
 Opps! You can't enter your own token. You can request token from a seller or visit the <a href="/market">market place</a>. </div>
 <?php }
 elseif($cid !== $row['uid']){?>
 <div  class="alert alert-success text-center m-2 m-0">This token is valid! <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 24 24" width="15px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
 </div>
 
 <div style="margin-top:10px;" class="card text-center">
 <div class="card-header">
 From <?=$row['name'];?>
 </div>
 <div class="card-body">
 <a href="/user?id=<?=$row['id'];?>"><img class="rounded-circle" height="100" width="100" src="/assets/php/<?=$row['photo'];?>"></a>
 
 <h4 class="card-title"><?=$row['itemName'];?></h4>
 <p class="card-text"><?=$row['itemDesc'];?></p>
 <?php if($wallet > $total){?>
 <?php
 if($row['buyer'] != 0){
 echo "Fortunately this product have an active buyer and transaction is in progress.";
 }
 else{?>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#alertNoFunds">Proceed to payment</a>
<?php }?>
<!-- Modal -->
<div class="modal fade" id="alertNoFunds" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="ModalLongTitle">Confirm Payment</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
You are about to purchase <strong><?=$row["itemName"];?></strong> which cost a service fee of <?=$currencyCode.$serviceFee;?>
<form action="#" method="post" id="transaction-form" class="px-3">
								<div class="form-group">
									<input type="hidden" name="amount" class="form-control" value="<?=$total;?>" required>
									</div>
										<div class="form-group">
								<input type="hidden" name="tid" class="form-control" value="<?=$row["tid"];?>" required>
								
								</div>
								</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<a href="#" id="payBtn" type="button" class="btn btn-primary">Pay <?=$currencyCode.$total;?></a>
</div>
</div>
</div>
</div>
 <?php } 
 else{?>
 <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#alertNoFunds">Proceed to payment</a>
 <!-- Modal -->
 <div class="modal fade" id="alertNoFunds" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="ModalLongTitle">Insuffitient Balance</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>
 <div class="modal-body">
 You currently don't have sufficient balance to perform this transaction kindly fund your wallet to continue.
This item cost <?=$currencyCode.$price;?> and a service fee of <?=$currencyCode.$serviceFee;?> and your current balance is <?=$currencyCode.$wallet;?>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
 <a href="/add-funds" type="button" class="btn btn-primary">Add Funds</a>
 </div>
 </div>
 </div>
 </div>
 <?php }
 ?>
 </div>
 <div class="card-footer text-muted">
 <strong><?=$currencyCode.$row['price'];?></strong>
 </div>
 </div>
 <style>#transaction{
 display:none;
 }
 </style>
 <?php } }
 }
 else{ echo  '<div   class="alert alert-danger text-center m-2 m-0"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 24 24" width="15px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
 The Token "<strong>'.$token.'"</strong> is invalid. Please contact the seller for a valid Token. </div>'; }
 }
 
 ?>
<form action="/buy" method="post" id="transaction" class="px-3" style="margin-top:10px;">
								<div class="form-group">
									<input type="text" name="token" class="form-control"  placeholder="Enter Token" required>
								</div>
								<div class="form-group">
								<button type="submit" name="submit" id="submitBtn" class="btn btn-block btn-success">Validate
								</button>
								</div>
								
</form>

</div>

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
		<script src="assets/php/js/payment.js"></script>

<?php
								include('assets/php/footer.php');
								?>