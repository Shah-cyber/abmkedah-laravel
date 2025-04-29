<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Page Title -->
    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.min.js"></script>

    <!-- Add any custom CSS or other assets -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/abm-logo.svg') }}">
     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">
    <!-- Admin Sidebar -->
    @include('admin.sidebar')

    <!-- Content Wrapper -->
    <div class="sm:ml-64">
        <!-- Admin Header -->
        @include('admin.header')

        <!-- Main Content -->
        <main class="p-6 bg-white min-h-screen">
            {{ $slot }}
        </main>
    </div>

    

  

    <script src="{{ asset('admin/adminFeeCollection.js') }}"></script>
    
</body>

</html>


