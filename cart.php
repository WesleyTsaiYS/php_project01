<?php
//Define error
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// load lobraries
include_once'header.php';
require_once __DIR__ .'/includes/dbh.inc.php';
require_once __DIR__ .'/includes/cart_functions.inc.php';

// logic code
// session_start();
// session_destroy(); #重新整理暫存

$query = 'SELECT * FROM Products ORDER BY ID ASC';
$result = mysqli_query($conn, $query);
$productIds = [];
$items = $_SESSION['shopping_cart'] ?? [];

#add to cart被啟動
if(filter_input(INPUT_POST,'add_to_cart')){
  #查看購物車裡面是否有產品
  if(isset($items)){ 
    checkCartShop($items);
  }
  #如果購物車裡面沒有產品
  else{
    createCartShop($items);
  }
}
#delete被啟動
if(filter_input(INPUT_GET,'action') == 'delete'){
  delete($items);
}
?>
<div class="cart-box">

  <div class="card">
    <?php if($result): ?>
      <?php if(mysqli_num_rows($result)>0):?>
        <?php while($product = mysqli_fetch_assoc($result)):?>
          <form method="post" action="cart.php?action=add&ID=<?= $product['ID'];?>">
              <div class="card-box">
                <img src="img/<?= $product['Image'];?>"class="card-img"/>
                <?= $product['Name']; ?>
                $ <?= $product['Price'];?>
                <input type="number" name="Quantity" placeholder="Enter the quantity" min="0" step="1" required/>
                <input type="hidden" name="Name" value="<?= $product['Name']; ?>" />
                <input type="hidden" name="Price" value="<?= $product['Price']; ?>"/>
                <input type="submit" name="add_to_cart" class="card-sub" value="Add to cart"/>
              </div>
            </form>
        <?php endwhile;?>
      <?php endif;?>
    <?php endif;?>
  </div>

  <?php if(!empty($_SESSION['shopping_cart'])): $total = 0; ?> 
    <div class="cart_count">
      <table class="table">

        <tr>
          <th colspan="5"><h3>Order Details</h3></th>
        </tr>
        <tr>
          <td class="table_left">Product Name</td>
          <td class="table_right">Quantity</td>
          <td class="table_right">Price</td>
          <td class="table_right">Total</td>
          <td class="table_right">Action</td>
        </tr>

        <?php foreach($_SESSION['shopping_cart'] as $key => $product):?>
          <tr>
            <td class="table_left"><?= $product['Name']?></td>
            <td class="table_right"><?= $product['Quantity']?></td>
            <td class="table_right">$ <?= $product['Price']?></td>
            <td class="table_right">$ <?= number_format($product['Quantity'] * $product['Price'],0);?></td>
            <td class="table_right">
              <a class="remove" href="cart.php?action=delete&ID=<?php echo $product['ID'];?>">Remove</a>
            </td>
          </tr>
          <?php $total = $total +($product['Quantity'] * $product['Price']);?>
        <?php endforeach;?>

        <tr>
          <td colspan="3" class="table_left">Total</td>
          <td class="table_right">$ <?= number_format($total,0); ?> </td>
        </tr>

        <tr>
          <th colspan="5">
            <?php if(isset($_SESSION['shopping_cart'])):?>
              <?php if (count($_SESSION['shopping_cart']) > 0):?>
                <a href="#" class="Checkout">Checkout</a>
              <?php endif; ?>
            <?php endif; ?>
          </th>
        </tr>

      </table>
    </div>
  <?php endif;?>

</div>

<?php include_once'footer.php';?>




<!-- <div class="cart_count">
    <table class="table">

      <tr>
        <th colspan="5"><h3>Order Details</h3></th>
      </tr>
      <tr>
        <td class="table_left">Product Name</td>
        <td class="table_right">Quantity</td>
        <td class="table_right">Price</td>
        <td class="table_right">Total</td>
        <td class="table_right">Action</td>
      </tr>

      <?php if(!empty($_SESSION['shopping_cart'])): $total = 0; ?> 
        <?php foreach($_SESSION['shopping_cart'] as $key => $product):?>
          <tr>
            <td class="table_left"><?= $product['Name']?></td>
            <td class="table_right"><?= $product['Quantity']?></td>
            <td class="table_right">$ <?= $product['Price']?></td>
            <td class="table_right">$ <?= number_format($product['Quantity'] * $product['Price'],0);?></td>
            <td class="table_right">
              <a href="cart.php?action=delete&ID=<?php echo $product['ID'];?>">
                <div class="btn btn-danger">Remove</div>
              </a>
            </td>
          </tr>
          <?php $total = $total +($product['Quantity'] * $product['Price']);?>
        <?php endforeach;?>

        <tr>
          <td colspan="3" class="table_left">Total</td>
          <td class="table_right">$ <?= number_format($total,0); ?> </td>
        </tr>
  
        <tr>
          <th colspan="5">
            <?php if(isset($_SESSION['shopping_cart'])):?>
              <?php if (count($_SESSION['shopping_cart']) > 0):?>
                <a href="#" class="btn btn-primary">Checkout</a>
              <?php endif; ?>
            <?php endif; ?>
          </td>
        </tr>
      <?php endif;?>

    </table>
  </div> -->
