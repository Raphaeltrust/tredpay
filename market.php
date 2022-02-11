<?php require_once 'assets/php/header.php'; 
 require_once 'assets/php/functions.php';
 
 
 ?>
 
 <div class="conteunt containeru" style="padding-top: 1em;">
 <div class="container">
 <div class="input-group md-form form-sm form-1 pl-0">
 <div class="input-group-prepend">
 <span class="input-group-text purple lighten-3" id="basic-text1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
 </span>
 </div>
 <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
  <button class="btn"><svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z"/></svg>
  Filter</button>
 <button class="btn">Add</button>
 </div>
 </div>
 <?php
 $sql = "SELECT users.id, transaction.itemName, transaction.price, transaction.itemDesc, transaction.created_at, users.name, users.email, users.badge, users.photo FROM transaction INNER JOIN users ON transaction.uid = users.id WHERE transaction.list = 1 ORDER BY transaction.created_at DESC";
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
 if($row["id"] == $cid){
 $profile_link = "profile";
 }
 else{
 $profile_link = "user?id=".$row['id'];
 }
 if($row["photo"] ==""){
 $row["photo"]= "uploads/default-avatar.png";
 }?>
 <div class="post-card">
 <div class="post-header ">
 <a href="/<?=$profile_link;?>"><img class="rounded-circle" height="50" width="50" src="/assets/php/<?=$row['photo'];?>">
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


<?php
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