<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Ride</title>
    <link rel="stylesheet" href="/css/index.css">
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
            margin: 20px auto;
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

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 24px 24px;
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
    <!-- Header Section -->
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="/images/ride-share.png" alt="Ride Sharing"></a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                @auth
                    <li><a href="/rides">Rides</a></li>
                    <li><a href="/user/edit">Edit User</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login/Sign Up</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <div class="container">
        @if (auth()->user()->car === null)
            <script>
                alert('Need a car to add ride')
                window.location.href = "/user/edit";
            </script>
        @endif
        @if ($errors->any())
            <div class="error-section">
                <div class="error-message">
                    <h3>Errors</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <h1>Add a New Ride</h1>
        <form action="{{ route('rides.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="start">Start Location:</label>
                <input type="text" name="start" id="start" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" name="destination" id="destination" required>
            </div>
            <div class="form-group">
                <label for="start_at">Start Time:</label>
                <input type="time" name="start_at" id="start_at" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>
            </div>
            <div class="form-group">
                <label for="seats">Available Seats:</label>
                <input type="number" name="seats" id="seats" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.1" name="price" id="price" required>
            </div>
            <button type="submit">Add Ride</button>
        </form>
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
