$(document).ready(function(){
	
	//Profile Update Ajax Request
	$("#profile-update-form").submit(function(e){
		e.preventDefault();
		$("#edit-profile-spinner").show();
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			processData: false,
			contentType: false,
			cache: false,
			data: new FormData(this),
			success: function(response){
				$("#edit-profile-spinner").hide();
				location.reload();
			}
		});
	});

	//Change password Ajax Request
	$("#changePassBtn").click(function(e){
		if($("#change-pass-form")[0].checkValidity()){
			e.preventDefault();
			$("#change-pass-spinner").show();
			$.ajax({
				url: 'assets/php/process.php',
				method: 'post',
				data: $("#change-pass-form").serialize()+'&action=change_pass',
				success: function(response){
					$("#changePassError").html(response);
					$("#change-pass-spinner").hide();
					$("#change-pass-form")[0].reset();
				}
			});
		}
	});
//Follow user
$("body").on("click", "#follow-btn", function(e){
		e.preventDefault();
		follow_id = $(this).attr("data-follow");
		
			
				$.ajax({
					url: 'assets/php/process.php',
					method: 'post',
					data: { follow_id: follow_id},
					success: function(response){
				    $("#follow-btn").text("Unfollow");
				    $("#follow-btn").removeClass("btn-primary");
				    $("#follow-btn").addClass("btn-white");
				    $("#follow-btn").attr("id","unfollow-btn");
                    var followers = document.getElementById("followers").innerText;
                    follow_count = parseInt(followers,10)+1;
                    document.getElementById("followers").innerText=follow_count;
                    
				    	
					}
				});
			
	
	});
	
	//Unfollow user
	$("body").on("click", "#unfollow-btn", function(e){
	e.preventDefault();
	unfollow_id = $(this).attr("data-follow");
	
	
	$.ajax({
	url: 'assets/php/process.php',
	method: 'post',
	data: { unfollow_id: unfollow_id},
	success: function(response){
	$("#unfollow-btn").text("Follow");
	$("#unfollow-btn").removeClass("btn-white");
	$("#unfollow-btn").addClass("btn-primary");
	$("#unfollow-btn").attr("id","follow-btn");
	var followers = document.getElementById("followers").innerText;
	follow_count = parseInt(followers,10)-1;
	document.getElementById("followers").innerText=follow_count;
	}
	});
	
	
	});
	//Verify email ajax request
	$("#verify-email").click(function(e){
		e.preventDefault();
		$(this).text('Please Wait');
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { action: 'verify_email' },
			success: function(response){
				$("#verifyEmailAlert").html(response);
				$("#verify-email").text('Verify Now!');
			}
		});
	});
	
	checkNotification();
	
	function checkNotification() {
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { action: 'checkNotification' },
			success: function(response) {
				$("#checkNotification").html(response);
			}
		});
	}
});