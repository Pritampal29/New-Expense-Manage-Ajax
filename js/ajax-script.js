/**
 * =============================================================
 * ===================   Main JQuery File     ==================
 * =============================================================
 */

$(document).ready(function () {


    /** Show Data in table */
    function loadData() {
        $.ajax({
            url: "./backend/load_exp.php",
            type: "POST",
            success: function (response) {
                $("#tableData").html(response);
            },
        });
    }
    loadData();



    /** Insert Data Into Database */
    $(document).on("click", "#saveBtn", function () {
        var purpose = $("#insPurpose").val();
        var amount = $("#insAmount").val();
        var date = $("#insDate").val();

        if (purpose != "" && amount != "" && date != "") {
            $.ajax({
                url: "./backend/insert_exp.php",
                type: "POST",
                data: {
                    date: date,
                    purpose: purpose,
                    amount: amount,
                },
                success: function (response) {
                    $("#myInsForm").trigger("reset");
                    $(".close").click();
                    loadData();
                },
            });
        } else {
            alert("All Fields are Mandatory");
        }
    });



    /** Delete Data Form Database */
    $(document).on("click", "#deleteBtn", function () {
        if (confirm("Once Delete Action Cannot be Undone")) {
        var id = $(this).attr("data-did");

            $.ajax({
                url: "./backend/delete.php",
                type: "post",
                data: { id: id },
                success: function (response) {
                    loadData();
                },
            });
        }
    });

    /** Update Data Into Database */

        // Load Data In Modal body:
        $(document).on('click','#editBtn',function(){
            
            var id = $(this).attr('data-eid');

            $.ajax({
                url: "./backend/load_data.php",
                type: 'post',
                data: {
                    id:id
                },
                success: function(data) {
                    $('#update-modal-body').html(data);
                }
            });
        });

        // Update Data Within Database
        $(document).on('click','#updateBtn',function(){
            var id = $('#u-id').val();
            var purpose = $('#updPurpose').val();
            var amount = $('#updAmount').val();

            $.ajax({
                url: './backend/update.php',
                type: 'post',
                data: {
                    id:id,
                    purpose:purpose,
                    amount:amount
                },
                success: function(data) {
                    $("#myUpdateForm").trigger("reset");
                    $(".close").click();
                    loadData();
                }
            });
        });

        
    /** Search Data by Date Range Form Database */
        $("#to-date").on("change",function(){
            var formDate = $("#from-date").val();
            var toDate = $("#to-date").val();
            console.log(formDate,toDate);

            $.ajax({
                url: './backend/date_search.php',
                type: 'POST',
                data: {
                    formdate:formDate,
                    todate:toDate
                },
                success: function(data) {
                    $("#tableSearchData").html(data);
                }
            });
        });


    /** Search Data by Purpose Form Database */
    $("#srch_fld").on("keyup", function () {
        var searchData = $(this).val();

        $.ajax({
            url: "./backend/search.php",
            type: "post",
            data: { sdata: searchData },
            success: function (data) {
                $("#tableData").html(data);
            },
        });
    });
    

});



/**
 *
 * Add Active Class in Nav
 *
 */
$(document).ready(function () {
  // Function to remove active class from all nav-items
  function removeActiveClass() {
    $(".navbar-nav .nav-link").removeClass("active");
  }

  // Add active class to the current menu item based on URL
  var url = window.location.pathname;
  $("ul.navbar-nav a")
    .filter(function () {
      return this.pathname == url;
    })
    .addClass("active");

  // Remove active class from all nav-items when a nav-link is clicked
  $(".navbar-nav .nav-link").on("click", function () {
    removeActiveClass(); // Remove active class from all nav-items
    $(this).addClass("active"); // Add active class to the clicked item
  });
});


/**
 * 
 * Date Picker Customization
 * 
 */
$(document).ready(function () {
    var today = new Date();
    var date = today.toISOString().split("T")[0];
    $("#from-date").attr("max", date);

    $("#from-date").on("change", function () {
      const fromDate = new Date($(this).val());
      const formattedDate = fromDate.toISOString().split("T")[0];
      $("#to-date").attr("max", date);
      $("#to-date").attr("min", formattedDate);
    });
  });