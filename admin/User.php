<?php
/**
 * User File.
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
        $sql = "select * from `tbl_user` where `email` = '$email' and `password` = '$password'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0 ) {
            if ($row['is_admin'] == 1) {
                $_SESSION['admin'] = $row['name'];
                echo "<script>alert('Welcome Admin')</script>";
                echo "<script>window.location.href='http://localhost/Ced_Hosting/admin/index.php'</script>";
            } else {
                if ($row['email_approved'] == 1 || $row['phone_approved'] == 1) {
                    $_SESSION['user'] = $row['name'];
                    echo "<script>alert('successfully logged in')</script>";
                    echo "<script>window.location.href='http://localhost/Ced_Hosting/index.php'</script>";
                } 
            }
        } else {
            echo "<script>alert('User Doesn't Exist')</script>";
        }
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
            $result1 = $conn->query($sql1);
            if (isset($result1)) {
            ?><script>alert("Successfully Signup please wait for Admin authentication");</script><?php
            } else {
            ?><script>alert("Please Provide Valid Inputs");</script><?php
            }
        }
    }
    public function active_by_email($email, $conn)
    {
        $a = array();
        $sql = "select * from `tbl_user` where `email` = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($a, $row);
            }
            return $a;
        } else {
            return "error";
        }
    }
    public function activate_email($id, $email) 
    {
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

            $mailer->setFrom('mi0718839@gmail.com', 'Md Ismail');
            $mailer->addAddress($email, 'Name of recipient');

            $mailer->isHTML(true);
            $mailer->Subject = 'PHPMailer Test';
            $mailer->Body = 'Verify Your Account<a href="http://localhost/Ced_Hosting/verified.php?id='.$id.'">Click here</a>';
            $mailer->send();
            $mailer->ClearAllRecipients();
            echo "MAIL HAS BEEN SENT SUCCESSFULLY";

        } catch (Exception $e) {
            echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }
    }
    public function active($id, $conn)
    {
        $sql = "select * from `tbl_user` where `id` = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sql1 = "UPDATE `tbl_user` SET `email_approved`= '1', `active` = '1' WHERE `id` = '$id'";
            $result1 = $conn->query($sql1);
            echo "<script>alert('Welcome to Ced Hosting')</script>";
        }
    }
}
$user = new User();