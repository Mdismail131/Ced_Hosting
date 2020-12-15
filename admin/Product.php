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
 * Product Class.
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
        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`) VALUES ('1', '$sub_cat', '$href')";
        $result = $conn->query($sql);
    } 
    public function delete_cat($id, $conn)
    {
        $sql = "DELETE FROM `tbl_product` WHERE `id` = '$id'";
        $result = $conn->query($sql);
    }
    public function delete_prod($id, $conn)
    {
        $sql = "DELETE tbl_product, tbl_product_description FROM `tbl_product_description` INNER JOIN `tbl_product` ON tbl_product_description.prod_id = tbl_product.prod_parent_id WHERE `prod_id`='$id'";
        $conn->query($sql);
    } 
    public function update_cat($id, $name, $link, $conn)
    {
        $sql = "UPDATE `tbl_product` SET `prod_name`= '$name',`link`= '$link' WHERE `id` = '$id'";
        $result = $conn->query($sql);
    }
    public function add_prod($prod_cat, $description, $mon_price, $annual_price, $sku, $conn)
    {
        $sql = "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$prod_cat', '$description', '$mon_price', '$annual_price', '$sku')";
        $result = $conn->query($sql);
    }
    public function update_prod($id, $prod_cat, $description, $mon_price, $annual_price, $sku, $conn)
    {
        $sql = "UPDATE `tbl_product_description` SET `prod_parent_id`='$prod_cat',`description`='$description',`mon_price`='$mon_price',`annual_price`='$annual_price',`sku`='$sku' WHERE `prod_id` = '$id'";
        $result = $conn->query($sql);
    }
    public function update_product_cat($id, $name, $link, $conn)
    {
        $sql = "UPDATE `tbl_product` SET `prod_name`= '$name',`link`= '$link' WHERE `prod_parent_id` = '$id'";
        $result = $conn->query($sql);
    } 
    public function add_product_cat($cat, $sub_cat, $href, $conn)
    {
        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`) VALUES ('$cat', '$sub_cat', '$href')";
        $result = $conn->query($sql);
    } 
    public function fetch_cat_name($id, $conn) 
    {
        $sql = "select prod_name from `tbl_product` where `prod_parent_id` = '$id'";
        $result = $conn->query($sql);
        
        if ($result == true) {
            $name = $result->fetch_array()[0] ?? '';
        }
        return $name;
    }
    public function all_prod($conn) 
    {
        $a = array();
        $sql = "SELECT * FROM `tbl_product` INNER JOIN `tbl_product_description` ON `tbl_product`.id = `tbl_product_description`.prod_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($a, $row);
            }
        }
        return $a; 
    }
    public function drop_down($conn)
    {
        $a = array();
        $sql = "SELECT * FROM `tbl_product`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($a, $row);
            }
        }
        return $a; 
    }
    public function fetch_prod($id, $conn) 
    {
        $sql = "SELECT * FROM `tbl_product_description` INNER JOIN `tbl_product` ON `tbl_product`.id = `tbl_product_description`.prod_id WHERE `prod_id` = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row; 
    }
}
?>