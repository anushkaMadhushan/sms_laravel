@if (!empty(session('success')))
    <div class="alert alert-success" role="alert">
        {{ session('sucees') }}
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
