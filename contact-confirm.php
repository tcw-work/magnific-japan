<?php
/*******************************
 固定ページ お問い合わせ
 お問い合わせフォーム 確認画面
*******************************/
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}?>

<script>
    //2重送信防止スクリプト
    var flg_Submit = false;
    function Fnk_DoubleSubmit(){
        if(flg_Submit){
            alert("Processing…");return false;
        }
        else{
            flg_Submit = true;return true;
        }
    }
</script>
<div class="contact-title">Contact</div>
<p class="contact-confirm">
    if there is no problem with the content, please push the submit button.</p>
<form name="toiawase2" method="post" class="contact-form" enctype="multipart/form-data" action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" onsubmit="return Fnk_DoubleSubmit();">
    <div class="form-element">
        <label>NAME</label><span>※</span><br />
        <p style="background:#f8f8f8;"><?php echo ($namae)?$namae:"";?></p><input name="namae" class="form-input" type="hidden" value="<?php echo ($namae)?$namae:"";?>" />
    </div>
    <div class="form-element">
        <label>MAIL</label><span>※</span><br />
        <p style="background:#f8f8f8;"><?php echo ($email)?$email:"";?></p><input name="email" class="form-input" type="hidden" value="<?php echo ($email)?$email:"";?>" />
    </div>
    <div class="form-element">
        <label>MESSAGE</label><span>※</span><br />
        <p style="background:#f8f8f8;"><?php echo ($message)?nl2br($message):"";?></p><input name="message" class="form-input" type="hidden" value="<?php echo ($message)?$message:"";?>" />
    </div>
    <div>
        <input type=button value="Correcting" onClick="javascript:history.back();">　<input type="submit" value="Submitting" />
        <input type="hidden" name="action" value="completion">
    </div>
</form>