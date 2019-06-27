<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! getSettingValueByKeyCache('name') !!}</title>
    <link rel="icon" href="{!!  getSettingValueByKeyCache('logo') !!}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
        @yield('css')
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lte IE 9]>
            <script src="{{ asset('vendor/html5shiv.min.js') }}"></script>
            <script src="{{ asset('vendor/respond.min.js') }}"></script>
        <![endif]-->
</head>
<body style="position: relative;">
    
    <!--[if lte IE 8]>
        <script>
            alert("您正在使用的浏览器版本过低，为了您的最佳体验，请先升级浏览器。");window.location.href="http://support.dmeng.net/upgrade-your-browser.html?referrer="+encodeURIComponent(window.location.href);
        </script>
    <![endif]-->
    <!-- Add your site or application content here -->
    @if(!(Request::is('*/login') || Request::is('*/reg/mobile')))
        @include('front.partial.nav')
    @endif
    @yield('content')
    @if(!(Request::is('*/login') || Request::is('*/reg/mobile')))
        @include('front.partial.footer')
    @endif
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('js/touch.js')}}"></script>
    <script src="{{ asset('vendor/layer/layer.js') }}"></script>
    <script  src="{{ asset('vendor/scrollreveal.min.js') }}"></script>
    <!-- 图片缓加载 -->
    <script src="{{ asset('vendor/jquery.lazyload.min.js') }}"></script>
    <script>
        $("img.lazy").lazyload({effect: "fadeIn"});
    </script>
    <script src="{{asset('js/zcjy.js')}}"></script>
    <script type="text/javascript">
        //退出操作
        $('.user_logout').click(function(){
            $.zcjyRequest('/ajax/logout_user',function(res){
                if(res){
                    $.alert('退出成功');
                    location.reload();
                }
            },{},'POST');
        });
        //回到顶部
        $('#totop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            },300);
        });
        //全站搜索
       $('input[name=word]').on('keypress',function(event){
            if (event.charCode === 13) {
              $('.site_search_all').trigger('click');
          }
       });
       //点击搜索事件
       $('.site_search_all').click(function(){
            if($.empty($('input[name=word]').val())){
                $.alert('请输入搜索内容','error');
                return;
            }
            location.href="/search?word="+$('input[name=word]').val();
       });
       //底部点击
       $('.footer-nav > li').click(function(){
            $(this).find('a').trigger('click');
       });
    </script>
    <!-- <script type="text/javascript">
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.reveal', { duration: 2000 }, 50);
        sr.reveal('.reveal1', { duration: 2000 }, 50);
        sr.reveal('.reveal2', { duration: 2000 }, 50);
        sr.reveal('.reveal3', { duration: 2000 }, 50);
        sr.reveal('.reveal4', { duration: 2000 }, 50);
        sr.reveal('.reveal5', { duration: 2000 }, 50);
        //自动加载返回顶部插件
        $(document).ready(function () {
            $.goup({
                trigger: 100,
                bottomOffset: 150,
                locationOffset: 100,
                titleAsText: true
            });
        });
        /**
         * swipe滚动
         * @type {[type]}
         */
        // $('.carousel').carousel({
        //     interval: 1500
        // });
        $('.carousel-hourse').carousel({
            interval: 2000
        });

        $('.navbar-header').click(function(){
            location.href="/";
        });
        //退出登录
        $('.gol_logout').click(function(){
            $.zcjyRequest('/ajax/logout_user',function(res){
                if(res){
                    $.alert('退出成功');
                    location.reload();
                }
            },{},'POST');
        });
        //全站搜索
        $('.site_search_all').click(function(){
            if($.empty($('input[name=search_all]').val())){
                $.alert('请输入搜索关键字','error');
                return ;
            }
            location.href="/search?word="+$('input[name=search_all]').val();
        });
        //搜索小屋
        $('.gol_search_button').click(function(){
            if($.empty($('input[name=search_hourse]').val())){
                $.alert('请输入搜索关键字','error');
                return ;
            }
            location.href="/manyMan?word="+$('input[name=search_hourse]').val();
        });

        //  enter键执行搜索
        $('input[name=search_hourse]').on('keypress', function(event) {
            if (event.charCode === 13) {
              $('.gol_search_button').trigger('click');
            }
        });

        //
        $('input[name=search_all]').on('keypress',function(event){
            if (event.charCode === 13) {
              $('.site_search_all').trigger('click');
          }
        });
    </script> -->
    
    @yield('js')
</body>
</html>
