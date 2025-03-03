<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/abm-logo.svg') }}">
    <title>ABMK Management System</title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>