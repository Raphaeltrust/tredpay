	<?php
	require_once 'session.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	$mail = new PHPMailer(true);
//Handle Add New transaction Ajax Request
if (isset($_POST['action']) && $_POST['action'] == 'transaction') {
	$itemName = $cuser->test_input($_POST['name']);
	$price = $cuser->test_input($_POST['price']);
	$sellerToken = $cuser->test_input($_POST['sellerToken']);
	$serviceKey = $cuser->test_input($_POST['serviceKey']);
	$itemDesc = $cuser->test_input($_POST['description']);
	$list = $cuser->test_input($_POST['list']);

	$cuser->new_transaction($cid, $itemName, $price, $sellerToken, $serviceKey, $itemDesc, $list);
	$cuser->notification($cid, 'admin', 'New transaction initiated.');
}


//Handle Display All transactions  Request
	if (isset($_POST['action']) && $_POST['action'] == 'display_transactions') {
		$output = '';
		$transactions = $cuser->get_transactions($cid);
		if ($transactions) {
			$output .= '<table class="datatable table table-stripped text-center">
										<thead>
								<tr>
									<td>Transaction ID</td>
									<td>Name</td>
									<td>Price</td>
									<td>Token</td>
									<td>Buyer</td>
									<td>Trade</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>';
			foreach ($transactions as $row) {
			$buyer = $row['buyer'];
			$buyer_approve = $row['buyer_approve'];
			if($buyer_approve == 0){
			$buyer_approve = 'disabled'.' '.'role="button" aria-disabled="true"';
			}
			else{
			$buyer_approve ="";
			}
			
			if($buyer == 0){
			$buyer = "No buyer";
			$ttxt = "Active";
			$seller_action ='<a href="#" id="'.$row['tid'].'" title="Delete Transaction" class="text-danger deleteBtn"><i class="fas fa-trash"></i></a>';
			}
			else{
			$sql = "SELECT name FROM users WHERE id = $buyer";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			// output data of each row
			while($buyer_row = $result->fetch_assoc()) {
			$buyer = '<a href="/user?id='.$row["buyer"].'">'.$buyer_row["name"].'</a>';
			$ttxt = "Confirm";
			$seller_action = '<a href="#" data-amount="'.$row['price'].'" data-buyer="'.$row['buyer'].'" id="'.$row['tid'].'" title="Remove Buyer" class="text-success removeBtn"><i class="fas fa-user-minus"></i></a>&nbsp;&nbsp;&nbsp;';
			
			}
			}
			}
			
			
				$output .= '<tr>
								<td>#TRP-'.$row['tid'].'</td>
								<td>'.$row['itemName'].'</td>
								<td><strong>&#8358;</strong>'.$row['price'].'</td>
								<td><button  id="copy-btn" class="copy" data-clipboard-target="#userToken'.$row["tid"].'" style="border-radius:100%;outline:none;border:none;"><i class="far fa-copy"></i></button><input type="text" class="copy-text" id="userToken'.$row["tid"].'" value="'.$row['sellerToken'].'" readonly="readonly"> 
								</td>
								<td>'.$buyer.'</td>
								<td>
								<a href="#" data-amount="'.$row['price'].'" id="'.$row['tid'].'" class="btn btn-primary confirmBtn acceptBtn '.$buyer_approve.'">'.$ttxt.'</a>
								
									</td>
								<td>'.$seller_action.'
								
								</td>
							</tr>';
			}

			$output .= '</tbody>
					</table>';
			echo $output;
		} else {
			echo '<h3 class="text-center text-secondary">No transactions yet!</h3>';
		}
	}
	//Handle Delete transaction Request
	if (isset($_POST['delete_id'])) {
	$tid = $_POST['delete_id'];
	$cuser->delete_transaction($tid);
	$cuser->notification($cid, 'admin', 'Transaction Deleted.');
	}
	//Handle approve transaction Request
	if (isset($_POST['accept_id'])) {
	$tid = $_POST['accept_id'];
	$amount = $_POST['amount_id'];
	$sql = "UPDATE users SET wallet = wallet + $amount WHERE id = $cid";
	
	if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";
	} else {
	echo "Error updating record: " . $conn->error;
	}
	$cuser->approve_transaction($tid);
	$cuser->notification($cid, 'admin', 'Transaction approved.');
	
	}
	
	
	//Handle Display All user transaction Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'user_transactions') {
	$output = '';
	$trans = $cuser->get_user_transactions($cid);
	if ($trans) {
	$output .= '<table class="datatable table table-stripped text-center">
	<thead>
	<tr>
	<td>Transaction ID</td>
	<td>Title</td>
	<td>Price</td>
	<td>Trade</td>
	</tr>
	</thead>
	<tbody>';
	foreach ($trans as $row) {
	if($row["buyer_approve"] ==1){
	$btnDisable ='btn-success disabled'.' '.'role="button" aria-disabled="true">Approved</a>';
	}
	else{
	$btnDisable = 'btn-primary">Confirm</a>';
	}
	$output .= '<tr>
	<td>#TREDB-'.$row['tid'].'</td>
	<td>'.$row['itemName'].'</td>
	<td>'.$row['price'].' </td>
<td><a href="#" id="'.$row['tid'].'" class="btn  acceptBtn '.$btnDisable.'
						
	</tr>';
	}
	
	$output .= '</tbody>
	</table>';
	echo $output;
	} else {
	echo '<h3 class="text-center text-secondary">You currently dont have any active transactions!</h3>';
	}
	}
	//Handle approve buyer transaction Request
	if (isset($_POST['buyer_accept_id'])) {
	$tid = $_POST['buyer_accept_id'];
	$cuser->buyer_approve_transaction($tid);
	$cuser->notification($cid, 'admin', 'Transaction approved.');
	}
	//Handle remove buyer transaction Request
	if (isset($_POST['remove_id'])) {
	$tid = $_POST['remove_id'];
	$amount = $_POST['buyer_amount'];
	$buyer = $_POST['buyer_id'];
	$sql = "UPDATE users SET wallet = wallet + $amount WHERE id = $buyer";
	
	if ($conn->query($sql) === TRUE) {
	//silence is better
	} else {
	echo "There was an error processing this request: " . $conn->error;
	}
	$cuser->remove_buyer($tid);
	$cuser->notification($cid, 'admin', 'Buyer Removed');
	}
	//Handle Update user payment Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'payment') {
		$id = $cuser->test_input($cid);
		$buyer = $cuser->test_input($cid);
		$tid = $cuser->test_input($_POST['tid']);
		$wallet = $cuser->test_input($_POST['amount']);
	$cuser->set_buyer($buyer, $tid);
		$cuser->user_payment($id, $wallet);
		$cuser->notification($cid, 'admin', 'New payment.');
	}
	
	//Handle Update seller payment Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'seller_payment') {
	$id = $cuser->test_input($cid);
	$wallet = $cuser->test_input($_POST['amount']);
	$cuser->update_seller_wallet($wallet, $id);
	$cuser->notification($cid, 'admin', 'New payment.');
	}
	//Handle add buyer Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'add_buyer') {
	$buyer = $cuser->test_input($cid);
	$id = $cuser->test_input($_POST['tid']);
	
	$cuser->add_buyer($buyer, $id);
	$cuser->notification($cid, 'admin', 'New buyer.');
	}
	//Handle Add New Note Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
		$title = $cuser->test_input($_POST['title']);
		$note = $cuser->test_input($_POST['note']);

		$cuser->add_new_note($cid, $title, $note);
		$cuser->notification($cid, 'admin', 'Note Added.');
	}

