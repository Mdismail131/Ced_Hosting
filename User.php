<?php
/**
 * Header File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
session_start();
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class User
{
    
    /* Function for user and admin Login */
    function login($email, $password, $conn)
    {
        // $pass = md5($password);
        $sql = "select * from `tbl_user` where `email` = '$email' and `password` = '$password'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0 ) {
            if ($row['email_approved'] == 1 || $row['phone_approved'] == 1) {
                $_SESSION['user'] = $row['name'];
                echo "<script>alert('successfully logged in')</script>";
            }
        }
        header('refresh:0 url=index.php');
    }

    /* Function for user SignUp */
    function signup($name, $email, $mobile, $date, $password, $sec_ques, $sec_ans, $conn)
    {
        $sql = "select * from `tbl_user` where `email` = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0 ) {
            ?>
            <script>alert("Email Already Exist");</script>
            <?php
        } else {
            $sql1 = "INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('$email','$name','$mobile','0','0','0','0','$date','$password','$sec_ques','$sec_ans')";
            // echo $sql1;
            $result1 = $conn->query($sql1);

            $robo = 'mi0718839@gmail.com';
            $developmentMode = true;
            $mailer = new PHPMailer($developmentMode);

            try {
                $mailer->SMTPDebug = 2;
                $mailer->isSMTP();

                if ($developmentMode) {
                    $mailer->SMTPOptions = [
                        'ssl'=> [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        ]
                    ];
                }


                $mailer->Host = 'ssl://smtp.gmail.com';
                $mailer->SMTPAuth = true;
                $mailer->Username = 'mi0718839@gmail.com';
                $mailer->Password = 'greatansariismail';
                $mailer->SMTPSecure = 'tls';
                $mailer->Port = 465;

                $mailer->setFrom('mi0718839@gmail.com', 'Name of sender');
                $mailer->addAddress($email, 'Name of recipient');

                $mailer->isHTML(true);
                $mailer->Subject = 'PHPMailer Test';
                $mailer->Body = 'This is a verification mail please click on the link to verify your account "http://localhost/Ced_Hosting/verification.php?email="'.md5($email);

                $mailer->send();
                $mailer->ClearAllRecipients();
                echo "MAIL HAS BEEN SENT SUCCESSFULLY";

            } catch (Exception $e) {
                echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
            }
            if (isset($result1)) {
            ?><script>alert("Successfully Signup please wait for Admin authentication");</script><?php
            } else {
            ?><script>alert("Please Provide Valid Inputs");</script><?php
            }
        }
    }
}
$user = new User();