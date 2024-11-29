<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- member side bar -->
    @include('non-member.header')

    <!-- Main Content -->
    <main>
        {{$slot}}
    </main>

    <!-- Include the Registration Modal -->
    @include('non-member.registration')
    @include('non-member.login')


    @stack('scripts')

</body>

</html>