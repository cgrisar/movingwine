<html>
<head>
    <!-- references to css -->
    <link href="css/semantic/semantic.css" rel="stylesheet">

    <!-- references to scripts -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/semantic.js" type="text/javascript"></script>
</head>

<body>

    <div class="ui page">

        @yield('partials.menu')

        @yield('content')

    </div>

    <!-- activate the semantic elements -->
    <script>
        $('.ui.dropdown')
                .dropdown();
    </script>
</body>
</html>