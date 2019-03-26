<?php
    $this->load->view('/layout/_header');
?>  
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
                        <h4 class="page-title">Dashboard</h4> </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                   <a href="<?php echo base_url()?>user/logout" class= "pull-right btn btn-info m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Log out</a>
                  
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" id="divOngoingTransaction" style="display: none">Ongoing Transaction: <span id="linkOngoingTransaction">None</span> </div>
                    </div>    
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="<?php echo base_url();?>/assets/plugins/images/heading-bg/slide3.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="" id="userImage" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white" id="userName">--</h4>
                                        <h5 class="text-white" id="currentUserAddress">--</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="fa fa-mobile"></i> Contact No</p>
                                    <h1 id="userContact">--</h1>
                                </div>

                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="fa fa-user"></i> Role</p>
                                    <h1 id="userRole">--</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="fa fa-gears"></i> Settings</p>
                                    <a class="btn btn-info m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" id="editUser" href="javascript:void(0);" >Edit</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                </div>

                               <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Batches Overview</h3> 
                            <div class="table-responsive">
                                <table class="table product-overview" id="userCultivationTable" >
                                    <thead>
                                        <tr>
                                            <th>Batch ID</th>
                                            <th>ADMIN</th>
                                            <th>Farm Inspector</th>
                                            <th>Harvester</th>
                                            <th>Exporter</th>
                                            <th>Importer</th>
                                            <th>Processor</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                                  
                                    </tbody>
                                </table>

                            <!-- Update User Form -->
                            <div id="userFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2 class="modal-title" id="userModelTitle">Update Profile</h2>
                                    </div>

                                    <div class="modal-body">
                                        <form id="updateUserForm" onsubmit="return false;">
                                            <fieldset style="border:0;">
                                                <div class="form-group">
                                                    <label class="control-label" for="fullname">First Name <i class="red">*</i></label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Name" data-parsley-required="true">
                                                </div> 

                                               <div class="form-group">
                                                    <label class="control-label" for="fullname">Last Name <i class="red">*</i></label>
                                                    <input type="text" class="form-control" id="Lastname" name="Lastname" placeholder="Name" data-parsley-required="true">
                                                </div>    


                                                <div class="form-group">
                                                    <label class="control-label" for="contactNumber">Contact No<i class="red">*</i></label>
                                                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact No." data-parsley-required="true" data-parsley-type="digits" data-parsley-length="[10, 15]" maxlength="15">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="role">Role </label>
                                                    <select class="form-control" id="role" disabled="true" name="role">
                                                        <option value="">Select Role</option>
                                                        <option value="FARMINSPECTOR">Farm Inspection</option>
                                                        <option value="HARVESTOR">Harvester</option>
                                                        <option value="EXPORTOR">Exporter</option>
                                                        <option value="IMPORTOR">Importer</option>
                                                        <option value="PROCESSOR">Processor</option>
                                                    </select>    
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label" for="userProfileHash">Profile Image <i class="red">*</i></label>
                                                    <input type="file" class="form-control" onchange="handleFileUpload(event);" />
                                                    <input type="hidden" class="form-control" id="userProfileHash" name="userProfileHash" placeholder="User Profile Hash" data-parsley-required="true" >
                                                    <span id="imageHash"></span>
                                                </div>
                                    <div class="form-group" id = updateimagePreview></div>
                                            </fieldset>
                                  
                                    </div>
                                    <div class="modal-footer">
                                        <i style="display: none;" class="fa fa-spinner fa-spin"></i>
                                         <button type="button" class="btn btn-primary" id="userFormBtn" onclick="updateprofile()">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                            

                            <!-- Farm Inspection Form -->
                            <form id="farmInspectionForm" class="mfp-hide white-popup-block">
                                <h1>Farm Inspection</h1><br>
                                <fieldset style="border:0;">
                                    <!-- <div class="form-group">
                                        <label class="control-label" for="InspectorId">Inspector ID Number</label>
                                        <input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
                                    </div>   -->                            
                                    <div class="form-group">
                                        <label class="control-label" for="typeOfSeed">Type of Seed</label>
                                        <input type="text" class="form-control" id="typeOfSeed" name="typeOfSeed" placeholder="type of seed" data-parsley-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="coffeeFamily">Coffee Family</label>
                                        <input type="text" class="form-control" id="coffeeFamily" name="coffeeFamily" placeholder="coffee family" data-parsley-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="fertilizer">Fertilizer Used</label>
                                        <input type="text" class="form-control" id="fertilizerUsed" name="fertilizer" placeholder="fertilizer used" data-parsley-required="true">
                                    </div>
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect" >Reset</button>
                                        <button type="button" id="updateFarmInspection" class="btn btn-primary">Submit</button>
                                    </div>
                                </fieldset>
                            </form>

                             <!-- Harvesting Form -->
                            <form id="harvesterForm" class="mfp-hide white-popup-block ">
                                <h1>Harvesting</h1><br>
                                <fieldset style="border:0;">
                                                            
                                    <div class="form-group">
                                        <label class="control-label" for="cropVariety">Coffee Variety</label>
                                        <input type="text" class="form-control" id="cropVariety" name="cropVariety" placeholder="coffee variety" data-parsley-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="temperatureUsed">Temperature (in Fahrenheit)</label>
                                        <input type="text" class="form-control" id="temperatureUsed" name="temperatureUsed" placeholder="temperature" data-parsley-required="true">
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label" for="humidity">Humidity</label>
                                        <input type="text" class="form-control" id="humidity" name="humidity" placeholder="humidity" data-parsley-required="true">
                                    </div>                                
                                    <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Reset</button>
                                        <button type="button" id="updateHarvest"class="btn btn-primary">Submit</button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- Exporter Form -->
                            <form id="exporterForm" class="mfp-hide white-popup-block">
                                <h1>Exporting</h1><br>
                                <fieldset style="border:0;">

                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Quantity (in Kg)</label>
                                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="destinationAddress">Destination Address</label>
                                        <input type="text" class="form-control" id="destinationAddress" name="destinationAddress" placeholder="Destination Address" data-parsley-required="true">
                                    </div> 


                                    <div class="form-group">
                                        <label class="control-label" for="shipName">Ship Name</label>
                                        <input type="text" class="form-control" id="shipName" name="shipName" placeholder="Ship Name" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="shipNo">Ship No</label>
                                        <input type="text" class="form-control" id="shipNo" name="shipNo" placeholder="Ship No" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="estimateDateTime">Estimate Datetime</label>
                                        <input type="text" class="form-control datepicker-master" id="estimateDateTime" name="estimateDateTime" placeholder="Estimate Datetime" data-parsley-required="true">
                                    </div>

                                    

                                     <div class="form-group">
                                        <label class="control-label" for="exporterId">Exporter ID</label>
                                        <input type="number" class="form-control" id="exporterId" name="exporterId" placeholder="Exporter ID" data-parsley-required="true">
                                    </div>


                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Reset</button>
                                        <button type="button" id="updateExport" class="btn btn-primary">Submit</button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- Importer Form -->
                            <form id="importerForm" class="mfp-hide white-popup-block">
                                <h1>Importing</h1><br>
                                <fieldset style="border:0;">

                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Quantity</label>
                                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity" data-parsley-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="shipName">Ship Name</label>
                                        <input type="text" class="form-control" id="shipName" name="shipName" placeholder="Ship Name" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="shipNo">Ship No</label>
                                        <input type="text" class="form-control" id="shipNo" name="shipNo" placeholder="Ship No" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="transportInfo">Transport Info</label>
                                        <input type="text" class="form-control" id="transportInfo" name="transportInfo" placeholder="Transport Info" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="warehouseName">Warehouse Name</label>
                                        <input type="text" class="form-control" id="warehouseName" name="warehouseName" placeholder="Warehouse Name" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="warehouseAddress">Warehouse Address</label>
                                        <input type="text" class="form-control" id="warehouseAddress" name="warehouseAddress" placeholder="Warehouse Address" data-parsley-required="true" >
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="importerId">Importer Id</label>
                                        <input type="number" min="1" class="form-control" id="importerId" name="importerId" placeholder="Importer Id" data-parsley-required="true" >
                                    </div>                              
                                    
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Reset</button>
                                        <button type="button" id="updateImport"class="btn btn-primary">Submit</button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- Processor Form -->
                            <form id="processingForm" class="mfp-hide white-popup-block">
                                <h1>Processing</h1><br>
                                <fieldset style="border:0;">
                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Quantity (in Kg)</label>
                                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="processingTemperature">Temperature (in Fahrenheit)</label>
                                        <input type="text" class="form-control" id="processingTemperature" name="temperature" placeholder="Temperature" data-parsley-required="true">
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="rostingDuration">Time for Roasting (in Seconds)</label>
                                        <input type="number" min="1" class="form-control" id="rostingDuration" name="rostingDuration" placeholder="Time for roasting" data-parsley-required="true" >
                                    </div>
                               
                                    <div class="form-group">
                                        <label class="control-label" for="internalBatchNo">Internal Batch no</label>
                                        <input type="text" class="form-control" id="internalBatchNo" name="internalBatchNo" placeholder="Internal Batch no" data-parsley-required="true">
                                    </div>
                           
                                    <div class="form-group">
                                        <label class="control-label" for="packageDateTime">Packaging Date & Time</label>
                                        <input type="text" class="form-control datepicker-master" id="packageDateTime" name="packageDateTime" placeholder="Packaging Date" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="processorName">Processor Name</label>
                                        <input type="text" class="form-control" id="processorName" name="processorName" placeholder="Processor Name" data-parsley-required="true">
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="processorAddress">Processor Address</label>
                                        <input type="text" class="form-control" id="processorAddress" name="processorAddress" placeholder="Processor Address" data-parsley-required="true">
                                    </div>
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Reset</button>
                                        <button type="button" id="updateProcessor"class="btn btn-primary">Submit</button>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- /.container-fluid -->