//Handle Update buyer wallet Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'update_seller_wallet') {
		$wallet = $cuser->test_input($_POST['amount']);
		$id = $cuser->test_input($cid);
	$cuser->update_seller_wallet($wallet, $id);
		$cuser->notification($cid, 'admin', 'New seller payment');
	}
	//Handle Display All Notes Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'display_notes') {
		$output = '';
		$notes = $cuser->get_notes($cid);
		if ($notes) {
			$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<td>#</td>
									<td>Title</td>
									<td>Note</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>';
			foreach ($notes as $row) {
				$output .= '<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['title'].'</td>
								<td>'.substr($row['note'],0, 75).'...</td>
								<td>
									<a href="#" id="'.$row['id'].'" title="View Details" class="text-success infoBtn"><i class="fa fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
									<a href="#" id="'.$row['id'].'" title="Edit Note" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
									<a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger deleteBtn"><i class="fa fa-trash fa-lg"></i></a>
								</td>
							</tr>';
			}

			$output .= '</tbody>
					</table>';
			echo $output;
		} else {
			echo '<h3 class="text-center text-secondary">:( You have not written any note yet! Write your first note now!</h3>';
		}
	}

	if (isset($_POST['edit_id'])) {
		$id = $_POST['edit_id'];
		$row = $cuser->edit_note($id);
		echo json_encode($row);
	}

