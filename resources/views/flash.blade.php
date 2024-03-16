@if(session('message'))
    <div class="alert alert-{{ session('alert-type') }} alert-dismissible" role="alert" id="session-alert">
        {{ session('message') }}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif