<?php
session_start();
require "header.php";
require "Product.php";
require "Dbcon.php";
$prod = new Product();
$sql = $prod->all_categories($db->conn);
if (isset($_POST['add_cat'])) {
    $sub_cat = $_POST['sub_cat'];
    $href = $_POST['link'];
    $sql = $prod->add_cat($sub_cat, $href, $db->conn);
    echo "<script>window.location.href='create_cat.php';</script>";
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['prod_name'];
    $link = $_POST['link'];
    $sql = $prod->update_cat($id, $name, $link, $db->conn);
    echo "<script>alert('Update Successfull');</script>";
    echo "<script>window.location.href='create_cat.php';</script>";
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = $prod->delete_cat($id, $db->conn);
    echo "<script>window.location.href='create_cat.php';</script>";
}
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
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
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Add Category</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
                <div>
                </div>
              </div>
            </div>
            <form method="post">
                <div class="p-4 bg-secondary">
                    <label>
                        Category:
                    </label>
                    <div class="input-group mb-2"> 
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="ni ni-lock-circle-open text-primary"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" value="Hosting" disabled>
                    </div>
                </div>
                <div class="p-4 bg-secondary">
                    <label>
                        Sub-Category:
                    </label>
                    <input type="text" class="form-control form-control-alternative" name="sub_cat" id="sub_cat" pattern="^[a-zA-Z ]*$" placeholder="Sub Category">
                </div>
                <div class="p-4 bg-secondary">
                    <label>
                        link:
                    </label>
                    <input type="text" class="form-control form-control-alternative" name="link" placeholder="href">
                </div>
                <div class="p-4 bg-secondary">
                    <input type="submit" name="add_cat" class="btn btn-primary">
                </div>
            </form>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Categories</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
            <table class="table align-items-center table-flush display" id="table_id">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Category Parent Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category href</th>
                    <th scope="col">Category availability</th>
                    <th scope="col">Category Launch Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($sql as $key => $val) {
                    if ($val['prod_parent_id'] == 1) {
                ?>
                  <tr>
                  <form method="post">
                    <th scope="row">
                    <?php echo $val['id']; ?>
                    </th>
                    <td>
                    <?php echo $val['prod_parent_id']; ?>
                    </td>
                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['id']) {?>
                      <td>
                        <input type="text" name="prod_name" value="<?php echo $val['prod_name']; ?>">
                      </td>
                    <?php } else {?>
                    <td>
                    <?php echo $val['prod_name']; ?>
                    </td>
                    <?php } ?>
                    <?php if (isset($_POST['edit']) && $_POST['id'] == $val['id']) {?>
                      <td>
                        <input type="text" name="link" value="<?php echo $val['link']; ?>">
                      </td>
                    <?php } else {?>
                    <td>
                    <?php echo $val['link']; ?>
                    </td>
                    <?php } ?>
                    </td>
                    <?php if ($val['prod_available'] == 1) {?>
                    <td>
                    <?php echo "Available"; ?>
                    </td>
                    <?php } else { ?>
                    <td>
                    <?php echo "UnAvailable"; ?>
                    </td>
                    <?php } ?>
                    <td>
                    <?php echo $val['prod_launch_date']; ?>
                    </td>
                    <td>
                    <?php if (isset($_POST['edit'])) {?>
                      <button type="submit" name="update" onClick="return confirm('Are you sure you wanna update?')" class="text-primary"><input type="hidden" name="id" value="<?php echo $val['id']?>"><i class="fa fa-edit"></i></button>
                    <?php } else {?>
                      <button type="submit" name="edit" class="text-primary"><input type="hidden" name="id" value="<?php echo $val['id']?>"><i class="fa fa-edit"></i></button>
                    <?php } ?>
                    <button type="submit" name="delete" onClick="return confirm('Are you sure you wanna delete this?')" class="text-primary"><input type="hidden" name="id" value="<?php echo $val['id']?>"><input type="hidden" name="ppid" value="<?php echo $val['prod_parent_id']?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </form>
                  </tr>
                    <?php }
                } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
<?php
require "footer.php";
?>