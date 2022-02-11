$(document).ready(function(){

	//Add New Note Ajax Request
	$("#payBtn").click(function(e){
		if ($("#transaction-form")[0].checkValidity()) {
			e.preventDefault();
			$("#add-note-spinner").show();
			$.ajax({
				url: 'assets/php/process.php',
				method: 'post',
				data: $("#transaction-form").serialize()+'&action=payment',
				success: function(response){
					$("#add-note-spinner").hide();
					$("#transaction-form")[0].reset();
					$("#addNoteModal").modal('hide');
					Swal.fire({
						title: 'Success! Payment completed.',
					    icon: 'success'
					}).then(function(){ 
					location.reload();
					});
					

					displayAllTrans();
				}
			});
		}
	});

//Add buyer
$("#payBtn").click(function(e){
	if ($("#transaction-form")[0].checkValidity()) {
		e.preventDefault();
		$("#add-note-spinner").show();
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: $("#transaction-form").serialize()+'&action=add_buyer',
			success: function(response){
				$("#add-note-spinner").hide();
				$("#transaction-form")[0].reset();
				$("#addNoteModal").modal('hide');
			/*	Swal.fire({
					title: 'buyer added.',
				    icon: 'success'
				});
				*/

				displayAllTrans();
			}
		});
	}
});
	//Edit note of an user Ajax Request
	$("body").on("click", ".editBtn", function(e){
		e.preventDefault();
		edit_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { edit_id: edit_id },
			success: function(response){
				data = JSON.parse(response);
				$("#id").val(data.id);
				$("#title").val(data.title);
				$("#note").val(data.note);
			}
		});
	});

	//Update Note of an user Ajax Request
	$("#editNoteBtn").click(function(e){
		if ($("#edit-note-form")[0].checkValidity()) {
			e.preventDefault();
			$("#edit-note-spinner").show();
			$.ajax({
				url: 'assets/php/process.php',
				method: 'post',
				data: $("#edit-note-form").serialize()+'&action=update_note',
				success: function(response){
					$("#edit-note-spinner").hide();
					$("#edit-note-form")[0].reset();
					$("#editNoteModal").modal('hide');
					Swal.fire({
						title: 'Note Edited Successfully.',
					    icon: 'success'
					});

					displayAllTrans();
				}
			});
		}
	});

	//Delete note of an user
	$("body").on("click", ".deleteBtn", function(e){
		e.preventDefault();
		delete_id = $(this).attr('id');
		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/process.php',
					method: 'post',
					data: { delete_id: delete_id },
					success: function(response){
				    	Swal.fire(
				    		'Deleted!',
				    		'Note Deleted Successfully.',
				    		'success'
				    	)

				    	displayAllTrans();
					}
				});
			}
		});
	});

//Accept transaction
	$("body").on("click", ".acceptBtn", function(e){
		e.preventDefault();
		accept_id = $(this).attr('id');
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
					data: { accept_id: accept_id },
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
	//Display note of an user
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
			data: { action: 'display_transactions' },
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