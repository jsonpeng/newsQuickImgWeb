@extends('front.partial.base')

@section('css')
	
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
	<style>
		#map_canvas td{
			box-sizing: content-box;
		}
	</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main ">
			@include('front.partial.bread_nav')
			<div class="content">
				<div id="map_canvas" style="height:315px;"></div>
				<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=TH8GrWEs5kQS76N2FeWOXIMs"></script>
				<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
				<script>
					// 百度地图API功能
					var map = new BMap.Map("map_canvas");
					var myGeo = new BMap.Geocoder();
					// 将地址解析结果显示在地图上,并调整地图视野
					myGeo.getPoint("{{ getSettingValueByKeyCache('address') }}", function(point){
					    if (point) {
					        map.centerAndZoom(point, 18);
					        map.enableScrollWheelZoom();
					        var content='<div style="margin:0;line-height:20px;padding:2px;">' +'公司总部' +'</div>';
							var searchInfoWindow=null;
							searchInfoWindow=new BMapLib.SearchInfoWindow(map,content,{
								title:'{{ getSettingValueByKeyCache('address') }}',
								width:290,
								height:40,
								panel:'panel',
								enableAutoPan:true,
								searchTypes:[
									BMAPLIB_TAB_SEARCH,   
									BMAPLIB_TAB_TO_HERE, 
									BMAPLIB_TAB_FROM_HERE
								]
							})
							var marker=new BMap.Marker(point);
							marker.enableDragging();
							marker.addEventListener("click", function(e){
							    searchInfoWindow.open(marker);
						    })
						    map.addOverlay(marker);
					        map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
					        map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
					       	map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
					        map.enableScrollWheelZoom();                            //启用滚轮放大缩小
					    }else{
					        //alert("您选择地址没有解析到结果!");
					    }
					});
				</script>
				<div class="info-address">
					<h3>公司地址Address</h3>
					<p>{!! getSettingValueByKeyCache('address') !!}</p>
				</div>
				<div class="info-contact">
					<h3>联系方式Contacts</h3>
					<p>负责人：{!! getSettingValueByKeyCache('head_man') !!}</p>
					<p>联系电话：{!! getSettingValueByKeyCache('service_tel') !!}/{!! getSettingValueByKeyCache('tel') !!}</p>
					<p>邮箱：{!! getSettingValueByKeyCache('email') !!}</p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection


@section('js')


@endsection

