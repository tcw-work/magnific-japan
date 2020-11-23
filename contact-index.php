<?php
/*******************************
 固定ページ お問い合わせ
 Template Name: contact-index
*******************************/
get_header(); ?>
<?php
/*　↑↑↑↑↑↑↑↑↑↑　ここから上部は page.php のヘッダーのコピペ　↑↑↑↑↑↑↑↑↑↑　 */

// エラーメッセージと不正アクセスフラグ
$error_mes = "";
$noindexaccess = true;

// メアドに表示する名前
define('WEBMST_NAME', 'Magnific Japan');
// お問い合わせ用メアド
define('WEBMST_MAIL', 'm.tomizawa821@gmail.com');
// 送信先メールアドレス
$mailto = WEBMST_MAIL;

#--------------------------------------------------------------
# 全体のコントロール
#--------------------------------------------------------------
switch($_POST["action"]):

case "completion":
/////////////////////////////////////////////////////////////////////////////
//　メール送信処理と完了画面を表示

include('contact-check.php');
if(!$error_mes){
    include('contact-sendmail.php');
    include('contact-completion.php');
}
else{
    die("<p>Error was occurred.<br />Please submit again.</p>");
}
break;
case "confirm":
/////////////////////////////////////////////////////////////////////////////
// エラーがあれば再入力、なければ確認画面表示

include('contact-check.php');
if($error_mes):
include('contact-input.php');
else:
include('contact-confirm.php');
endif;

break;
default:
/////////////////////////////////////////////////////////////////////////////
// 新規入力画面を表示

include('contact-input.php');

endswitch;

/*　↓↓↓↓↓↓↓↓↓↓　ここから下部は page.php のフッターのコピペ　↓↓↓↓↓↓↓↓↓↓　 */
?>