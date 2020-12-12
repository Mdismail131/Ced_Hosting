<?php
/**
 * Verified File.
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
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user->active($id, $db->conn);
} else {
    echo "<script>window.location.href='http://localhost/Ced_Hosting/index.php'</script>";
}
?>