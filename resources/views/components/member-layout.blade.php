<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- member side bar -->
    @include('member.sidebar')

    <div class="p-4 sm:ml-64">
        {{$slot}}
    </div>

    @stack('scripts')
</body>

</html>