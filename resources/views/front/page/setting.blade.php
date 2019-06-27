@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container setting">
		<div class="common-title text-center">
			<div class="text-ch">账号设置</div>
			<h3 class="text-en">SET UP</h3>
			<div class="short-line"></div>
		</div>
		<div class="content">
			<div class="user-name">
				<div class="part">
					<div class="col-sm-1">
						用户名 :
					</div>
					<div class="col-sm-11">
						用户名88
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-box">
					<form class="form-inline">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<div class="form-group">
						    	<label for="">更换用户名 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control" id="exampleInputAmount" placeholder="请输入用户名">
							    </div>
							</div>
						  	<button type="submit" class="btn btn-primary">保存</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
			<div class="user-name">
				<div class="part" style="padding:10px 0;">
					<div class="col-sm-1" style="height:60px;line-height: 60px;">
						头像 :
					</div>
					<div class="col-sm-11">
						<img src="{{asset('images/user_head.png')}}" alt="" width="60" height="60">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="amend-box">
					<div class="col-sm-1"></div>
					<div class="col-sm-11 media">
						<div class="media-left">
							<img src="{{asset('images/add.png')}}" alt="" class="media-object">
						</div>
						<div class="media-body media-middle" style="width:100%">
							<button type="submit" class="btn btn-primary" style="background-color: transparent;color:#008837;">上传头像</button>
							<button type="submit" class="btn btn-primary" >保存</button>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="user-name">
				<div class="part">
					<div class="col-sm-1">
						登录邮箱 :
					</div>
					<div class="col-sm-11">
						123456
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-box">
					<form class="form-inline">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<p>当前邮箱 : 123456 <span style="margin-left: 5px;">已验证</span></p>
							<button type="submit" class="btn btn-primary" style="display:block;background-color: transparent;color:#008837;margin-top: 15px;">发送验证码</button>
						</div>
						<div class="clearfix"></div>
					</form>
					<form class="form-inline">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
						  	<div class="form-group">
						    	<label for="">邮箱验证码 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control"  placeholder="请输入验证码">
							    </div>
							</div>
						</div>
						<div class="clearfix"></div>
					</form>
					<form class="form-inline">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
						  	<div class="form-group">
						    	<label for="">新邮箱 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control"  placeholder="请输入新邮箱">
							    </div>
							</div>
							<button type="submit" class="btn btn-primary">保存</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
			<div class="user-name">
				<div class="part">
					<div class="col-sm-1">
						登录密码 :
					</div>
					<div class="col-sm-11">
						*******
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-box">
					<form class="form-inline">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
						  	<div class="form-group">
						    	<label for="">当前密码 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control"  placeholder="请输入原密码">
							    </div>
							</div>
						</div>
						<div class="clearfix"></div>
					</form>
					<form class="form-inline">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
						  	<div class="form-group">
						    	<label for="">新密码 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control"  placeholder="请输入新密码">
							    </div>
							</div>
							<button type="submit" class="btn btn-primary">保存</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection