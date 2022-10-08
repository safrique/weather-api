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
    <h2 class="text-center">Add City</h2>
    <br>
    <form action = "/create" method = "post" class="form-group" style="width:70%; margin-left:15%;">

        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

        <label class="form-group">First Name:</label>
        <input type="text" class="form-control" placeholder="First Name" name="first_name">
        <label>Last Name:</label>
        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
        <label>City Name:</label>
        <select class="form-control" name="city_name">
            <option value="bhubaneswar">Bhubaneswar</option>
            <option value="cuttack">Cuttack</option>
        </select>
        <label>Email:</label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email"><br>
        <button type="submit"  value = "Add student" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
