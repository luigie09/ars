<?php 
session_start();
error_reporting(0);
include("database.php");
$eid = $_GET['eid'];
$flight = $_GET['flight'];
$_SESSION['airline'] = 1;



    
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
    <li class="disabled disabledTab"><a href="#pressroom" data-toggle="tab">Passenger Details</a></li>
    <li class="active"><a href="#contacts" data-toggle="tab">Payment</a></li>
  </ul>
</div>
<div class="tab-content">
  <div id="contacts" class="tab-pane fade in active">

  <br/>
  <br/>

      <table class="table">
        <th>Flight Number</th>
        <th>Flight Destination</th>
        <th>Date of Departure</th>
        <th>Seating Class</th>
        <th>No. of Seats Reserved (Adult)</th>
        <th>No. of Seats Reserved (Children)</th>
        <th>Amount of Payment</th>
        <?php

            
            $query = mysql_query("SELECT * FROM flights WHERE flight_number = '$flight'")or die(mysql_error());
            $kuha = mysql_fetch_array($query);
            $flight_desti = $kuha['flight_destination'];
            $date_depart = $kuha['flight_date'];
            $class = $_POST['flight_type'];
            switch ($class) {
                case 'Business Class':
                   $class = 1;
                    break;
                
                default:
                    $class = 0;
                    break;
            }


            $adult = $_POST['adults'];
            $child = $_POST['children'];

            if($class == 1){
                $adult_p = $kuha['flight_fare_business'] * $adult;
                 if($child == null){
                $child = 0;
                }
                else{
                    $child_minus = $child * 150;
                    $bata = $kuha['flight_fare_business'] * $child;
                    $child_p = $bata - $child_minus;
                }
                $payment = $adult_p + $child_p;
            }
            else{
                $adult_p = $kuha['flight_fare_economy'] * $adult;
                 if($child == null){
                $child = 0;
                }
                else{
                    $child_minus = $child * 150;
                    $bata = $kuha['flight_fare_economy'] * $child;
                    $child_p = $bata - $child_minus;
                }
                $payment = $adult_p + $child_p;
            }

            
            $_SESSION['payment'] = $payment;
            $_SESSION['flight'] = $flight;
            $_SESSION['passengers'] = $adult + $child;
            $_SESSION['class'] = $class;
            $_SESSION['passname'] = $_POST['passenger_name'];



           

         ?>
        <tr>
            <td><center><?php echo $flight; ?> </center></td>
            <td><center><?php echo $flight_desti; ?></center></td>
            <td><center><?php echo $date_depart; ?></center></td>
            <td><center><?php 

            if($class == 1){
                echo "Business Class";
            }
            else{
                echo "Economy Class";
            }




             ?></center></td>
            <td><center><?php echo $adult." tickets"."<br/>P  ".number_format($adult_p); ?></center></td>
            <td><center><?php echo $child." tickets"."<br/>P  ".number_format($child_p); ?></center></td>
            <td><center><?php echo "P ". number_format("$payment",2); ?></center></td>
           
       </tr>
      </table>

<button class="btn btn-info col-md-3 col-xs-3" onclick="myFunction()" name="pay_up">Pay via Credit Card<br/>(ABS ONLINE ATM)</button>

<a href="/ars/pages/search.php" class="btn btn-danger col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1">Cancel</a>      
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
function myFunction() {
    window.location.replace("http://localhost/ars/pages/waiting_payment.php");
    myWindow = window.open("http://localhost/abs_atm/");
    
    
}
</script>


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
