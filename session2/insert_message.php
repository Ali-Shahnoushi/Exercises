<?php

$serverName = "localhost";
$db_name = "my_project";

$connection_DB = new mysqli($serverName, "root", "", $db_name);

if ($connection_DB->connect_error) {
    echo "مشکلی در ارتباط با پایگاه داده به وجود آمده";
    echo "<br>";
    die("connection failed : " . $connection_DB->connect_error);
}

$insert_message_query = "INSERT INTO messages (title,message_content,sender_id) VALUES ('عنوان پیام یک','متن بدنه و اصلی تستی برای اولین پیام کاربر شماره ۱',1)";

if ($connection_DB->query($insert_message_query)) {
    echo "پیغام جدید به طور موفقیت ثبت شد";
} else {
    echo "خطا در ثبت پیغام" . "<br>" . $connection_DB->error;
}

$connection_DB->close();



?>