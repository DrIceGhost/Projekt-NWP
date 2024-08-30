<?php

print '
<h1>Weather Forecast</h1>
<form method="POST" style"padding-left: 10px; margin: 20px;">
    <label for="city">Enter City Name:</label><br>
    <input type="text" id="city" name="city" required ><br>
    <input type="submit" value="Get Forecast" style"padding-left: 10px; margin: 20px;>
    <br>
</form>';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $city = htmlspecialchars(trim($_POST['city']));  // Sanitize user input for city name

    // Validate that the city field is filled
    if (empty($city)) {
        echo '<p>Please enter a city name.</p>';
        exit;
    }

    // API key and URL na AccuWeather
    $api_key = '9PNxiLrdRxZ9lEOh9zjPuj3myVvA9U57';
    $location_url = "http://dataservice.accuweather.com/locations/v1/cities/search?apikey={$api_key}&q=" . urlencode($city);

    // Get the city key using the city search API
    $location_response = @file_get_contents($location_url);

    if ($location_response === false) {
        $error = error_get_last();
        echo '<p>Error fetching city data from the API: ' . htmlspecialchars($error['message']) . '</p>';
        die();
    }

    // Decode the JSON response to get the city key
    $location_data = json_decode($location_response, true);

    // Check if any location was found
    if (empty($location_data)) {
        echo '<p>No location found for the specified city.</p>';
        exit;
    }

    // Get the first location key from the search results
    $city_key = $location_data[0]['Key'];
    $city_name = $location_data[0]['LocalizedName'];

    // Now use the city key to get the weather forecast
    $forecast_url = "http://dataservice.accuweather.com/forecasts/v1/daily/1day/{$city_key}?apikey={$api_key}&metric=true";

    // Get the weather forecast using the city key
    $forecast_response = @file_get_contents($forecast_url);

    if ($forecast_response === false) {
        $error = error_get_last();
        echo '<p>Error fetching weather data from the API: ' . htmlspecialchars($error['message']) . '</p>';
        die();
    }

    // Decode the JSON response for the weather forecast
    $forecast_data = json_decode($forecast_response, true);

    // Extract the relevant forecast data
    if (!empty($forecast_data['DailyForecasts'][0])) {
        $forecast = $forecast_data['DailyForecasts'][0];
        $date = date('l, F j, Y', strtotime($forecast['Date'])); // Format the date nicely
        $min_temp = $forecast['Temperature']['Minimum']['Value'] . ' ' . $forecast['Temperature']['Minimum']['Unit'];
        $max_temp = $forecast['Temperature']['Maximum']['Value'] . ' ' . $forecast['Temperature']['Maximum']['Unit'];
        $day_condition = $forecast['Day']['IconPhrase'];
        $night_condition = $forecast['Night']['IconPhrase'];

        // Display the weather forecast in a table
        echo '<h2>Weather Forecast for ' . htmlspecialchars($city_name) . ':</h2>';
        echo '<table border="1">';
        echo '<tr><th>Date</th><th>Min Temperature (°C)</th><th>Max Temperature (°C)</th><th>Day Condition</th><th>Night Condition</th></tr>';
        echo "<tr>
                <td>{$date}</td>
                <td>{$min_temp}</td>
                <td>{$max_temp}</td>
                <td>{$day_condition}</td>
                <td>{$night_condition}</td>
            </tr>";
        echo '</table>';

        // Display a message if the Day Condition is good
        if (stripos($day_condition, 'sunny') !== false || stripos($day_condition, 'clear') !== false || stripos($day_condition, 'fair') !== false) {
            echo '<p>It\'s a great day to ride!</p>';
        }
    } else {
        echo '<p>No forecast data found for the specified city.</p>';
    }
}
?>
