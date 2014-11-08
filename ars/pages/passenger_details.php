<?php 
session_start();
error_reporting(0);
include("database.php");
$eid = $_GET['eid'];
$flight = $_GET['flight'];

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
            .disabledTab {
                pointer-events: none;
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
             <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
               <div class="about_us_links">
  <ul class="nav nav-tabs nav-justified">
    <li class="disabled disabledTab"><a href="#company" data-toggle="tab">Search Flight</a></li>
    <li class="active"><a href="#pressroom" data-toggle="tab">Passenger Details</a></li>
    <li class="disabled disabledTab"><a href="#contacts" data-toggle="tab">Payment</a></li>
  </ul>
</div>
<div class="tab-content">
  <div id="pressroom" class="tab-pane fade in active">
  <br/>
  <br/>

     <?php

             $hey = mysql_query("SELECT * FROM flights WHERE flight_number = '$flight'")or die(mysql_error());
            $free = mysql_fetch_array($hey);

             ?>
            <p><h4>FLIGHT DESTINATION:</h4><strong><h2><?php echo $free['flight_destination']; ?></h2></strong></p><br/>
            <p><h4>FLIGHT DEPARTURE DATE:</h4><strong><h2><?php echo $free['flight_date']; ?></h2></strong></p>
    <br/>
    <br/>

        <form role="form" action="/ars/pages/payment.php?eid=<?php echo $eid; ?>&flight=<?php echo $flight; ?>&class=<?php echo $class; ?>" method="POST" >

                        <label for="personal"><h3><strong>Reserver Information</strong></h3></label>
                        
                         <br/>
                         <br/>
                        <input type="text" class="form-control" id="personal" placeholder="First Name, M.I. , Last Name" name="passenger_name" REQUIRED>
                        <br/>
                        <input type="number" class="form-control" id="personal" placeholder="Contact Number" name="phone_number" REQUIRED>
                        <br/>
                        <input type="email" class="form-control" id="personal" placeholder="@ Email Address" name="email" REQUIRED>

                        <label for="flight"><h3><strong>Flight Options</strong></h3></label>
                        <br/>
                        <input type="number" min="0" max="15" class="form-control" id="flight" placeholder="Number of Adults (12yrs and Above)" name="adults" REQUIRED>
                        <br/>
                        <input type="number" min="0" max="15" class="form-control" id="flight" placeholder="Number of Children (11yrs and Below)" name="children">
                        <br/>
                        <p><i>*P150.00 discounted from actual price for children</i></p>
                        <br/>
                        <label for="flight"><h3><strong>Seating Class</strong></h3></label>
                        <br/>
                        <select class="form-control" name="flight_type" required>
                          <option>Business Class</option>                       
                          <option>Economy Class</option>                       
                         </select>
                        <br/>
                        <input type="submit" class="btn btn-warning col-md-3 col-xs-3 col-xs-offset-2 col-md-offset-2" name="add_passenger" value="Add to Flight">
                        <a href="/ars/pages/search.php" class="btn btn-danger col-md-3 col-xs-3 col-xs-offset-2 col-md-offset-2">Cancel</a>
                    </form>

  </div>   
  <br/>
  <br/>
  <br/>
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
</body>
</html>
