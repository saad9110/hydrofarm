
<!-- View Order -->
<div class="modal fade" id="ordlist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b> Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="date"></span>
              </p>
              <table class="table table-bordered">
                <thead>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><span id="total"></span></td>
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


<!-- Update Status -->
<div class="modal fade" id="update_status">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <h4 class="modal-title"><b>Updating...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal " method="POST" action="order_update.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>Order Status</p>
                    <h2 class="bold name"></h2>
                </div>
                <div class="modal-body">
                    <p>
                        Date: <span id="date"></span>
                    </p>
                    <table class="table table-bordered">
                        <thead>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        </thead>
                        <tbody id="detail">
                        <tr>
                            <td colspan="3" align="right"><b>Total</b></td>
                            <td><span id="total"></span></td>
                        </tr>
                        </tbody>
                     </table>
                </div>

                <div class="form-group ">
                  <label for="edit_status" class="col-sm-1 control-label">Order Status:</label>

                  <div class="col-sm-5">
                  <select class="form-control" id="edit_status" name="status">
                    <option selected id="statselected"></option>
                </select>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>