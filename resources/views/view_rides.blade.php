<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title>My Rides</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .box {
            padding: 10px;
            box-sizing: border-box;
        }

        h1 {
            margin-left: 30px;
        }

        .rides-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            max-width: 1200px;
            margin: 0 auto;
        }

        .ride {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            background-color: #fff;
        }

        button {
            display: inline-block;
            padding: 8px 17px;
            font-size: 12px;
            color: #fff;
            background-color: #0074D9;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            opacity: 0.5;
        }

        .search-section * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .search-section {
            background-image: url('/images/back.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 100px;
            padding-bottom: 100px;
        }

        .search-container {
            display: flex;
            gap: 10px;
        }

        .search-container input[type="text"],
        .search-container input[type="date"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
        }

        .search-container #submit-button {
            padding: 10px 20px;
            background-color: #0074D9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-container input::placeholder {
            color: #999;
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
                    <li><a href="/bookings">My Bookings</a></li>
                    <li><a href="/user/edit">Edit User</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login/Sign Up</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <h1>Rides</h1>
    <div class="search-section">
        <div class="search-container">
            <form action="/search/rides" method="post">
                @csrf
                <input type="text" name="start" id="start" value="{{isset($fields) ? $fields['start'] : ''}}" placeholder="From">
                <input type="text" name="destination" id="destination" value="{{isset($fields) ? $fields['destination'] : ''}}" placeholder="To">
                <input type="text" name="date" id="date" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{isset($fields) ? $fields['date'] : ''}}"
                    placeholder="Ride Date">
                <button id="submit-button">Submit</button>
            </form>
        </div>
    </div>
    <div class="box">
        <div class="rides-container">
            @foreach ($rides as $ride)
                <div class="ride">
                    <strong>{{ ucfirst($ride->start) }} - {{ ucfirst($ride->destination) }}</strong>
                    <p>Car: {{ $ride->user->car->to_string() }}</p>
                    <p>Date: {{ $ride->date }}</p>
                    <p>Start time: {{ $ride->start_at }}</p>
                    <p>Available seats: {{ $ride->seats }}
                        @if ($ride->seats === 0)
                            <span style="color: red;">(unavailable)</span>
                        @endif
                    </p>
                    <p>Price: ${{ $ride->price }}</p>
                    <button onclick="window.location.href='/bookings/{{ $ride->id }}/create'"
                        @if ($ride->seats === 0) disabled @endif>
                        Book
                    </button>
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
    <script>
        const startInput = document.getElementById('start');
        const destinationInput = document.getElementById('destination');
        const rideDateInput = document.getElementById('date');
        const submitButton = document.getElementById('submit-button');

        submitButton.disabled = true;
        // Event listener for input fields
        [startInput, destinationInput, rideDateInput].forEach(input => {
            input.addEventListener('input', validateForm);
        });

        function validateForm() {
            const startValid = startInput.value.length >= 3;
            const destinationValid = destinationInput.value.length >= 3;
            const rideDateValid = new Date(rideDateInput.value) > new Date();
            
            submitButton.disabled = !((startValid && destinationValid) || rideDateValid);
        }
    </script>
</body>

</html>
