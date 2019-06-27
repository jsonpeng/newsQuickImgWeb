@extends('front.partial.base')

@section('css')
<style type="text/css">
	.home-live-main{
		max-height: 600px;
		overflow-y: scroll;
	}
	.home-live-main::-webkit-scrollbar{width:3px;}
	.home-live-main::-webkit-scrollbar-track { background: #ddd; }
	.home-live-main::-webkit-scrollbar-thumb { background: #1976d3; }
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')
	<section class="main container">
		<div class="left-content pull-left">
			<div class="today-recommend">
				<h3 class="title">今日推荐</h3>
				@if(count($index_top_guanggao))
					<div class="ads row">
						@foreach($index_top_guanggao as $banner)
							<a href="{!! $banner->link !!}" class="ad col-xs-6" target="_blank">
								<img src="{!! $banner->image !!}"  onerror="javascript:this.src='{{asset('images/ad-1.jpg')}}';" alt="" class="img-responsive">
								<span>广告</span>
							</a>
						@endforeach
					</div>
				@endif

				@if(count($hot_posts))
				<?php $count = count($hot_posts);?>
					<div id="slide" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php $i=0; ?>
							@foreach($hot_posts as $post)
								
							    <li data-target="#slide" data-slide-to="{!! $i !!}" @if($i==0) class="active" @endif></li>
								<?php ++$i; ?>
						    @endforeach
						</ol>
						<div class="carousel-inner" role="listbox">
							<?php $k=0;?>
							@foreach($hot_posts as $post)
								<?php $k++;?>
							    <a class="item @if($k==1) active @endif" href="/post/{!! $post->id !!}" target="_blank">
							      	<img src="{!! $post->image !!}" onerror="javascript:this.src='{{asset('images/slide1.jpg')}}';" alt="">
								    <div class="carousel-caption tl">
								       	<p>
								       		{!! $post->name !!}
								       		<span>0{!! $k !!}/<small>0{!! $count !!}</small></span>
								       	</p>
								    </div>
							    </a>
							@endforeach
						</div>
					</div>
				@endif

				@if(count($index_bottom_guanggao))
					<div class="recommend-ad hidden-xs">

						@foreach($index_bottom_guanggao as $item)
							<a href="{!! $item->link !!}" class="media col-md-6 col-sm-6" target="_blank">
							    <img class="img-responsive" src="{{ $item->image }}" alt="">
							</a>
						@endforeach
						<div class="clearfix"></div>
					</div>
				@endif

			</div>

			<!--头条-->
			@if(count($top_posts))
				<div class="headline-news">
					<h3 class="title">
						头条
						{{-- <a href="">更多</a> --}}
					</h3>
					<div class="news-list">
						@foreach($top_posts as $post) 
					
							<a href="/post/{!! $post->id !!}" class="news-item media @if($post->is_top) zhiding @endif">
								<div class="media-left">
									<div class="img-box">
										<img  onerror="javascript:this.src='{{ $post->image }}';" src="{!! get_post_custom_value_by_key($post,'top_img_src') !!}" alt="" class="img-responsive">
									</div>
								</div>
								<div class="media-body">
									<h4 class="media-heading">
										{!! $post->name !!}
									</h4>
									<div class="total">{!! $post->view !!}</div>
									<p class="hidden-xs">
										{!! des($post->brief,120) !!}
									</p>
									<div class="user">
										<span class="user-time">{!!  time_parse($post->created_at)->format('Y-m-d') !!}</span>
										<span class="user-name">{!! $post->Author !!}</span>
										<span class="more pull-right hidden-xs">查看更多</span>
									</div>

								</div>
							</a>
						@endforeach
					{{-- 	<div class="get-more hidden-xs">
							<a href="javascript:;"></a>
						</div> --}}
					</div>
				</div>
			@endif
		</div>

		
			<div class="right-content pull-right">
				@if(count($quick_news))
					<div class="flash">
						<h3 class="title">
							快讯
							<a href="/cat/quick-news">更多</a>
						</h3>
						<div class="home-live-main">

							@foreach($quick_news as $news)
								<div class="home-live-item media">
						            <div class="media-left">
							            {!! time_parse($news->created_at)->format('h:i') !!}
							            <p>{!! time_parse($news->created_at)->format('m月d') !!}</p>
							        </div>
						            <div class="media-body content">
						                <div class="media-heading home-live-title">{!! $news->name !!}</div>
						                <div class="home-live-p">{!! $news->KuaiXunLimit !!}</div>
						                <div class="live-point">
							                <span class="like" onclick="addlike(this,'like',{!! $news->id!!})">利好 <em>{!! $news->like  !!}</em></span>
							                <span class="dtlike" onclick="addlike(this,'dislike',{!! $news->id!!})">利空 <em>{!!  $news->dislike !!}</em></span>
							            </div>
						            </div>
						        </div>
					     	@endforeach

						</div>
					</div>
				@endif

				<!--优秀作家-->
				@include('front.partial.good_writer')

				<div class="community">
					<h3 class="title">
						<span class="span1">社区</span>
						<span class="span2">品牌</span>
						<a href="/cat/shengtai">更多</a>
					</h3>

					@if(count($shenqu_posts))
						<div class="community-list">
							<div class="row">
								@foreach($shenqu_posts as $post)
									<div class="col-md-12 col-sm-6">
										<a href="/post/{!! $post->id !!}" traget="_blank" class="community-item media">
											<div class="media-left media-middle">
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
							<div class="clearfix"></div>
						</div>
					@endif

					@if(count($pinpai_posts))
						<div class="community-list" style="display: none;">
							<div class="row">
								@foreach($pinpai_posts as $post)
									<div class="col-md-12 col-sm-6">
										<a href="/post/{!! $post->id !!}" traget="_blank" class="community-item media">
											<div class="media-left media-middle">
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
							<div class="clearfix"></div>
						</div>
					@endif


					@if(count($right_bottom_guanggao))
						<div class="brands row">
							@foreach($right_bottom_guanggao as $guanggao)
								<div class="col-xs-6" onclick="window.open('{!! $guanggao->link !!}');">
									<img  src="{!! $guanggao->image !!}" onerror="javascript:this.src='{{asset('images/brand1.jpg')}}';" alt="" class="img-responsive img-rounded">
									<span>广告</span>
								</div>
							@endforeach
						</div>
					@endif

				</div>
			</div>
	

		<div class="clearfix"></div>
	</section>
	
@endsection


@section('js')
	<script>
		$('.carousel').carousel({
			interval: 5000
		})
		var isLike=false,dislike=false;
		function addlike(obj,type,id){

			if(!isLike && !dislike){
	            $.zcjyRequest('/ajax/likeOrDis/'+id,function(res){
	            	if(res){
	            		var num=$(obj).children().text();
	            		if(type=="like"){
	            			if(!isLike){
		            			num++;
		                		$(obj).children().text(num);
		                		isLike=true;
		            		}else{
		            			// num--;
		               //  		$(obj).children().text(num);
		                		isLike=false;
		            		}
	            		}else{
	            			if(!dislike){
		            			num++;
		                		$(obj).children().text(num);
		                		dislike=true;
		            		}else{
		            			// num--;
		               //  		$(obj).children().text(num);
		                		dislike=false;
		            		}
	            		}
	            	}
	            },{type:type},'POST')
        	}
        	else{
        		$.alert('单次只能点击一次利好利空','error');
        	}
        }
        $('.community span').click(function(){
        	$('.community span').css('color','#9f9f9f');
        	$(this).css('color','black');
        	$('.community-list').hide(500);
        	$('.community-list:eq('+$(this).index()+')').show(500);
        });
	</script>
@endsection
