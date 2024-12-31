<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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
</body>

</html>