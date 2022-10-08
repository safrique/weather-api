<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities</title>
</head>
<body>
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
    @foreach($cities as $city)
        <tr>
            @if(!empty($add))
                <form action="/cities/store" method="post" class="form-group" style="width:70%; margin-left:15%;">
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
                @foreach($city as $field)
                    <td>{{ $field }}</td>
                @endforeach
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
