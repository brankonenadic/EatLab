<?php
$message = '';

if(isset($_POST["hidden_id"])){


	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'item_id');

	if(in_array($_POST["hidden_id"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
			{
				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
			}
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
	setcookie('shopping_cart', $item_data, time() + (60 * 30));
	header("location:./cart?success=1");

}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_id'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				header("location:./cart?remove=1");
			}
		}
	}
	if($_GET["action"] == "clear")
	{
		setcookie("shopping_cart", "", time() - 3600);
		header("location:./cart?clearall=1");
	}
}

if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible card-body-new">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible card-body-new">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_GET["clearall"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible card-body-new">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
	';
}

?>
<?php include './sections/header.section.php'; ?>
<?php include './sections/navbar.section.php'; ?>
<?php include './includes/autoloader.inc.php';?>
<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
                <div class="label-heading"><h5 class="text-center text-white">Cart</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">

					<div class="container bg-light card-body-new">		
						<div style="clear:both"></div>
						<br />
						<h3>Order Details</h3>
						<div class="table-responsive">
						<?php echo $message; ?>
						<div align="right">
							<a href="./cart?action=clear"><b class="text-danger">Clear Cart</b></a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered">
								<tr>
									<th width="5%">#</th>
									<th width="35%">Item Name</th>
									<th width="10%">Quantity</th>
									<th width="20%">Price</th>
									<th width="15%">Total</th>
									<th width="5%">Action</th>
								</tr>
								<form id="order_form" method="POST">
							<?php
							if(isset($_COOKIE["shopping_cart"]))
							{
								$total = 0;
								$cookie_data = stripslashes($_COOKIE['shopping_cart']);
								$cart_data = json_decode($cookie_data, true);
								$counter = 1;
								foreach($cart_data as $keys => $values)
								{
							?>
								<tr>
									<th><?php echo $counter; ?></th>
									<td><?php echo $values["item_name"]; ?></td>
									<td><input type="hidden" name="item_quantity[]" value="<?php echo $values["item_quantity"]; ?>">
									<?php echo $values["item_quantity"]; ?></td>
									<td><?php echo $values["item_price"]; ?> km</td>
									<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> km</td>
									<td><input type="hidden" name="item_id[]" value="<?php echo $values["item_id"]; ?>">
									<a href="./cart?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
									
								</tr>
							<?php	
							$counter++;
							$num = $counter;
									$total = $total + ($values["item_quantity"] * $values["item_price"]);
								}
							?>
								<tr>
									<td colspan="4" align="right">Total</td>
									<td align="right"> <?php echo number_format($total, 2); ?> km</td>
									<td><button type="submit" class="btn btn-outline-new " 
								name="order_btn" id="order_btn" value="order_btn">Order</button></td>
								</tr>
								
							<?php
							
							}
							else
							{
								echo '
								<tr>
									<td colspan="6" align="center">
									<div class="label-heading py-5 my-5">
									<h4 class="text-center">No Item in Cart</h4>
									</div> 
									</td>
								</tr>
								';
							}
							?>
							</form>
						</table>
					</div>
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col -->
</div><!-- content end -->
<?php include './sections/footer.section.php'; ?>




