<?php
require "header.php";
if (isset($_POST['email_ver'])) {
    $sql = active_by_email(); 
}
?>
<div class="content">
        <div class="main-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Verify your Account</h1>
                        <input type="submit" class="btn btn-warning" name="email_ver" value="Verify by Email">
                        <input type="submit" class="btn btn-warning" name="mobile_ver" value="Verify by Mobile">
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
require "footer.php";
?>
