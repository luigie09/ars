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
    <li class="active"><a href="#company" data-toggle="tab">Search Flight</a></li>
    <li class="disabled disabledTab"><a href="#pressroom" data-toggle="tab">Passenger Details</a></li>
    <li class="disabled disabledTab"><a href="#contacts" data-toggle="tab">Payment</a></li>
  </ul>
</div>
<div class="tab-content">
  <div id="company" class="tab-pane fade in active">
    <br/>
    <br/>
    <br/>
    <br/>
    <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered col-md-12 col-xs-12">
    <thead>
        <tr>
            
            <th><center>Flight Number</center></th>
            <th><center>Flight Destination</center></th>
            <th><center>Flight Date</center></th>
            <th><center>Available Seating Option</center></th>
            <th><center>Price</center></th>
            <th><center>Options</center></th>
            
            
        </tr>
    </thead>
    <tbody><?php 

                $query = mysql_query("SELECT * FROM flights");
                while($keps = mysql_fetch_array($query)){
             ?>
        <tr class="gradeX">
            
            <td><center><?php echo $keps['flight_number']; ?></center></td>
            <td><center><?php echo $keps['flight_destination']; ?></center></td>
            <td><center><?php echo $keps['flight_date']; ?></center></td>
            <td><center><?php 

                if($keps['seats_available'] > 0){
                    echo "(".$keps['one'].") Business Class <br/>(".$keps['zero'].") Economy Class ";
                }
                else{
                    if($keps['one'] <= 0){
                        echo "Economy Class Only";
                    }
                    else if($keps['zero'] <= 0){
                        echo "Business Class Only";
                    }
                    

                }

             ?></center></td>
             <td><center><?php echo "[ P ".$keps['flight_fare_business']." ] Business <br/>[ P ".$keps['flight_fare_economy']." ] Economy" ?></center></td>
            <td><center><a href="passenger_details.php?flight=<?php echo $keps['flight_number']; ?>" class="btn btn-danger" >Reserve This!</a></center></td>
 
                        
        </tr><?php } ?>
    </tbody>
</table>

  </div>   
  
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
