<?php 
    require './163PersonalMailbox_sendEmail.class.php';
    $email = 'm18940046581@163.com';
    $password = 'wmywan1314';
    $name = 'JBtainLee';
    $mail = new Mail($email,$password,$name);
    $res = $mail->send('283733387@qq.com','hello,world!','<h1>勺子</h1>');
    echo  $res['info'];
?>