<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="sales_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>DELETE PRODUCT</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- View Sale Order -->

<?php

  $con = new mysqli('localhost', 'root', '', 'ecomm');
  
	if(!$con){
		echo "DATABASE ERORR";
		exit;
  }
  
  // $id = $_GET['id'];

	// $query = "SELECT * FROM `order` o 
	// join `products` p on o.product_id = p.id
	// join `ordernumber` t on o.ordernum_id = t.ordernum_id WHERE o.ordernum_id = '".$id."'";
	// $row =$con->query($query);
  // $subtotal=0;  $total = 0;
  
	?>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		      <span aria-hidden="true">&times;
		      </span>
		</button>
		<h4 class="modal-title"><b> Full Details</b></h4>
      </div>
      <div class="modal-body">
      <p>
							Date: <span id="date"></span>
						</p>
						<table class="table table-bordered">
							<thead>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Order Status</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
							</thead>
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
                  endwhile ; 
                ?>
                <tr>
                  <td colspan="5" align="right"><b>Total</b></td>
                  <td><span id="total"></span>  
              <?php 
                      echo $subtotal;
											?>
                  </td>
							</tr>
							</tbody>
						</table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>

  </div>
</div>



