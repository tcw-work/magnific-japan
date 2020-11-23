<?php

$message = “名前：” . $_POST[“name”] . “\n本文：” . $_POST[“message”];

if (!mb_send_mail(“jbjbjb7712@gmail.com”, $_POST[“subject”], $message, “From:
                  ” . $_POST[“mail”])) {
    exit(“error”);
}

?>

        <p>メールが送信されました。</p>
