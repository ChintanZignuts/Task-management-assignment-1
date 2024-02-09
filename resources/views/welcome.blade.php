<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Reset some default styles and apply base styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Figtree, sans-serif;
            line-height: 1.5;
            color: #1a202c;
            background-color: #f9fafb;
        }

        /* Container for login and register links */
        .auth-links {
            position: fixed;
            top: 0;
            right: 0;
            padding: 1rem;
            text-align: right;
            z-index: 10;
        }

        /* Main content container */
        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Task Management title styles */
        .title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* Description styles */
        .description {
            font-size: 1.2rem;
            color: #4b5563;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Button container styles */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
        }

        /* Individual button styles */
        .button {
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            margin-right: 1rem;
            cursor: pointer;
            text-decoration: none;

            transition: background-color 0.3s ease;
        }

        /* Primary button styles */
        .primary-button {
            background-color: #38a169;
            color: #fff;
        }

        /* Secondary button styles */
        .secondary-button {
            background-color: transparent;
            border: 2px solid #38a169;
            color: #38a169;

        }

        /* Button hover effect */
        .button:hover {
            background-color: #4caf50;
            color: white
        }
    </style>
</head>

<body class="antialiased">

    <div class="auth-links">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/tasks') }}" class="font-semibold text-gray-600 hover:text-gray-900">Tasks</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="main-content">
        <div class="bg-white p-8 rounded-lg shadow-md md:w-2/3 lg:w-1/2 xl:w-1/3">

            <h1 class="title">Task Management</h1>

            <p class="description">Organize your tasks efficiently with our powerful task management system.</p>

            <div class="button-container">

                <a href="{{ route('register') }}" class="button primary-button text-xl font-bold">Get Started</a>

                <a href="{{ route('login') }}" class="button secondary-button text-xl font.">Login</a>
            </div>
        </div>
    </div>
</body>

</html>
