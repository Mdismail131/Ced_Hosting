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
require "admin/User.php";
// require "admin/Dbcon.php";
if (isset($_SESSION['user'])) {
    header('Location: http://localhost/Ced_Hosting/index.php');
}
require "header.php";
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = Date("Y-m-d h:i:s");
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $mob = str_split($mobile);
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $sec_ques = isset($_POST['question']) ? $_POST['question'] : '';
    $sec_ans = isset($_POST['answer']) ? $_POST['answer'] : '';
    if ($password != $re_password) {
        echo "<script>alert('Re_password incorrect.')</script>";
    } elseif (strlen($mobile) < 10 || strlen($mobile) > 11) {
        echo "<script>alert('Mobile number must contain 10 digits.')</script>";
    } elseif ($mob[1] == $mob[2] && $mob[2] == $mob[3] && $mob[3] == $mob[4] && $mob[4] == $mob[5]) {
        echo "<script>alert('All Similar number not allowed')</script>";
    } elseif ($sec_ques == "Choose") {
        echo "<script>alert('Security Question should not be empty')</script>";
    } else {
        $user->signup($name, $email, $mobile, $date, $password, $sec_ques, $sec_ans, $db->conn);
        echo "<script>
                window.location.href='http://localhost/Ced_Hosting/verification.php'
            </script>";
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
                            <input type="text" name="name" 
                            pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" required> 
                        </div>
            <!-- pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" -->
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" 
                            pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" 
                            placeholder="ex: abc.125@example.com" required> 
                        </div>
                        <div>
                            <span>security question</span>
                            <select name="question" required>
                                <option selected>Choose</option>
                                <option>What was your childhood nickname?</option>
                                <option>
                                    What is the name of your 
                                    favourite childhood friend?
                                </option>
                                <option>
                                    What was your favourite place 
                                    to visit as a child?
                                </option>
                                <option>What was your dream job as a child??</option>
                                <option>
                                    What is your favourite teacher's nickname?
                                </option>
                            </select> 
                        </div>
                        <div>
                            <span>Security answer</span>
                            <input type="text" pattern="^[a-zA-Z]*$" 
                            name="answer" required> 
                        </div>
                        <div>
                            <span>Mobile</span>
                            <input type="text" name="mobile" 
                            minlength="10" maxlength="11"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                            placeholder="10 digit mobile number" required> 
                        </div>
                        <div class="clearfix"> </div> 
                        <a class="news-letter" href="#">
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox" checked="">
                                Sign Up for Newsletter
                            </label>
                        </a>
                        </div>
                        <div class="register-bottom-grid">
                                <h3>login information</h3>
                                <div>
                                    <span>Password<label>*</label></span>
                                    <input type="password" name="password" 
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)
                                    (?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$"
                                    placeholder="ex: Password@123" required>
                                    <span style="color: green;width: 350px">
                                        Note: Password Must Contain Uppercase-letter,
                                        Lowercase-letter and a special-character
                                    </span>
                                </div>
                                <div>
                                    <span>Confirm Password<label>*</label></span>
                                    <input type="password" name="re-password" 
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)
                                    (?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$" 
                                    placeholder="ex: Password@123" 
                                    required>
                                    <span style="color: green;width: 350px">
                                        Note: Password Must Contain Uppercase-letter,
                                        Lowercase-letter and a special-character
                                    </span>
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