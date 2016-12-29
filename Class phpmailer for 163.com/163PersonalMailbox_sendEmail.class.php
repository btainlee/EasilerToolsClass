<?PHP
/*
    ----------------------------------------------------------------------
   |  INTRODUCTION:CLASS PHPMailer CAN SEND/RECEIVE EMAILS FOR MANY KINDS |
   |  OF MAIL BOXES,AND THAT IS WHY IT IS HARD TO USE AND EASY TO MAKE    |
   |  MISTAKES.SO I WRITE THIS TARGET TO mail.163.com PERSONAL MAILBOX TO |
   |  MAKE IT CAN BE EASILYED USED.                                       |
   |----------------------------------------------------------------------|
   |                       AUTHOR:JBTAINLEE                               |
   |                      TERGET:mail.163.com                             |                        
   |                        DATE:2016/12/28                               |
   |                  GITHUB:https://github.com/btainlee                  |
   |----------------------------------------------------------------------|                        
 
*/
    require_once './PHPMailer/class.phpmailer.php';
    date_default_timezone_set("America/Detroit");//设定时区东八区
    class Mail{
        public function __construct($email,$password,$name){
            
            $this->myName = $name;
            $this->myMail = $email;
            $this->myPassword  = $password;
            var_dump($this->myName,$this->myMail,$this->myPassword);
        }
        public function send($to,$title,$content,$attachment=''){
                //实例化一个对象
            $mail = new PHPMailer();
            /*************************************************************/
                //设置相关属性
            $mail->IsSMTP();    //利用SMTP协议发送邮件
            $mail->SMTPAuth = true;     //开启SMTP服务
            $mail->Host = 'smtp.163.com';       //服务器设置为163的SMTP服务器
            /**************************************************************/
                //设置发送方相关信息
            $mail->From = $this->myMail;    //设置发送方邮箱
            $mail->FromName = $this->myName;    //发件人姓名
            $mail->Username = $this->myMail;    //登录到邮箱的用户名
            $mail->Password = $this->myPassword;    //网易邮箱授权码
            
            /**************************************************************/
                //编辑发送的内容
            $mail->IsHTML(true);    //可以发送html文件
            $mail->CharSet = 'utf-8';       //设置字符集
            $mail->Subject = $title;
            $mail->MsgHTML($content);
                //加载附件
            if(isset($attachment)){
                $mail->AddAttachment($attachment);
            }
            $mail->AddAddress($to);
            $result = $mail->Send();
            $return = array();
            if($result){
                $return['status'] = 1;
                $return['info'] = '发送成功';
            }else{
                $return['status'] = 0;
                $return['info'] = $mail->ErrorInfo;
            }
            return $return;
        }
    }
    
    
	