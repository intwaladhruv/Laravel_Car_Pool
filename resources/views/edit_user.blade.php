<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/auth.css">
    <style>
        .form-container img {
            max-width: 100%;
            height: auto;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .form-container img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    @auth
        <!-- Header Section -->
        <header class="site-header">
            <nav class="navbar">
                <div class="logo">
                    <a href="/"><img src="/images/ride-share.png" alt="Ride Sharing"></a>
                </div>
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    @if ($user->role->name === 'driver')
                        <li><a href="/rides/create">Add Ride</a></li>
                        <li><a href="/rides">My Rides</a></li>
                    @else
                        <li><a href="/rides">Rides</a></li>
                        <li><a href="/bookings">My Bookings</a></li>
                    @endif
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </nav>
        </header>
        <div class="form-container">
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
            <div class="form-wrapper">
                <div class="form-column edit-user">
                    <h2>Edit User</h2>
                    <form action="/user/update" method="post">
                        @csrf
                        <input type="text" name="firstname" value="{{ $user->firstname }}" required>
                        <input type="text" name="lastname" value="{{ $user->lastname }}" required>
                        <input type="text" name="contact_number" value="{{ $user->contact_number }}" required>
                        <input type="email" name="email" value="{{ $user->email }}" disabled>
                        <select name="gender" disabled>
                            <option value="">{{ $user->gender }}</option>
                        </select>
                        @if ($user->role->name === 'driver')
                            <div id="driverControls">
                                <input type="text" name="driving_license_number" id="driving_license_number"
                                    placeholder="Driving License" value="{{ $user->driving_license_number }}">
                                <input type="text" name="expiry_date" id="expiry_date" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" placeholder="Expiry Date" value="{{ $user->expiry_date }}">
                            </div>
                        @endif
                        <button type="submit" name="update">Save</button>
                    </form>
                </div>
                @if ($user->role->name === 'driver')
                    <div class="form-column login">
                        <h2>Car</h2>
                        @if ($user->car === null)
                            <form action="/car/store" method="post" enctype="multipart/form-data">
                            @else
                                <form action="/car/update" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                        @endif
                        @csrf
                        <input type="text" name="brand" placeholder="Brand"
                            value="{{ $user->car ? $user->car->brand : '' }}" required><br>
                        <input type="text" name="model" placeholder="Model"
                            value="{{ $user->car ? $user->car->model : '' }}" required><br>
                        <input type="text" name="color" placeholder="Color"
                            value="{{ $user->car ? $user->car->color : '' }}" required><br>
                        <input type="number" name="year" placeholder="Year" min="1900" max="{{ date('Y') }}"
                            value="{{ $user->car ? $user->car->year : '' }}" required><br>
                        <input type="text" name="number" placeholder="Number"
                            value="{{ $user->car ? $user->car->number : '' }}" required><br>
                        <input type="file" name="photo" placeholder="Image"><br>
                        @if ($user->car !== null)
                            <img src="/storage/{{ $user->car->photo_name }}" alt="Car Photo">
                        @endif
                        <button type="submit" name="car_save">Submit</button>
                        </form>
                    </div>
                @endif
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
    @else
        <script>
            window.location = "/";
        </script>
    @endauth
</body>

</html>
