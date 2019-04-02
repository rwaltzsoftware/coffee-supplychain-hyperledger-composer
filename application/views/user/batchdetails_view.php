<?php $this->load->view('layout/_header');
?>
<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
    .verified_info{
    color: green;
    }
    </style>
    <title></title>
</head>
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
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class=""></i>
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
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger">
                                <i class=""></i>
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
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class=""></i>
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
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger">
                                <i class=""></i>
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
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class=""></i>
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
    console.log(batchId);
    var url = "http://localhost:3000/api/com.coffeesupplychain.system.BatchAsset/"+batchId;
    axios({
    method: 'get',
    url: url,
    responseType: 'json',
    timeout: 60000,
    }
       )
    .then(function(response) {
    if (response.data.length <= 0) {
      console.log("null responce")
    }
    else {
      var Batch_array = response.data;
      console.log(Batch_array)
      if(Batch_array.Status=="ADMIN"){
        buildCultivatorData(Batch_array);
      }
      else if(Batch_array.Status=="FARMINSPECTOR"){
        buildInspectorData(Batch_array);
      }
      else if(Batch_array.Status=="HARVESTOR"){
        buildHarvestorData(Batch_array);
      }
      else if(Batch_array.Status=="EXPORTOR"){
        buildExportorData(Batch_array);
      }
      else if(Batch_array.Status=="IMPORTOR"){
        buildImportorData(Batch_array);
      }
      else if(Batch_array.Status=="PROCESSOR"){
        buildImportorData(Batch_array);
      }
      else if(Batch_array.Status=="COMPLETE"){
        buildProcessorData(Batch_array);
      }
    }
    }
         );
    function buildCultivatorData(batchinfo){
    console.log(batchinfo);
    var tbl = '';
    tbl += `<tr><td>batchId:`+batchinfo.BatchId+`</td></tr>"`;
    tbl += `<tr><td>Cultivated Time:`+batchinfo.CultivatorIntime+`</td></tr>"`;
    $('#cultivatorTable').html(tbl);
    $('#cultivatorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('success');
    $('#inspectionTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');


    $('#inspectionTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');

    $('#inspectionTable').html("Processing...")
    }
    

    function buildInspectorData(batchinfo){
    buildCultivatorData(batchinfo);
    var tbl = '';
    tbl += `<tr><td>Inspector In Time:`+batchinfo.FarmInspectorIntime+`</td></tr>"`;
    tbl += `<tr><td>CoffeeFamily: :`+batchinfo.CoffeeFamily+`</td></tr>"`;
    tbl += `<tr><td>Fertilizer Used : `+batchinfo.FertilizerUsed+`</td></tr>"`;
    $('#inspectionTable').html(tbl);
    
    $('#inspectionTable').parents('li').find("div.timeline-badge").removeClass('warning').addClass('success');
    
    $('#harvestorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
    
    $('#inspectionTable').parents('li').find('div > i').removeClass('fa-hourglass-half').addClass('fa fa-check');

    $('#harvestorTable').html("Processing...")

    $('#harvestorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');

    }
    

    function  buildHarvestorData(batchinfo){
    buildInspectorData(batchinfo);
    var tbl = '';
    tbl+= `<tr><td>Harvester Intime:`+batchinfo.HarvesterIntime+`</td></tr>"`;
    tbl+= `<tr><td>Coffee Variety:`+batchinfo.CoffeeVariety+`</td></tr>"`;
    tbl+= `<tr><td>Temprature:`+batchinfo.Temprature+`</td></tr>"`;
    tbl+= `<tr><td>Humidity:`+batchinfo.Humidity+`</td></tr>"`;
    $('#harvestorTable').html(tbl)
    $('#harvestorTable').parents('li').find("div.timeline-badge").removeClass('warning danger').addClass('success');
   
    $('#exportorTable').html("Processing...")

      $('#harvestorTable').parents('li').find('div > i').removeClass('fa-hourglass-half').addClass('fa fa-check');

    $('#exportorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
       $('#exportorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');
    }
    

    function buildExportorData(batchinfo){
    buildHarvestorData(batchinfo);
    var tbl = '';
    tbl+= `<tr><td>Exporter Intime:`+batchinfo.ExporterIntime+`</td></tr>"`;
    tbl+= `<tr><td>Export Quantity:`+batchinfo.ExportorQuantity+`</td></tr>"`;
    tbl+= `<tr><td>Estimated Date & time:`+batchinfo.EstimatedDatetime+`</td></tr>"`;
    tbl+= `<tr><td>ShipName:`+batchinfo.ShipName+`</td></tr>"`;
    tbl+= `<tr><td>ShipNo:`+batchinfo.ShipNo+`</td></tr>"`;
    $('#exportorTable').html(tbl);
    $('#exportorTable').parents('li').find("div.timeline-badge").removeClass('danger warning').addClass('success');
    $('#importorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
     $('#importorTable').html("Processing...")
     $('#exportorTable').parents('li').find('div > i').removeClass('fa-hourglass-half').addClass('fa fa-check');
     $('#importorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');
    }
    

    function buildImportorData(batchinfo){
    buildExportorData(batchinfo);
    var tbl = '';
    tbl+= `<tr><td>Importer Intime:`+batchinfo.ImporterIntime+`</td></tr>"`;
    tbl+= `<tr><td>Import Quantity:`+batchinfo.ImportorQuantity+`</td></tr>"`;
    tbl+= `<tr><td>Transport Info:`+batchinfo.TransportInfo+`</td></tr>"`;
    tbl+= `<tr><td>ShipName:`+batchinfo.ShipName+`</td></tr>"`;
    tbl+= `<tr><td>ShipNo:`+batchinfo.ShipNo+`</td></tr>"`;
    tbl+= `<tr><td>Warehouse Name:`+batchinfo.WarehouseName+`</td></tr>"`;
    tbl+= `<tr><td>Warehouse Address:`+batchinfo.WarehouseAddr+`</td></tr>"`;
    $('#importorTable').html(tbl);
    $('#importorTable').parents('li').find("div.timeline-badge").removeClass('danger warning').addClass('success');
    $('#processorTable').parents('li').find("div.timeline-badge").removeClass('danger').addClass('warning');
    $('#processorTable').html("Processing...")

    $('#importorTable').parents('li').find('div > i').removeClass('fa-hourglass-half').addClass('fa fa-check');
    $('#processorTable').parents('li').find('div > i').removeClass('fa fa-check').addClass('fa fa-hourglass-half');
    }
    

    function buildProcessorData(batchinfo){
    buildImportorData(batchinfo);
    var tbl = '';
    tbl+= `<tr><td>Processor Intime:`+batchinfo.ProcessorIntime+`</td></tr>"`;
    tbl+= `<tr><td>Processed Quantity:`+batchinfo.ProcessedQuantity+`</td></tr>"`;
    tbl+= `<tr><td>Roasting Time:`+batchinfo.TimeForRoasting+`</td></tr>"`;
    tbl+= `<tr><td>Roasting Temprature:`+batchinfo.RoastingTemp+`</td></tr>"`;
    tbl+= `<tr><td>ShipNo:`+batchinfo.ShipNo+`</td></tr>"`;
    tbl+= `<tr><td>Packaging Date & Time:`+batchinfo.PackagingDatetime+`</td></tr>"`;
    $('#processorTable').html(tbl);
    $('#processorTable').parents('li').find("div.timeline-badge").removeClass('danger warning').addClass('success');
    $('#processorTable').parents('li').find('div > i').removeClass('fa-hourglass-half').addClass('fa fa-check');
    }
    </script> 

    <?php 
    $this->load->view('layout/_footer');    
    ?>
</body>
</html>