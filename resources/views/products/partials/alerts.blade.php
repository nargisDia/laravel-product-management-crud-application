<div class="col-md-8 offset-md-2 mb-6" >
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="" role="alert">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item-danger list-group-item mb-1">
                        <span class="font-medium">Danger alert!</span> {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Your content here -->
</div>