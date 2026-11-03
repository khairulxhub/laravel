<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.header')

</head>

<body>

<div class="wrapper">

    @include('layouts.sidebar')

    <div class="main">

        @include('layouts.navbar')

        <main class="content">

            @yield('content')

        </main>

        @include('layouts.footer')

    </div>

</div>

<script src="{{ asset('assets/js/app.js') }}"></script>

@stack('scripts')

</body>
</html>