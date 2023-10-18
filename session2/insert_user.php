<?php

$serverName = "localhost";
$db_name = "my_project";

$connection_DB = new mysqli($serverName, "root", "", $db_name);

if ($connection_DB->connect_error) {
    echo "مشکلی در ارتباط با پایگاه داده به وجود آمده";
    echo "<br>";
    die("connection failed : " . $connection_DB->connect_error);
}

$insert_user_query = "INSERT INTO users (username,first_name,last_name,email,password) VALUES ('erfan_123','عرفان','غلامی','erfangholami@gmail.com','12345678')";
$insert_message_query = "INSERT INTO messages (title,message_content,sender_id) VALUES ('عنوان پیام یک','متن بدنه و اصلی تستی برای اولین پیام کاربر شماره ۱',1)";

if ($connection_DB->query($insert_user_query)) {
    echo "کاربر جدید به طور موفقیت ثبت شد";
} else {
    echo "خطا در ثبت کاربر" . "<br>" . $connection_DB->error;
}

$connection_DB->close();



?>