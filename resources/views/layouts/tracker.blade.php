<!DOCTYPE html>

<html>
    <head>
    </head>

    <body>

    <header>
        @include('includes.header')
    </header>

<div class="content">
    <div class="container row">
            @yield('body')
    </div>
</div>

<footer>
    @include('includes.footer')
</footer>

</body>
</html>