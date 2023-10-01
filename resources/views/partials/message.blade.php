<div class="message-container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="error-message">
                <p>{{$error}}</p>
            </div>
        @endforeach
    @endif

    @if(session()->has('success'))
        <div class="success-message">
            <p>{{session('success')}}</p>
        </div>
    @endif
</div>