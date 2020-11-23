<?php
/*******************************
 固定ページ お問い合わせ
 お問い合わせフォーム 入力画面
*******************************/
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}
?>
<div class="contact-title">Contact</div>

<div class="error-message" style="color:red;">
    <?php // エラーメッセージがあったら表示する
    echo ($error_mes)?'
---------------------<br />
Typing error<br />
---------------------<br />'.$error_mes:"";?>
</div>

<form name="toiawase" method="post" enctype="multipart/form-data" class="contact-form" action="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
    <div class="form-element">
        <label>NAME</label><span>※</span><br />
        <input type="text" name="namae" class="form-input" size="40" maxlength="60" value="<?php echo ($namae)?$namae:"";?>" required />
    </div>
    <div class="form-element">
        <label>MAIL</label><span>※</span><br />
        <input type="email" name="email" class="form-input" size="40" maxlength="200" value="<?php echo ($email)?$email:"";?>" required />
    </div>
    <div class="form-element">
        <label>MESSAGE</label><span>※</span><br />
        <textarea name="message" class="form-input" cols="40" rows="10" required><?php echo ($message)?$message:"";?></textarea>
    </div>
    <div class="form-element">
        <input type="submit" value="SUBMIT" />
        <input type="hidden" name="action" value="confirm">
    </div>
</form>