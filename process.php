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
        $query_city = $_GET["city"];
        
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
        echo "Country: " . $location_country . "<br />";
        echo "City: " . $location_city . "<br/>";
        echo "Temp: " . $location_temp_c . "<br/>";
        
        //Forecast for three days and removing night information
        $i=0;
        foreach ($decoded_string['forecast']['txt_forecast']['forecastday'] as $forecast)
        {
            if(stripos(($forecast['title']), "night") == false){
                echo "Forcast Day: " . $forecast['title'] . "<br/>";
                echo "Forcast Text: " . $forecast['fcttext_metric'] . "<br/>";  
                echo "<img src='" . $forecast['icon_url'] . "' />" . "<br/>";
                echo "-------------------------------------------------------" . "<br/>";
                $i++;
                if($i==3) break;
            }
        } 
        
        ?>
    </body>
</html>
