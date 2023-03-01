<!doctype html>
<html>

<head>
    @platformHead(before)
    @platformHead(after)
</head>

<body class="{{ theme_class() }}" :class="themeDark && 'theme-dark'" x-data="{ themeDark: false }">
    @platformBody(before)
    <div class="page">
        <!-- Sidebar -->
        @include('theme::share.sidebar')
        @include('theme::share.header')
        <div class="page-wrapper">
            @yield('content')
            
        </div>
    </div>
    @platformBody(after)
</body>

</html>
