<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <title>My Rides</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            box-sizing: border-box;
            /* Ensure padding is included in the element's total width */
        }

        .box {
            padding: 10px;
            box-sizing: border-box;
        }

        h1 {
            margin-left: 30px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            /* Allow flex items to wrap to the next line */
            justify-content: space-between;
            /* Distribute flex items evenly across the container */
            max-width: 1200px;
            /* Limit the maximum width of the container */
            margin: 0 auto;
            /* Center the container horizontally */
        }

        .ride {
            border: 1px solid #ccc;
            padding: 20px;
            /* Increase padding for better spacing */
            margin-bottom: 20px;
            /* Add margin between ride items */
            width: calc(33.33% - 20px);
            /* Limit flex items to one-third of the container width with margins */
            box-sizing: border-box;
            /* Ensure padding is included in the element's total width */
            background-color: #fff;
            /* Add a background color to rides for better contrast */
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <a href="/">RideShareLanding</a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                @auth
                    <li><a href="/rides">My Ride</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login/Sign Up</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <div class="box">
        <h1>Rides</h1>
        <div class="container">
            @foreach ($rides as $ride)
                <div class="ride">
                    {{-- <img src="data:image/jpeg;base64,<?php echo base64_encode($i['image']); ?>" alt="Property Image" width="150"> --}}
                    <strong>{{ ucfirst($ride->start) }} - {{ ucfirst($ride->destination) }}</strong>
                    <p>Date: {{ $ride->date }}</p>
                    <p>Start time: {{ $ride->start_at }}</p>
                    <p>Available seats: {{ $ride->seats }}</p>
                    <p>Price: ${{ $ride->price }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-about">
                <h3>About RideShareLanding</h3>
                <p>Connecting journeys, creating experiences. Join us and make every trip an adventure.</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/#hero">Home</a></li>
                    <li><a href="/#about">About Us</a></li>
                    <li><a href="/#features">Our Features</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 RideShareLanding. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
