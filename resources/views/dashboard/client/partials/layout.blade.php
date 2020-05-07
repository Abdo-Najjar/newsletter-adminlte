<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


{{-- include the header that has css and title --}}
@include('dashboard.client.partials.header')

<body class="layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

    <!-- Navbar -->
    @include('dashboard.client.partials.nav')
    <!-- /.navbar -->

        <div class="container">
            @yield('content')
        </div>

    <!-- Main Footer -->
    @include('dashboard.client.partials.footer')