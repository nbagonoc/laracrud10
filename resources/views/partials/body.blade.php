<body>
    <div class="container mx-auto">
        @include("partials.navbar")
        @include("partials.message")
        @yield("content")
    </div>