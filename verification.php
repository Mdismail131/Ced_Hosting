<?php
/**
 * Verification File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
require "admin/User.php";
require "admin/Dbcon.php";
require "header.php";
$user = new User();
if (isset($_POST['email_ver'])) {
    $email = $_POST['email'];
    $sql = $user->active_by_email($email, $db->conn); 
    if ($sql != "error") {
        foreach ($sql as $key => $val) {
            $id = $val['id'];
            $email = $val['email'];
        }
        $active = $user->activate_email($id, $email);
        echo "<script>alert('Check Your Email');</script>";
    } else {
        echo "<script>alert('Email doesn't Found');</script>";
    }
}
?>
<div class="content">
        <div class="main-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <form action="" method="post">
                            <h1>Verify your Account</h1>
                            <input type="email" name="email" 
                            placeholder="enter your email here">
                            <input type="text" name="mobile" 
                            placeholder="enter your Mobile Number here"><br>
                            <input type="submit" class="btn btn-warning" 
                            name="email_ver" value="Verify by Email">
                            <input type="submit" class="btn btn-warning" 
                            name="mobile_ver" value="Verify by Mobile">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
require "footer.php";
?>
