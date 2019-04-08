<?php $this->load->view('layout/_header'); ?>
 
 
<style type="text/css">
    #updateimagePreview {
width: 100px;
height: 100px;
background-position: center center;
background-size: cover;
-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
display: inline-block;
}

img {
    max-width: 100%;
    max-height: 100%;
}
</style>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
           
            <a href="<?php echo base_url()?>admin/logout" class="pull-right btn btn-info m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Log out</a>
        </div>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" id="divOngoingTransaction" style="display: none">Ongoing Transaction: <span id="linkOngoingTransaction">None</span> </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-sm-6 ">
        <div class="white-box">
            <h3 class="box-title">Users</h3>
            <ul class="list-inline two-part">
                <li><i class="icon-user text-info"></i>
                </li>
                <li class="text-right"><span class="counter text-info" id="totalUsers"></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 ">
        <div class="white-box">
            <h3 class="box-title">Total Roles</h3>
            <ul class="list-inline two-part">
                <li><i class="icon-graduation text-purple"></i>
                </li>
                <li class="text-right "><span class="counter text-purple">6</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 ">
        <div class="white-box">
            <h3 class="box-title">Total Batches</h3>
            <ul class="list-inline two-part">
                <li><i class="icon-doc text-success"></i>
                </li>
                <li class="text-right"><span class="counter text-success" id="totalBatch">0</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--row -->
<!-- /.row -->
<!-- row -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="white-box">
            <a href="javascript:void(0);" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" onclick="createCultivation()">Create Batch</a>
            <h3 class="box-title">Batches Overview</h3>
            <div class="table-responsive" >
                <div id = "batchcontainer">
                <table class="table product-overview" id="adminCultivationTable">
                    <thead>
                        <tr>
                            <th>Batch ID</th>
                            <th>ADMIN</th>
                            <th>Farm Inspector</th>
                            <th>Harvester</th>
                            <th>Exporter</th>
                            <th>Importer</th>
                            <th>Processor</th>
                            <th>Details</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<!--
   <div class="row">
       <div class="col-lg-6 col-sm-6 col-xs-12">
           <div class="white-box">
               <h3 class="box-title">Your Address <i class="fa fa-qrcode fa-2x text-success"></i></h3>
               <ul class="list-inline two-part">
                   <li class="text-right" id="currentUserAddress">0x0000000000000000000000000000000000000000</li>
               </ul>
           </div>
       </div>
       <div class="col-lg-6 col-sm-6 col-xs-12">
           <div class="white-box">
              <h3 class="box-title">Storage Contract Address <i class="fa fa-qrcode fa-2x text-danger"></i></h3>
               <ul class="list-inline two-part">
                   <li class="text-right" id="storageContractAddress">0x0000000000000000000000000000000000000000</li>
               </ul>
           </div>
       </div>
   </div>
   <div class="row">
       <div class="col-lg-6 col-sm-6 col-xs-12">
           <div class="white-box">
               <h3 class="box-title">Coffee Supplychain Contract Address <i class="fa fa-qrcode fa-2x text-info"></i></h3>
               <ul class="list-inline two-part">
                   <li class="text-right" id="coffeeSupplychainContractAddress">0x0000000000000000000000000000000000000000</li>
               </ul>
           </div>
       </div>
       <div class="col-lg-6 col-sm-6 col-xs-12">
           <div class="white-box">
              <h3 class="box-title">User Contract Address <i class="fa fa-qrcode fa-2x text-info"></i></h3>
               <ul class="list-inline two-part">
                   <li class="text-right" id="userContractAddress">0x0000000000000000000000000000000000000000</li>
               </ul>
           </div>
       </div>
   </div>
   -->
