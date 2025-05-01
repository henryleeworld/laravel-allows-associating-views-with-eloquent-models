<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        @vite(['resources/sass/app.scss'])
    </head>
    <body>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Created at') }}</th>
                        <th>{{ __('Views today') }}</th>
                        <th>{{ __('Views last 30 days') }}</th>
                        <th>{{ __('Views last 90 days') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ views($post)->period(\CyrildeWit\EloquentViewable\Support\Period::since(today()))->count() }}</td>
                            <td>{{ views($post)->period(\CyrildeWit\EloquentViewable\Support\Period::pastDays(30))->count() }}</td>
                            <td>{{ views($post)->period(\CyrildeWit\EloquentViewable\Support\Period::pastDays(90))->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </body>
</html>
