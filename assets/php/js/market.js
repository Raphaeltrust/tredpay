$(document).ready(function(){
    //get post nav
    $("body").on("click", ".postnav", function(e){
        e.preventDefault();
        token_id = $(this).attr("data-token");
        $("#userToken").html(token_id);
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
        //Delete note of an user
        $("body").on("click", ".removeBtn", function(e){
        e.preventDefault();
        remove_id = $(this).attr('id');
        buyer_id = $(this).attr("data-buyer");
        buyer_amount = $(this).attr("data-amount");
        Swal.fire({
        title: 'Are you sure?',
        text: "You are about to remove the current buyer from this transaction, you won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove buyer!'
        }).then((result) => {
        if (result.value) {
        $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        data: { remove_id: remove_id,
                buyer_id: buyer_id,
                buyer_amount: buyer_amount
                 },
        success: function(response){
        Swal.fire(
        'Buyer Removed!',
        'Buyer removed Successfully.',
        'success'
        )
        
        displayAllTrans();
        }
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