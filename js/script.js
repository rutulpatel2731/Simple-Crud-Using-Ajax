$(document).ready(function() {

    function loadTable(page) {
        $.ajax({
            url: "fetch-data.php",
            type: "POST",
            data : {page_no : page},
            success: function(data) {
                //console.log(data)
                $("#table-data").html(data)
            }
        });
    }
    loadTable();


    // pagination code
    $(document).on("click","#pagination a",function(e){
        e.preventDefault();
        // fetch id of anchor tag
        var page_id = $(this).attr("id");
        loadTable(page_id);
    })






    // insert data into table with alert
    $("#submit").on("click", function(e) {
        e.preventDefault();
        var name = $("#name").val();
        var mobileNo = $("#mobile").val();
        $.ajax({
            url: 'insert-data.php',
            type: "post",
            data: {
                name: name,
                mobile: mobileNo
            },
            success: function(data) {
                // console.log(data);
                if (data == 1) {
                    $("#form").trigger("reset");
                    $("#success-alert").removeClass('d-none');
                    $("#success-msg").html("Record Inserted...");
                    loadTable();
                } else {
                    $("#error-alert").removeClass("d-none");
                    $("#error-msg").html("Record Not Inserted...");
                }

            }
        })
    })
    $("#btn-close").on("click", function() {
        $(".alert").addClass('d-none');
    })
    $("#btn-close-danger").on("click", function() {
        $(".alert").addClass('d-none');
    })



    // for delete the data
    $(document).on("click", ".delete-btn", function() {
        var sid = $(this).data("did");
        //alert(sid);
        $.ajax({
            url: "delete-data.php",
            type: "post",
            data: { studentId: sid },
            success: function(data) {
                //console.log(data);
                if (data == 1) {
                    $("#success-alert").removeClass('d-none');
                    $("#success-msg").html("Record Deleted..");
                    loadTable();
                } else {
                    $("#error-msg").removeClass("d-none");
                    $("#error-msg").html("Record Is Not Deleted..");
                }

            }
        });
    })



    // for update modal
    $(document).on("click", ".update-btn", function() {
        //console.log("click");
        var updateId = $(this).data("uid");
        //alert(fff);
        $.ajax({
            url: "load-data-modal.php",
            type: "POST",
            data: { Id: updateId },
            success: function(data) {
                $("#modal-body").html(data);
            }
        });
    })

    // for updatemodal data
    $(document).on("click", "#update-data", function(e) {
        e.preventDefault();
        var sid = $("#hidden-id").val();
        var sname = $("#uname").val();
        var smobile = $("#umobile").val();
        $.ajax({
            url: "update-modal-data.php",
            type: "POST",
            data: {
                stud_id: sid,
                stud_name: sname,
                stud_mobile: smobile
            },
            success: function(data) {
                //console.log(data)
                if (data == 1) {
                    $('#exampleModal').modal('hide');
                    loadTable();
                    $("#success-alert").removeClass('d-none');
                    $("#success-msg").html("Record Updated..");
                } else {
                    $("#error-msg").removeClass("d-none");
                    $("#error-msg").html("Record Is Not Updated..");
                }
            }
        })
    })

    // search data 
    $("#search").on("keyup",function(){
       var searchData = $(this).val()
       //console.log(searchData);

       $.ajax({
         url : "search-data.php",
         type : "POST",
         data : { searchvalue : searchData },
         success : function(data){
           //console.log(data);
           $("#table-data").html(data);
         }
       });
    })

});