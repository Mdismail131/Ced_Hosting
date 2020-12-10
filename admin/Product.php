<?php
/**
 * Global settings/Elements.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
/**
 * DBconnection Class.
 * PHP version 5
 * 
 * @category Product
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
class Product
{
    public function all_categories($conn)
    {
        $a = array();
        $sql = "select * from `tbl_product`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($a, $row);
            }
        }
        return $a; 
    } 
    public function add_cat($sub_cat, $href, $conn)
    {
        $sql = "INSERT INTO `tbl_product`(`prod_name`, `link`) VALUES ('$sub_cat', '$href')";
        $result = $conn->query($sql);
    } 
    public function delete_cat($id, $conn)
    {
        $sql = "DELETE FROM `tbl_product` WHERE `id` = '$id'";
        $result = $conn->query($sql);
    } 
}
?>