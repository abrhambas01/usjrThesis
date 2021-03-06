<!doctype html>
<!--
  Built with Material Design 
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Delivering Free medicines with Mypharma">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Welcome</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="apple-mobile-web-app-title" content="Material Design Lite">

    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">

    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/iconfont/material-icons.css') }}">
    {{-- using layouts with m --}}
    <link rel="stylesheet" href="{{ asset('css/material.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/styles.css') }} ">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/animate.css@3.5.1/animate.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">

    @pwaManifest

    <script src="set('js/material.min.js') }}"></script>

    <script>
        window.App = {!! json_encode([
		'csrfToken' => csrf_token(),
		'user' => Auth::user(),
		'signedIn' => Auth::check()
	])
	!!};
    </script>


</head>
<body>
<!--
    Main Page is Mypharma.vue I just mounted it inside here..-->

<div id="app"></div>


<script src="{{ mix('js/app.js') }}"></script>


{{-- Include when using jetpack template --}}

{{-- <script src="{{ asset('dist/js/courier.js') }}"></script> --}}


@yield('scripts')
</body>
</html>
