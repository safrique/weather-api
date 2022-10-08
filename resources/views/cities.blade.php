@extends('layout')
@section('content')
    <h3>Cities</h3>

    @if(!empty($error))
        <h4 style="color: red">{{ $error }}</h4>
    @endif

    <table>
        <thead>
        <tr>
            <th>City</th>
            <th>Country</th>
            <th>State</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                @if(!empty($add))
                    <form action="/cities/store" method="post" class="form-group" style="width:70%;">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        @foreach(@$city as $key => $value)
                            <td>
                                <label class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ $value }}" name="{{ $key }}"
                                           value="{{ $value }}">
                                </label>
                            </td>
                        @endforeach
                        <td>
                            <button type="submit" value="Add city" class="btn btn-primary">Add</button>
                        </td>
                    </form>
                @else
                    @foreach($city as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                    <form action="{{ '/forecast/' . $city['city'] }}" method="get" class="form-group"
                          style="width:70%;">
                        <td>
                            <input type="hidden" name="city" value="{{ $city['city'] }}">
                            <button type="submit" value="Get Forecast" class="btn btn-primary">Get Forecast</button>
                        </td>
                    </form>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <form action="/forecast" method="get" class="form-group" style="width:70%;">
        <button type="submit" value="Get Forecast" class="btn btn-primary">Get All Forecasts</button>
    </form>
@endsection
