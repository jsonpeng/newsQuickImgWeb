<li class="">
    <a href="/" target="_blank"><i class="fa fa-home"></i><span>网站首页</span></a>
</li>

<li class="header">说明文档</li>
 <li class="{{ Request::is('zcjy/doc')  ? 'active' : '' }}">
      <a href="/zcjy/doc"><i class="fa fa-cog"></i><span>系统说明文档</span></a>
</li>

<li class="header">网站设置</li>
    <li class="{{ Request::is('zcjy/settings/setting*') || Request::is('zcjy') ? 'active' : '' }}">
      <a href="{!! route('settings.setting') !!}"><i class="fa fa-cog"></i><span>系统设置</span></a>
    </li>
    <li class="{{ Request::is('zcjy/banners*') || Request::is('zcjy/*/bannerItems*') ? 'active' : '' }}">
        <a href="{!! route('banners.index') !!}"><i class="fa fa-object-group"></i><span>网站横幅(广告设置)</span></a>
    </li>
 {{--    <li class="{{ Request::is('zcjy/notices*') ? 'active' : '' }}">
        <a href="{!! route('notices.index') !!}"><i class="fa fa-edit"></i><span>通知消息管理</span></a>
    </li> --}}

{{--     <li class="{{ Request::is('zcjy/menus*') ? 'active' : '' }}">
        <a href="{!! route('menus.index') !!}"><i class="fa fa-cog"></i><span>网站菜单</span></a>
    </li> --}}

{{--     <li class="{{ Request::is('zcjy/messages*') ? 'active' : '' }}">
        <a href="{!! route('messages.index') !!}"><i class="fa fa-commenting"></i><span>系统公告</span></a>
    </li> --}}


<li class="header">用户管理</li>
<li class="{{ Request::is('zcjy/users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>账户管理</span></a>
</li>
{{-- <li class="{{ Request::is('zcjy/certs*') ? 'active' : '' }}">
    <a href="{!! route('certs.index') !!}"><i class="fa fa-edit"></i><span>账户实名认证管理</span></a>
</li>
<li class="{{ Request::is('zcjy/shanghuCerts*') ? 'active' : '' }}">
    <a href="{!! route('shanghuCerts.index') !!}"><i class="fa fa-edit"></i><span>商户认证管理</span></a>
</li> --}}

<li class="header">内容管理</li>
<li class="{{ Request::is('zcjy/certs*') ? 'active' : '' }}">
    <a href="{!! route('certs.index') !!}"><i class="fa fa-edit"></i><span>认证管理</span></a>
</li>
<li class="treeview @if(Request::is('zcjy/categories*') || Request::is('zcjy/posts*') || Request::is('zcjy/customPostTypes') || Request::is('zcjy/*/customPostTypeItems*')) active @endif " >
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>文章管理</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('zcjy/categories*') ? 'active' : '' }}">
            <a href="{!! route('categories.index') !!}"><i class="fa fa-bars"></i><span>分类</span></a>
        </li>

        <li class="{{ Request::is('zcjy/posts*') && Request::get('cat')!='3' ? 'active' : '' }}">
            <a href="{!! route('posts.index') !!}"><i class="fa fa-newspaper-o"></i><span>全部文章</span></a>
        </li>

        <li class="{{ Request::is('zcjy/posts*') && Request::get('cat')=='3' ? 'active' : '' }}">
            <a href="{!! route('posts.index') !!}?cat=3"><i class="fa fa-newspaper-o"></i><span>快讯</span></a>
        </li>
        @if(!$online)
    {{--     </li><li class="{{ Request::is('zcjy/customPostTypes*') || Request::is('zcjy/*/customPostTypeItems*') ? 'active' : '' }}">
            <a href="{!! route('customPostTypes.index') !!}"><i class="fa fa-calendar-plus-o"></i><span>自定义文章类型</span></a>
        </li> --}}
        @endif
    </ul>
</li>

<li class="{{ Request::is('zcjy/heZuos*') ? 'active' : '' }}">
    <a href="{!! route('heZuos.index') !!}"><i class="fa fa-edit"></i><span>底部内容/战略 合作</span></a>
</li>

<li class="treeview @if(Request::is('zcjy/pages*') || Request::is('zcjy/customPageTypes*') ||  Request::is('zcjy/*/pageItems*')) active @endif">
    <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>页面管理</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('zcjy/pages*') ? 'active' : '' }}">
            <a href="{!! route('pages.index') !!}"><i class="fa fa-newspaper-o"></i><span>页面</span></a>
        </li>
        @if(!$online)
{{--         <li class="{{ Request::is('zcjy/customPageTypes*') ||  Request::is('zcjy/*/pageItems*')  ? 'active' : '' }}">
            <a href="{!! route('customPageTypes.index') !!}"><i class="fa fa-calendar-plus-o"></i><span>自定义页面类型</span></a>
        </li> --}}
        @endif
    </ul>
</li>
<!-- <li class="{{ Request::is('zcjy/messageBoards*') ? 'active' : '' }}">
    <a href="{!! route('messageBoards.index') !!}"><i class="fa fa-edit"></i><span>留言板</span></a>
</li> -->
{{-- <li class="{{ Request::is('zcjy/messages*') ? 'active' : '' }}">
    <a href="{!! route('messages.index') !!}"><i class="fa fa-edit"></i><span>客户提交记录</span></a>
</li> --}}
<li class="">
    <a href="javascript:;" id="refresh"><i class="fa fa-refresh"></i><span>刷新缓存</span></a>
</li>

{{--
 <li class="{{ Request::is('postUsers*') ? 'active' : '' }}">
    <a href="{!! route('postUsers.index') !!}"><i class="fa fa-edit"></i><span>Post Users</span></a>
</li>

<li class="{{ Request::is('postAdmins*') ? 'active' : '' }}">
    <a href="{!! route('postAdmins.index') !!}"><i class="fa fa-edit"></i><span>Post Admins</span></a>
</li> 

<li class="{{ Request::is('postAttentions*') ? 'active' : '' }}">
    <a href="{!! route('postAttentions.index') !!}"><i class="fa fa-edit"></i><span>Post Attentions</span></a>
</li>
--}}




