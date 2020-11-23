<?php
/*******************************
 固定ページ お問い合わせ
 お問い合わせフォーム 完了画面
*******************************/
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}
?>
<div class="contact-box">
<div class="contact-title">Contact</div>
<p class="contact-confirm">Message was submitted properly.<br />
    I will replay message as fast as possible.<br />
    Thanks.</p>

<div class="contact-retern">
    <a href="<?php bloginfo('url');?>">
    <div class="contact-retern-btn">
        <p>Retern to the TOP</p>
    </div>
    </a>
</div>

</div>