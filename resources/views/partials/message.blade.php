<div class="message-container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="error-message">
                <p class="text-red-500">{{$error}}</p>
            </div>
        @endforeach
    @endif

    @if(session()->has('success'))
        <div class="success-message">
            <p class="text-green-600">{{session('success')}}</p>
        </div>
    @endif
</div>