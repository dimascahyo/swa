<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page['name'] }}</title>
    @vite('resources/css/app.css')
</head>
<body class="">
    <x-header />
    <div class="flex w-screen h-screen">
        <x-side-bar>
            {{ $page['name'] }}
        </x-side-bar>
        <x-content>{{ $page['description'] }}</x-content>
    </div>
    <x-footer/>
</body>
</html>