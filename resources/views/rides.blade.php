<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <title>My Rides</title>
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Container for rides */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Heading styles */
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Alternate row background color */
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3CBC8D;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2b9660;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <a href="#hero">RideShareLanding</a>
            </div>
            <ul class="nav-links">
                <li><a href="/#hero">Home</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="/#features">Features</a></li>
                @auth
                    <li><a href="/rides/create">Add Ride</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login/Sign Up</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Rides</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Start Location</th>
                    <th>Destination</th>
                    <th>Start Time</th>
                    <th>Available Seats</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rides as $ride)
                    <tr>
                        <td>{{ $ride->id }}</td>
                        <td>{{ $ride->start }}</td>
                        <td>{{ $ride->destination }}</td>
                        <td>{{ $ride->start_at }}</td>
                        <td>{{ $ride->seats }}</td>
                        <td>{{ $ride->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
