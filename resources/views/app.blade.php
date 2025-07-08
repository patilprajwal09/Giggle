<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laragigs</title>
    <!-- Add this inside the <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>

<body>
    @include('components.navbar')

    <div class="mb-5">
        @yield('content')
    </div>
    @include('components.footer')




    <!-- Add this before the closing </body> tag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HoA7aErCwRQmVhtXhiZ8zJH1CN3n0RXx6V9ZLQ7UX3MjyRBfAXPFlNHSm+K9FOnc" crossorigin="anonymous">
    </script>
</body>

</html>
