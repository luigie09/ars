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
             <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">

            <br/>
            <br/>
            <?php

             $hey = mysql_query("SELECT * FROM flights WHERE flight_number = '$flight'")or die(mysql_error());
            $free = mysql_fetch_array($hey);

             ?>
            <p><h4>FLIGHT DESTINATION:</h4><strong><?php echo $free['flight_destination']; ?></strong></p>
            <p><h4>FLIGHT DEPARTURE DATE:</h4><strong><?php echo $free['flight_date']; ?></strong></p>
            <br/>
            <?php

           
            if($free['seats_available'] == 0){?>

            <a href="/ars/pages/add_passenger.php?eid=<?php echo $eid; ?>&flight=<?php echo $flight; ?>" class="btn btn-danger col-md-4 col-xs-4" disabled="disabled">Flight Full</a>

          <?php  }else{
             ?>

            <a href="/ars/pages/add_passenger.php?eid=<?php echo $eid; ?>&flight=<?php echo $flight; ?>&class=<?php echo $class; ?>" class="btn btn-danger col-md-4 col-xs-4">Add Passenger</a>
            <?php } ?>
<br/>
<br/>

<br/>
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered col-md-12 col-xs-12">
    <thead>
        <tr>
            
            <th><center>Passenger Name</center></th>
           
            <th><center>Flight Option</center></th>
            
        </tr>
    </thead>
    <tbody><?php 
                
                $query = mysql_query("SELECT * FROM $flight WHERE flight_type = '$class' ");
                while($keps = mysql_fetch_array($query)){
             ?>
        <tr class="gradeX">
            
            <td><center><?php echo $keps['passenger_name']; ?></center></td>
            <td>
                <center>
                    <a href="/ars/process/cancel_flight.php?eid=<?php echo $eid; ?>&client_num=<?php echo $keps['flight_inc']; ?>&flight_num=<?php echo $flight; ?>&class=<?php echo $class; ?>" class="btn btn-danger col-md-12 col-xs-12">Cancel Flight</a>
                </center>
            </td>        
                        
        </tr><?php } ?>
    </tbody>
</table>
<a href="/ars/pages/scheduler.php?eid=<?php echo $eid; ?>" class="btn btn-default col-md-4 col-xs-4">Go Back</a>
 <br/> 
                <br/> 
                <br/> 
                <br/> 
                <br/> 
                </div>
                <br/> 
                <br/> 
                <br/> 
                <br/> 
                <br/> 
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
