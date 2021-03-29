<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.24/datatables.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"/>
</head>
    @yield('head')
<body>
    <div class="content-wrapper">
    @yield('content')
    </div>


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.24/datatables.min.js"></script>


        @yield('stripts')

</body>

</html>
