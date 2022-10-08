<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities</title>
</head>
<body>
<div class="container">
    <h3 class="text-center">Search City</h3>
    <form action="/cities/search" method="post" class="form-group" style="width:70%;">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <label class="form-group">City Name:
            <input type="text" class="form-control" placeholder="City Name" name="city_name">
        </label>
        <label class="form-group">Limit:
            <input type="text" value="5" class="form-control" placeholder="5" name="limit">
        </label>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
</body>
</html>
