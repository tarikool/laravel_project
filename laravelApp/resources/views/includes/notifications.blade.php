@if( session('not_allowed') )
    <div class="alert alert-danger">
        {{ session( 'not_allowed' ) }}
    </div>
@endif

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

@if( session('post_created') )
    <div class="alert alert-success">
        {{ session( 'post_created' ) }}
    </div>
@endif

@if( session('post_updated') )
    <div class="alert alert-success">
        {{ session( 'post_updated' ) }}
    </div>
@endif


@if( session('post_deleted') )
    <div class="alert alert-danger">
        {{ session( 'post_deleted' ) }}
    </div>
@endif


@if( session('categories_created') )
    <div class="alert alert-success">
        {{ session( 'categories_created' ) }}
    </div>
@endif

