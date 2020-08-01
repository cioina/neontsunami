<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{!! isset($title) ? e($title) . " &mdash; Neon Tsunami" : "Neon Tsunami" !!}</title>
    <link rel="stylesheet" href="{{ config('app.url').mix('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <meta name="description" content="{!! $description or 'A blog on web development, focused on frameworks like Swift, Laravel, Ruby on Rails and Angular by Dwight Watson.' !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta property="og:site_name" content="Neon Tsunami">
    @yield('head')

    <meta name="csrf-param" content="_token"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

   </head>
  <body class="{{ controller_name() }} {{ action_name() }}">
    <div id="app" class="container">
