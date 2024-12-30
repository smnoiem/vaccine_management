<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        /* Background styling */
        body {
            background-image: url('{{ asset('img/bgg1.jpg') }}');
            background-size: contain; /* Or remove this property */
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* White margin container */
        .white-margin-container {
            background-color: white; /* White background */
            padding: 40px; /* Space inside the container */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 90%; /* Responsive width */
            max-width: 800px; /* Maximum width */
        }

        /* Fade-in animation */
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Pop-up animation */
        .pop-up {
            animation: popup 1.5s ease-out;
        }

        @keyframes popup {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Styling for the heading */
        .heading {
            font-size: 3rem;
            font-weight: 800;
            color: #ff0303; /* Vibrant red */
            text-align: center;
            margin-bottom: 30px;
        }

        /* Styling for the instructional text */
        .instructions {
            font-size: 1rem;
            color: #4B5563; /* Gray */
            text-align: center;
            margin-top: 20px;
        }

        /* Styling for the login box */
        .login-box {
            font-size: 1rem;
            color: #4B5563; /* Gray */
            text-align: center;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- White Margin Container -->
    <div class="white-margin-container fade-in">
        <!-- Heading with Pop-Up Animation -->
        <div class="heading pop-up">
            Your Health Is Your Greatest Wealth!
        </div>

        <!-- Login Box -->
        <div class="login-box">
            <!-- Login Form -->
            {{ $slot }}
        </div>
    </div>
</body>
</html>