<!--row -->
<div class="row">
    <div class="col-md-12 col-lg-4 col-sm-12">
        <div class="white-box">
            <h3 class="box-title">User Roles</h3>
            <div class="table-responsive">
                <table class="table product-overview">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Role Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Farm Inspection</td>
                            <td><span class="label label-info font-weight-100">FARM_INSPECTION</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Harvester</td>
                            <td><span class="label label-success font-weight-100">HARVESTER</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Exporter</td>
                            <td><span class="label label-warning font-weight-100">EXPORTER</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Importer</td>
                            <td><span class="label label-danger font-weight-100">IMPORTER</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td><span class="label label-primary font-weight-100">PROCESSOR</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <a href="javascript:void(0);" id="userFormClick" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" onclick='javascript: $("#userFormModel").modal();'>Create User</a>
            <h3 class="box-title">Users</h3>
            <div class="table-responsive" id = tblUserdiv>
                <table class="table  table-responsive" id="tblUser">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Name</th>
                            <th style="width: 20%;">Email</th>
                            <th style="width: 20%;">Contact No.</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<!--
<div id="batchFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">Add Batch</h2>
            </div>
            <div class="modal-body">
                <form id="batchForm" onsubmit="return false;">
                    <fieldset style="border:0;">
                        <div class="form-group">
                            <label class="control-label" for="AdminId">AdminId<i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="AdminId" name="AdminId" placeholder="Enter Admin Id " data-parsley-required="true">
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label" for="farmerName">Farmer Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="farmerName" name="farmerName" placeholder="Farmer Name" data-parsley-required="true">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="farmerAddress">Farmer Address <i class="red">*</i>
                            </label>
                            <textarea class="form-control" id="farmerAddress" name="farmerAddress" placeholder="Farmer Address" data-parsley-required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exporterName">Exporter Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="exporterName" name="exporterName" placeholder="Exporter Name" data-parsley-required="true">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="importerName">Importer Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="importerName" name="importerName" placeholder="Importer Name" data-parsley-required="true">
                        </div>
                    
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="addCultivationBatch();" class="fcbtn btn btn-primary btn-outline btn-1f">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
-->
<div id="userFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px; ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title" id="userModelTitle">Add User</h2>
            </div>
            <div class="modal-body" style="height: 500px;overflow: auto;">
                <form id="userForm" onsubmit="return false;">
                    <fieldset style="border:0;">
                        <div class="form-group">
                            <label class="control-label" for="userName">First Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" data-parsley-required="true">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Last Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" data-parsley-required="true">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Email Id<i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="Email Id" data-parsley-required="true" data-parsley-type="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userContactNo">User Contact <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="userContactNo" name="userContactNo" placeholder="Contact No." data-parsley-required="true" data-parsley-type="digits" data-parsley-length="[10, 15]" maxlength="15">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Address<i class="red">*</i>
                            </label>
                            <textarea class="form-control" id="userAddress" name="userAddress" placeholder="Address" data-parsley-required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userRoles">User Role <i class="red">*</i>
                            </label>
                            <select class="form-control" id="userRoles" name="userRoles" data-parsley-required="true">
                                <option value="">Select Role</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="FARMINSPECTOR">Farm Inspection</option>
                                <option value="HARVESTOR">Harvester</option>
                                <option value="EXPORTOR">Exporter</option>
                                <option value="IMPORTOR">Importer</option>
                                <option value="PROCESSOR">Processor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Password<i class="red">*</i>
                            </label>
                            <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" data-parsley-required="true" data-parsley-minlength="6">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Confirm Password<i class="red">*</i>
                            </label>
                            <input type="password" class="form-control" id="userCnfPassword" name="userCnfPassword" placeholder="Confirm Password" data-parsley-required="true" data-parsley-equalto="#userPassword">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="isActive">User Status</label>
                            <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" id="isActive" name="isActive" data-size="small" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userProfileHash">Profile Image <i class="red">*</i>
                            </label>
                            <input type="file" class="form-control" onchange="handleFileUpload(event);" />
                            <input type="hidden" class="form-control" id="userProfileHash" name="userProfileHash" placeholder="User Profile Hash" data-parsley-required="true">
                            <span id="imageHash"></span>
                        </div>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <i style="display: none;" class="fa fa-spinner fa-spin"></i>
                <button type="submit" onclick="userFormSubmit();" class="fcbtn btn btn-primary btn-outline btn-1f" id="userFormBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="updateFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 160px;
  ">
    <div class="modal-dialog" style="height: 500px;overflow: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title" id="userModelTitle">update User</h2>
            </div>
            <div class="modal-body">
                <form id="updateForm" onsubmit="return false;">
                    <fieldset style="border:0;">
                        <div class="form-group">
                            <label class="control-label" for="userName">First Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="firstNameToUpdate" name="firstName" placeholder="First Name" data-parsley-required="true">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Last Name <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="lastNameToUpdate" name="lastName" placeholder="Last Name" data-parsley-required="true">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="userName">Email Id<i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" disabled="true" id="userEmailToUpdate" name="userEmailToUpdate" placeholder="Email Id" data-parsley-required="true" data-parsley-type="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userContactNo">User Contact <i class="red">*</i>
                            </label>
                            <input type="text" class="form-control" id="userContactNoToUpdate" name="userContactNo" placeholder="Contact No." data-parsley-required="true" data-parsley-type="digits" data-parsley-length="[10, 15]" maxlength="15">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userName">Address<i class="red">*</i>
                            </label>
                            <textarea class="form-control" id="userAddressToUpdate" name="userAddressToUpdate" placeholder="Address" data-parsley-required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="userRoles">User Role <i class="red">*</i>
                            </label>
                            <select class="form-control" id="userRolesToUpdate" name="userRoles">
                                <option value="">Select Role</option>
                                <option value="FARMINSPECTOR">Farm Inspection</option>
                                <option value="HARVESTOR">Harvester</option>
                                <option value="EXPORTOR">Exporter</option>
                                <option value="IMPORTOR">Importer</option>
                                <option value="PROCESSOR">Processor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">User Status</label>
                            <br>
                            <input type="radio" name="status" value="ACTIVE"> ACTIVE
                            <br>
                            <input type="radio" name="status" value="INACTIVE"> INACTIVE
                            <br>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="userProfileHash">Profile Image <i class="red">*</i>
                            </label>
                            <input type="file" class="form-control" onchange="handleFileUpload(event);" />
                            <input type="hidden" class="form-control" id="userProfileHashToUpdate" name="userProfileHash" placeholder="User Profile Hash">
                            <span id="imageHashToUpdate"></span>
                        </div>
                        <div class="form-group" id = updateimagePreview></div>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <i style="display: none;" class="fa fa-spinner fa-spin"></i>
                <button type="submit" onclick="updateFormSubmit();" class="fcbtn btn btn-primary btn-outline btn-1f" id="updateFormBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var rest_server_url = '<?php echo REST_SERVER;?>';
    var Id = {}
    Id.loginid = <?php $arr = $this->session->userdata('user_data'); echo $arr['id'];?>;
    var userId = <?php $arr = $this->session->userdata('user_data'); echo $arr['id'];?>;
    var batchFormInstance, userFormInstance, updateFormInstance;
    $(document).ready(function() {

        axios({
          method: 'get',
          url: rest_server_url+'/api/com.coffeesupplychain.system.BatchAsset',
          responseType: 'json',
          timeout: 60000,
          })
           .then(function(response) {
            if (response.data.length <= 0) {
           // console.log("null responce")
            console.log(response.data.length)
            } 
            else {
                Id.batchCount = response.data.length;
                $('#totalBatch').html(Id.batchCount);
               buildCultivationTable(response);
                 }
         });

       userFormInstance = $("#userForm").parsley();
        batchFormInstance = $("#batchForm").parsley();
        updateFormInstance = $("#updateForm").parsley();

        initSwitch();

        axios({
                method: 'get',
                url: rest_server_url+'/api/com.coffeesupplychain.participant.SystemUser',
                responseType: 'json',
                timeout: 60000,
            })
            .then(function(response) {
                if (response.data.length <= 0) {
                    console.log("null responce")
                } else {
                    var user_array = response.data;
                    var table = '';
                   
                   
                   $('#totalUsers').html(Id.userCount);

                    $(user_array).each(function(index, user) {


                        if(user.Role!="ADMIN"){
                        
                    
                       

                        table = `<tr>
                             <td>` + user.FirstName + ` ` + user.LastName + `</td>
                             <td>` + user.Email + `</td>
                             <td>` + user.ContactNo + `</td>
                             <td>` + user.Role + `</td>
                             <td>
                             <button class="btn btn-sm btn-info" 
                             data-userid = '` + user.UserId + `'
                             data-userFirstName = '` + user.FirstName + `'   
                             data-userLastName = '` + user.LastName + `'   
                             data-userEmail = '` + user.Email + `'   
                             data-userContactNo = '` + user.ContactNo + `'   
                             data-userRole = '` + user.Role + `'   
                             data-userAddress = '` + user.Address + `'   
                             data-userProfileImage = '` + user.ProfileImage + `'
                             data-userStatus = '` + user.Status + `'    
                             title="User Edit" onclick='javascript: openEditUserSec(this);'>Edit</button>
                             </td>
                            </tr>`;

                    
                       
                        $('#tblUser').find('tbody').append(table);
                    }                    
                    });
                     
                     Id.userCount = $('#tblUser >tbody >tr').length;
                     $('#totalUsers').html(Id.userCount)
                    $('#tblUser').DataTable();

                    // $button =`<button type="button" onclick class="fcbtn btn btn-primary btn-outline btn-1f" id="userEditBtn">Edit</button>`;
                    // for(i=0;i<response.data.length;i++)

                    // $('#tblUser').append('<tr> <td>'+$user_array[i].Address+'</td><td class="name">'+$user_array[i].FirstName+'</td> <td>'+$user_array[i].ContactNo+'</td> <td>'+$user_array[i].Role+'</td> <td>'+$button+'</td><tr>');

                }
            });
    });


    function openEditUserSec(ref) {

        var userFirstName = $(ref).attr("data-userFirstName");
        var userLastName = $(ref).attr("data-userLastName");
        var userEmail = $(ref).attr("data-userEmail");
        var userContactNo = $(ref).attr("data-userContactNo");
        var userRole = $(ref).attr("data-userRole");
        var userAddress = $(ref).attr("data-userAddress");
        var userProfileImage = $(ref).attr("data-userProfileImage");
        var userStatus = $(ref).attr("data-userStatus");
        Id.userid = $(ref).attr("data-userid");

      
        $("#firstNameToUpdate").val(userFirstName);
        $("#lastNameToUpdate").val(userLastName);
        $("#userEmailToUpdate").val(userEmail);
        $("#userContactNoToUpdate").val(userContactNo);
        $("#userAddressToUpdate").val(userAddress);
        $("#userProfileHashToUpdate").val(userProfileImage);
        $("#userRolesToUpdate").val(userRole);
        $('input:radio[name=status][value=' + userStatus + ']').attr('checked', true);

        // var profileImageLink = 'https://ipfs.io/ipfs/'+userProfileImage;
        //var btnViewImage = '<a href="'+profileImageLink+'" target="_blank" class=" text-danger"><i class="fa fa-eye"></i> View Image</a>';

        //$("#imageHashToUpdate").html(btnViewImage);
        $("#updateFormModel").modal();
    
       
       var img = 'https://ipfs.io/ipfs/' +userProfileImage
       $('#updateimagePreview').html('<img src="'+ img +'">');
               

    }



    function initSwitch() {
        /*For User Form Pop Up*/
        new Switchery($("#isActive")[0], $("#isActive").data());
    }

    function updateFormSubmit() {
        $(".preloader").show();

        if ($("#updateForm").parsley().isValid()) {

        var updateFormData = $("#updateForm").serialize();

        //console.log(updateFormData);
        var blockchainData = {

            "$class": "com.coffeesupplychain.participant.SystemUser",
            "Role": $("#userRolesToUpdate").val(),
            "Status": $('input:radio[name=status]').val(),
            "FirstName": $("#firstNameToUpdate").val(),
            "LastName": $("#lastNameToUpdate").val(),
            "Email": $("#userEmailToUpdate").val(),
            "ContactNo": $("#userContactNoToUpdate").val(),
            "Address": $("#userAddressToUpdate").val(),
            "ProfileImage": $("#userProfileHashToUpdate").val()
        }



        //console.log(userFirstName);                                      
        var id = Id.userid;
        //console.log(id);


        axios({
                method: 'put',
                url: rest_server_url+"/api/com.coffeesupplychain.participant.SystemUser/" +Id.userid,
                data: blockchainData,
                responseType: 'json',
                timeout: 60000,
            })
            .then(function(response) {

                if (response.data.length <= 0) {
                    console.log("null responce")
                } else {
                    var user_array = response.data;
                   
                    $(".preloader").hide();
                  swal('Success',"User Data Updated Successfully",'success')
                  .then((value) => {
                     location.reload();
           });
                     
               
                
                
                }
            });
        }
    else{
        $(".preloader").hide();
    swal('Error', "something went wrong", 'error');
    console.log("not valid")
        }
    
    }

    

    function userFormSubmit() {
        $(".preloader").show();

        if ($("#userForm").parsley().isValid()) {

            console.log("valid")

         var formData = $("#userForm").serialize();
        // var url = ;

        $(".preloader").show();

        axios({
         method: 'post',
         url: '<?php echo base_url(); ?>admin/user_add',
         data: formData,
         responseType: 'json',
         timeout: 60000,
              })
        .then(function(response) {

        if (response.data.status == "SUCCESS") {
            var status = 'INACTIVE';
            if ($("#isActive").is(":checked") == true) {
                status = 'ACTIVE';
             }


        var userRole = $("#userRoles").val();
        var userStatus = status;
        var userFirstName = $("#firstName").val();
        var userlastName = $("#lastName").val();
        var userEmail = $("#userEmail").val();
        var userContactNo = $("#userContactNo").val();
        var userAddress = $("#userAddress").val();
        var userProfileImage = $("#userProfileHash").val();
        var userId = response.data.userId;

        var blockchainData = {

            "$class": "com.coffeesupplychain.participant.SystemUser",
            "Role": userRole,
            "UserId": userId,
            "Status": userStatus,
            "FirstName": userFirstName,
            "LastName": userlastName,
            "Email": userEmail,
            "ContactNo": userContactNo,
            "Address": userAddress,
            "ProfileImage": userProfileImage
            }

        var blockchainUrl = rest_server_url+'/api/com.coffeesupplychain.participant.SystemUser';

        axios({
                method: 'post',
                url: blockchainUrl,
                data: blockchainData,
                responseType: 'json',
                timeout: 60000
             })
            .then(function(response) {

        if (response.error == undefined) {

            $(".preloader").hide();
            $("form#userForm").trigger('reset');
            swal('Success',"User Created Into System Successfully",'success')
             .then((value) => {
               location.reload();
           });
 } 
             else {

                $(".preloader").hide();
                swal('Error', error.message, 'error');
               }

        })
        
        .catch(function(error) {
        $(".preloader").hide();
        swal('Error', error, 'error');
        });

}
});
}
else{


    $(".preloader").hide();
    swal('Error', "something went wrong", 'error');
    console.log("not valid")
}

}

function createCultivation() {
              swal({
              title: "Are you sure wants to create a new Batch?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((confirm) => {
              if (confirm) {
                addCultivationBatch();
              }
            });

  
    }


     function addCultivationBatch(){

          
          var cultivator = "resource:com.coffeesupplychain.participant.SystemUser#"+userId;


     var blockchainData = {
          "$class": "com.coffeesupplychain.system.BatchCultivation",
           "cultivator": cultivator,
           "batchstatus": "ADMIN"
                           }

     var blockchainUrl = rest_server_url+'/api/com.coffeesupplychain.system.BatchCultivation';

          $(".preloader").show();
    
     axios({
        method: 'post',
        url: blockchainUrl,
        data: blockchainData,
        responseType: 'json',
        timeout: 60000
    })
        .then(function(response) {

        if (response.error == undefined) {

        
            $(".preloader").hide();
            $("form#batchForm").trigger('reset');
            
        


    swal('Success',"batch created successfully",'success')
            .then((value) => {
            location.reload();
        });

        }
         else {

                $(".preloader").hide();
                swal('Error', error.message, 'error');
               }

        })
        
        .catch(function(error) {
        $(".preloader").hide();
        swal('Error', error, 'error');
        });

                    
 }
 // ipfs = window.IpfsApi('localhost', 5001);
    


    function buildCultivationTable(batchdata){
       var table ="";
       for (var tmpDataIndex in batchdata.data)
        //console.log(tmpDataIndex);
    {   
        var elem = batchdata.data[tmpDataIndex];
        $(elem).each(function(index, batch) {
       

        var batchid = batch.BatchId;
        
       
        
       if (batch.Status == "ADMIN") {
            
            tr = `<tr>
                    <td data-val='`+batchid+`'>`+batchid+`</td>
                                    
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><i class="glyphicon glyphicon-eye-open"onclick="view('`+batchid+`')"></i></td>
                    
                </tr>`;
        } 
         else if (batch.Status == "FARMINSPECTOR") {
            tr = `<tr>
                   <td>`+batchid+`</td>
                    
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><i class="glyphicon glyphicon-eye-open" onclick="view('`+batchid+`')"></i></td>
                    
                    
                </tr>`;
          }


        else if (batch.Status == "HARVESTOR") {
            tr = `<tr>
                   <td>`+batchid+`</td>
                   
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                     <td><i class="glyphicon glyphicon-eye-open" onclick="view('`+batchid+`')"></i></td>

                    </tr>`;
        } 

        else if (batch.Status == "EXPORTOR") {
            tr = `<tr>
                    <td>`+batchid+`</td>
                    
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><i class="glyphicon glyphicon-eye-open" onclick="view('`+batchid+`')"></i></td>
                    </tr>`;
        } 

        else if (batch.Status == "IMPORTOR") {
            tr = `<tr>
                   <td data-val="`+batchid+`">`+batchid+`</td>
                    
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><i class="glyphicon glyphicon-eye-open" onclick="view('`+batchid+`')"></i></td>
                    
                    </tr>`;
        } 
        else if (batch.Status == "PROCESSOR") {
            tr = `<tr>
                    <td>`+batchid+`</td>
                    
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><i class="glyphicon glyphicon-eye-open" onclick="view('`+batchid+`')"></i></td>
                   </tr>`;
        } 

       
        

            else if (batch.Status == "COMPLETE") {
            tr = `<tr>
                    <td>`+batchid+`</td>
                    
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><i class="glyphicon glyphicon-eye-open" onclick="view('`+batchid+`')"></i></td>
                    </tr>`;
        } 







        table+=tr;
      
    
});
    }


    $('#adminCultivationTable').find('tbody').append(table);
    
}
function view(batchid){
    
 var url = "http://localhost/coffee_supplychain_app/batchdetails/verifyBatch/"+batchid;
   console.log(url);

/*
var array = url.split('/');

var lastsegment = array[array.length-1];
    
console.log(lastsegment)
*/
window.location.href= url;

}

ipfs = window.IpfsApi('ipfs.infura.io', '5001', {
        protocol: 'https'
    })

    function handleFileUpload(event) {
        const file = event.target.files[0];

        let reader = new window.FileReader();
        reader.onloadend = function() {
            $("#userFormBtn").prop('disabled', true);
            $("i.fa-spinner").show();
            $("#imageHash").html('Processing......');
            saveToIpfs(reader)
        }

        reader.readAsArrayBuffer(file)
    }

     function saveToIpfs(reader) {
        let ipfsId;

        const Buffer = window.IpfsApi().Buffer;
        const buffer = Buffer.from(reader.result);

        /*Upload Buffer to IPFS*/
        ipfs.files.add(buffer, (err, result) => {
            if (err) {
                console.error(err)
                return
            }

            var imageHash = result[0].hash;
            console.log(imageHash);
            var img = 'https://ipfs.io/ipfs/' + imageHash
            var profileImageLink = 'https://ipfs.io/ipfs/' + imageHash;
            var btnViewImage = '<a href="' + profileImageLink + '" target="_blank" class=" text-danger"><i class="fa fa-eye"></i> View Image</a>';

            $("#userProfileHashToUpdate").val(imageHash);
            $("#userProfileHash").val(imageHash);
            $("#imageHash").html(btnViewImage);
            $("#imageHashToUpdate").html(btnViewImage);
            $("#userFormBtn").prop('disabled', false);
            $("i.fa-spinner").hide();
        


            var img = 'https://ipfs.io/ipfs/' +imageHash
            $('#updateimagePreview').html('<img src="'+ img +'">');

        });
    }



</script>

<?php $this->load->view('layout/_footer'); ?>)