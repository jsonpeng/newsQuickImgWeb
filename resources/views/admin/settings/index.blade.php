@extends('layouts.app')


@section('content')
<section class="content pdall0-xs pt10-xs">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li>
                <a href="javascript:;">
                    <span style="font-weight: bold;">通用设置</span>
                </a>
            </li>
            <li class="active">
                <a href="#tab_1" data-toggle="tab">网站设置</a>
            </li>
            
        {{--     <li>
                <a href="#tab_2" data-toggle="tab">小屋设置</a>
            </li> --}}

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="box box-info form">
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" id="form1">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">网站名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" maxlength="60" placeholder="网站名称" value="{{ getSettingValueByKey('name') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">网站LOGO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image1" name="logo" placeholder="网站LOGO" value="{{ getSettingValueByKey('logo') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image1')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('logo')) {{ getSettingValueByKey('logo') }} @endif" style="max-width: 100%; max-height: 150px; display: block;"></div>
                                    <p class="help-block">默认网站首页LOGO,通用头部显示，最佳显示尺寸为240*60像素</p>
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="seo_title" class="col-sm-3 control-label">网站标题</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_title" maxlength="60" placeholder="网站标题" value="{{ getSettingValueByKey('seo_title') }}"></div>
                            </div>-->
                            <div class="form-group">
                                <label for="seo_des" class="col-sm-3 control-label">网站描述</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_des" maxlength="60" placeholder="网站描述" value="{{ getSettingValueByKey('seo_des') }}"></div>
                            </div>
                            <div class="form-group">
                                <label for="seo_keywords" class="col-sm-3 control-label">网站关键字</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_keywords" maxlength="60" placeholder="网站关键字" value="{{ getSettingValueByKey('seo_keywords') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="service_tel" class="col-sm-3 control-label">服务热线</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="service_tel" maxlength="60" placeholder="服务热线" value="{{ getSettingValueByKey('service_tel') }}"></div>
                            </div>

                             <div class="form-group">
                                <label for="beian" class="col-sm-3 control-label">底部备案信息</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="beian" maxlength="120" placeholder="底部备案信息" value="{{ getSettingValueByKey('beian') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="quick_news_base_img" class="col-sm-3 control-label">快讯底图设置(建议上传底图大小:640*1134)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image55" name="quick_news_base_img" placeholder="快讯底图设置" value="{{ getSettingValueByKey('quick_news_base_img') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image55')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('quick_news_base_img')) {{ getSettingValueByKey('quick_news_base_img') }} @endif" style="max-width: 100%; max-height: 150px; display: block;"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kuaixun_limit" class="col-sm-3 control-label">快讯字数限制</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="kuaixun_limit" maxlength="120" placeholder="快讯字数限制(不填默认是100)" value="{{ getSettingValueByKey('kuaixun_limit') }}"></div>
                            </div>

                       <!--      <div class="form-group">
                                <label for="service_tel" class="col-sm-3 control-label">服务电话</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="service_tel" maxlength="60" placeholder="服务电话" value="{{ getSettingValueByKey('service_tel') }}"></div>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="col-sm-3 control-label">手机号</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tel" maxlength="60" placeholder="请输入手机号" value="{{ getSettingValueByKey('tel') }}"></div>
                            </div> -->
                       {{--      <div class="form-group">
                                <label for="chuanzhen" class="col-sm-3 control-label">传真</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="chuanzhen" maxlength="60" placeholder="传真" value="{{ getSettingValueByKey('chuanzhen') }}"></div>
                            </div> --}}

                        {{--     <div class="form-group">
                                <label for="mobile" class="col-sm-3 control-label">手机号</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mobile" maxlength="60" placeholder="手机号" value="{{ getSettingValueByKey('mobile') }}"></div>
                            </div> --}}


                     {{--        <div class="form-group">
                                <label for="company_name" class="col-sm-3 control-label">公司名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="company_name" maxlength="60" placeholder="公司名称" value="{{ getSettingValueByKey('company_name') }}"></div>
                            </div>
 --}}
                            
                            <div class="form-group">
                                <label for="weixin" class="col-sm-3 control-label">微信二维码</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image5" name="weixin" placeholder="微信公众号二维码" value="{{ getSettingValueByKey('weixin') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image5')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('weixin')) {{ getSettingValueByKey('weixin') }} @endif" style="max-width: 100%; max-height: 150px; display: block;">
                                    </div>
                                </div>
                            </div>
             
                            

                            <div class="form-group">
                                <label for="post_shenmin" class="col-sm-3 control-label">文章底部说明</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control"  name="post_shenmin" rows="3" placeholder="文章底部说明">{{ getSettingValueByKey('post_shenmin') }}</textarea>
                                    </div>
                            </div>

              

                   {{--          <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">地址</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="address" placeholder="地址" value="{{ getSettingValueByKey('address') }}">
                                    <div class="input-append">
                                        <a  class="btn"  onclick="openMap('address')">在地图中设定</a>
                                    </div>
                                </div>
                            </div> --}}



                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left" onclick="saveForm(1)">保存</button>
                    </div>
                    <!-- /.box-footer --> </div>
            </div>

            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2">
                <div class="box box-info form">
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" id="form2">
                   

                            <div class="form-inline">
                                <label for="feie_sn" class="col-sm-3 control-label">距离结束时间</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="house_end_time" placeholder="不填默认是1天" value="{{ getSettingValueByKey('house_end_time') }}">天</div>
                            </div>

            
                        </form>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left" onclick="saveForm(2)">保存</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.tab-content --> </div>
</section>
@endsection

@include('admin.partial.imagemodel')

@section('scripts')
<script>
        function saveForm(index){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/zcjy/settings/setting",
                type:"POST",
                data:$("#form"+index).serialize(),
                success: function(data) {
                  if (data.code == 0) {
                    layer.msg(data.message, {icon: 1});
                  }else{
                    layer.msg(data.message, {icon: 5});
                  }
                },
                error: function(data) {
                  //提示失败消息

                },
            });  
        }

       function openMap(type=''){
            var name =type==''?'detail':'address';
            var address=$('input[name='+name+']').val();
            var url="/zcjy/settings/map?address="+address;
                if($(window).width()<479){
                        layer.open({
                            type: 2,
                            title:'请选择详细地址',
                            shadeClose: true,
                            shade: 0.8,
                            area: ['100%', '100%'],
                            content: url, 
                        });
                }else{
                     layer.open({
                        type: 2,
                        title:'请选择详细地址',
                        shadeClose: true,
                        shade: 0.8,
                        area:['60%', '680px'],
                        content: url, 
                    });
                }
        }

        function call_back_by_map(address,jindu,weidu){
            $('input[name=detail],input[name=address]').val(address);
            $('input[name=lat]').val(weidu);
            $('input[name=lon]').val(jindu);
            layer.closeAll();
        }

        $('#kecheng_list').keypress(function(e) { 
           var rows=parseInt($(this).attr('rows'));
            // 回车键事件  
           if(e.which == 13) {  
                rows +=1;
           }  
           $(this).attr('rows',rows);
      });
    </script>
@endsection