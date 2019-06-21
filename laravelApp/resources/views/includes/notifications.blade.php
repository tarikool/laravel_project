@if( session('not_allowed') )
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'not_allowed' ) }}
    </div>
@endif




{{--//users--}}
@if( session('user_deleted') )
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'user_deleted' ) }}
    </div>
@endif

@if( session('user_updated') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'user_updated' ) }}
    </div>
@endif

@if( session('user_created') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'user_created' ) }}
    </div>
@endif





{{--//Posts--}}
@if( session('post_created') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'post_created' ) }}
    </div>
@endif

@if( session('post_updated') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'post_updated' ) }}
    </div>
@endif

@if( session('post_deleted') )
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'post_deleted' ) }}
    </div>
@endif



{{--//Category--}}
@if( session('categories_created') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'categories_created' ) }}
    </div>
@endif

@if( session('categories_updated') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'categories_updated') }}
    </div>
@endif

@if( session('category_deleted') )
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session( 'category_deleted' ) }}
    </div>
@endif





{{--//Photos--}}
@if( session('photo_created') )
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('photo_created') }}
    </div>
@endif

@if( session('photo_deleted') )
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('photo_deleted') }}
    </div>
@endif




{{--//Comment's Notification--}}
@if( session('comment_created'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('comment_created') }}
    </div>
@endif


@if( session('comment_approved') )
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('comment_approved') }}
    </div>
@endif

@if( session('comment_disapproved') )
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('comment_disapproved') }}
    </div>
@endif

@if( session('comment_deleted') )
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('comment_deleted') }}
    </div>
@endif

@if( session('commentReply_created') )
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('commentReply_created') }}
    </div>
@endif