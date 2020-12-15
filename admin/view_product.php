<?php
session_start();
require "header.php";
require "Product.php";
require "Dbcon.php";
$prod = new Product();
$sql = $prod->all_prod($db->conn);
if (isset($_POST['update'])) {
    $feature = array();
    $id = $_POST['id'];
    $prod_cat = $_POST['prod_cat'];
    $prod_name = $_POST['prod_name'];
    $url = $_POST['page_url'];
    $mon_price = $_POST['mon_price'];
    $annual_price = $_POST['annual_price'];
    $sku = $_POST['sku'];
    $web_space = $_POST['web_space'];
    $bandwidth = $_POST['bandwidth'];
    $domain = $_POST['domain'];
    $techno = $_POST['techno'];
    $mail = $_POST['mail'];
    $feature = array(
        'web_space' => $web_space,
        'bandwidth' => $bandwidth,
        'domain' => $domain,
        'techno' => $techno,
        'mail' => $mail
    );
    $description = json_encode($feature);
    $add_prod = $prod->update_prod($id, $prod_cat, $description, $mon_price, $annual_price, $sku, $db->conn);
    $add_cat = $prod->update_product_cat($id, $prod_name, $url, $db->conn);
    echo "<script>alert('Update Successfull');</script>";
    echo "<script>window.location.href='view_product.php';</script>";
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = $prod->delete_prod($id, $db->conn);
    echo "<script>alert('Delete Successfull');</script>";
    echo "<script>window.location.href='view_product.php';</script>";
}
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                    <nav aria-label="breadcrumb" 
                    class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#">
                                <i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="http://localhost/Ced_Hosting/admin/index.php">Dashboards</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Default
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Products</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush display" 
                id="table_id">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Page URL</th>
                            <th scope="col">Monthly Price</th>
                            <th scope="col">Annual Price</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Status</th>
                            <th scope="col">Disc Space</th>
                            <th scope="col">Bandwidth</th>
                            <th scope="col">Free Domain</th>
                            <th scope="col">Lang/Tech Support</th>
                            <th scope="col">Mailbox</th>
                            <th scope="col">Launch Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sql as $key => $val) {
                        ?>
                            <tr>
                                <form method="post">
                                    
                                    <th scope="row">
                                        <?php echo $val['id']; ?>
                                    </th>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                        <select class="form-control" 
                                        id="exampleFormControlSelect1" name="prod_cat">
                                            <option>Please Select</option>
                                            <?php
                                            $sql1 = $prod->drop_down($db->conn);
                                            foreach ($sql1 as $key => $value) {
                                                if ($value['prod_parent_id'] == 1) {
                                            ?>
                                            <option value="<?php echo $value['id']; ?>">
                                                <?php echo $value['prod_name']; ?>
                                            </option>
                                                <?php }
                                            } ?>
                                        </select>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $val['prod_name']; ?>
                                        </td>
                                    <?php } ?>
                                    <?php 
                                        $id = $val['prod_id'];
                                        $fetch_cat = $prod->fetch_cat_name($id, $db->conn);
                                    ?>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                            <input type="text" name="prod_name" value="<?php echo $fetch_cat; ?>">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $fetch_cat; ?>
                                        </td>
                                    <?php } ?>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                            <input type="text" name="page_url" value="<?php echo $val['link']; ?>">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $val['link']; ?>
                                        </td>
                                    <?php } ?>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                            <input type="text" name="mon_price" value="<?php echo $val['mon_price']; ?>">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $val['mon_price']; ?>
                                        </td>
                                    <?php } ?>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                            <input type="text" name="annual_price" value="<?php echo $val['annual_price']; ?>">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $val['annual_price']; ?>
                                        </td>
                                    <?php } ?>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                            <input type="text" name="sku" value="<?php echo $val['sku']; ?>">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $val['sku']; ?>
                                        </td>
                                    <?php } ?>
                                    <?php if ($val['prod_available'] == 1) { ?>
                                        <td>
                                            <?php echo "Available"; ?>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo "UnAvailable"; ?>
                                        </td>
                                    <?php } ?>
                                    <?php
                                    $description = json_decode($val['description']);
                                    foreach ($description as $key1 => $descript) {
                                    ?>
                                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['prod_id']) { ?>
                                        <td>
                                            <input type="text" name="<?php echo $key1 ?>" value="<?php echo $descript; ?>">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo $descript ?>
                                        </td>
                                    <?php } ?>
                                    <?php } ?>
                                    <td>
                                        <?php echo $val['prod_launch_date']; ?>
                                    </td>
                                    <td>
                                        <?php if (isset($_POST['edit'])) { ?>
                                            <button type="submit" name="update" onClick="return confirm('Are you sure you wanna update?')" class="text-primary"><input type="hidden" name="id" value="<?php echo $val['prod_id'] ?>"><i class="fa fa-edit"></i></button>
                                        <?php } else { ?>
                                            <button type="submit" name="edit" class="text-primary"><input type="hidden" name="id" value="<?php echo $val['prod_id'] ?>"><i class="fa fa-edit"></i></button>
                                        <?php } ?>
                                        <button type="submit" name="delete" onClick="return confirm('Are you sure you wanna delete this?')" class="text-primary"><input type="hidden" name="id" value="<?php echo $val['prod_id'] ?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require "footer.php";
?>