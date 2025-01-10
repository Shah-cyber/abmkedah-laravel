<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/abm-logo.svg') }}">
    <title>{{ $title ?? 'Member Dashboard' }}</title>
</head>
 

<body>
    <!-- Member Sidebar -->
    @include('member.sidebar')
    
    <!-- Content Wrapper -->
    <div class="sm:ml-64">
        <!-- member Header -->
        @include('member.header')
    
        <!-- Main Content -->
        <main class="p-6 bg-white min-h-screen">
            {{ $slot }}
        </main>
    </div>
    
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
    </body>
    

</html>