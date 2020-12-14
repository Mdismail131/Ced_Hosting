<?php
/**
 * Login File.
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
// session_destroy();
if (isset($_SESSION['user'])) {
    header('Location: http://localhost/Ced_Hosting/index.php');
} elseif (isset($_SESSION['admin'])) {
    header('Location: http://localhost/Ced_Hosting/admin/index.php');
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $user->login($email, $pass, $db->conn);
}
require "header.php";
?>
<!---login--->
    <div class="content">
        <div class="main-1">
            <div class="container">
                <div class="login-page">
                    <div class="account_grid">
                        <div class="col-md-6 login-left">
                                <h3>new customers</h3>
                                <p>
                                    By creating an account with our store,
                                    you will be able to move through the 
                                    checkout process faster, store multiple 
                                    shipping addresses, view and track your 
                                    orders in your account and more.
                                </p>
                                <a class="acount-btn" href="account.php">
                                    Create an Account
                                </a>
                        </div>
                        <div class="col-md-6 login-right">
                            <h3>registered</h3>
                            <p>If you have an account with us, please log in.</p>
                            <form method="POST">
                                <div>
                                <span>Email Address<label>*</label></span>
                                <input type="email" name="email" 
                                pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"
                                required> 
                                </div>
                                <div>
                                <span>Password<label>*</label></span>
                                <input type="password" name="password" required> 
                                </div>
                                <a class="forgot" href="#">Forgot Your Password?</a>
                                <input type="submit" name="login" value="Login">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- login -->
<?php
require "footer.php";
?>