<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Weather Underground</title>
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type='text/javascript' src='lib/jquery.autocomplete.js'></script>
        <link rel="stylesheet" type="text/css" href="lib/jquery.autocomplete.css" /> 
    </head>
    <body>
        <img src="img/wundergroundLogo_black_horz.jpg" alt="Weather Underground logo" />
        <h1>Weather Underground Application</h1>
        <p>Please enter a UK city name</p>
        <form action="process.php" method="get">
            City: <input id="citylocation" type="text" name="city" /><input type="submit"/>
        </form>
        
        <!-- AutoComplete with minimum 3 characters -->
        <script>
        $(document).ready(function(){
            $("#citylocation").autocomplete('lib/search.php', {
                minChars: 3
            });
        });
        </script>
    </body>
</html>