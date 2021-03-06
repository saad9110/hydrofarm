<?php include 'includes/users.php';?>

<!-- Send Custom Notification -->
<div class="modal fade" id="addnewnoti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Generate Custom Notification</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" value="vgvgcgc" name="title" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label" >Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="reccomendation" class="col-sm-3 control-label">Reccomendation</label>
                    <div class="panel-body col-sm-9">
                        <div id="education_fields"></div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="proname" name="proname[]" value="" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="proqun" name="proqun[]" value="" placeholder="Product Quntity">
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                        <div class="clear"></div>
                  </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">  </label>
                            <div class="col-sm-8 control-label">
                                <div class="panel-footer control-label">
                                    <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small>
                                </div>
                            </div>
                    </div>
        
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat " name="send" ><i class="fa fa-send"></i>Send</button>
                        </form>
                   
                    </div>
                
              </div>
            </div>
        </div>
    </div>
</div>


<!-------------View Notification-------------------------->

<div class="modal fade" id="viewnoti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Generate Custom Notification</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label" >Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="reccomendation" class="col-sm-3 control-label">Reccomendation</label>
                    <div class="panel-body col-sm-9">
                        <div id="education_fields"></div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="proname" name="proname[]" value="" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="proqun" name="proqun[]" value="" placeholder="Product Quntity">
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                        <div class="clear"></div>
                  </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">  </label>
                            <div class="col-sm-8 control-label">
                                <div class="panel-footer control-label">
                                    <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small>
                                </div>
                            </div>
                    </div>
        
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat " name="send" ><i class="fa fa-send"></i>Send</button>
                        </form>
                   
                    </div>
                
              </div>
            </div>
        </div>
    </div>
</div>



<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-9"><div class="col-sm-5 "><div class="form-group"> <input type="text" class="form-control" id="proname" name="proname[]" value="" placeholder="Product Name"></div></div><div class="col-sm-4 nopadding"><div class="form-group"> <input type="number" class="form-control" id="proqun" name="proqun[]" value="" placeholder="Product Quntity"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>

<!-- Send Notification for Specific User-->
<div class="modal fade" id="sendnoti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Generate Notification</b></h4>
            </div>
            <div class="modal-body">
              <form  method="POST" action="push_notification.php" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="col-sm-3 ucontrol-label">Title</label>

                    <div class="col-sm-9">
                      <input type="text" value="" class="form-control"  name="title" required>
                    </div>
                </div>

                <div class="form-group hide">
                    <label for="token" class="col-sm-3 ucontrol-label">Token</label>

                    <div class="col-sm-9">
                      <input type="text" value="" class="form-control" name="token" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <textarea class="form-control"  name="description" required></textarea>
                    </div>
                </div>

              <!-- </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label" >Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div> -->
                
                <!-- <div class="form-group" >
                    <label for="reccomendation" class="col-sm-3 control-label">Reccomendation</label>
                    <div class="panel-body col-sm-9">
                        <div id="specific_user_notification"></div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="proname" name="proname[]" value="" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="proqun" name="proqun[]" value="" placeholder="Product Quntity">
                                </div>
                            </div>
                            <div class="col-sm-3 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"  onclick="specific_user_notification();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                        <div class="clear"></div>
                  </div> -->

                    <div class="form-group">
                        <label class="col-sm-3 control-label">  </label>
                            <div class="col-sm-8 control-label">
                                <div class="panel-footer control-label">
                                    <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small>
                                </div>
                            </div>
                    </div>
        
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat " name="send" ><i class="fa fa-send"></i>Send</button>
                        </form>
                   
                    </div>
                
              </div>
            </div>
        </div>
    </div>
</div>



<script>
var rows = 1;
function specific_user_notification() {
 
    rows++;
    var objTo = document.getElementById('specific_user_notification')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeuser"+rows);
	var rowdiv = 'removeuser'+rows;
  divtest.innerHTML = '<div class="col-sm-9"><div class="col-sm-5 "><div class="form-group"> <input type="text" class="form-control" id="proname" name="proname[]" value="" placeholder="Product Name"></div></div><div class="col-sm-4 nopadding"><div class="form-group"> <input type="number" class="form-control" id="proqun" name="proqun[]" value="" placeholder="Product Quntity"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_user_reccomendation_field('+ rows +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_user_reccomendation_field(rowid) {
	   $('.removeuser'+rowid).remove();
   }
</script>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_edit.php">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_address" name="address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

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
              <form class="form-horizontal" method="POST" action="users_delete.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>DELETE USER</p>
                    <h2 class="bold fullname"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 





     