@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<section class="news-main container">
		<h3 class="title">资讯</h3>
		<ul class="nav-child hidden-xs">
			<li class="{!! $category->slug == 'news' ? 'active' : ''  !!}"> <a href="/cat/news">全部</a></li>
			@foreach($cats as $cat)

				<li class="@if($category->id == $cat->id) active @endif">
					<a href="/cat/{!! $cat->id !!}">{!! $cat->name !!}</a>
				</li>

			@endforeach
		</ul>
		<ul class="nav-child row visible-xs">
			 <li class="col-xs-4 {!! $category->slug == 'news' ? 'active' : ''  !!}"> <a href="/cat/news">全部</a></li>
			@foreach($cats as $cat)

				<li class="col-xs-4 @if($category->id == $cat->id) active @endif">
					<a href="/cat/{!! $cat->id !!}">{!! $cat->name !!}</a>
				</li>

			@endforeach
		</ul>
		<div class="row news-list">
			@foreach($posts as $post)
				<a href="/post/{!! $post->id !!}" style="display: block;" class="col-md-6 col-sm-6">
					<div class="item">
						<div class="img-box">
							<img onerror="javascript:this.src='{{asset('images/new1.jpg')}}';" src="{!! $post->image !!}" class="lazy img-rounded" alt="" data-original="{!! $post->image !!}">
						</div>
						<h4>{!! $post->name !!}</h4>
						<div class="remark">
							<span class="total">{!! $post->view !!}</span>
							<span class="time">{!! time_parse($post->created_at)->format('Y-m-d') !!}</span>
						</div>
						<div class="more">
							<span>查看更多</span>
						</div>
					</div>
				</a>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</section>
@endsection

@section('script')

@endsection