<?php include('functions.php'); ?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title></title>
  <meta name="description" content="How Much Fuel is a simple app to display the fuel costs of any vehicle. By making simple calculations you can see how much each kilometre is costing you. Use it to compare the running costs of that new car">
  <meta name="author" content="Fliquid Studios">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="image_src" type="image/jpeg" href="http://www.howmuchfuel.com/img/icon-facebook.gif" />
  <link href='http://fonts.googleapis.com/css?family=Cabin:regular,bolditalic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css?v=2">
  <script src="js/libs/modernizr-1.7.min.js"></script>

</head>

<body>

  <div id="container">
    <header>
        <div id="header">
            <img src="/img/logo.png" style="float: left; padding-right: 10px; "/><h1>How Much Fuel?</h1>
        </div>
    </header>
    <div class="content_box">
        <h2>Add New Vehicle</h2>
        <div id="vehicle_form">
            <form name="fuelconsumption" id="fuelconsumption" method="post" action="process.php">
            <div class="form_row"><label for="name">Vehicle Name</label><input type="text" name="name" size="10" id="name" /></div>
            <div class="form_row"><label for="fuel_consumption">Avg Fuel Consumption</label><input type="text" name="fuel_consumption" size="5" id="fuel_consumption" /> l/100ks</div>
            <div class="form_row"><label for="fuel_tank_size">Fuel Tank Size</label><input type="text" name="fuel_tank_size" size="5" id="fuel_tank_size" />L</div>
            <div class="form_row"><label for="fuel_type">Fuel Type</label><select id="fuel_type" name="fuel_type">
                <option value="ULP">ULP</option>
                <option value="PULP">PULP</option>
                <option value="Diesel">Diesel</option>
                </select></div>
            <div class="form_row"><label for="fuel_price">Avg Fuel Price</label><input type="text" name="fuel_price" id="fuel_price" size="5" value="143.2" /></div>
            <div class="form_row"><input type="submit" value="Add Vehicle"></div>
            </form>
        </div>
    </div>
    
    <div id="main" role="main" class="content_box">
        <div id="vehicles">
            <?php
                if (isset($_SESSION['fuel_prices'])) { ?>
            <h2>Your Vehicles</h2>
            <table id="vehicles_rowset">
                <tr>
                    <th></th>
                    <th>Vehicle Name<span class="help">This is the vehicle name - For your reference only</span></th>
                    <th>Fuel Consumption<span class="help">This is the average fuel consumption. </span></th>
                    <th>Fuel Tank Size<span class="help">In litres, eg 60</span></th>
                    <th>Fuel Type<span class="help">ULP (unleaded), PULP (Premium unleaded) or Diesel</span></th>
                    <th>Fuel Price<span class="help">The average fuel price. This is updated with average Sydney prices regularly</span></th>
                    <th>Cost To Fill<span class="help">The cost to fill the tank (This will be updated by the calculator)</span></th>
                    <th>K's Per Tank<span class="help">How many kilometres per tank (This will be updated by the calculator)</span></th>
                    <th>Price Per K<span class="help">The average price per kilometre (This will be updated by the calculator)</span></th>
                </tr>
                <?php
                    foreach($_SESSION['fuel_prices'] as $k => $vehicle) {
                        $rowset = '<tr class="rowset">';
                        $rowset .= '<td><img src="/img/delete.png" class="removeRowset" id="' . $vehicle['vehicle_name'] . '" alt="Remove ' . $vehicle['vehicle_name'] . '" title="Remove ' . $vehicle['vehicle_name'] . '" /></td>';
                        $rowset .= '<td>' . $vehicle['vehicle_name'] . '</td>';
                        $rowset .= '<td>' . $vehicle['fuel_consumption'] . ' l/100ks</td>';
                        $rowset .= '<td>' . $vehicle['fuel_tank_size'] . 'L</td>';
                        $rowset .= '<td>' . $vehicle['fuel_type'] . '</td>';
                        $rowset .= '<td>' . $vehicle['fuel_price'] . 'c</td>';
                        $rowset .= '<td>$' . $vehicle['cost_to_fill'] . '</td>';
                        $rowset .= '<td>' . $vehicle['ks_per_tank'] . '</td>';
                        $rowset .= '<td>$' . $vehicle['price_per_k'] . '</td>';
                        $rowset .= '</tr>';
                        print $rowset;
                    }
                }
            ?>
            </table>
        </div>

        <div id="about">
            <h2>About / Help</h2>
            <span id="description"><p>This app is simply to help you compare the fuel costs of one or more cars. Simply fill the form out and add the vehicle to see the cost.</p></span>
            <span id="help"><p>
                Tips:
                <ul>
                    <li>If you don't know your cars consumption or fuel tank size, you can look up your car <a href="http://www.carbuddy.com.au/car/values/specification/default.aspx" target="_blank">here</a>.</li>
                    <li>To see todays average fuel prices, check <a href="http://www.mynrma.com.au/motoring/car-care/fuel-prices.htm" target="_blank">here</a>.</li>
                </ul>
                </p></span>
        </div>

    </div>
    <footer>
        <iframe src="http://www.facebook.com/plugins/like.php?app_id=210006219031961&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FHow-Much-Fuel%2F220498091310348&amp;send=false&amp;layout=button_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:21px;" allowTransparency="true"></iframe>
        <a href="http://twitter.com/share" class="twitter-share-button" data-text="How Much Fuel is a simple app to display the fuel costs of any vehicle." data-count="none" data-via="cbiggins">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        <a href="http://fliquidstudios.com"><img class="vertmiddle" src="/img/fliqy.png" border="0" alt="Fliquid Studios" title="Fliquid Studios" /></a>
    </footer>
  </div> <!-- eo #container -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");</script>
  <![endif]-->

  <script>
    var _gaq=[["_setAccount","UA-2740110-12"],["_trackPageview"]]; 
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

  <script type="text/javascript">

    $(document).ready(function() {

       $('#fuelconsumption').submit(function(e) {
           e.preventDefault();
           $.post("process.php", $("#fuelconsumption").serialize(), function(data) {
               updateVehicles(); 
           });
       }),

       // $('.help').hover(function(e) {
       //      var iconPos = $(this).position();
       //      var tooltipLeft = iconPos.left -165;
       //      // var tooltipTop = iconPos.top -100;
       //      var tooltipTop = 5;
       //     $('#main').append('<div id="tooltip" class="triangle-border top">'+ $(this).text() +'</div>');
       //     // $('document').append('<div id="tooltip" class="tooltip">'+ $(this).text() +'</div>');
       //     $('.tooltip').css('top', tooltipTop + 'px');
       //     $('.tooltip').css('left', tooltipLeft + 'px');
       // },
       //  function(e) {
       //      setTimeout(closeToolTip, 800);
       //  })
    });

    function closeToolTip() {
        $('#tooltip').hide('slow');
        $('#tooltip').remove();
    }

    function updateVehicles() {
        $.getJSON("get.php", function(data) {
            $('.rowset').remove();
            
            $.each(data, function(key, vehicle) {
                var rowset = '<tr class="rowset">';
                rowset += '<td><img src="/img/delete.png" class="removeRowset" id="' + vehicle.vehicle_name + '" alt="Remove ' + vehicle.vehicle_name + '" title="Remove ' + vehicle.vehicle_name + '" /></td>';
                rowset += '<td>' + vehicle.vehicle_name + '</td>';
                rowset += '<td>' + vehicle.fuel_consumption + ' l/100ks</td>';
                rowset += '<td>' + vehicle.fuel_tank_size + 'L</td>';
                rowset += '<td>' + vehicle.fuel_type + '</td>';
                rowset += '<td>$' + vehicle.fuel_price + '</td>';
                rowset += '<td>$' + vehicle.cost_to_fill + '</td>';
                rowset += '<td>' + vehicle.ks_per_tank + '</td>';
                rowset += '<td>$' + vehicle.price_per_k + '</td>';
                rowset += '</tr>';
                $('#vehicles_rowset').append(rowset);
            })

        });
    }
    
    $('.removeRowset').live('click', function(e) {
        $.get('remove.php', {'id' : $(e.target).attr('id')});
        $(e.target).parents('tr').remove();
    })
  </script>

</body>
</html>