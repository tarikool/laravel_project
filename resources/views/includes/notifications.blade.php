@if( session('user_deleted') )

    <div class="alert alert-danger">
        {{ session( 'user_deleted' ) }}
    </div>

@endif

@if( session('user_updated') )

    <div class="alert alert-success">
        {{ session( 'user_updated' ) }}
    </div>

@endif

@if( session('user_created') )

    <div class="alert alert-success">
        {{ session( 'user_created' ) }}
    </div>

@endif
