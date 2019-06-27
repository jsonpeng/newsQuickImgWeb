@extends('front.partial.base')

@section('css')
	<style>
		.detail .title {
		    font-size: 30px;
		    padding: 37.5px 0;
		    border-bottom: 1px solid #efefef;
		}
		.detail .article p{
			margin-top: 28px;
    		line-height: 28px;
		}
	</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|平台协议</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<section class="main container detail good-writer">

		<h3 class="title">
			服务协议
		</h3>
		<div class="article">

			<p>
				熊市的声音，从3月份喊到今天，市场依然处于跌跌不休的下行曲线，这个令人悲伤的赛道，已经撑不下太多人的梦想，那些扬言要用区块链颠覆世界的呐喊者，多数已经动摇了旌旗，纷纷改弦易辙、倒戈逃窜。无论是原来的知名古典投资人，还是刷朋友圈卖货的微商从业者，熊市弥漫的烟火味儿，直接把大家呛出了原型，是骡子是马，熊市的跑道上溜一圈儿就懂了，如果不够，就再加两圈儿。
			</p>
		</div>
	</section>
@endsection