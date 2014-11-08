<?php 
session_start();
error_reporting(0);
include("database.php");
$eid = $_GET['eid'];
$flight = $_GET['flight'];
$class = $_GET['class'];

?>
<html>
    <head>
        <title>ATS | Airline Ticketing System</title>
        <link href="/abs/css/bootstrap.min.css" rel="stylesheet">
        <link href="/abs/css/bootstrap.css" rel="stylesheet">
    
        <style>

            @font-face {
                font-family: LatoBold;
                src: url(/abs/fonts/Lato-Bold.ttf);
            }
            @font-face {
                font-family: LatoHair;
                src: url(/abs/fonts/Lato-Hairline.ttf);
            }

            html {
                background-color: #FF9E22;
            }

            body {
                
                background: transparent;
                font-family: LatoBold;
            }

            h1{ 
                font-size: 10vw;
                font-family: LatoBold;
            }

            text{
                font-family: LatoHair;
            }

            .bord-only{
                border: 2px solid;
                border-color: #A66716;
                border-
            }

    </style>
        </style>

    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">

                    <center>
                        <h1><text>Airline Ticketing System</text></h1>
                        <p style="font-size:14pt;">Travel Anywhere. Travel Fast. Travel Safe. Travel Light.</p>
                    </center>
                </div>
                <br/>
             
                <div class="col-md-12 col-xs-12 pads">
				<div class="col-md-5 col-xs-10 col-md-offset-3 col-xs-offset-1">
				
					<form role="form" action="/ars/process/add_pass_flight.php?eid=<?php echo $eid; ?>&flight=<?php echo $flight; ?>&class=<?php echo $class; ?>" method="POST" >

						<label for="personal"><h3><strong>Passenger Information</strong></h3></label>
						
						 <br/>
						<input type="text" class="form-control" id="personal" placeholder="First Name, M.I. , Last Name" name="passenger_name" REQUIRED>
						<br/>
                        <input type="number" class="form-control" id="personal" placeholder="Contact Number" name="phone_number" REQUIRED>
                        <br/>
                        <input type="email" class="form-control" id="personal" placeholder="@ Email Address" name="email" REQUIRED>


						<br/>
						<input type="submit" class="btn btn-warning col-md-3 col-xs-3 col-xs-offset-2 col-md-offset-2" name="add_pass_flight" value="Add to Flight">
						<a href="/ars/pages/view_flight.php?eid=<?php echo $eid; ?>&flight=<?php echo $flight; ?>" class="btn btn-danger col-md-3 col-xs-3 col-xs-offset-2 col-md-offset-2">Cancel</a>
					</form>
				</div>
			</div>

            </div>
        </div>
        <script src="/ars/js/jquery-1.11.1.min.js"></script>
        <script src="/ars/js/jquery.dataTables.min.js"></script>
        <script src="/ars/js/dataTables.bootstrap.js"></script>

        <script src="/ars/js/jquery.dataTables.min.js"></script>
        <script src="/ars/js/datatables.js"></script>
        <script type="text/javascript">





    $(document).ready(function() {
      $('.datatable').dataTable({
        "sPaginationType": "bs_full"       
      }); 
      $('.datatable').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
      });
    });
    </script>
        <script src="/abs/js/bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
            causeRepaintsOn = $("h1, h2, h3, p");
            $(window).resize(function() {
              causeRepaintsOn.css("z-index", 1);
            });
        </script>
        <script type="text/javascript">
        	$(".date-picker").datepicker();

$(".date-picker").on("change", function () {
    var id = $(this).attr("id");
    var val = $("label[for='" + id + "']").text();
    $("#msg").text(val + " changed");
});
        </script>
</body>
</html>
































