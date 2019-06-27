@extends('front.partial.base')

@section('css')
	<style type="text/css">
		.news-main .shengtai-list .row .col-md-4 .shengtai-item{
			margin-bottom: 25px;
		}
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<div class="container news-main">
		<h3 class="title">生态</h3>
		<ul class="nav-child row visible-xs">
			<li class="col-xs-4 {!! $category->slug == 'shengtai' ? 'active' : ''  !!}"> <a href="/cat/shengtai">全部</a></li>
			@foreach($cats as $cat)

				<li class="col-xs-4  @if($category->id == $cat->id) active @endif">
					<a href="/cat/{!! $cat->id !!}">{!! $cat->name !!}</a>
				</li>

			@endforeach
		</ul>
		<ul class="nav-child hidden-xs">
			<li class="{!! $category->slug == 'shengtai' ? 'active' : ''  !!}"> <a href="/cat/shengtai">全部</a></li>
			@foreach($cats as $cat)

				<li class="@if($category->id == $cat->id) active @endif">
					<a href="/cat/{!! $cat->id !!}">{!! $cat->name !!}</a>
				</li>

			@endforeach
		</ul>
		<div class="shengtai-list">
			<div class="row">

				@foreach($posts as $post)
					<div class="col-md-4 col-sm-6">
						<a href="/post/{!! $post->id !!}" traget="_blank" class="shengtai-item media">
							<div class="media-left media-middle" >
									<img class="media-object" onerror="javascript:this.src='{{asset('images/community.jpg')}}';" src="{!! $post->image !!}" alt="">
							</div>
							<div class="media-body media-middle">
								<div class="media-heading">
									{!! $post->name !!}
								</div>
							</div>
						</a>
					</div>
				@endforeach

			</div>
		</div>
	</div>
@endsection