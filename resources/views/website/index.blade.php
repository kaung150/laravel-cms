@extends('layout.website')

@section('title', 'KaungMinDaily')

@section('content')




<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>The News Posts</h1>
          <p>Fake news is cheap to produce. Genuine journalism is expensive.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">

			@if(count($posts) > 0)

			@foreach($posts as $post)
              <div class="post">
                <div class="post-media post-thumb">
                  <a href="{{route('website.posts.show', $post->id)}}">
                    <img src="{{$post->gallery->image}}" alt="">
                  </a>
                </div>
                <h3 class="post-title"><a href="#">{{$post->title}}</a></h3>
                <div class="post-meta">
                  <ul>
				  <i class="ion-android-people"></i> {{$post->user->name}}
                    <li>
                      <i class="ion-calendar"></i>
                      {{$post->created_at->diffForHumans()}}
                    </li>
                    <li>
                      <a href="#"><i class="ion-pricetags"></i>    
                     
                      {{$post->category->name}}
                    </a>
                    </li>

                  </ul>
                </div>
                <div class="post-content">
                  <p>{!!Str::limit($post->description, 400)!!}</p>
                  <a href="{{route('website.posts.show', $post->id)}}" class="btn btn-main d-block w-25 mt-3">Continue Reading</a>
                </div>
              </div>
          @endforeach

			@else
			<h2 class="text-center text-danger mt-5">No Posts Added Yet!</h2>
			@endif

				

				{{ $posts->links() }}


				</div>
				<div class="col-lg-4">
					<div class="pl-0 pl-xl-4">
						<aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
							<!-- Widget Latest Posts -->
							<div class="widget widget-latest-post">
								<h4 class="widget-title">Latest Posts</h4>
								

								@if(count($latestPosts) > 0)

									@foreach($latestPosts as $latestPost)
									<div class="media">
										<a class="pull-left" href="{{route('website.posts.show', $latestPost->id)}}">
											<img class="media-object" src="{{$latestPost->gallery->image}}" alt="Image">
										</a>
										<div class="media-body">
											<h4 class="media-heading"><a href="{{route('website.posts.show', $latestPost->id)}}">{{$latestPost->title}}</a></h4>
											<p>{!!Str::limit($latestPost->description, 40)!!}</p>
										</div>
									</div>

									@endforeach

								@else

								<h6 class="text-center text-danger">No Posts Added Yet!</h6>
								
								@endif

								
						</div>
	<!-- End Latest Posts -->

	<!-- Widget Category -->
	<div class="widget widget-category">
		<h4 class="widget-title">Categories</h4>
		@if(count($categories) > 0)
			@foreach($categories as $category)
			<ul class="widget-category-list">
			<li>
				<a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
			</li>


		</ul>

			@endforeach
		@else
		<h6 class="text-center text-danger" style="text-decoration: none">No Categories Found</h6>
		@endif
	</div> <!-- End category  -->







</aside>
					</div>
				</div>
		</div>
	</div>
</div>


@endsection