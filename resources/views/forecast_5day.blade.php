@extends('layout')
@section('content')
    <div class="container">
        <h3 class="text-center">Forecast</h3>

        @if (!empty($error))
            <h4 style='color: red'>{{ $error }}</h4>
        @endif

        @if (!empty($forecasts))
            @foreach($forecasts as $forecast)
                <h4>{{ $forecast['city'] }} ({{ $forecast['country'] }})</h4>

                <table>
                    <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Temp</th>
                        <th>Feels like</th>
                        <th>Conditions</th>
                        <th>Wind speed</th>
                        <th>Direction</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($forecast['forecast'] as $item)
                        <tr>
                            <td> {{ $item['date_time'] }}</td>
                            <td> {{ $item['temp'] }} &#8457</td>
                            <td> {{ $item['feels_like'] }} &#8457</td>
                            <td> {{ $item['weather'] }} ({{ $item['description'] }})</td>
                            <td> {{ $item['wind_speed'] }}</td>
                            <td> {{ $item['wind_direction'] }} degrees</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
@endsection
