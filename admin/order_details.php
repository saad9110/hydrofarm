<?php include 'includes/header.php'; ?>
<?php
include 'includes/session.php';

	$con = new mysqli('localhost', 'root', '', 'ecomm');
	if(!$con){
		echo "DATABASE ERORR";
		exit;
	}
	$id = $_GET['id'];
	$query = "SELECT * FROM `order` o 
	join `products` p on o.product_id = p.id
	join `ordernumber` t on o.ordernum_id = t.ordernum_id WHERE o.ordernum_id = '".$id."'";
	$row =$con->query($query);
	$subtotal=0;  $total = 0;
	?>
        <style type="text/css">
            .table {
                width: 50%;
    margin: 0 auto !important;
            }
        </style>
	<div class="table-responsive ">
		<table  class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th >Order ID</th>
					<th >Product</th>
					<th >Order Status</th>
					<th>Price</th>
					<th >Quantity</th>
					<th >Subtotal</th>
				</tr></thead>

				<tbody id="detail">
					<?php while($data = mysqli_fetch_array($row)) :
						?>
						<tr>

							<td>
								<?php echo $data["ordernum_id"] ;?>
							</td>
							<td>
								<?php echo $data["name"] ;?>  
							</td>
							<td>
								<?php echo $data["ordernum_category"] ;?>  
							</td>
							<td>
								<?php echo $data["price"] ;?>  
							</td>
							<td>
								<?php echo $data["quantity"] ;?>  
							</td>
							<td>
								<?php echo $data["quantity"]*$data["price"] ;?>  
							</td>
						</tr>
                    <?php 
                    
							$total = $total + ($data["price"]*$data["quantity"]);
                            $subtotal = $subtotal + $total;
                            $total = 0;
                    endwhile ;  ?>
				</tbody>
				<tr>
					<td colspan="5" align="right"><b>Total</b></td>
					<td><span id="total"><b>
						<?php 
						echo $subtotal;
						?>
						<b></b></b></span></td>
					</tr>
				</tbody>
			</table>
		</div>
 

        <!-- update `ordernumber` set ordercategory = 'Completed' where ordernum_id = $id; -->
        <!-- update `ordernumber` set ordercategory = 'Deleted' where ordernum_id = $id;  -->