<!DOCTYPE html>
<html lang="en">

<head>
    @include('theme.partials.head')
</head>

<body>

@include('theme.partials.navbar')

@include('theme.partials.slider')

<main id="main">
@yield('content')
</main><!-- End #main -->

@include('theme.partials.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('theme.partials.scripts')

</body>

</html>
