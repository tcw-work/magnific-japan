<footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="footerList">
        <div class="ListTop">
            <ul>
                <li itemprop="name"><a href="<?php bloginfo('url');?>" itemprop="url">Home</a></li>
                <li itemprop="name"><a href="/comming-soon/" itemprop="url">Information</a></li>
                <li itemprop="name"><a href="Contact" itemprop="url">Contact</a></li>
                <li itemprop="name"><a href="/privacy-policy/" itemprop="url">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="copyright">
            <p itemprop="copyrightHolder">Copyright (C) Magnific Japan All rights reserved.</p>
        </div>
    </div>
</footer>
</div>


<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>

<script>
    $(function() {
        $(".nav-trigger").click(function() {
            if($(".nav-trigger").hasClass("head-active")){
                $(".nav-trigger").removeClass("head-active");
                $("nav").slideToggle(400);
                $(".header-wrap").css("position","static");
                $(".header-wrap").css("height", "auto");
            }else{
                $(".nav-trigger").addClass("head-active");
                $(".header-wrap").css("height", "100%");
                $("nav").css("height", "100%");
                $("nav").toggleClass("ac");
                $("nav").slideToggle(400);
                $(".header-wrap").css("position","fixed");
            }
        });
        
        
        $(".cat-title").click(function() {
            $(".cat-title").removeClass("cat-active");
            $(".tag-title").removeClass("tag-active");
            $(".tag-list").css("display","none");
            $(".cat-list").css("display","block");
        });
        
        $(".tag-title").click(function() {
            $(".tag-list").css("display","block");
            $(".cat-list").css("display","none");
            $(".cat-title").addClass("cat-active");
            $(".tag-title").addClass("tag-active");
        });
        
        //        Mouseover
//        $(function() {
//            $('.recommend .content-box dt img').hover(function() {
//                $(".ex-title").css("color", "#e3d7a3")
//            }, function() {
//                $(".ex-title").css("color", "#fff")
//                console.log(9);
//            });
//        });
        
//        $(function() {
//            $('.r-hov').hover(function() {
//                $(".ex-title").css("display", "block")
//                $(".menue-in").addClass("open")
//            }, function() {
//                $(".menue").css("display", "none")
//                $(".menue-in").removeClass("open")
//                console.log(9);
//            });
//        });
        $('.screen-reader-text').remove();
    });
    
    
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    ;jQuery(document).ready(function ($) {
        if ($('.fb-page').length) {

            // iframeリロードの[ON/OFF]を切り替えるウィンドウサイズ。
            var reloadWidth = 768;

            $(function(){
                // まずウインドウの横幅を変数に入れる
                var timer = false;
                var winWidth = $(window).width();
                var winWidth_resized;

                // ウインドウのリサイズイベントに処理をバインド
                $(window).on("resize", function(){
                    // リサイズ後の放置時間が指定ミリ秒以下なら何もしない(リサイズ中に何度も処理が行われるのを防ぐ)
                    if (timer !== false) {
                        clearTimeout(timer);
                    }
                    // 放置時間が指定ミリ秒以上なので処理を実行
                    timer = setTimeout(function() {
                        // リサイズ後のウインドウの横幅を取得
                        winWidth_resized = $(window).width();

                        // リサイズ前のウインドウ幅とリサイズ後のウインドウ幅が異なる場合
                        if ( winWidth != winWidth_resized ) {

                            var windowWidth = parseInt($(window).width());
                            if(windowWidth >= reloadWidth) {
                                // 画面サイズ大のとき
                                //location.reload();
                            } else {
                                // 画面サイズ小のとき
                                location.reload();
                            }
                            // 次回以降使えるようにリサイズ後の幅をウインドウ幅に設定する
                            winWidth = $(window).width();
                        }
                    }, 200);
                });
            });
        }

    });
    
//    slick
    $("document").ready(function(){
        $('.mypattern').slick({
//            autoplay: true,
            autoplaySpeed: 2500,
            speed: 900,
            dots: true,
            arrows: false,
            centerMode: true,
            //centerPadding: '20%',
        });
    });
    
</script>
<?php wp_footer(); ?>
</body>

</html>