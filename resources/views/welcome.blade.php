<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food & Socials</title>
        <link rel="shortcut icon" type="image/png" href="/img/favicon.png">

        <!-- Fonts -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>

            html, body {
                height: 100%;
            }
            body {
                display: flex;
                flex-direction: column;
            }
            #app {
                flex: 1 0 auto;
            }
            footer {
                flex-shrink: 0;
            }

        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>

        {{-- vue files (Single Page Application) --}}
        <div id="app">
            <App></App>
        </div>

        {{-- sticky footer --}}
        <footer class="w-100 text-center">
            <span class="h6 font-italic">The Awesome Company &copy; all rights reserved 2020</span>
        </footer>

    </body>
</html>