<script type="text/javascript">
var switchery;
  var Id = {}
 

    $(document).ready(function(){
        
        console.log(Id.loginid)
        axios({
             method: 'get',
             url: 'http://localhost:3000/api/com.coffeesupplychain.system.BatchAsset',
             responseType: 'json',
             timeout: 60000,
          })
           .then(function(response) {
            if (response.data.length <= 0) {
           // console.log("null responce")
            console.log(response.data.length)
            } 
            else 
            {
                buildCultivationTable(response);
            }
         });

    function buildCultivationTable(batchdata){
       var table ="";
       for (var tmpDataIndex in batchdata.data)
    {   
        var elem = batchdata.data[tmpDataIndex];
        $(elem).each(function(index, batch) {
       
        var batchid = batch.BatchId;
        
        var action = "action";
       if (batch.Status == "ADMIN") {
            
            tr = `<tr>
                    <td>`+batchid+`</td>
                 <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><input type ="button" class= "btn btn-info m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"value ="action"></button></td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    </tr>`;
        } 
         else if (batch.Status == "FARMINSPECTOR") {
            tr = `<tr>
                   <td>`+batchid+`</td>
                   
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    </tr>`;
          }


        else if (batch.Status == "HARVESTOR") {
            tr = `<tr>
                   <td>`+batchid+`</td>
                   
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    </tr>`;
        } else if (batch.Status == "EXPORTOR") {
            tr = `<tr>
                    <td>`+batchid+`</td>
                   
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    </tr>`;
        } else if (batch.Status == "IMPORTOR") {
            tr = `<tr>
                   <td>`+batchid+`</td>
                   
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    </tr>`;
        } else if (batch.Status == "PROCESSOR") {
            tr = `<tr>
                    <td>`+batchid+`</td>
                   
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-warning font-weight-100">Processing</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                   </tr>`;
        } 
        table+=tr;
    
    });
}


        $('#userCultivationTable').find('tbody').append(table);
    
}
       
        Id.loginid = <?php $arr = $this->session->userdata('user_data'); echo $arr['id'];?>;
                
//console.log(Id.loginid)
        axios({
        method: 'get',
        url: "http://localhost:3000/api/com.coffeesupplychain.participant.SystemUser/" + Id.loginid,
        responseType: 'json',
        timeout: 60000,
        })
        .then(function(response) {
            if (response.data.length <= 0) {
            console.log("null responce")
            } 
            else 
            {
                console.log(Id.loginid)
            var user_array = response.data;
            
            Id.user = user_array;
            var role =user_array.Role;
            console.log(user_array)
            document.getElementById('userContact').innerHTML = +user_array.ContactNo;
            document.getElementById('userRole').innerHTML = user_array.Role;
            document.getElementById('userName').innerHTML = user_array.FirstName+" "+user_array.LastName;
            document.getElementById('currentUserAddress').innerHTML = user_array.Email;
            var img = 'https://ipfs.io/ipfs/' +user_array.ProfileImage;
      
            $("#userImage").attr("src",img);
            $("#editUser").attr("data-userId",Id.loginid);
            $("#editUser").attr("data-FirstName",user_array.FirstName);
            $("#editUser").attr("data-LastName",user_array.LastName);
            $("#editUser").attr("data-ContactNo",user_array.ContactNo);
            $("#editUser").attr("data-imgHash",user_array.ProfileImage);
            $("#editUser").attr("data-userrole",user_array.Role)
            }
         
         });

 


        $('#editUser').click(function(){
            var userFirstName = $("#editUser").attr("data-FirstName");
            var userLastName = $("#editUser").attr("data-LastName");
            var userContactNo = $("#editUser").attr("data-ContactNo");
            var userProfileImage = $("#editUser").attr("data-imgHash");
            var userRole = $("#editUser").attr("data-userrole")
            $("#firstname").val(userFirstName);
            $("#Lastname").val(userLastName);
            $("#contactNumber").val(userContactNo);
            $("#userProfileHash").val(userProfileImage);
            $("#role").val(userRole);
            console.log(userProfileImage);
            var img = 'https://ipfs.io/ipfs/' +userProfileImage
            $('#updateimagePreview').html('<img src="'+ img +'">');
            //console.log(userFirstName);
            $("#userFormModel").modal();

           

    });

});
        



function updateprofile() {
        $(".preloader").show();
console.log("global"+Id.user.Role)
        if ($("#updateUserForm").parsley().isValid()) {

        var updateFormData = $("#updateUserForm").serialize();

        
        
        var blockchainData = {

            "$class": "com.coffeesupplychain.participant.SystemUser",
            "FirstName": $("#firstname").val(),
            "LastName":  $("#Lastname").val(),
            "ContactNo":  $("#contactNumber").val(),
            "ProfileImage": $("#userProfileHash").val(),
            "Role": Id.user.Role,
            "Status": Id.user.Status,
            "Email": Id.user.Email,
            "Address": Id.user.Address
            }

var logid = <?php $arr = $this->session->userdata('user_data'); echo $arr['id'];?>;
//console.log(Id.loginid);
        axios({
                method: 'put',
                url: "http://localhost:3000/api/com.coffeesupplychain.participant.SystemUser/" +logid,
                data: blockchainData,
                responseType: 'json',
                timeout: 60000,
            })
            .then(function(response) {

                if (response.data.length <= 0) {
                    console.log("null responce")
                } else {
                    var user_array = response.data;
                    console.log(user_array);
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

      function initDateTimePicker(){
             $('.datepicker-master').datetimepicker({
             format: 'dd-mm-yyyy hh:ii:ss',
             weekStart: 1,
             todayBtn:  1,
             autoclose: 1,
             todayHighlight: 1,
             startView: 2,
             forceParse: 0,
             showMeridian: 1,
             minuteStep: 1
                });
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
        
    <?php
    $this->load->view('/layout/_footer');
?> 