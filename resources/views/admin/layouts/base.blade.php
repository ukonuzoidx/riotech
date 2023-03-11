<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('backend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="{{ asset('backend/assets/css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet" />

</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @yield('section')
</body>
@stack('script')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<script src="https://unpkg.com/@popperjs/core@2"></script>

<!-- plugin for scrollbar  -->
<script src="{{ asset('backend/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('backend/assets/js/choice.js') }}" async></script>
<script src="{{ asset('backend/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4') }}" async></script>

</html>