<?php include 'includes/session.php'; ?>
	<?php include 'includes/header.php'; ?>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
session_start();
			<?php include 'includes/navbar.php'; ?>
			<?php include 'includes/menubar.php'; ?>
			<?php include 'includes/order_modal.php'; ?>

			
			<!--Start -->


			<!--End -->

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Order History
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Orders</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header with-border">
									<div class="pull-right">
										<form method="POST" class="form-inline" action="sales_print.php">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
											</div>
											<button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
										</form>
									</div>
								</div>
								<div class="box-body">
									<table id="example1" class="table table-bordered">
										<thead>
											<th class="hidden"></th>
											<th>Order ID</th>
											<th>Date</th>
											<th>Buyer Name</th>
											<th>Amount</th>
											<th>Status</th>
											<th>Action</th>
										</thead>
										<tbody>
											<?php
											$con = @mysqli_connect('localhost', 'root', '', 'ecomm');
											$orders = "SELECT * FROM ordernumber o inner join users p on o.id = p.id";
											$result = $con->query($orders);
											while($order_data = mysqli_fetch_array($result)) :
												?>
												<tr>
													<td><?php echo $order_data["ordernum_id"] ;?></td>
													<td><?php echo $order_data["order_Date"] ;?></td>
													<td><?php echo $order_data["firstname"] ;?> &nbsp; <?php echo $order_data["lastname"] ;?></td>
													<td> <?php
													$price = "SELECT * FROM `products` p inner join `order` o on p.id = o.product_id where o.ordernum_id ='".$order_data["ordernum_id"]."' ";
													$results = $con->query($price);
													
													$total = 0;
													$subtotal = 0;
													
													
													while($amount = mysqli_fetch_array($results)) :

														$total = $total + ($amount["price"] * $amount["quantity"]);
														$subtotal = $subtotal + $total;
														$total = 0;
													endwhile; echo $subtotal;
													?>
												</td>
												<td> <?php echo $order_data["ordernum_category"] ;?> </td>
												
												<td>
													 <a type="button" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-eye" >
														</i>
													</a>
													
													<a onclick="updateComplete(<?php echo $order_data["ordernum_id"]; ?>)" style="cursor:pointer;" title="complete"  data-toggle="tooltip" data-original-title="Edit">
														<i class="fa fa-check">
														</i>
													</a>
													<a onclick="updateCancel(<?php echo $order_data["ordernum_id"];?>)" style="cursor:pointer;" title="Cancel" data-toggle="tooltip" data-original-title="Delete">
														<i class="fa fa-remove text-danger">
														</i>
													</a><?php
													if ($order_data["ordernum_category"] == 'Completed'){
																			?>
                         							 <a href="order_update.php?user_id=<?php echo$order_data["id"]; ?>&&price=<?php echo$subtotal; ?>&requestType=move" style="cursor:pointer;" title="Move Data" data-toggle="tooltip" data-original-title="Save To sale">
														<i class="fa fa-upload text-success">
														</i>
													</a>
													<?php } ?>
												</td>
												<?php
	             // print_r ($order_data);
	              //echo "<br>";
											endwhile;
	             //exit;
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</div>
			<?php include 'includes/footer.php'; ?>
		</div>
		<!-- ./wrapper -->

		<?php include 'includes/scripts.php'; ?>
		<!-- Date Picker -->
		<script>
			$(function(){
	  //Date picker
	  $('#datepicker_add').datepicker({
	  	autoclose: true,
	  	format: 'yyyy-mm-dd'
	  })
	  $('#datepicker_edit').datepicker({
	  	autoclose: true,
	  	format: 'yyyy-mm-dd'
	  })
	  $(document).on('click', '.edit', function(e){
	  	e.preventDefault();
	  	$('#edit').modal('show');
	  	var id = $(this).data('id');
	  	getRow(id);
	  });
	  
  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });
	  //Timepicker
	  $('.timepicker').timepicker({
	  	showInputs: false
	  })

	  //Date range picker
	  $('#reservation').daterangepicker()
	  //Date range picker with time picker
	  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
	  //Date range as a button
	  $('#daterange-btn').daterangepicker(
	  {
	  	ranges   : {
	  		'Today'       : [moment(), moment()],
	  		'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	  		'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
	  		'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	  		'This Month'  : [moment().startOf('month'), moment().endOf('month')],
	  		'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	  	},
	  	startDate: moment().subtract(29, 'days'),
	  	endDate  : moment()
	  },
	  function (start, end) {
	  	$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	  }
	  )
	  
	});
</script>
<script>
	$(function(){
		$(document).on('click', '.orderlist', function(e){
			e.preventDefault();
			$('#ordlist').modal('show');
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: 'order_detail.php',
				data: {id:id},
				dataType: 'json',
				success:function(response){
					$('#date').html(response.date);
					$('#detail').prepend(response.list);
					$('#total').html(response.total);
				}
			});
		});

		$("#ordlist").on("hidden.bs.modal", function () {
			$('.prepend_items').remove();
		});
	});
</script>
<script type="text/javascript">
	
	function updateComplete(pid)
	{
		$.ajax(
			{
				url: "order_update.php?updateid="+pid+"&requestType=update",
				type: "GET",
				// data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				dataType: "html",
				success: function (result)
				{
					location.reload();
				}
			});
  	}
  
  function updateCancel(pid)
	{
		$.ajax(
			{
				url: "order_update.php?deleteid="+pid+"&requestType=cancel",
				type: "GET",
				// data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				dataType: "html",
				success: function (result)
				{
					location.reload();
				}
			});
  }
  
  function movedata(name,price)
	{
    debugger;
		$.ajax(
			{
				url: "order_update.php?name="+name+"price"+price+"&requestType=move",
				type: "GET",
				// data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				dataType: "html",
				success: function (result)
				{
					location.reload();
				}
			});
	}
</script>
</body>
</html>
