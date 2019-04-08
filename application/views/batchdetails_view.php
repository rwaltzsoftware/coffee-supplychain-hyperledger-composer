<?php $this->load->view('layout/_header');
?>

<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
    
    .verified_info{
        color: green;
    }
    
    .errordiv {
        width: 80%;
        height: 100%;  
        border: 1px solid black;
        background: white;
        font-size: 25px;
        padding: 50px;
        color: red;
        margin-right:35px;
        margin-left:130px;
    }
    
    .verifiedImg {
        padding: 5px;
        width: 15px;
    }
    .userInfo
    {
      color: SteelBlue;
    }


    </style>
    
    <title></title>
</head>
<br>
<body>
   
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                <h3 class="page-title">Batch Progress <a class="text-info" href="javascript:void(0);" onclick="javascript:window.print();" title="Print Page Report"><i class="fa fa-print"></i> Print</a></h3><!-- <h4><b>Batch No: </b><?php echo $_GET['batchNo'];?></h4>-->
            </div>
            <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12"></div><!-- /.col-lg-12 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel" id="cultivationSection">
                               <div class="timeline-heading">
                                    <h4 class="timeline-title">Cultivation</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small></p><span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" id="cultivatorTable">
                                        <tr>
                                            <td colspan="2">
                                                <p>Information Not Avilable</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                               <div class = "verifiedImg"></div> 
                          </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="farmInspectionSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Farm-Inspector</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small></p><span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" id="inspectionTable">
                                        <tr>
                                            <td colspan="2">
                                                <p>Information Not Avilable</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                 <div class = "verifiedImg"></div> 
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="harvesterSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Harvester</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small></p><span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" id="harvestorTable">
                                        <tr>
                                            <td colspan="2">
                                                <p>Information Not Avilable</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                 <div class = "verifiedImg"></div> 
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="exporterSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Exporter</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small></p><span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" id="exportorTable">
                                        <tr>
                                            <td colspan="2">
                                                <p>Information Not Avilable</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                 <div class = "verifiedImg"></div> 
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="importerSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Importer</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small></p><span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" id="importorTable">
                                        <tr>
                                            <td colspan="2">
                                                <p>Information Not Avilable</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                 <div class = "verifiedImg"></div> 
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="processorSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Processor</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small></p><span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" id="processorTable">
                                        <tr>
                                            <td colspan="2">
                                                <p>Information Not Avilable</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /.row -->
    </div>



<script type="text/javascript">

var batchId = "<?php echo $this->uri->segment('3'); ?>";
var rest_server_url = '<?php echo REST_SERVER;?>';

var url = rest_server_url+"/api/com.coffeesupplychain.system.BatchAsset/" + batchId;

axios({
        method: 'get',
        url: url,
        responseType: 'json',
        timeout: 60000,
    })
    .then(function(response) {

        var Batch_array = response.data;
        if (Batch_array.Status == "ADMIN") {
            buildCultivatorData(Batch_array);
        }
        else if (Batch_array.Status == "FARMINSPECTOR") {
            buildInspectorData(Batch_array);
        }
        else if (Batch_array.Status == "HARVESTOR") {
            buildHarvestorData(Batch_array);
        }
        else if (Batch_array.Status == "EXPORTOR") {
            buildExportorData(Batch_array);
        }
        else if (Batch_array.Status == "IMPORTOR") {
            buildImportorData(Batch_array);
        }
        else if (Batch_array.Status == "PROCESSOR") {
            buildImportorData(Batch_array);
        }
        else if (Batch_array.Status == "COMPLETE") {
            buildProcessorData(Batch_array);
        }
    })
    .catch(function(error) {
        $(".preloader").hide();
        console.log(error.message)
        //swal('Error', "something went wrong", 'error');
        if(error.message =="Request failed with status code 404"){
          var errorMessage = "<div class = errordiv id = errordiv ><center>BatchId Is Not Valid</center></div>";
           $(".container-fluid").html(errorMessage)
        }
        else{
          var errorMessage = "<div class = errordiv id = errordiv ><center>"+error.message+"</center></div>";
           $(".container-fluid").html(errorMessage)

        }
        
        
      });

async function buildCultivatorData(batchinfo) {
    
    
    var tbl = '';
    tbl += `<tr><td>batchId:` + batchinfo.BatchId + `</td></tr>"`;
    tbl += `<tr><td>Cultivated Time:` + batchinfo.CultivatorIntime + `</td></tr>"`;
    tbl += `<tr><td><img src = "<?php echo base_url()?>/assets/plugins/images/verified.jpg" 
            style="width:80px;height:80px" class="img-circle pull-left"></td></tr>`;
    
    $('#cultivatorTable').html(tbl);
    
    $('#cultivatorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('success');
    
    $('#inspectionTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
    
    $('#inspectionTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');

     var userId = 0;
    
    if(batchinfo!=undefined || batchinfo.Cultivator!=undefined || batchinfo.Cultivator!="" || batchinfo.Cultivator!=null){
      
      userId = batchinfo.Cultivator.split('#')[1];
    
      var userResponse = await getUserData(userId);
      
      if(userResponse.data!=undefined || userResponse.data!=undefined || userResponse.data!="" || userResponse.data!=null){
       
        var userInfo = `<div class = userInfo><i class="fa fa-user" aria-hidden="true"></i>
                        `+userResponse.data.FirstName+` `+userResponse.data.LastName+`&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> `+userResponse.data.Email+ `&nbsp; <i class="fa fa-phone" aria-hidden="true"></i> `+userResponse.data.ContactNo+`
                        </div>`;
        
        $('#cultivatorTable').prepend(userInfo)
     
    }

  }
}

async function buildInspectorData(batchinfo) {

  await buildCultivatorData(batchinfo);

      
    
    var tbl = '';
    tbl += `<tr><td>Inspector In Time:` + batchinfo.FarmInspectorIntime + `</td></tr>"`;
    tbl += `<tr><td>CoffeeFamily: :` + batchinfo.CoffeeFamily + `</td></tr>"`;
    tbl += `<tr><td>Fertilizer Used : ` + batchinfo.FertilizerUsed + `</td></tr>"`;
    tbl += `<tr><td><img src = "<?php echo base_url()?>/assets/plugins/images/verified.jpg" 
            style="width:80px;height:80px" class="img-circle pull-left"></td></tr>`;

    $('#inspectionTable').html(tbl);

    $('#inspectionTable').parents('li').find("div.timeline-badge").removeClass('warning').addClass('success');

    $('#harvestorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');

    $('#inspectionTable').parents('li').find('div > i').removeClass('fa fa-times fa fa-hourglass-half').addClass('fa fa-check');

    $('#harvestorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');

    $('#harvestorTable').html("Processing...")

    var userId = 0;
    
    if(batchinfo!=undefined || batchinfo.FarmInspector!=undefined || batchinfo.FarmInspector!="" || batchinfo.FarmInspector!=null){
      
      userId = batchinfo.FarmInspector.split('#')[1];
    
      var userResponse = await getUserData(userId);
      
      if(userResponse.data!=undefined || userResponse.data!=undefined || userResponse.data!="" || userResponse.data!=null){

           var userInfo = `<div class = userInfo><i class="fa fa-user" aria-hidden="true"></i>
                        `+userResponse.data.FirstName+` `+userResponse.data.LastName+`&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> `+userResponse.data.Email+ `&nbsp; <i class="fa fa-phone" aria-hidden="true"></i> `+userResponse.data.ContactNo+`
                        </div>`;

            $('#inspectionTable').prepend(userInfo)
     
          }
        }
}


async function buildHarvestorData(batchinfo) {
    
    await buildInspectorData(batchinfo);
    
    var tbl = '';
    tbl += `<tr><td>Harvester Intime:` + batchinfo.HarvesterIntime + `</td></tr>"`;
    tbl += `<tr><td>Coffee Variety:` + batchinfo.CoffeeVariety + `</td></tr>"`;
    tbl += `<tr><td>Temprature:` + batchinfo.Temprature + `</td></tr>"`;
    tbl += `<tr><td>Humidity:` + batchinfo.Humidity + `</td></tr>"`;
    tbl += `<tr><td><img src = "<?php echo base_url()?>/assets/plugins/images/verified.jpg"
            style="width:80px;height:80px" class="img-circle pull-left"></td></tr>`;
    
    $('#harvestorTable').html(tbl)
    
    $('#harvestorTable').parents('li').find("div.timeline-badge").removeClass('warning danger').addClass('success');
    
    $('#exportorTable').html("Processing...")
    
    $('#exportorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');
    
    $('#harvestorTable').parents('li').find('div > i').removeClass('fa fa-times fa fa-hourglass-half').addClass('fa fa-check');
    
    $('#exportorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');


    var userId = 0;
    
      if(batchinfo!=undefined || batchinfo.Harvestor!=undefined || batchinfo.Harvestor!="" || batchinfo.Harvestor!=null){
      
          userId = batchinfo.Harvestor.split('#')[1];
    
          var userResponse = await getUserData(userId);
      
          if(userResponse.data!=undefined || userResponse.data!=undefined || userResponse.data!="" || userResponse.data!=null){
     

          var userInfo = `<div class = userInfo><i class="fa fa-user" aria-hidden="true"></i>
                        `+userResponse.data.FirstName+` `+userResponse.data.LastName+`&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> `+userResponse.data.Email+ `&nbsp; <i class="fa fa-phone" aria-hidden="true"></i> `+userResponse.data.ContactNo+`
                        </div>`;

          $('#harvestorTable').prepend(userInfo)


              }



          }
}


async function buildExportorData(batchinfo) {
    
  await buildHarvestorData(batchinfo);
    
    var tbl = '';
    tbl += `<tr><td>Exporter Intime:` + batchinfo.ExporterIntime + `</td></tr>"`;
    tbl += `<tr><td>Export Quantity:` + batchinfo.ExportorQuantity + `</td></tr>"`;
    tbl += `<tr><td>Estimated Date & time:` + batchinfo.EstimatedDatetime + `</td></tr>"`;
    tbl += `<tr><td>ShipName:` + batchinfo.ShipName + `</td></tr>"`;
    tbl += `<tr><td>ShipNo:` + batchinfo.ShipNo + `</td></tr>"`;
    tbl += `<tr><td><img src = "<?php echo base_url()?>/assets/plugins/images/verified.jpg"
            style="width:80px;height:80px" class="img-circle pull-left"></td></tr>`;

    $('#exportorTable').html(tbl);
    
    $('#exportorTable').parents('li').find("div.timeline-badge").removeClass('danger warning').addClass('success');
    
    $('#importorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
    
    $('#importorTable').html("Processing...")
    
    $('#importorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');
    
    $('#exportorTable').parents('li').find('div > i').removeClass('fa fa-times fa fa-hourglass-half').addClass('fa fa-check');

    var userId = 0;
    
      if(batchinfo!=undefined || batchinfo.Exportor!=undefined || batchinfo.Exportor!="" || batchinfo.Exportor!=null){
      
          userId = batchinfo.Exportor.split('#')[1];
    
          var userResponse = await getUserData(userId);
      
          if(userResponse.data!=undefined || userResponse.data!=undefined || userResponse.data!="" || userResponse.data!=null){

           var userInfo = `<div class = userInfo><i class="fa fa-user" aria-hidden="true"></i>
                        `+userResponse.data.FirstName+` `+userResponse.data.LastName+`&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> `+userResponse.data.Email+ `&nbsp; <i class="fa fa-phone" aria-hidden="true"></i> `+userResponse.data.ContactNo+`
                        </div>`;
        
            $('#exportorTable').prepend(userInfo)
     
        }

    }
}

async function buildImportorData(batchinfo) {
    
    await buildExportorData(batchinfo);
    
    var tbl = '';
    tbl += `<tr><td>Importer Intime:` + batchinfo.ImporterIntime + `</td></tr>"`;
    tbl += `<tr><td>Import Quantity:` + batchinfo.ImportorQuantity + `</td></tr>"`;
    tbl += `<tr><td>Transport Info:` + batchinfo.TransportInfo + `</td></tr>"`;
    tbl += `<tr><td>ShipName:` + batchinfo.ShipName + `</td></tr>"`;
    tbl += `<tr><td>ShipNo:` + batchinfo.ShipNo + `</td></tr>"`;
    tbl += `<tr><td>Warehouse Name:` + batchinfo.WarehouseName + `</td></tr>"`;
    tbl += `<tr><td>Warehouse Address:` + batchinfo.WarehouseAddr + `</td></tr>"`;
    tbl += `<tr><td><img src = "<?php echo base_url()?>/assets/plugins/images/verified.jpg"
            style="width:80px;height:80px" class="img-circle pull-left"></td></tr>`;

    $('#importorTable').html(tbl);
    
    $('#importorTable').parents('li').find("div.timeline-badge").removeClass('danger warning').addClass('success');
    
    $('#processorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
    
    $('#processorTable').html("Processing...")
    
    $('#processorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');
    
    $('#importorTable').parents('li').find('div > i').removeClass('fa fa-times fa fa-hourglass-half').addClass('fa fa-check');

 var userId = 0;
    
    if(batchinfo!=undefined || batchinfo.Importor!=undefined || batchinfo.Importor!="" || batchinfo.Importor!=null){
      
      userId = batchinfo.Importor.split('#')[1];
    
      var userResponse = await getUserData(userId);
      
      if(userResponse.data!=undefined || userResponse.data!=undefined || userResponse.data!="" || userResponse.data!=null){
     


 var userInfo = `<div class = userInfo><i class="fa fa-user" aria-hidden="true"></i>
                        `+userResponse.data.FirstName+` `+userResponse.data.LastName+`&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> `+userResponse.data.Email+ `&nbsp; <i class="fa fa-phone" aria-hidden="true"></i> `+userResponse.data.ContactNo+`
                        </div>`;



        $('#importorTable').prepend(userInfo)

    }

  }

}

async function buildProcessorData(batchinfo) {
    
  await buildImportorData(batchinfo);
    
    var tbl = '';
    tbl += `<tr><td>Processor Intime:` + batchinfo.ProcessorIntime + `</td></tr>"`;
    tbl += `<tr><td>Processed Quantity:` + batchinfo.ProcessedQuantity + `</td></tr>"`;
    tbl += `<tr><td>Roasting Time:` + batchinfo.TimeForRoasting + `</td></tr>"`;
    tbl += `<tr><td>Roasting Temprature:` + batchinfo.RoastingTemp + `</td></tr>"`;
    tbl += `<tr><td>Packaging Date & Time:` + batchinfo.PackagingDatetime + `</td></tr>"`;
    tbl += `<tr><td><img src = "<?php echo base_url()?>/assets/plugins/images/verified.jpg"
             style="width:80px;height:80px" class="img-circle pull-left"></td></tr>`;

    $('#processorTable').html(tbl);
    
    $('#processorTable').parents('li').find("div.timeline-badge").removeClass('danger warning').addClass('success');
    
    $('#processorTable').parents('li').find('div > i').removeClass('fa fa-times fa fa-hourglass-half').addClass('fa fa-check');


 var userId = 0;
    
    if(batchinfo!=undefined || batchinfo.Processor!=undefined || batchinfo.Processor!="" || batchinfo.Processor!=null){
      
      userId = batchinfo.Processor.split('#')[1];
    
      var userResponse = await getUserData(userId);
      
      if(userResponse.data!=undefined || userResponse.data!=undefined || userResponse.data!="" || userResponse.data!=null){
     
     var userInfo = `<div class = userInfo><i class="fa fa-user" aria-hidden="true"></i>
                        `+userResponse.data.FirstName+` `+userResponse.data.LastName+`&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i> `+userResponse.data.Email+ `&nbsp; <i class="fa fa-phone" aria-hidden="true"></i> `+userResponse.data.ContactNo+`
                        </div>`;

        $('#processorTable').prepend(userInfo)

    }

  }


}


function getUserData(userId) {
  //console.log(userId);

  var url = rest_server_url+"/api/com.coffeesupplychain.participant.SystemUser/" + 
  userId;

  return axios({
                  method: 'get',
                  url: url,
                  responseType: 'json',
                  timeout: 60000,
              });
}


</script>

    <?php 
    $this->load->view('layout/_footer');    
    ?>
</body>
</html>