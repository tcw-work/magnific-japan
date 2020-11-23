<?php
/*******************************
 固定ページ お問い合わせ
 お問い合わせフォーム 文字列チェック
*******************************/
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}

/* 危険文字列置換ファンクション */
function Chk_StrMode($str){

    // タグを除去
    $str = strip_tags($str);
    // 空白を除去
    $str = mb_ereg_replace("^(　){0,}","",$str);
    $str = mb_ereg_replace("(　){0,}$","",$str);
    $str = trim($str);
    // 特殊文字を HTML エンティティに変換する
    $str = htmlspecialchars($str);

    return $str;
}
/* 未入力チェックファンクション */
function Chk_InputMode($str,$mes){  
    $errmes = "";
    if($str == ""){$errmes .= "{$mes}<br>\n";}
    return $errmes;
}

/* メールアドレスチェックファンクション 2017.9.1現在 参考サイト：http://wepicks.net/phpsample-preg-mail/ */
function CheckEmailAddress($sMailaddress) {
    if(preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $sMailaddress)){
        list($username,$domain)=explode('@',$sMailaddress);
        if(!checkdnsrr($domain,'MX')){
            return false;
        }
        return true;
    }
    return false;
}

#----------------------------------------------------------------------------------
# データの受け取りと危険文字列置換  ※Chk_StrMode(文字列);
#----------------------------------------------------------------------------------
$param = array();

// 引数を元に文字列処理及び変換処理を行う
foreach($_POST as $k=>$e):
$params[$k] = Chk_StrMode($e);
endforeach;

// 変数に入れる
extract($params);

#----------------------------------------------------------------------------------
# エラーチェック   ※Chk_InputMode(文字列,モード,エラーメッセージ);
#----------------------------------------------------------------------------------
$error_mes .= Chk_InputMode($namae,"Please type your name.<br />\n");

$error_mes .= Chk_InputMode($email,"Please type your mail address.<br />\n");

// メールアドレスチェック
if($email){ 
    if(CheckEmailAddress($email) != true){
        $error_mes .= "The format of mail address was found.<br />\n";
    }
}
$error_mes .= Chk_InputMode($message,"Please type your inquiry.<br />\n");
?>