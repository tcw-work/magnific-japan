<?php
/*******************************
 固定ページ お問い合わせ
 お問い合わせフォーム メール送信
*******************************/
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}

#-------------------------------------------------------------------------------------------
# メール送信処理１（お客様への返信メール）
#-------------------------------------------------------------------------------------------
// メール本文
$mailbody = "Thank you for contacting me.
If you do not get a replay over a week,
please contact below address directoly.

────────────────────────────────
　＜お問い合わせ先＞
　".WEBMST_NAME."
　E-MAIL: ".WEBMST_MAIL."
────────────────────────────────";

// 件名とフッター
$subject = WEBMST_NAME."Mail from Form";
$headers = "Reply-To: ".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";
$headers .= "Return-Path: ".WEBMST_MAIL."<".WEBMST_MAIL.">\n";
$headers .= "From:".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";

// メール送信（失敗時：強制終了）
$usrmail_result = mb_send_mail($email,$subject,$mailbody,$headers);
if(!$usrmail_result)die("Sorry, Submitting failed.<br />\n
                         Please start over.“".WEBMST_MAIL."”");

#-------------------------------------------------------------------------------------------
# メール送信処理２（送信先は $mailto宛）
#-------------------------------------------------------------------------------------------
// 件名を設定
$subject = "【お問い合わせ】";

// Headerとbodyとsubjectを設定（送信元はお客様 $email）
$headers = "Reply-To: ".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";
$headers .= "Return-Path: ".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";
$headers .= "From:".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";

// メール本文
$mailbody = "サイトよりお問い合わせを受け付けました。

────────────────────────────────

■名前： $namae 様より

■メールアドレス： $email

■メッセージ：
$message

────────────────────────────────
";

// メール送信実行
if(!empty($mailto)){
    $sendmail_result = mb_send_mail($mailto,$subject,$mailbody,$headers);

    if(!$sendmail_result){
        die("<p>Sorry, Submitting failed<br>\nPlease start over.</p>");
    }
}
else{
    die("<p>Message was not submitted.<br>\nPlease contact web mail directly.“".WEBMST_MAIL."”</p>");
}
?>