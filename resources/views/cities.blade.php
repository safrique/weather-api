@extends('layout')
@section('content')
    <h3>Cities</h3>

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
        @if(is_countable($cities))
            @foreach($cities as $city)
                <tr>
                    @if(!empty($add))
                        <form action="/cities/store" method="post" class="form-group" style="width:70%;">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            @foreach(@$city as $key => $value)
                                <td>
                                    <label class="form-group">
                                        <input type="text" class="form-control" placeholder="{{ $value }}"
                                               name="{{ $key }}"
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
                        <td style='white-space: nowrap; width: 12%'>
                            <form action="{{ '/forecast/' . $city['city'] }}" method="get" class="form-group"
                                  style="padding: 5px;">
                                <input type="hidden" name="city" value="{{ $city['city'] }}">
                                <button type="submit" value="Get Forecast" class="btn btn-primary">Get Forecast</button>
                            </form>
                            <form action="/cities/delete" method="post" class="form-group" style="padding: 5px;">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="city" value="{{ $city['city'] }}">
                                <button type="submit" value="Delete" class="btn btn-primary">Delete City</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        @else
            <div style="color: red; font-weight: bold; margin-bottom: 5px">
                {{ $cities }}
            </div>
        @endif
        </tbody>
    </table>

    @if(empty($add))
        <br>
        <form action="/forecast" method="get" class="form-group" style="width:70%;">
            <button type="submit" value="Get Forecast" class="btn btn-primary">Get All Forecasts</button>
        </form>
    @endif
@endsection
