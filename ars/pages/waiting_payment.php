<?php 
session_start();
error_reporting(0);
include("database.php");
$eid = $_GET['eid'];
if($_SESSION['no_money_left'] == 1){
            $_SESSION['no_money_left'] = 0;
            header("location:/ars/pages/payment.php");
         }
         
?>
<html>
    <head>
        <title>ATS | Airline Ticketing System</title>
        <link href="/abs/css/bootstrap.min.css" rel="stylesheet">
        <link href="/abs/css/bootstrap.css" rel="stylesheet">
        <?php 

            if($_SESSION['paid'] != 1){?>
                <meta http-equiv="refresh" content="5">
            <?php } 

        ?>
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
               
<div class="tab-content">
  <div id="company" class="tab-pane fade in active">
    <br/>
    <br/>
        
        <?php  

            if($_SESSION['paid'] != 1){

        ?>

            <p>WAITING FOR FLIGHT PAYMENT CONFIRMATION....</p>

         <?php }
         
         else{
            $_SESSION["added_to_flight"] = 1;
            $_SESSION['no_money_left'] = 0;
            $flight = $_SESSION['flight'];

            $query = mysql_query("SELECT * FROM flights WHERE flight_number = '$flight'")or die(mysql_error());
            $pato = mysql_fetch_array($query);
            if($_SESSION['class'] == 1){
                $one = $pato['one'] - $_SESSION['passengers'];
                $seats = $pato['seats_available'] - $_SESSION['passengers'];
                $ipasok = mysql_query("UPDATE flights SET one = '$one', seats_available='$seats'")or die(mysql_error());
                $class = $_SESSION['class'];
                $passes = $_SESSION['passengers'];
                $pass_name = $_SESSION['passname'];
                $entry = mysql_query("INSERT INTO $flight (flight_type,reserved_seats,passenger_name) VALUES ('$class','$passes','$pass_name')")or die(mysql_error());
            }
            else{
                $one = $pato['zero'] - $_SESSION['passengers'];
                $seats = $pato['seats_available'] - $_SESSION['passengers'];
                $ipasok = mysql_query("UPDATE flights SET zero = '$one', seats_available='$seats'")or die(mysql_error());
                $class = $_SESSION['class'];
                $passes = $_SESSION['passengers'];
                $pass_name = $_SESSION['passname'];
                $entry = mysql_query("INSERT INTO $flight (flight_type,reserved_seats,passenger_name) VALUES ('$class','$passes','$pass_name')")or die(mysql_error());
            }
            header("location: /ars/pages/search.php");
         }
          ?>
    

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
