<div style="margin: 1em;">
    <?php

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\URL;

    echo "<pre><div style='margin: 1em;'><h1>Josef Testing Page</h1>";

    $url = '';
    $appUrl = URL::to('/');
    $apiDomain = "$appUrl/api";
    //    echo $apiDomain;


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //// CITIES

    //    //    $cityName = 'London';
    //    //    $url = "$apiDomain/search/$cityName";
    //    //    $response = Http::get($url);
    //    $response = app()->make(\App\Services\Cities\GetCitiesService::class)->get('Test city');

    //    $data = [
    //        'city'=>'Test city2',
    //        'country'=>'TC2',
    //        'latitude'=>'456',
    //        'longitude'=>'789',
    //    ];
    //    var_dump($data);
    //    $response = app()->make(\App\Services\Cities\StoreCityService::class)->store($data);


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //// OPEN WEATHER MAP

//    $response = app()->make(\App\Services\Cities\Interfaces\GetCityLocationInterface::class)->get('London');
    $response = app()->make(\App\Services\Cities\OpenWeatherMap\GetCityLocationService::class)->get('London');


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //// DISPLAY

    if (!empty($response)) {
        echo '<h2>Response</h2>';
//        echo 'type=' . gettype($response) . '<br>';

        if (method_exists($response, 'status')) {
            echo "<h4>url=$url</h4><h4>status=" . $response->status() . '</h4>';
        }

        if (gettype($response) == 'object') {
            echo '<h4>class=' . get_class($response) . '</h4>';

            if (($class = get_class($response)) == 'Illuminate\Http\Client\Response') {
//                echo '<h5>body=' . $response->body() . '</h5>';
                var_dump($data = $response->json());
            } elseif ($class == 'Illuminate\Http\JsonResponse') {
                var_dump($data = $response->getData(true));
            } else {
                echo '<h4>type=' . gettype($response) . '</h4>';
                var_dump($response);
            }

            if (!empty($data['Info']['Data']['url']) && $data['Info']['Data']['url'] != 'tbc') {
                echo '<a target="_blank" href="' . $data['Info']['Data']['url'] . '">download</a><br>';
            }

            if (!empty($data['Info']['Data']['deep_link'])) {
                echo '<a target="_blank" href="' . $data['Info']['Data']['deep_link'] . '">follow</a><br>';
            }
        } elseif (gettype($response) == 'array') {
            var_dump($response);
        } else {
            echo '<h5>type=' . gettype($response) . '</h5>';

            if (gettype($response) == 'string') {
                echo "response=$response<br>";
            }
        }
    }


    echo "</div></pre>";
    ?>
</div>
