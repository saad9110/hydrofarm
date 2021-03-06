<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      
      <li class="header">MANAGE</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="users.php"><i class="fa fa-circle-o"></i>System User</a></li>
          <?php
            if(isset($_SESSION['SuperAdmin'])){
              echo '<li><a href="admin_users.php"><i class="fa fa-circle-o"></i>Admin</a></li>';
            }                   

          ?>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Guidelines</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="guidelines.php"><i class="fa fa-circle-o"></i> Guidelines List</a></li>
          <li><a href="guidelines_category.php"><i class="fa fa-circle-o"></i> Guidelines Category</a></li>
        </ul>
      </li>
      
      <li><a href="order_view.php" onclick="vieworder('ordercheck')"><i class="fa fa-first-order"></i> <span>Orders</span>
       <span class="badge" id="badge"></span></a></li>
      <!-- <li><a href="#"><i class="fa fa-users"></i> <span>Blogs</span></a></li>
      <li><a href="#"><i class="fa fa-users"></i> <span>Forums</span></a></li> -->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
   function vieworder(orderstatus)
  {
    debugger;
    $.ajax(
      {
        
        url: "updateorderstatus.php?orderstatus="+orderstatus,
        type: "GET",
        // data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        dataType: "html",
        success: function (result)
        {
           getbadge();
          //location.reload();
        }
      });
  }

 
    $(document).ready(function() {
  getbadge();
});
   
function getbadge(){
    getstatus = "neworder";
    debugger;
    $.ajax(
      {
        
        url: "updateorderstatus.php?orderstatus="+getstatus,
        type: "GET",
        // data:  data,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        success: function (data)
        {
       //  $('#badge').html(response);
          //location.reload();
        }
      });
  }



</script>