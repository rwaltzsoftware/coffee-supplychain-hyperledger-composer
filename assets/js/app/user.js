var globCurrentEditingBatchNo = false;
var globCurrentUser = false;

var userForm,
    farmInspectionForm,
    harvesterForm,
    exporterForm,
    importerForm,
    processingForm;

$(document).ready(function(){
  
  userForm =  $("#updateUserForm").parsley();
  farmInspectionForm =  $("#farmInspectionForm").parsley();
  harvesterForm =  $("#harvesterForm").parsley(); exporterForm =  $("#exporterForm").parsley(); importerForm =  $("#importerForm").parsley();
  processingForm =  $("#processingForm").parsley();

  $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format:"dd-mm-yyyy"
    });
});

$(window).on("coinbaseReady", function ()
{
    getUser(globUserContract, function(data){      

      globCurrentUser = data ;

      if(data.isActive == true){
        if(data.name.trim().length <=0 && 
           data.contactNo.trim().length <=0 && 
           data.role.trim().length <=0 )
        {
          swal("Oops","Your Account was not found , Please contact Admin ","error");
          setTimeout(function()
          {
            window.location = "index.php";
          },1000);
          return ;
        }
      }else{
          swal({
              title: "Insufficient Access",
              text: "Your Account is blocked by Admin , Please contact to Admin",
              type: "error",
              showCancelButton: false,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: false
            },
            function(isConfirm)
            {
              if(isConfirm==true)
              {
               window.location = "index.php";
              }
            });
          return ;
      }  

      $("#userImage").attr('src','https://ipfs.io/ipfs/'+data.profileHash);
      $("#userName").html(data.name);
      $("#userContact").html(data.contactNo);
      $("#userRole").html(data.role);
      
    });

    getCultivationEvents(globMainContract);
});

/* --------------- User Section -----------------------*/
$("#editUser").on('click',function(){
  startLoader();
  getUser(globUserContract, function(data){
       
       $("#fullname").val(data.name);
       $("#contactNumber").val(data.contactNo);
       $("#role").val(data.role);

       var profileImageLink = 'https://ipfs.io/ipfs/'+data.profileHash;
       var btnViewImage = '<a href="'+profileImageLink+'" target="_blank" class=" text-danger"><i class="fa fa-eye"></i> View Image</a>';
       $("#imageHash").html(btnViewImage);

       changeSwitchery($("#isActive"),data.isActive);
       switchery.disable();
       stopLoader();
       $("#userFormModel").modal();
    });
});

$("#userFormBtn").on('click',function(){

    if(userForm.validate())
    {
      var fullname      = $("#fullname").val();
      var contactNumber = $("#contactNumber").val();
      var role          = globCurrentUser.role;
      var userStatus    = $("#isActive").is(":checked");
      var profileHash   = $("#userProfileHash").val();

      var userDetails = {
          fullname : fullname,
          contact : contactNumber,
          role : role,
          status : userStatus,
          profile : profileHash
      };    

      updateUser(globUserContract, userDetails); 
    }
});

function getUser(contractRef,callback)
{
   contractRef.methods.getUser(globCoinbase).call(function (error, result) {
        if(error){
            alert("Unable to get User" + error);    
        }
        newUser = result;
        if (callback)
        {
            callback(newUser);
        }        
    });
}

function updateUser(contractRef,data)
{
  contractRef.methods.updateUser(data.fullname,data.contact,data.role,data.status,data.profile)
  .send({from:globCoinbase,to:contractRef.address})
  .on('transactionHash',function(hash)
        {
          $.magnificPopup.instance.close()
          handleTransactionResponse(hash);
          $("#userFormModel").modal('hide');
        })
        .on('receipt',function(receipt)
        {
            receiptMessage = "User Profile Updated Succussfully";
            handleTransactionReceipt(receipt,receiptMessage);
            $("#userFormModel").modal('hide');
        })
        .on('error',function(error)
        {
            handleGenericError(error.message);
            return;     
        });    
}

/* --------------- Activity Section -----------------------*/

function editActivity(batchNo)
{
  startLoader();
  globCurrentEditingBatchNo = batchNo;
}

/* --------------- Farm Inspection Section -----------------------*/


$("#updateFarmInspection").on('click',function(){

    if(farmInspectionForm.validate())
    {
      var data = {
        batchNo : globCurrentEditingBatchNo,
        coffeeFamily : $("#coffeeFamily").val().trim(),
        typeOfSeed : $("#typeOfSeed").val().trim(),
        fertilizerUsed : $("#fertilizerUsed").val().trim(),
      };    

      updateFarmInspection(globMainContract, data); 
    }
});

function updateFarmInspection(contractRef,data)
{
  //contractRef.methods.updateUser("Swapnali","9578774787","HARVESTER",true,"0x74657374")
  contractRef.methods.updateFarmInspectorData(data.batchNo, data.coffeeFamily,data.typeOfSeed, data.fertilizerUsed)
  .send({from:globCoinbase,to:contractRef.address})
  .on('transactionHash',function(hash)
        {
          $.magnificPopup.instance.close()
          handleTransactionResponse(hash);
        })
        .on('receipt',function(receipt)
        {
            receiptMessage = "Farm Inspection Updated Succussfully";
            handleTransactionReceipt(receipt,receiptMessage)
        })
        .on('error',function(error)
        {
            handleGenericError(error.message);
            return;     
        });    
}

/* --------------- Harvest Section -----------------------*/


$("#updateHarvest").on('click',function(){

    if(harvesterForm.validate())
    {
      var data = {
        batchNo : globCurrentEditingBatchNo,
        cropVariety : $("#cropVariety").val().trim(),
        temperatureUsed : $("#temperatureUsed").val().trim(),
        humidity : $("#humidity").val().trim(),
      };    

      updateHarvest(globMainContract, data); 
    }
});

function updateHarvest(contractRef,data)
{
  //contractRef.methods.updateUser("Swapnali","9578774787","HARVESTER",true,"0x74657374")
  contractRef.methods.updateHarvesterData(data.batchNo, data.cropVariety,data.temperatureUsed, data.humidity)
  .send({from:globCoinbase,to:contractRef.address})
  .on('transactionHash',function(hash)
        {
          $.magnificPopup.instance.close()
          handleTransactionResponse(hash);
        })
        .on('receipt',function(receipt)
        {
            receiptMessage = "Harvest Updated Succussfully";
            handleTransactionReceipt(receipt,receiptMessage)
        })
        .on('error',function(error)
        {
            handleGenericError(error.message);
            return;     
        });    
}


/* --------------- Export Section -----------------------*/


$("#updateExport").on('click',function(){

    if(exporterForm.validate())
    {
      var tmpDate = $("#estimateDateTime").val().trim().split("-");
      tmpDate = tmpDate[1]+"/"+tmpDate[0]+"/"+tmpDate[2];     

      var data = {
        batchNo : globCurrentEditingBatchNo,
        quantity : parseInt($("#quantity").val().trim()),
        destinationAddress : $("#destinationAddress").val().trim(),
        shipName : $("#shipName").val().trim(),
        shipNo : $("#shipNo").val().trim(),
        estimateDateTime : new Date(tmpDate).getTime() / 1000,
        plantNo : 0,
        exporterId : parseInt($("#exporterId").val().trim()),
      };    

      updateExport(globMainContract, data); 
    }
});

function updateExport(contractRef,data)
{
  //contractRef.methods.updateUser("Swapnali","9578774787","HARVESTER",true,"0x74657374")
  contractRef.methods.updateExporterData(data.batchNo, data.quantity,data.destinationAddress, data.shipName, data.shipNo, data.estimateDateTime, data.exporterId)
  .send({from:globCoinbase,to:contractRef.address})
  .on('transactionHash',function(hash)
        {
          $.magnificPopup.instance.close()
          handleTransactionResponse(hash);
        })
        .on('receipt',function(receipt)
        {
            receiptMessage = "Export Updated Succussfully";
            handleTransactionReceipt(receipt,receiptMessage)
        })
        .on('error',function(error)
        {
            handleGenericError(error.message);
            return;     
        });    
}

/* --------------- Import Section -----------------------*/


$("#updateImport").on('click',function(){

    if(importerForm.validate())
    {
      var data = {
        batchNo : globCurrentEditingBatchNo,
        quantity : parseInt($("#quantity").val().trim()),
        shipName : $("#shipName").val().trim(),
        shipNo : $("#shipNo").val().trim(),
        transportInfo : ($("#transportInfo").val().trim()),
        warehouseName : ($("#warehouseName").val().trim()),
        warehouseAddress : ($("#warehouseAddress").val().trim()),
        importerId : parseInt($("#importerId").val().trim()),
      };    

      updateImport(globMainContract, data); 
    }
});

function updateImport(contractRef,data)
{
  //contractRef.methods.updateUser("Swapnali","9578774787","HARVESTER",true,"0x74657374")
  contractRef.methods.updateImporterData(data.batchNo, data.quantity, data.shipName, data.shipNo, data.transportInfo, data.warehouseName, data.warehouseAddress,data.importerId)
  .send({from:globCoinbase,to:contractRef.address})
  .on('transactionHash',function(hash)
        {
          $.magnificPopup.instance.close()
          handleTransactionResponse(hash);
        })
        .on('receipt',function(receipt)
        {
            receiptMessage = "Import Updated Succussfully";
            handleTransactionReceipt(receipt,receiptMessage)
        })
        .on('error',function(error)
        {
            handleGenericError(error.message);
            return;     
        });    
}

/* --------------- Processor Section -----------------------*/

$("#updateProcessor").on('click',function(){

    if(processingForm.validate())
    {
      var tmpDate = $("#packageDateTime").val().trim().split("-");
      tmpDate = tmpDate[1]+"/"+tmpDate[0]+"/"+tmpDate[2];

      var data = {
        batchNo : globCurrentEditingBatchNo,
        quantity : parseInt($("#quantity").val().trim()),
        temperature : $("#processingTemperature").val().trim(),
        rostingDuration : parseInt($("#rostingDuration").val().trim()),
        internalBatchNo : ($("#internalBatchNo").val().trim()),
        packageDateTime : new Date(tmpDate).getTime() / 1000 ,
        processorName : ($("#processorName").val().trim()),
        processorAddress : ($("#processorAddress").val().trim()),
      };    

      updateProcessor(globMainContract, data); 
    }
});

function updateProcessor(contractRef,data)
{
  //contractRef.methods.updateUser("Swapnali","9578774787","HARVESTER",true,"0x74657374")
  contractRef.methods.updateProcessorData(data.batchNo, data.quantity, data.temperature, data.rostingDuration, data.internalBatchNo, data.packageDateTime, data.processorName,data.processorAddress)
  .send({from:globCoinbase,to:contractRef.address})
  .on('transactionHash',function(hash)
        {
          $.magnificPopup.instance.close()
          handleTransactionResponse(hash);
        })
        .on('receipt',function(receipt)
        {
            receiptMessage = "Processing Updated Succussfully";
            handleTransactionReceipt(receipt,receiptMessage)
        })
        .on('error',function(error)
        {
            handleGenericError(error.message);
            return;     
        });    
}

function getCultivationEvents(contractRef) {
    contractRef.getPastEvents('PerformCultivation', {
        fromBlock: 0
    }).then(function (events) 
    {
      $("#totalBatch").html(events.length);
      counterInit();

        var finalEvents = [];
        $.each(events,function(index,elem)
        {
            var tmpData = {};
            tmpData.batchNo = elem.returnValues.batchNo;
            tmpData.transactionHash = elem.transactionHash;
            getBatchStatus(contractRef, tmpData.batchNo).then(result => {
                tmpData.status = result;

                finalEvents.push(tmpData);
            });
        });
        
        setTimeout(function()
        {
          if(finalEvents.length > 0){
              var table = buildCultivationTable(finalEvents);
              $("#userCultivationTable").find("tbody").html(table);

              reInitPopupForm();
          }    
        },1000); 

        

        // $("#transactions tbody").html(buildTransactionData(events));
    }).catch(error => {
        console.log(error)
    });
}

function buildCultivationTable(finalEvents)
{
    $.magnificPopup.instance.popupsCache = {};

    var table = "";
    
    for (var tmpDataIndex in finalEvents)
    {   
        var elem = finalEvents[tmpDataIndex];
        var batchNo = elem.batchNo;
        var transactionHash = elem.transactionHash;
        var tr = "";
        
        if (elem.status == "FARM_INSPECTION") {
            tr = `<tr>
                    <td>`+batchNo+`</td>
                  `;
                  
              if(globCurrentUser.role == "FARM_INSPECTION")
              {
                tr+=`<td>
                          <span class="label label-inverse font-weight-100">
                          <a class="popup-with-form" href="#farmInspectionForm" onclick="editActivity('`+batchNo+`')">
                            <span class="label label-inverse font-weight-100">Update</span>
                          </a>
                      </td>`;
              }
              else
              {
                 tr+=`<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
              }

                
          tr+=`<td><span class="label label-danger font-weight-100">Not Available</span> </td>
              <td><span class="label label-danger font-weight-100">Not Available</span> </td>
              <td><span class="label label-danger font-weight-100">Not Available</span> </td>
              <td><span class="label label-danger font-weight-100">Not Available</span> </td>
              <td><a href="view-batch.php?batchNo=`+batchNo+`&txn=`+transactionHash+`" target="_blank" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="ti-eye"></i></a> </td>
          </tr>`;

        } else if (elem.status == "HARVESTER") {
          tr = `<tr>
                    <td>`+batchNo+`</td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    `;
                  if(globCurrentUser.role == "HARVESTER")
                  {
                    tr+=`<td>
                              <span class="label label-inverse font-weight-100">
                              <a class="popup-with-form" href="#harvesterForm" onclick="editActivity('`+batchNo+`')">
                                <span class="label label-inverse font-weight-100">Update</span>
                              </a>
                          </td>`;
                  }
                  else
                  {
                     tr+=`<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
                  }        

            tr+=`
                <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                <td><a href="view-batch.php?batchNo=`+batchNo+`&txn=`+transactionHash+`" target="_blank" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="ti-eye"></i></a> </td>
            </tr>`;

        } else if (elem.status == "EXPORTER") {
            tr = `<tr>
                    <td>`+batchNo+`</td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                  `;
                  
                  if(globCurrentUser.role == "EXPORTER")
                  {
                    tr+=`<td>
                              <span class="label label-inverse font-weight-100">
                              <a class="popup-with-form" href="#exporterForm" onclick="editActivity('`+batchNo+`')">
                                <span class="label label-inverse font-weight-100">Update</span>
                              </a>
                          </td>`;
                  }
                  else
                  {
                     tr+=`<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
                  } 

              tr+=`  
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><a href="view-batch.php?batchNo=`+batchNo+`&txn=`+transactionHash+`" target="_blank" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="ti-eye"></i></a> </td>
                </tr>`;
        } else if (elem.status == "IMPORTER") {
            tr = `<tr>
                    <td>`+batchNo+`</td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                  `;  

                  if(globCurrentUser.role == "IMPORTER")
                  {
                    tr+=`<td>
                              <span class="label label-inverse font-weight-100">
                              <a class="popup-with-form" href="#importerForm" onclick="editActivity('`+batchNo+`')">
                                <span class="label label-inverse font-weight-100">Update</span>
                              </a>
                          </td>`;
                  }
                  else
                  {
                     tr+=`<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
                  } 

              tr+=` <td><span class="label label-danger font-weight-100">Not Available</span> </td>
                    <td><a href="view-batch.php?batchNo=`+batchNo+`&txn=`+transactionHash+`" target="_blank" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="ti-eye"></i></a> </td>
                </tr>`;
        } else if (elem.status == "PROCESSOR") {
            tr = `<tr>
                    <td>`+batchNo+`</td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                  `;
                  
                  if(globCurrentUser.role == "PROCESSOR")
                  {
                    tr+=`<td>
                              <span class="label label-inverse font-weight-100">
                              <a class="popup-with-form" href="#processingForm" onclick="editActivity('`+batchNo+`')">
                                <span class="label label-inverse font-weight-150">Update</span>
                              </a>
                          </td>`;
                  }
                  else
                  {
                     tr+=`<td><span class="label label-warning font-weight-100">Processing</span> </td>`;
                  }  
                tr+=`    
                    <td><a href="view-batch.php?batchNo=`+batchNo+`&txn=`+transactionHash+`" target="_blank" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="ti-eye"></i></a> </td>
                </tr>`;
        } else if (elem.status == "DONE") {
            tr = `<tr>
                    <td>`+batchNo+`</td>
                    <td><span class="label label-success font-weight-100">Completed</span></td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                    <td><span class="label label-success font-weight-100">Completed</span> </td>
                  `;  
                tr+=`    
                    <td><a href="view-batch.php?batchNo=`+batchNo+`&txn=`+transactionHash+`" target="_blank" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="ti-eye"></i></a> </td>
                </tr>`;
        }
            
        table+=tr;
    }


    return table;
    
}

function getBatchStatus(contractRef, batchNo)
{
    return contractRef.methods.getNextAction(batchNo)
        .call();
}

function reInitPopupForm()
{
  $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: true,
    key: 'popup-with-form',
    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      open: function() {
        stopLoader();
      }
    }
  });
}