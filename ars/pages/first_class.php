<?php 
session_start();
error_reporting(0);
include("database.php");
$eid = $_GET['eid'];
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
<a href="/ars/pages/scheduler.php?eid=<?php echo $eid; ?>" class="btn btn-warning col-md-4 col-xs-4 col-md-offset-1 col-xs-offset-1 ">Business Class</a>
<a href="/ars/pages/create_flight.php?eid=<?php echo $eid; ?>" class="btn btn-warning col-md-4 col-xs-4 col-md-offset-2 col-xs-offset-2 active">Economy Class</a>

            <br/>
            <br/>
            <br/>
<a href="/ars/pages/create_flight.php?eid=<?php echo $eid; ?>" class="btn btn-danger col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">Create Flight</a>
<br/>
<br/>
<br/>
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered col-md-12 col-xs-12">
    <thead>
        <tr>
            
            <th><center>Flight Number</center></th>
            <th><center>Flight Destination</center></th>
            <th><center>Seat Available</center></th>
            <th><center>Flight Date</center></th>
            <th><center>Flight Info</center></th>
            <th><center>Delete Flight</center></th>
            
        </tr>
    </thead>
    <tbody><?php 

                $query = mysql_query("SELECT * FROM flights");
                while($keps = mysql_fetch_array($query)){
             ?>
        <tr class="gradeX">
            
            <td><center><?php echo $keps['flight_number']; ?></center></td>
            <td><center><?php echo $keps['flight_destination']; ?></center></td>
            <td><center><?php echo $keps['zero']; ?></center></td>
            <td><center><?php echo $keps['flight_date']; ?></center></td>
            <td><center><a href="/ars/pages/view_flight.php?eid=<?php echo $eid; ?>&flight=<?php echo $keps['flight_number']; ?>&class=0" class="btn btn-info col-md-12 col-xs-12">View </a>        
            <td><center><a href="/ars/process/delete_flight.php?eid=<?php echo $eid; ?>&flight=<?php echo $keps['flight_number']; ?>" class="btn btn-danger col-md-12 col-xs-12">Delete Flight</a>
</center></td>        
                        
        </tr><?php } ?>
    </tbody>
</table>
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
