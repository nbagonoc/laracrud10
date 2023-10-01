<body class="bg-gray-200 p-5">
    <div class="lg:w-3/4 mx-auto bg-white p-5 rounded">
        @include("partials.navbar")
        @include("partials.message")
        @yield("content")
    </div>