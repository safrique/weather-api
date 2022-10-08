<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forecast</title>
</head>
<body>
<div class="container">
    <h3 class="text-center">Forecast</h3>

    @if (!empty($error))
        <h4 style='color: red'>{{ $error }}</h4>
    @endif

    @if (!empty($forecasts))
        @foreach($forecasts as $forecast)
            <h4>{{ $forecast['city'] }} ({{ $forecast['country'] }})</h4>

            @foreach($forecast['forecast'] as $item)
                <b>Timestamp:</b> {{ $item['date_time'] }}
                - <b>Temp:</b> {{ $item['temp'] }}
                - <b>Feels like:</b> {{ $item['feels_like'] }}
                - <b>Conditions:</b> {{ $item['weather'] }} ({{ $item['description'] }})
                - <b>Wind speed:</b> {{ $item['wind_speed'] }}
                - <b>Direction:</b> {{ $item['wind_direction'] }} degrees<br>
            @endforeach
        @endforeach
    @endif
</div>
</body>
</html>
