<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Weather Application</title>
    </head>
    <body>
        <img src="img/wundergroundLogo_black_horz.jpg" alt="Weather Underground logo" />
        <h1>Weather Underground Application</h1>
        
        <!-- Weather Underground Code -->     
        <?php
        // City Location
        $query_city = $_POST["city"];
        
        // Weather Underground API request
        // Store initial request
        $json_string = file_get_contents("http://api.wunderground.com/api/c351cf41056050c6/geolookup/conditions/forecast10day/q/UK/" . $query_city . ".json");
        
        // Decodes JSON string
       $decoded_string = json_decode($json_string,true);
        
        //Print 
        //print_r($decoded_string);
        
       //Location Information
        $location_country = $decoded_string['current_observation']['display_location']['country']; 
        $location_city = $decoded_string['current_observation']['display_location']['city'];
        $location_temp_c = $decoded_string['current_observation']['temp_c'];
        //Forecast
        //Day 0
        $location_forcast_day0 = $decoded_string['forecast']['txt_forecast']['forecastday']['0']['title'];
        $location_forcast_icon0 = $decoded_string['forecast']['txt_forecast']['forecastday']['0']['icon'];
        $location_forcast_icon_url0 = $decoded_string['forecast']['txt_forecast']['forecastday']['0']['icon_url'];                          
        $location_forcast_fcttext_metric0 = $decoded_string['forecast']['txt_forecast']['forecastday']['0']['fcttext_metric']; 
        
        echo "Country: " . $location_country . "<br />";
        echo "City: " . $location_city . "<br/>";
        echo "Temp: " . $location_temp_c . "<br/>";
        echo "Forcast Day: " . $location_forcast_day0 . "<br/>";
        echo "Forcast Icon URL: " . $location_forcast_icon_url0 . "<br/>";
        echo "<img src='" . $location_forcast_icon_url0 . "' />";
        echo "Forcast Text: " . $location_forcast_fcttext_metric0 . "<br/>";     
        
        ?>
    </body>
</html>
