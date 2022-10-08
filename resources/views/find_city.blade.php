@extends('layout')
@section('content')
    <div class="container">
        <h3 class="text-center">Search City</h3>
        <form action="/cities/search" method="post" class="form-group" style="width:70%;">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <label class="form-group">City Name:
                <input type="text" class="form-control" placeholder="City Name" name="city_name">
            </label>
{{--            <label class="form-group">Limit:--}}
{{--                <input type="text" class="form-control" placeholder="5" name="limit">--}}
{{--            </label>--}}
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection
