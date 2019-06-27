<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MainController extends Controller
{

    //首页
    public function index(Request $request)
    { 

       #首页横幅上方的广告
       $index_top_guanggao = app('common')->bannerRepo()->getCacheBanner('shou-ye-heng-fu-shang-fang-guang-gao');

       #首页横幅
       $hot_posts = app('common')->postRepo()->hotPosts(0,5);
       
       #首页横幅下方的广告
       $index_bottom_guanggao = app('common')->bannerRepo()->getCacheBanner('shou-ye-heng-fu-xia-fang-guang-gao');
       
       #三条快讯
       $quick_news = app('common')->categoryRepo()->getCachePostOfCat('quick-news',0,3);

       #头条置顶的文章
       $top_posts = app('common')->categoryRepo()->getCachePostOfCat('top',0,100);
       
       #底部下方的广告
       $right_bottom_guanggao = app('common')->bannerRepo()->getCacheBanner('index-bottom-right');

       #社区 分类下的文章 3条
       $shenqu_posts = app('common')->categoryRepo()->getCachePostOfCat('sheng-tai-she-qu',0,3);

       #品牌 分类下的文章 3条
       $pinpai_posts = app('common')->categoryRepo()->getCachePostOfCat('kuang-ji-she-qu',0,3);

       #优秀作家
       $good_writers = app('common')->goodWriters();
       
        return view('front.index',compact('index_top_guanggao','hot_posts','index_bottom_guanggao','quick_news','top_posts','right_bottom_guanggao','shenqu_posts','pinpai_posts','good_writers'));
    }

    //优秀作家 good_writer
    public function goodWriter(Request $request)
    {
        $writers = app('common')->goodWriters(0,100);
        $posts = app('common')->postRepo()->yanshenPosts();
        #底部广告
        $bottom_guanggao = app('common')->bannerRepo()->getCacheBanner('post_guanggao');
        return view('front.good_writer',compact('writers','posts','bottom_guanggao'));
    }

    /**
     * 个人中心
     */
    //个人登录
    public function authLogin(Request $request)
    {
        if(auth('web')->check()){
            return redirect('/user/center/index');
        }
        return view('front.auth.login');
    }

    //个人手机号快速注册
    public function authMobileReg(Request $request)
    {
        if(auth('web')->check()){
            return redirect('/user/center/index');
        }
        return view('front.auth.mobile_reg');
    }

    //忘记密码
    public function authForgetPwd(Request $request)
    {
         return view('front.auth.forget_pwd');
    }

    //个人中心
    public function authCenter(Request $request)
    {
        $user = auth('web')->user();
        //$joins = app('common')->houseJoinRepo()->userHouseJoins($user->id,'已支付',true);
        //$all_consume = app('common')->houseJoinRepo()->useAllConsume($user->id);
        return view('front.auth.usercenter',compact('user'));
    }

   //个人中心 - 账号安全
   public function authAccount(Request $request)
   {
     $user = optional(auth('web')->user());
     return view('front.auth.usercenter_account',compact('user'));
   }


   //投稿发布
    public function authPublishPost(Request $request)
    {
        $user = auth('web')->user();
        $cats = app('common')->categoryRepo()->getRootCatArray();
        // dd($cats);
        return view('front.auth.publish_post',compact('cats'));   
    }

    //实名认证管理
    public function authCerts(Request $request)
    {
        $user = auth('web')->user();
        $cert = app('common')->authCert($user);
        return view('front.auth.usercenter_certs',compact('cert'));   
    }

    //发起实名认证
    public function publishCerts(Request $request)
    {
        $type = $request->get('type');
        if(empty($type)){
          $type = '个人';
        }
        return view('front.auth.usercenter_create_certs',compact('type'));
    }

    //个人中心 -> 我的关注
    public function authAttention(Request $request)
    {
        $user = auth('web')->user();
        $posts = app('common')->userCollectPosts($user);
        return view('front.auth.usercenter_attention',compact('posts'));
    }

    public function authPublish(Request $request)
    {
        $user = auth('web')->user();
        $posts = app('common')->postRepo()->userPosts($user);
        return view('front.auth.usercenter_publish',compact('posts'));
    }

    //通知中心
    public function authNotices(Request $request)
    {
        $user = auth('web')->user();
        
        #设置所有消息已读
        app('notice')->setNoticeReaded($user);

        $notices = app('notice')->authNotices($user,true);
      
        return view('front.auth.usercenter_notice',compact('notices'));
    }


}