//Handle following
if (isset($_POST['follow_id'])) {
	$follower_id = $_POST['follow_id'];
    $following_id = $cid;
	$cuser->add_follower($following_id, $follower_id);
//	$cuser->notification($cid, 'admin', 'Buyer Removed');
	}
	
	//Handle Unfollowing
	if (isset($_POST['unfollow_id'])) {
	$follower_id = $_POST['unfollow_id'];
	$following_id = $cid;
	$cuser->remove_follower($following_id, $follower_id);
	//	$cuser->notification($cid, 'admin', 'Buyer Removed');
	}
	//Handle Update Note of user Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'update_note') {
		$id = $cuser->test_input($_POST['id']);
		$title = $cuser->test_input($_POST['title']);
		$note = $cuser->test_input($_POST['note']);

		$cuser->update_note($id, $title, $note);
		$cuser->notification($cid, 'admin', 'Note Updated.');
	}

	//Handle Delete Note Ajax Request
	if (isset($_POST['delete_id'])) {
		$id = $_POST['delete_id'];
		$cuser->delete_note($id);
		$cuser->notification($cid, 'admin', 'Note Deleted.');
	}

	//Handle View Note Ajax Request
	if (isset($_POST['info_id'])) {
		$id = $_POST['info_id'];
		$row = $cuser->edit_note($id);
		echo json_encode($row);
	}

	//Handle Profile Update Ajax Request
	if (isset($_FILES['image'])) {
		$name = $cuser->test_input($_POST['name']);
		$gender = $cuser->test_input($_POST['gender']);
		$dob = $cuser->test_input($_POST['dob']);
		$phone = $cuser->test_input($_POST['phone']);
		$address = $cuser->test_input($_POST['address']);
		$state = $cuser->test_input($_POST['state']);
		$city = $cuser->test_input($_POST['city']);
		$zipcode = $cuser->test_input($_POST['zipcode']);
		$country = $cuser->test_input($_POST['country']);

		$oldImage = $_POST['oldimage'];
		$folder = 'uploads/';

		if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
			$newImage = $folder.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $newImage);
			if ($oldImage != null) {
				unlink($oldImage);
			}
		} else {
			$newImage = $oldImage;
		}

		$cuser->update_profile($name,$gender,$dob,$phone,$newImage,$address,$city,$state,$zipcode,$country,$cid);
		$cuser->notification($cid, 'admin', 'Profile Updated.');
	}

	//Handle change password ajax request
	if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
        $currentPass = $_POST['curpass'];
        $newPass = $_POST['newpass'];
        $cnewPass = $_POST['cnewpass'];
        $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

        if($newPass != $cnewPass){
            echo $cuser->showMessage('danger', 'Both password did not matched!');
        } else {
            if(password_verify($currentPass, $cpass)){
                $cuser->change_password($hnewPass, $cid);
                $cuser->notification($cid, 'admin', 'Password Changed.');
                echo $cuser->showMessage('success', 'Password changed successfully!');
            } else {
                echo $cuser->showMessage('danger', 'Current password is incorrect!');
            }
        }
    }

    //Handle verify email ajax request
    if(isset($_POST['action']) && $_POST['action'] == 'verify_email'){

    	$token = uniqid();
		$token = str_shuffle($token);
		$cuser->forgot_password($token,$cemail);

    	try {
			$mail->isSMTP();
            $mail->Host = 'tredpay.com';
            $mail->SMTPAuth = true;
            $mail->Username = Database::USERNAME;
            $mail->Password = Database::PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;

            $mail->setFrom(Database::USERNAME,'Tredpay');
            $mail->addAddress($cemail);

            $mail->isHTML(true);
            $mail->Subject = 'E-Mail Verification';
            $mail->Body = '<h3>Click the below link to verify your email address.</h3><br><a href="http://localhost/user_management/verify-email.php?email='.$cemail.'&token='.$token.'">http://localhost/user_management/verify-email.php?email='.$cemail.'&token='.$token.'</a><br><br><br>Regards,<br>Ventura - User Management';
            
            $mail->send();
			echo $cuser->showMessage('success', 'We have send you email verification link to your email.');
		} catch(Exception $e) {
			echo $cuser->showMessage('danger', 'Something went wrong. Try again later.');
		}
    }

    //Handle Send Feedback ajax request
    if(isset($_POST['action']) && $_POST['action'] == 'feedback'){
    	$subject = $cuser->test_input($_POST['subject']);
    	$feedback = $cuser->test_input($_POST['feedback']);

    	$cuser->send_feedback($subject, $feedback, $cid);
    	$cuser->notification($cid, 'admin', 'Feedback Written.');
    }

    //Handle fetch notification Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'fetchNotification'){
    	$notification = $cuser->fetchNotification($cid);
    	$output = '';
    	if ($notification) {
    		foreach ($notification as $row) {
    			$output .= '<div class="alert alert-danger" role="alert">
								<button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="alert-heading">New Notification</h4>
								<p class="mb-0 lead">'.$row['message'].'</p>
								<hr class="my-2">
								<p class="mb-0 float-left">Reply of feedback from Admin</p>
								<p class="mb-0 float-right">'.$cuser->timeInAgo($row['created_at']).'</p>
								<div class="clearfix"></div>
							</div>';
    		}
    		echo $output;
    	} else {
    		echo '<h3 class="text-center">No any new notifications.</h3>';
    	}
    }

    //check notification
    if(isset($_POST['action']) && $_POST['action'] == 'checkNotification'){
    	if($cuser->fetchNotification($cid)){
    		echo '<span class="badge badge-pill">'.$cuser->countNotification($cid).'</span>';
    	} else {
    		echo '';
    	}
    }

    //remove notification
    if (isset($_POST['notification_id'])) {
    	$id = $_POST['notification_id'];
    	$cuser->removeNotification($id);
    }

?>