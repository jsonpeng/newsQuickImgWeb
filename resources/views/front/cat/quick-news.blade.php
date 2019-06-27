@extends('front.partial.base')

@section('css')
	<style type="text/css">
		.main .flash .home-live-main .home-live-item .content{
			padding-right:0;
		}
		.main .brands{
			margin-bottom: 17px;
			padding:10px 0;
		}
		.main .recommend-ad .media{
			padding:16px 0;
			position:relative;
			display: block;
		}
		.main .recommend-ad .media .media-left{
			padding-left: 36px;
			padding-right: 33px;
		}
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<div class="container quick-news main">
		<div class="left-content pull-left">
			<h3 class="title">快讯</h3>
			<div class="flash">
				<div class="home-live-main">
					@foreach($posts as $post)
						<div class="home-live-item media">
				            <div class="media-left">
					            {!! time_parse($post->created_at)->format('h:i') !!}
					            <p>{!! time_parse($post->created_at)->format('m月d') !!}</p>
					        </div>
				            <div class="media-body content">
				                <a href="javascript:;" class="media-heading home-live-title">{!! $post->name !!}</a>
				                <a href="javascript:;" class="home-live-p">{!! des($post->content,100) !!}</a>
				                <div class="live-point">
					                <span class="like" onclick="addlike(this,'like',{!! $post->id!!})">利好 <em>{!!  $post->like  !!}</em></span>
					                <span class="dtlike" onclick="addlike(this,'dislike',{!! $post->id!!})">利空 <em>{!! $post->dislike !!}</em></span>
					            </div>
				            </div>
				        </div>
			   		@endforeach
				</div>
			{{-- 	<div class="get-more hidden-xs">
					<a href="javascript:;"></a>
				</div> --}}
			</div>
		</div>
		<div class="right-content pull-right">
			<h3 class="title">推荐</h3>

			@if(count($top_guanggao))
				<div class="brands row">
					@foreach($top_guanggao as $item)
					<a class="col-xs-6" href="{!! $item->link !!}" target="_blank">
						<img src="{{ $item->image }}" alt="" class="img-responsive img-rounded">
						<span>广告</span>
					</a>
					@endforeach
				</div>
			@endif

			@if(count($bottom_guanggao))
				<div class="community-list">
					<div class="row">
						@foreach($bottom_guanggao as $item)
							<div class="col-md-12 col-sm-6">
								<a href="{!! $item->link !!}" traget="_blank" class="community-item media" style="padding:0 15px;">
									<img class="img-responsive" src="{{ $item->image }}" alt="">
								</a>
							</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
			@endif
			{{-- <div class="recommend-ad">
				<a href="" class="media" target="_blank">
				  	<img class="img-responsive"  onerror="javascript:thissrc='{{asset('images/icon-ad.png')}}';" src="" alt="">
				</a>
			</div> --}}
		</div>
	</div>
@endsection

@section('js')
	<script>
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
	</script>
@endsection