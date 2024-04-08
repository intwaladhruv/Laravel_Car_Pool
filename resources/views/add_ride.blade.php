<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Ride</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        /* Container styles */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Form input styles */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="time"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        /* Submit button styles */
        button[type="submit"] {
            background-color: #3CBC8D;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2b9660;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add a New Ride</h1>
        <form action="{{ route('rides.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="start">Start Location:</label>
                <input type="text" name="start" id="start">
            </div>
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" name="destination" id="destination">
            </div>
            <div class="form-group">
                <label for="start_at">Start Time:</label>
                <input type="time" name="start_at" id="start_at">
            </div>
            <div class="form-group">
                <label for="seats">Available Seats:</label>
                <input type="number" name="seats" id="seats">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.1" name="price" id="price">
            </div>
            <button type="submit">Add Ride</button>
        </form>
    </div>
</body>
</html>
