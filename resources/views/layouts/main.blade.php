<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <!-- Include Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include your CSS and JavaScript links here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto text-white">
            <!-- Add your navigation content here -->
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto my-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 text-white">
        <div class="container mx-auto text-center">
            <!-- Add your footer content here -->
        </div>
    </footer>

</body>
</html>
