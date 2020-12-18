<?php
/**
 * Cart File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */ 
session_start();
require "header.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['cartdata'][$id]);
    echo "<script>
    alert('Item Deleted');
    window.location.href='cart.php';</script>";
}
?>
<section id="cart-view">
   <div class="container">
     <div class="row">
     <form action = "product.php" method="POST">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>SKU</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Billing Cycle</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="cart">
                    <?php
                    
                    $cart_products = array();
                    $total = 0;
                    $num = 0; 
                    if (isset($_SESSION['cartdata']) && $_SESSION['cartdata'] != "") {

                        $cart_products = $_SESSION['cartdata'];
                    }
                    
                    foreach ($cart_products as $key => $val1) {
                    ?>
                    <tr>
                      <td><?php echo $val1['id']; ?></td>
                      <td><?php echo $val1['sku']; ?></td>
                      <td><?php echo $val1['name']; ?></td>
                      <td><?php echo $val1['cat_name']; ?></td>
                      <td>Monthly</td>
                      <td><?php echo $val1['price']; ?></td>
                      <td><a href="cart.php?id=<?php echo $key; ?>"><i class="glyphicon glyphicon-trash" style="color: red"></i></td>
                    </tr>
                    <input type="hidden" name="data[<?php echo $num; ?>][name]" value="<?php echo $val1['name']; ?>" />
                    <input type="hidden" name="data[<?php echo $num; ?>][price]" value="<?php echo $val1['price']; ?>" />
                    <input type="hidden" name="data[<?php echo $num; ?>][quantity]" value="<?php echo $val1['qnt']; ?>" />
                    <?php 
                    $total = $total + $val1['price'];;
                    $num++; 
                    } ?>
                    </tbody>
                  </table>
                </div>
             
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$<?php echo $total; ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <input type="hidden" name="data[total]" value="<?php echo $total; ?>" />
                     <td>$<?php echo $total; ?></td>
                   </tr>
                 </tbody>
               </table>
                <?php

                if (isset($_SESSION['user'])) {

                    echo '<a href="javascript:void(0)" class="aa-cart-view-btn"><input type="submit" class="aa-cart-view-btn" name="checkout" value="Proced to Checkout"/></a>';

                } else {
                    echo '<a href="http://localhost/Ced_Hosting/login.php" class="aa-cart-view-btn">Login</a>';
                }

                ?>
              
             </div>
           </div>
         </div>
       </div>
      </form>
     </div>
   </div>
 </section>
<?php
require "footer.php";
?>