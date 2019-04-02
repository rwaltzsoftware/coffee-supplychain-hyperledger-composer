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

											   <ypediv class="form-group">
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

							
						  <div id="farmInspectionModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title" id="farmInspectionModelTitle">Farm Inspection</h2>
									</div>

									<div class="modal-body">
										<!-- Farm Inspection Form -->
							<form id="farmInspectionForm" >
								<fieldset style="border:0;">
									<!-- <div class="form-group">
										<label class="control-label" for="InspectorId">Inspector ID Number</label>
										<input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
									</div>   -->                            
								<div class="form-group">
								  
								  <input type="hidden" class="form-control" id="batchid" name="batchid" placeholder="batch Id" data-parsley-required="true">
								</div>

								<div class="form-group">
							   
										<input type="hidden" class="form-control" id="previoushandler" name="previoushandler" placeholder="Previous Handler" data-parsley-required="true">
								</div>

								<div class="form-group">
								
										<input type="hidden" class="form-control" id="currenthandler" name="currenthandler" placeholder="Current Handler" data-parsley-required="true">
								</div>
									
								<div class="form-group">
								<label class="control-label" for="typeofseed">Type of Seed</label>
										<input type="text" class="form-control" id="typeofseed" name="typeofseed" placeholder="Type of Seed" data-parsley-required="true">
								</div>

								<div class="form-group">
								<label class="control-label" for="coffefamily">Coffe Family</label>
										<input type="text" class="form-control" id="coffefamily" name="coffefamily" placeholder="Coffee Family" data-parsley-required="true">
								</div>

									<div class="form-group">
										<label class="control-label" for="fertilizer">Fertilizer Used</label>
										<input type="text" class="form-control" id="fertilizerUsed" name="fertilizer" placeholder="fertilizer used" data-parsley-required="true">
									</div>
									</fieldset>
									</div>
									
									<div class="modal-footer">
										<button type="reset" class="btn btn-default waves-effect" >Reset</button>
										<button type="button" id="updateFarmInspection" class="btn btn-primary">Submit</button>
									</div>
										</form>
									</div>
								</div>
							</div>
						</div>

							<!-- Harvesting Form -->
							<div id="harvesterModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title" id="userModelTitle">harvester</h2>
									</div>

									<div class="modal-body">
										<!-- harvestor Form -->
							<form id="harvestorForm" >
								<fieldset style="border:0;">
									<!-- <div class="form-group">
										<label class="control-label" for="InspectorId">Inspector ID Number</label>
										<input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
									</div>   -->                            
									<div class="form-group">
										
										<input type="hidden" class="form-control" id="BatchId" name="BatchId" placeholder="Batch Id" data-parsley-required="true">
									</div>
									
									<div class="form-group">
									  
										<input type="hidden" class="form-control" id="previoushandler" name="previoushandler" placeholder="Previous Handler" data-parsley-required="true">
									</div>
									
									<div class="form-group">
									   
										<input type="hidden" class="form-control" id="currenthandler" name="currenthandler" placeholder="Current Handler" data-parsley-required="true">
									</div>


									<div class="form-group">
									   <label class="control-label" for="coffeevariety">Coffee Variety</label>
										<input type="text" class="form-control" id="coffeevariety" name="coffeevariety" placeholder="coffeevariety" data-parsley-required="true">
									</div> 

									<div class="form-group">
									   <label class="control-label" for="temprature">Temprature</label>
										<input type="text" class="form-control" id="temprature" name="temprature" placeholder="Temprature" data-parsley-required="true">
									</div>

									<div class="form-group">
									   <label class="control-label" for="humidity">Humidity</label>
									<input type="text" class="form-control" id="humidity" name="Humidity" placeholder="Humidity" data-parsley-required="true">
									</div>
							
							 </fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-default waves-effect" >Reset</button>
										<button type="button" id="updateharvestor" class="btn btn-primary">Submit</button>
									</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- ExporterForm -->
							<div id="ExporterModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title" id="userModelTitle">Exporter</h2>
									</div>

									<div class="modal-body">
									   
							<form id="ExporterForm" >
								<fieldset style="border:0;">
									<!-- <div class="form-group">
										<label class="control-label" for="InspectorId">Inspector ID Number</label>
										<input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
									</div>   -->                            
									<div class="form-group">
										
									<input type="hidden" class="form-control" id="batchid" name="batchid" placeholder="Batch Id" data-parsley-required="true">
									</div>
								   
									<div class="form-group">
										
										<input type="hidden" class="form-control" id="previoushandler" name="previoushandler" placeholder="Previous Handler" data-parsley-required="true">
									</div>
									
									
									<div class="form-group">
										
										<input type="hidden" class="form-control" id="currenthandler" name="currenthandler" placeholder="Current Handler" data-parsley-required="true">
									</div>

									<div class="form-group">
										<label class="control-label" for="exportquantity">Export Quantity</label>
										<input type="text" class="form-control" id="exportquantity" name="exportquantity" placeholder="Export Quantity" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="destaddr">Destination Address</label>
										<input type="text" class="form-control" id="destaddr" name="destaddr" placeholder="Destination Address" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="shipname">Ship Name</label>
										<input type="text" class="form-control" id="shipname" name="shipname" placeholder="Ship Name" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="shipno">Ship No</label>
										<input type="text" class="form-control" id="shipno" name="shipno" placeholder="Ship No" data-parsley-required="true">
									</div>

									<div class="form-group">
										<label class="control-label" for="estimateddatetime">Estimated Date Time</label>
									<input type="text" class="form-control datepicker-master" id="estimateddatetime" name="estimateddatetime" placeholder="Estimated Date Time" data-parsley-required="true">
									</div>
										
										
								</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-default waves-effect" >Reset</button>
										<button type="button" id="updateexportor" class="btn btn-primary">Submit</button>
									</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				   
						<!-- ImporterForm -->
							<div id="ImporterModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title" id="userModelTitle">Importer</h2>
									</div>

									<div class="modal-body">
										
							<form id="ImporterForm" >
								<fieldset style="border:0;">
									<!-- <div class="form-group">
										<label class="control-label" for="InspectorId">Inspector ID Number</label>
										<input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
									</div>   -->                            
									<div class="form-group">
										
										<input type="hidden" class="form-control" id="batchid" name="batchid" placeholder="Batch Id" data-parsley-required="true">
									</div>
									

									<div class="form-group">
										
										<input type="hidden" class="form-control" id="previoushandler" name="previoushandler" placeholder="Previous Handler" data-parsley-required="true">
									</div>
									
									<div class="form-group">
									   
										<input type="hidden" class="form-control" id="currenthandler" name="CurrentHandler" placeholder="Current Handler" data-parsley-required="true">
									</div>
									
									<div class="form-group">
										<label class="control-label" for="importquantity">Import Quantity</label>
										<input type="text" class="form-control" id="importquantity" name="importquantity" placeholder="Import Quantity" data-parsley-required="true">
									</div>
									

									<div class="form-group">
										<label class="control-label" for="shipname">ship Name</label>
										<input type="text" class="form-control" id="sname" name="transportinfo" placeholder="Ship Name" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="shipno">Ship No</label>
										<input type="text" class="form-control" id="sno" name="shipno" placeholder="Ship No" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="Transporterinfo">Transporter Info</label>
										<input type="text" class="form-control" id="transportinfo" name="transportinfo" placeholder="Transporter Info" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="warehousename">Warehouse Name</label>
										<input type="text" class="form-control" id="warehousename" name="warehousename" placeholder="Warehouse Name" data-parsley-required="true">
									</div>

									<div class="form-group">
										<label class="control-label" for="warehouseaddr">Warehouse Address</label>
										<input type="text" class="form-control" id="warehouseaddr" name="warehouseaddr" placeholder="Warehouse Address" data-parsley-required="true">
									</div>
										
								</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-default waves-effect" >Reset</button>
										<button type="button" id="updateimportor" class="btn btn-primary">Submit</button>
									</div>
										</form>
									</div>
								</div>
							</div>
						</div>


						<!-- Processor form--> 
						
						<div id="ProcessorModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h2 class="modal-title" id="userModelTitle">Processor</h2>
									</div>

									<div class="modal-body">
										<!-- harvestor Form -->
							<form id="ProcessorForm" >
								<fieldset style="border:0;">
									<!-- <div class="form-group">
										<label class="control-label" for="InspectorId">Inspector ID Number</label>
										<input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
									</div>   -->                            
									<div class="form-group">
									   
										<input type="hidden" class="form-control" id="batchid" name="batchid" placeholder="Batch Id" data-parsley-required="true">
									</div>
									

									<div class="form-group">
										
										<input type="hidden" class="form-control" id="previoushandler" name="previoushandler" placeholder="Previous Handler" data-parsley-required="true">
									</div>
									
									<div class="form-group">
										
										<input type="hidden" class="form-control" id="currenthandler" name="CurrentHandler" placeholder="Current Handler" data-parsley-required="true">
									</div>
									
									<div class="form-group">
										<label class="control-label" for="processedquantity">Processed Quantity</label>
										<input type="text" class="form-control" id="processedquantity" name="processedquantity" placeholder="Processed Quantity" data-parsley-required="true">
									</div>
									

									 <div class="form-group">
										<label class="control-label" for="roastingtemp">Roasting Temprature</label>
										<input type="text" class="form-control" id="roastingtemp" name="roastingtemp" placeholder="Roasting Temprature" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="timeforroasting">Roasting Time</label>
										<input type="text" class="form-control" id="timeforroasting" name="timeforroasting" placeholder="Roasting Time" data-parsley-required="true">
									</div>


									<div class="form-group">
										<label class="control-label" for="packagingdatetime">Packaging Date Time</label>
										<input type="text" class="form-control datepicker-master" id="packagingdatetime" name="packagingdatetime" placeholder="Packaging Date Time" data-parsley-required="true">
									</div>

									</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-default waves-effect" >Reset</button>
										<button type="button" id="updateprocessor" class="btn btn-primary">Submit</button>
									</div>
										</form>
									</div>
								</div>
							</div>
						</div>


						<!-- /.container-fluid -->

