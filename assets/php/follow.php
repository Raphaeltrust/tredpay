<?php
$sql = "SELECT * FROM user_follow WHERE follower_id= $id AND following_id = $cid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$follow_btn = '<button id="unfollow-btn"  data-follow="'.$id.'" class="btn btn-white">
											Unfollow
									</button>';
									}
else{
$follow_btn = '<button id="follow-btn"  data-follow="'.$id.'" class="btn btn-primary">
											Follow <i class="fas fa-user-plus"></i>
									</button>';
									}
								
	$sql = "SELECT count(following_id) FROM user_follow WHERE follower_id = $id";
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
	$sql = "SELECT count(follower_id) FROM user_follow WHERE following_id = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$following = $row['count(follower_id)'];
	}
	}
	else{
	$following = "0";
	}

	?>