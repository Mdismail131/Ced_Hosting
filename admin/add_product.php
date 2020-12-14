<?php
session_start();
require "header.php";
require "Product.php";
require "Dbcon.php";
$prod = new Product();
$sql = $prod->all_categories($db->conn);
if (isset($_POST['create'])) {
    $feature = array();
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
    $add_cat = $prod->add_product_cat($prod_cat, $prod_name, $url, $db->conn);
    $add_prod = $prod->add_prod($prod_cat, $description, $mon_price, $annual_price, $sku, $db->conn);
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
                  <li class="breadcrumb-item">
                    <a href="#"><i class="fas fa-home"></i></a>
                  </li>
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
                  <h1 class="mb-0">Add New Product</h1>
                  <h3 class="mb-0">Enter Product Details</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
                <div>
                </div>
              </div>
            </div>
            <hr>
            <form method="post">
                <div class="p-4 bg-secondary">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">
                      Select Product Category<sup class="text-danger ml-2">*</sup>
                    </label>
                    <select class="form-control" 
                    id="exampleFormControlSelect1" name="prod_cat">
                        <option>Please Select</option>
                        <?php 
                        foreach ($sql as $key => $val) {
                            if ($val['prod_parent_id'] == 1) {
                        ?>
                        <option value="<?php echo $val['id']; ?>">
                            <?php echo $val['prod_name']; ?>
                        </option>
                            <?php }
                        } ?>
                    </select>
                  </div>
                </div>
                <div class="p-4 bg-secondary">
                    <label for="exampleFormControlSelect1">
                        Enter Product Name<sup class="text-danger ml-2">*</sup>
                    </label>
                    <input type="text" id="prod_name" 
                    onblur="errors(this.id)" 
                    class="form-control form-control-alternative"
                    name="prod_name" placeholder="Product Name">
                    <div id="prod_nameError"></div>
                </div>
                <div class="p-4 bg-secondary">
                    <label for="exampleFormControlSelect1">Page URL</label>
                    <input type="text" 
                    class="form-control form-control-alternative" 
                    name="page_url" placeholder="Page URL">
                </div>
                <hr class="line">
                <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="mb-0">Product Description</h2>
                  <h3 class="mb-0">Enter Product Description Below</h3>
                </div>
                <div>
                </div>
              </div>
            </div>
            <hr>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Enter Monthly Price<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="number" step="0.01" name="mon_price" 
                id="mon_price" onblur="errors(this.id)" 
                class="form-control" min="0" maxlength=15 
                placeholder="ex:23" required>
                <div id="mon_priceError"></div>
                <h5 class="text-muted mt-2">This would be Monthly Plan</h5>
            </div>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Enter Annual Price<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="number" step="0.01" name="annual_price"
                id="annual_price" onblur="errors(this.id)" 
                class="form-control" min="0" maxlength=15 
                placeholder="ex:23" required>
                <div id="annual_priceError"></div>
                <h5 class="text-muted mt-2">This would be Annual Plan</h5>
            </div>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  SKU<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="text" name="sku" id="sku" 
                onblur="errors(this.id)" class="form-control" 
                min="0" maxlength=15 required>
                <div id="skuError"></div>
            </div>
            <hr class="line">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="mb-0">Features</h2>
                </div>
              </div>
            </div>
            <hr>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Web Spaces (in GB)<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="text" id="web_space" onblur="errors(this.id)" 
                class="form-control form-control-alternative" name="web_space">
                <div id="web_space"></div>
                <h5 class="text-muted mt-2">Enter 0.5 for 512 MB</h5>
            </div>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Bandwidth (in GB)<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="text" id="bandwidth" onblur="errors(this.id)" 
                class="form-control form-control-alternative" name="bandwidth">
                <div id="bandwidth"></div>
                <h5 class="text-muted mt-2">Enter 0.5 for 512 MB</h5>
            </div>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Free Domain<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="text" id="domain" onblur="errors(this.id)" 
                class="form-control form-control-alternative" name="domain">
                <div id="domain"></div>
                <h5 class="text-muted mt-2">
                  Enter 0 if no domain available in this service
                </h5>
            </div>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Language/Technology Support<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="text" id="techno" onblur="errors(this.id)" 
                class="form-control form-control-alternative" name="techno">
                <div id="techno"></div>
                <h5 class="text-muted mt-2">
                  Separate by (,) Ex: PHP, MySQL, MongoDB
                </h5>
            </div>
            <div class="p-4 bg-secondary">
                <label for="exampleFormControlSelect1">
                  Mailbox<sup class="text-danger ml-2">*</sup>
                </label>
                <input type="text" id="mail" onblur="errors(this.id)" 
                class="form-control form-control-alternative" name="mail">
                <div id="mail"></div>
                <h5 class="text-muted mt-2">
                  Enter Number of mailbox will be provided, enter 0 if none
                </h5>
            </div>
            <div class="p-4 bg-secondary text-center">
              <button type="submit" class="btn btn-success" name="create">
                Create New
              </button>
            </div>
            </form>
          </div>
        </div>
    </div>
<?php
require "footer.php";
?>