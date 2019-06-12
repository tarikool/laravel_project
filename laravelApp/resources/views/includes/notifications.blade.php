@if( session('not_allowed') )
    <div class="alert alert-danger">
        {{ session( 'not_allowed' ) }}
    </div>
@endif




{{--//users--}}
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





{{--//Posts--}}
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



{{--//Category--}}
@if( session('categories_created') )
    <div class="alert alert-success">
        {{ session( 'categories_created' ) }}
    </div>
@endif

@if( session('categories_updated') )
    <div class="alert alert-success">
        {{ session( 'categories_updated') }}
    </div>
@endif

@if( session('category_deleted') )
    <div class="alert alert-danger">
        {{ session( 'category_deleted' ) }}
    </div>
@endif





{{--//Photos--}}
@if( session('photo_created') )
    <div class="alert alert-success">
        {{ session('photo_created') }}
    </div>
@endif

@if( session('photo_deleted') )
    <div class="alert alert-danger">
        {{ session('photo_deleted') }}
    </div>
@endif
