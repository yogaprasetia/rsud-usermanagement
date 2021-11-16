@if (Session::has('success'))
<div class="container pd-1 pb-1">
    <div class="row">
        <div class="col md-8 m-auto pd-1 pb-1">
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
</div>
@endif

@if (count($errors) > 0)
<div class="row ml-3 mr-3">
    <div class="col-md-12 m-auto pd-1 pb-1">
        <div class="alert alert-danger" role="alert">
            <strong>Error:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif