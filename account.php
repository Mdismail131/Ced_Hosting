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
require "header.php";
require "User.php";
require "Dbcon.php";
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = Date("Y-m-d h:i:s");
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $sec_ques = isset($_POST['question']) ? $_POST['question'] : '';
    $sec_ans = isset($_POST['answer']) ? $_POST['answer'] : '';
    if ($password != $re_password) {
        echo "<script>alert('Re_password incorrect.')</script>";
    } elseif (strlen($mobile) < 10 || strlen($mobile) > 10) {
        echo "<script>alert('Mobile number must contain 10 digits.')</script>";
    } else {
        $user->signup($name, $email, $mobile, $date, $password, $sec_ques, $sec_ans, $db->conn);
    }
}
?>
<!---login--->
    <div class="content">
        <!-- registration -->
        <div class="main-1">
            <div class="container">
                <div class="register">
                <form method="post"> 
                    <div class="register-top-grid">
                        <h3>personal information</h3>
                        <div>
                            <span>Full Name<label>*</label></span>
                            <input type="text" name="name" pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" required> 
                        </div>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" pattern="^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$" required> 
                        </div>
                        <div>
                            <span>security question</span>
                            <select name="question">
                                <option selected>Choose</option>
                                <option>What was your childhood nickname?</option>
                                <option>What is the name of your favourite childhood friend?</option>
                                <option>What was your favourite place to visit as a child?</option>
                                <option>What was your dream job as a child??</option>
                                <option>What is your favourite teacher's nickname?</option>
                            </select> 
                        </div>
                        <div>
                            <span>Security answer</span>
                            <input type="text" pattern="^[a-zA-Z]*$" name="answer"> 
                        </div>
                        <div>
                            <span>Mobile</span>
                            <input type="text" name="mobile" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" placeholder="10 digit mobile number"> 
                        </div>
                        <div class="clearfix"> </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                        </a>
                        </div>
                        <div class="register-bottom-grid">
                                <h3>login information</h3>
                                <div>
                                    <span>Password<label>*</label></span>
                                    <input type="password" name="password" required>
                                </div>
                                <div>
                                    <span>Confirm Password<label>*</label></span>
                                    <input type="password" name="re-password" required>
                                </div>
                        </div>
                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <input type="submit" name="register" value="submit">
                        <div class="clearfix"> </div>
                    </form>
                    </div>
            </div>
            </div>
        </div>
<!-- registration -->

            </div>
<!-- login -->
<?php
require "footer.php";
?>