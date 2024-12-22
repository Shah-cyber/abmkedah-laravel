<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.min.js"></script>
</head>

<body>
    <!-- admin side bar -->
    @include('admin.sidebar')
    <div class="sm:ml-64">
        @include('admin.header')
        <main class="mt-4">
            {{$slot}}
        </main>
    </div>

</body>

</html>