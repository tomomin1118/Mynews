<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
         {{--　後の章で説明 --}}
        <meta name="csrf-token" content="{{csrf_token() }}">
        
        {{--各ページごとにtitleタグを入れるために@yieldで空けておく--}}
        <title>@yield('title')</title>
        
        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavescriptを読み込む --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込む --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            
            <nav class="navber navber-expand-md navber-dark navber-laravel">
                <div class="container">
                    <a class="navber-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                        <button class="navber-toggler" type="button" data-toggle="collapse" data-target='#navberSupportedContent" aria-controls="navberSupportedContent" aria-expanded="false" aria-label="Toggle nevigation">
                        <span class="navber-toggler-icon"></span>
                    /button>
                    
                    <div class="collapse navber-collapse" id="navberSupportedContent">
                        <!-- Left Side of Navber -->
                        <ul class="navber-nav mr-auto">
                        </ul>
                    
                        <!-- Right Side of Navber -->
                        <ul class="navber-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
    
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldを空けておく --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>