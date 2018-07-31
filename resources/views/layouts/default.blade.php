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
                <div id="left-content">
                    @yield('body')
                </div>
                    @include('includes.sidebar')
            </div>
        </div>

        <footer>
            @include('includes.footer')
        </footer>

    </body>
</html>