<script type="text/javascript">
	var switchery;
	var Id = {};
	var userId = <?php $arr = $this->session->userdata('user_data'); echo $arr['id'];?>;
	var userRole;
	var username;
	var useraddr;
	

	$(document).ready(function() {

	initDateTimePicker();
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
				} else {
					buildCultivationTable(response);
				}
			});

	});

	
	axios({
	method: 'get',
	url: "http://localhost:3000/api/com.coffeesupplychain.participant.SystemUser/" + userId,
	responseType: 'json',
	timeout: 60000,
		})
		.then(function(response) {
			if (response.data.length <= 0) {
				console.log("null responce")
			} else {
				
				var user_array = response.data;

				Id.user = user_array;
			   
				var role = user_array.Role;
				username = user_array.FirstName+" "+user_array.LastName;
				useraddr = user_array.Address;
				/*Golbale Role Set For User*/
				userRole = user_array.Role;

				$('#userContact').html(user_array.ContactNo);

				$("#userRole").html(user_array.Role);
				$("#userName").html(user_array.FirstName + " " + user_array.LastName);
				$("#currentUserAddress").html(user_array.Email);
				var img = 'https://ipfs.io/ipfs/' + user_array.ProfileImage;

				$("#userImage").attr("src", img);
				$("#editUser").attr("data-userId", userId);
				$("#editUser").attr("data-FirstName", user_array.FirstName);
				$("#editUser").attr("data-LastName", user_array.LastName);
				$("#editUser").attr("data-ContactNo", user_array.ContactNo);
				$("#editUser").attr("data-imgHash", user_array.ProfileImage);
				$("#editUser").attr("data-userrole", user_array.Role)
			}

		});




	$('#editUser').click(function() {
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
	   // console.log(userProfileImage);
		var img = 'https://ipfs.io/ipfs/' + userProfileImage
		$('#updateimagePreview').html('<img src="' + img + '">');
		//console.log(userFirstName);
		$("#userFormModel").modal();
	});




	function updateprofile() {
		$(".preloader").show();
	   
		if ($("#updateUserForm").parsley().isValid()) {

			var updateFormData = $("#updateUserForm").serialize();



			var blockchainData = {

				"$class": "com.coffeesupplychain.participant.SystemUser",
				"FirstName": $("#firstname").val(),
				"LastName": $("#Lastname").val(),
				"ContactNo": $("#contactNumber").val(),
				"ProfileImage": $("#userProfileHash").val(),
				"Role": Id.user.Role,
				"Status": Id.user.Status,
				"Email": Id.user.Email,
				"Address": Id.user.Address
			}

			
			axios({
					method: 'put',
					url: "http://localhost:3000/api/com.coffeesupplychain.participant.SystemUser/" + userId,
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
						swal('Success', "User Data Updated Successfully", 'success')
							.then((value) => {
								location.reload();
							});
					}
				});
		} else {
			$(".preloader").hide();
			swal('Error', "something went wrong", 'error');
			console.log("not valid")
		}

	}




	function buildCultivationTable(response) {
		
		var table = "";
		for (var tmpDataIndex in response.data)
		//console.log(tmpDataIndex);
		{
			var elem = response.data[tmpDataIndex];
			$(elem).each(function(index, batch) {


				var batchid = batch.BatchId;
				var tr = "";
				//var previoushandler = batch.Cultivator;




				if (batch.Status == "ADMIN") {
					tr = `<tr>
					<td>` + batchid + `</td>
				  `;
				  var cultivator = batch.Cultivator;


					if (userRole == "FARMINSPECTOR") {
						tr += ` <td><span class="label label-success font-weight-100">Completed</span></td>

						<td>
						  <span class="label label-inverse font-weight-100">
						  <a class="popup-with-form" href="#farmInspectionForm" onclick="editActivity('` + batchid + `','farmInspectionModel','`+cultivator+`')">
							<span class="label label-inverse font-weight-100">Update</span>
						  </a>
					  </td>`;
					} else {
						tr += `
					<td><span class="label label-success font-weight-100">Completed</span></td>
					<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
					}


					tr += `<td><span class="label label-danger font-weight-100">Not Available</span> </td>
			  <td><span class="label label-danger font-weight-100">Not Available</span> </td>
			  <td><span class="label label-danger font-weight-100">Not Available</span> </td>
			  <td><span class="label label-danger font-weight-100">Not Available</span> </td>
			  </tr>`;

				} else if (batch.Status == "FARMINSPECTOR") {
					tr = `<tr>
					<td>`+batchid+`</td>`;
					var inspecter = batch.FarmInspector;

					if (userRole == "HARVESTOR") {
						tr += ` <td><span class="label label-success font-weight-100">Completed</span></td>
				<td><span class="label label-success font-weight-100">Completed</span></td>

				<td>
					<span class="label label-inverse font-weight-100">
						  <a class="popup-with-form" href="#farmInspectionForm" onclick="editActivity('` + batchid + `','harvesterModel','`+inspecter+`')">
							<span class="label label-inverse font-weight-100">Update</span>
						  </a>
					  </td>`;
					} else {
						tr += `

					 <td><span class="label label-success font-weight-100">Completed</span></td>
				<td><span class="label label-success font-weight-100">Completed</span></td>

				 <td><span class="label label-warning font-weight-100">Processing</span> </td>`;
					}


					tr += `<td><span class="label label-danger font-weight-100">Not Available</span> </td>
			  <td><span class="label label-danger font-weight-100">Not Available</span> </td>
			  <td><span class="label label-danger font-weight-100">Not Available</span> </td>
			 
			  
		  </tr>`;

				} 
				else if (batch.Status == "HARVESTOR") {
					tr = `<tr>
					<td>` + batchid + `</td>
					<td><span class="label label-success font-weight-100">Completed</span></td>
					<td><span class="label label-success font-weight-100">Completed</span></td>
					`; 

					var harvester = batch.Harvestor;

					if (userRole == "EXPORTOR") {
						tr += `<td><span class="label label-success font-weight-100">Completed</span></td>
							<td>
							<span class="label label-inverse font-weight-100">
							  <a class="popup-with-form" href="#harvesterForm" onclick="editActivity('` + batchid + `','ExporterModel','`+harvester+`')">
								<span class="label label-inverse font-weight-100">Update</span>
							  </a>
						  </td>`;

					} else {
						tr += `<td><span class="label label-success font-weight-100">Completed</span></td>
					 <td><span class="label label-warning font-weight-100">Processing</span> </td>`;
					}

					tr += `
				<td><span class="label label-danger font-weight-100">Not Available</span> </td>
				<td><span class="label label-danger font-weight-100">Not Available</span> </td>
				
			   
			</tr>`;

				} else if (batch.Status == "EXPORTOR") {
					tr = `<tr>
					<td>` + batchid + `</td>
					<td><span class="label label-success font-weight-100">Completed</span></td>
					<td><span class="label label-success font-weight-100">Completed</span> </td>
					 <td><span class="label label-success font-weight-100">Completed</span> </td>
					 <td><span class="label label-success font-weight-100">Completed</span> </td>
				  `;

					var exporter = batch.Exportor;

					if (userRole == "IMPORTOR") {
						tr += `<td>
							  <span class="label label-inverse font-weight-100">
							  <a class="popup-with-form" href="#exporterForm" onclick="editActivity('` + batchid + `','ImporterModel','`+exporter+`')">
								<span class="label label-inverse font-weight-100">Update</span>
							  </a>
						  </td>`;
					} else {
						tr += `<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
					}

					tr += `  
					<td><span class="label label-danger font-weight-100">Not Available</span> </td>
					</tr>`;
				} else if (batch.Status == "IMPORTOR") {
					tr = `<tr>
					<td>` + batchid + `</td>
					<td><span class="label label-success font-weight-100">Completed</span></td>
					<td><span class="label label-success font-weight-100">Completed</span> </td>
					<td><span class="label label-success font-weight-100">Completed</span> </td>
					<td><span class="label label-success font-weight-100">Completed</span> </td>
					<td><span class="label label-success font-weight-100">Completed</span> </td>
				  `;

					 var importer =  batch.Importor; 
						   
					
					if (userRole == "PROCESSOR") {
						tr += `<td>
							  <span class="label label-inverse font-weight-100">
							  <a class="popup-with-form" href="#importerForm" onclick="editActivity('` + batchid + `','ProcessorModel',    '`+importer+`')">
								<span class="label label-inverse font-weight-100">Update</span>
							  </a>
						  </td>`;
					} else {
						tr += `<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
					}


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
					</tr>`;
		} 




			table += tr;
			});


		}

		$('#userCultivationTable').find('tbody').append(table);


		//$('#userCultivationTable').find('tbody').append(table);
	}

	
function editActivity(batchNo,modalname,previoushandler)
{
console.log("previous handler"+previoushandler);
$("#"+modalname).modal();

/* farm inspection code here */

$('#updateFarmInspection').click(function() {
 farmInspectionChanges(batchNo,previoushandler)
});

/* hervester code here */
$('#updateharvestor').click(function() {
  harvestorChanges(batchNo,previoushandler)
});

/* exporter code here */
$('#updateexportor').click(function() {
  exportorChanges(batchNo,previoushandler)

});

/* importer code here */
$('#updateimportor').click(function() {
  importerChanges(batchNo,previoushandler)
});

/* processor code here */
$('#updateprocessor').click(function() {
  processorChanges(batchNo,previoushandler)

});

}

function farmInspectionChanges(batchid,previoushandler){
if($("#farmInspectionForm").parsley().validate()==true)
{

var previousHandler = previoushandler;
var batchId = batchid;
var typeofseed = $("#typeofseed").val();
var coffefamily = $("#coffefamily").val();
var fertilizerUsed = $("#fertilizerUsed").val();


var blockchainData = {


  "$class": "com.coffeesupplychain.system.BatchFarmInspection",
  "batch": "resource:com.coffeesupplychain.system.BatchAsset#"+batchId,
  "previoushandler": previousHandler,
  "currenthandler": "resource:com.coffeesupplychain.participant.SystemUser#"+userId,
  "typeofseed": typeofseed,
  "coffefamily": coffefamily,
  "fertilizerused": fertilizerUsed,
  "batchstatus": "FARMINSPECTOR"

}
console.log(blockchainData)

var blockchainUrl = "http://localhost:3000/api/com.coffeesupplychain.system.BatchFarmInspection";

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
			
			swal('Success',"batch updated Successfully",'success')
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
}
 


function harvestorChanges(batchid,previoushandler){
if($("#harvestorForm").parsley().validate()==true)
{
var previousHandler = previoushandler;
var batchId = batchid;
var coffeevariety = $('#coffeevariety').val();
var temprature = $('#temprature').val();
var humidity = $('#humidity').val();

var blockchainData = {


  "$class": "com.coffeesupplychain.system.BatchHarvest",
  "batch": "resource:com.coffeesupplychain.system.BatchAsset#"+batchId,
  "previoushandler":previousHandler,
  "currenthandler": "resource:com.coffeesupplychain.participant.SystemUser#"+userId,
  "coffeevariety": coffeevariety,
  "temprature": temprature,
  "humidity": humidity,
  "batchstatus": "HARVESTOR"
}

var blockchainUrl = "http://localhost:3000/api/com.coffeesupplychain.system.BatchHarvest";

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
			
			swal('Success',"batch updated Successfully",'success')
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
}

function exportorChanges(batchid,previoushandler){
	if($('#ExporterForm').parsley().validate()==true)
{

var previousHandler = previoushandler;
var batchId = batchid;
var exportorquantity = $('#exportquantity').val();
var destaddr = $('#destaddr').val();
var shipname = $('#shipname').val();
var shipno = $('#shipno').val();
var estimateddatetime = $('#estimateddatetime').val();

var blockchainData = {

  "$class": "com.coffeesupplychain.system.BatchExport",
  "batch": "resource:com.coffeesupplychain.system.BatchAsset#"+batchid,
  "previoushandler": previousHandler,
  "currenthandler": "resource:com.coffeesupplychain.participant.SystemUser#"+userId,
  "exportorquantity": exportorquantity,
  "destaddr": destaddr,
  "shipname": shipname,
  "shipno": shipno,
  "estimateddatetime":estimateddatetime,
  "batchstatus": "EXPORTOR"

}

var blockchainUrl = "http://localhost:3000/api/com.coffeesupplychain.system.BatchExport";

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
			
			swal('Success',"batch updated Successfully",'success')
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
}

function importerChanges(batchid,previoushandler){
	if($('#ImporterForm').parsley().validate()==true)
{

	var previousHandler = previoushandler;
	var batchId = batchid;  
	var importquantity = $('#importquantity').val();
	var shipname = $('#sname').val();
	var shipno = $('#sno').val();
	var transportinfo = $('#transportinfo').val();
	var warehousename = $('#warehousename').val();
	var warehouseaddr = $('#warehouseaddr').val();

var blockchainData = {

  "$class": "com.coffeesupplychain.system.BatchImport",
  "batch": "resource:com.coffeesupplychain.system.BatchAsset#"+batchId,
  "previoushandler": previousHandler,
  "currenthandler": "resource:com.coffeesupplychain.participant.SystemUser#"+userId,
  "importorquantity":importquantity,
  "shipname":shipname,
  "shipno":shipno,
  "transportinfo":transportinfo,
  "warehousename":warehousename,
  "warehouseaddr":warehouseaddr,
  "batchstatus":"IMPORTOR"
}


var blockchainUrl = "http://localhost:3000/api/com.coffeesupplychain.system.BatchImport";
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
			
			swal('Success',"batch updated Successfully",'success')
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
}

function processorChanges(batchid,previoushandler){
	if($('#ProcessorForm').parsley().validate()==true)
{

	var previousHandler = previoushandler;
	var batchId = batchid;  
	var processedquantity = $('#processedquantity').val();
	var roastingtemp = $('#roastingtemp').val();
	var timeforroasting = $('#timeforroasting').val();
	var packagingdatetime = $('#packagingdatetime').val();
	var processorname = $('#processorname').val();
	var processoraddress = $('#processoraddress').val();


var blockchainData = {

  "$class": "com.coffeesupplychain.system.BatchProcessor",
  "batch": "resource:com.coffeesupplychain.system.BatchAsset#"+batchId,
  "previoushandler": previousHandler,
  "currenthandler": "resource:com.coffeesupplychain.participant.SystemUser#"+userId,
  "processedquantity": processedquantity,
  "roastingtemp": roastingtemp,
  "timeforroasting": timeforroasting,
  "packagingdatetime": packagingdatetime,
  "processorname":username,
  "processoraddress": useraddr,
  "batchstatus": "COMPLETE"
}


var blockchainUrl = "http://localhost:3000/api/com.coffeesupplychain.system.BatchProcessor";

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
			
			swal('Success',"batch updated Successfully",'success')
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
}

function initDateTimePicker() {
		$(".datepicker-master").datetimepicker({
			format: 'yyyy-mm-dd hh:ii:ss',
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
			showMeridian: 1,
			minuteStep: 1
		});
}
 //$(function () {
   //             $('#datetimepicker4').datetimepicker();
	 //       });

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



			var img = 'https://ipfs.io/ipfs/' + imageHash
			$('#updateimagePreview').html('<img src="' + img + '">');
		});
	}
</script>

<?php
	$this->load->view('/layout/_footer');
?>