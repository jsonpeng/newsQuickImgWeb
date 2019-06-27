@extends('front.partial.base')

@section('css')
	<style>
		.main .left-content .ads{
			margin-top: 34px;
		}
		.main .news-list .news-item .media-left .img-box{
	        width:110px;
	    }
	    .main .news-list .news-item .media-body h4{
	        font-size:18px;
	        line-height: 26px;
	    }
	    .main .news-list .news-item .media-body .user{
	        line-height: 20px;
	        bottom:10px;
	    }
	    .main .news-list .news-item .media-body .user .user-time{
	        float:right;
	        margin-right: 0;
	        padding-left: 28px;
	    }
	    .main .news-list .news-item .media-body .user .user-name{
	        float:left;
	        padding-left: 28px;
	    }
	    .main .recommend-ad .media{
	        padding:0;
	        position:relative;
	        display: block;
	    }
	    .main .recommend-ad .media .media-left{
	        padding-left: 36px;
	        padding-right: 33px;
	    }
	    @media (max-width:767px){
	    	.main .recommend-ad .media .media-left{
	       		padding:0 15px;
	    	}
	    }
	</style>
@endsection


@section('content')
	<section class="main container detail good-writer">
		<div class="left-content pull-left">
			<h3 class="title zhiding">
				{!! $post->name !!}
			</h3>
			<div class="info">
				<span class="total">{!! $post->view !!}</span>
				<span class="time">{!! time_parse($post->created_at)->format('Y-m-d') !!}</span>
				<span class="author">{!! $author !!}</span>
			</div>
			<div class="article">

				{!! $post->content !!}
				<p>
					<img onerror="javascript:this.src='{{asset('images/article.jpg')}}';"  src="{!! $post->image !!}" alt="" class="img-responsive">
				</p>
				@if($post->topic)
					<div class="topic">
						<span>#{!! $post->topic !!}#</span>
					</div>
				@endif
			</div>
			<div class="tip">
					{!! getSettingValueByKeyCache('post_shenmin') !!}
			</div>
			<div class="operate">
				<span class="collect pull-left @if($collect_status) collected @endif" style="cursor: pointer;">@if($collect_status) 已收藏 @else 收藏 @endif</span>
				<span class=" pull-right">
					{{-- 分享：
					<a href="javascript:;" class="bshare-weixin"></a>
					<a href="javascript:;" class="bshare-sinaminiblog"></a>
					<a href="javascript:;" cllass="bshare-qzone"></a> --}}
					<div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
				</span>

				<div class="clearfix"></div>
			</div>

			@if(count($tongyong_bottom_guanggao))
			<div class="ads row">
				@foreach($tongyong_bottom_guanggao as $item)
					<a href="{!! $item->link !!}" class="ad col-xs-6" target="_blank">
						<img src="{{ $item->image }}" alt="" class="img-responsive">
						<span>广告</span>
					</a>
				@endforeach
			</div>
			@endif

		</div>
		<div class="right-content pull-right">
			<div class="apply-box hidden-xs">
                <h3>申请入驻</h3>
                <p>成为专栏作者，让更多人看到您的观点</p>
                <a href="/user/center/certs">申请成为作者</a>
            </div>

            @if(count($near_posts))
            <div class="expand">
                <h3 class="title">
                    延伸阅读
                    <a href="/cat/news">更多</a>
                </h3>
                <div class="news-list">
                	@foreach($near_posts as $posts)
	                    <a href="/post/{!! $posts->id !!}" class="news-item media @if($posts->is_top) zhiding @endif">
	                        <div class="media-left">
	                            <div class="img-box">
	                                <img onerror="javascript:this.src='{{asset('images/item1.jpg')}}';"  src="{!! $posts->image !!}" alt="">
	                            </div>
	                        </div>
	                        <div class="media-body">
	                            <h4 class="media-heading">
	                                {!! $posts->name !!}
	                            </h4>
	                            <div class="user">
	                                <span class="user-time">{!! time_parse($posts->created_at)->format('Y-m-d') !!}</span>
	                                <span class="user-name nowrap">{!! $posts->Author !!}</span>
	                            </div>
	                        </div>
	                    </a>
       				@endforeach
                </div>
            </div>
            @endif

            @if(count($yansheng_guanggao))
	            <div class="brands row hidden-xs">
	            	@foreach($yansheng_guanggao as $guanggao)
						<div class="col-xs-6" onclick="window.open('{!! $guanggao->link !!}');">
							<img onerror="javascript:this.src='{{asset('images/brand1.jpg')}}';" src="{!! $guanggao->image !!}" alt="" class="img-responsive img-rounded">
							<span>广告</span>
						</div>
					@endforeach
				</div>
			@endif
			<!--优秀作家-->
			@include('front.partial.good_writer')


			@if(count($bottom_guanggao))
	            <div class="recommend-ad" style="margin-top: 38px;">

	            	@foreach($bottom_guanggao as $guanggao)
		                <a href="{!! $guanggao->link !!}" class="media" target="_blank">
		                    <img class="img-responsive"  onerror="javascript:thissrc='{{asset('images/icon-ad.png')}}';" src="{!! $guanggao->image  !!}" alt="">
		                </a>
	             	@endforeach
	            </div>
            @endif

		</div>
		<div class="clearfix"></div>
	</section>
@endsection

@section('js')
<script type="text/javascript">
	$('.collect').click(function(){
		var that = this;
		$.zcjyRequest('/ajax/action_post/{!! $post->id !!}',function(res){
			if(res){
				$(that).toggleClass('collected');
				var status = '';
				if(res =='收藏成功'){
					status = '已';
				}
				$.alert(res);
				$(that).text(status+'收藏');
			}
		},{},'POST');
	});
	$(".nowrap").each(function(){
		var maxwidth=4;
		if($(this).text().length>maxwidth){
			$(this).text($(this).text().substring(0,maxwidth));
			$(this).html($(this).html()+'…');
		}
	});
</script>
@endsection

