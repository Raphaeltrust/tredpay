$(document).ready(function(){


//Accept transaction
	$("body").on("click", ".acceptBtn", function(e){
		e.preventDefault();
		buyer_accept_id = $(this).attr('id');
		Swal.fire({
		title: 'Are you sure?',
		text: "You are about to approve this transaction, You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Confirm!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/process.php',
					method: 'post',
					data: { buyer_accept_id: buyer_accept_id },
					success: function(response){
				    	Swal.fire(
				    		'Completed!',
				    		'Transaction Approved',
				    		'success'
				    	)

				    	displayAllTrans();
					}
				});
			}
		});
	});
	//Display transaction of an user
	$("body").on("click", ".infoBtn", function(e){
		e.preventDefault();
		info_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { info_id: info_id },
			success: function(response){
				data = JSON.parse(response);
				Swal.fire({
					title: '<strong>Note : ID('+data.id+')</strong>',
					icon: 'info',
					html: '<b>Title: </b>'+data.title+'<br><br><b>Note: </b>'+data.note+'<br><br><b>Written on: </b>'+data.created_at+'<br><br><b>Updated on: </b>'+data.updated_at,
					showCloseButton: true
				});
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


	displayAllTrans();

	function displayAllTrans() {
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { action: 'user_transactions' },
			success: function(response) {
				$("#showTrans").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }
			}
		});
	}

	//Checking user logged in or not
	$.ajax({
		url: 'assets/php/action.php',
		method: 'post',
		data: { action: 'checkUser' },
		success: function(response){
			if (response === 'bye') {
				window.location = 'index.php';
			}
		}
	});
});