
@if(count($errors) > 0)

    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
               <strong></strong> {{ $error }}
    </div>

   	@endforeach
@endif


@if (session('error'))
    <div role="alert" class="alert alert-danger" role="alert">
       	<strong></strong> {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div role="alert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif