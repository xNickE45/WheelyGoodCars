<!DOCTYPE html>
<html>
<head>
    <title>Car Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .details {
            margin-top: 20px;
        }
        .details th, .details td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Car Details</h1>
        <table class="details">
            <tr>
                <th>License Plate:</th>
                <td>{{ $car->license_plate }}</td>
            </tr>
            <tr>
                <th>Make:</th>
                <td>{{ $car->make }}</td>
            </tr>
            <tr>
                <th>Brand:</th>
                <td>{{ $car->brand }}</td>
            </tr>
            <tr>
                <th>Model:</th>
                <td>{{ $car->model }}</td>
            </tr>
            <tr>
                <th>Price:</th>
                <td>${{ $car->price }}</td>
            </tr>
            <tr>
                <th>Mileage:</th>
                <td>{{ $car->mileage }} km</td>
            </tr>
            <tr>
                <th>Seats:</th>
                <td>{{ $car->seats }}</td>
            </tr>
            <tr>
                <th>Doors:</th>
                <td>{{ $car->doors }}</td>
            </tr>
            <tr>
                <th>Production Year:</th>
                <td>{{ $car->production_year }}</td>
            </tr>
            <tr>
                <th>Weight:</th>
                <td>{{ $car->weight }} kg</td>
            </tr>
            <tr>
                <th>Color:</th>
                <td>{{ $car->color }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
