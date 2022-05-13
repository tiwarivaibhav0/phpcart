<?php 
session_start();
include 'header.php';
include 'config.php';
if(!isset($_SESSION["cart"])){
	$_SESSION["cart"]=array();
}
else{
	$id=$_GET["name"];
	foreach ($products as $key => $val) {
		if($val['id']==$id){
			//array_push($_SESSION["cart"],$val);
			$_SESSION["cart"][$id]=$val;

		}
	}
	
	//print_r($_SESSION["cart"]);


}


?>
	<div id="main">
		<div id="products">
	<?php		foreach ($products as $key => $val) {  ?>
			<div id="<?php echo($val['id']) ?>" class="product">
				<img src="<?php echo($val['image']) ?>">
				<h3 class="title"><a href="#"><?php echo($val['name']) ?></a></h3>
				<span>Price: <?php echo($val['price']) ?>.00</span>
				<a class="add-to-cart" href="?name=<?php echo($val['id']) ?>">Add To Cart</a>
			</div>
	<?php	}                                           ?>		
			
		</div>
	</div>

	<?php if(isset($_GET["name"])){ ?>
	<div id="cart">
		<table>
			<tr><th>Product ID</th><th>Product Name</th><th>Product Price</th></tr>
		<?php foreach($_SESSION["cart"] as $key => $val){ ?>
			<tr><td><?php echo($val['id']); ?></td>
			<td><?php echo($val['name']); ?></td>
			<td><?php echo($val['price']); ?></td>
		
		
		    </tr>


	    <?php 		
		}
		?>
		</table>
	</div>

	
	<?php } 
	
	include 'footer.php';  ?>