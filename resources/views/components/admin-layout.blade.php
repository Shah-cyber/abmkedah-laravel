<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- admin side bar -->
    @include('admin.sidebar')

    <div class="p-4 sm:ml-64">
        {{$slot}}
    </div>

</body>

</html>