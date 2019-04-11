function randowStringGenerate() {
  let length = 8;
  let timestamp = +new Date;
  let _getRandomInt = function (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  var ts = timestamp.toString();
  var parts = ts.split("").reverse();
  var id = "";

  for (var i = 0; i < length; ++i) {
    var index = _getRandomInt(0, parts.length - 1);
    id += parts[index];
  }

  return id;
}

async function generateId() {
  return await randowStringGenerate();
}

/**
 * BatchCultivation transaction
 * @param {com.coffeesupplychain.system.BatchCultivation} BatchCultivation
 * @transaction
 */

async function BatchCultivation(tx) {
	var BatchId;

	//If get batch Id then set that Id as a batch id otherwise generate new batch Id
	if ((typeof tx.batchid != 'undefined') && (tx.batchid !== null) && (tx.batchid.length != 0))
		BatchId = tx.batchid;
	else
		BatchId = await generateId();

	//Get  batch registry reference
	var Batch = await getFactory().newResource('com.coffeesupplychain.system', 'BatchAsset', BatchId);

	//Get asset registry reference
	const assetRegistry = await getAssetRegistry('com.coffeesupplychain.system.BatchAsset');

	//Check batch is Already available into BatchAssets or not
	var isBatchAvailable = await assetRegistry.exists(BatchId);

	if (isBatchAvailable == true)
		throw new Error("batch with batchId: " + BatchId + ", already exists and can not add as a new batch ");
	let userId = tx.cultivator.UserId;
	const participantRegistry = await getParticipantRegistry('com.coffeesupplychain.participant.SystemUser');
	var UserData = await participantRegistry.get(userId);


	if (UserData.Role != "ADMIN")
		throw new Error("not valid user role");
  
	if (UserData.Status != "ACTIVE")
		throw new Error("user is inactive");


	Batch.CreatedDateTime = new Date();
	Batch.Cultivator = tx.cultivator;
	Batch.BatchId = BatchId;
	Batch.CultivatorIntime = new Date();

	//Add batch Details into asset registry
	await assetRegistry.add(Batch);
  console.log(tx.cultivator)

	let event = await getFactory().newEvent('com.coffeesupplychain.system', 'BatchProcess');
	event.previoushandler = tx.cultivator;
	event.currenthandler = tx.cultivator;
	event.batchstatus = Batch.Status;
	event.createddatetime = new Date();

	emit(event);
}


/**
 * BatchFarmInspection transaction
 * @param {com.coffeesupplychain.system.BatchFarmInspection} BatchFarmInspection
 * @transaction
 */

async function BatchFarmInspection(tx) {
	let BatchId = tx.batch.BatchId;
	//console.log(tx.batch)

	if (tx.batchstatus != 'FARMINSPECTOR')
		throw new Error("Batch Current Handler should be FARMINSPECTOR");

	const assetRegistry = await getAssetRegistry('com.coffeesupplychain.system.BatchAsset');

	//Check batch is Already available into BatchAssets or not
	var isBatchAvailable = await assetRegistry.exists(BatchId);

	if (isBatchAvailable == false)
		throw new Error("Not found any records with batchId: " + BatchId + " for update batch records");

	let userId = tx.currenthandler.UserId;
	const participantRegistry = await getParticipantRegistry('com.coffeesupplychain.participant.SystemUser');
	var UserData = await participantRegistry.get(userId);

	if (UserData.Role != "FARMINSPECTOR")
		throw new Error("not valid user role");
  
	if (UserData.Status != "ACTIVE")
		throw new Error("user is inactive");


	var BatchData = await assetRegistry.get(BatchId);


	//Check previous batch handler - It should be Admin
	if (BatchData.Status != "ADMIN")
		throw new Error("Can not perform this transaction with " + tx.batchStatus + " - Batch Status");

	BatchData.Cultivator = tx.previoushandler;
	BatchData.FarmInspector = tx.currenthandler;
	BatchData.TypeofSeed = tx.typeofseed;
	BatchData.CoffeeFamily  = tx.coffefamily;
	BatchData.FertilizerUsed = tx.fertilizerused;
	BatchData.Status = tx.batchstatus;
	BatchData.FarmInspectorIntime = new Date();
	//Update batch assets
	await assetRegistry.update(BatchData);

	let event = await getFactory().newEvent('com.coffeesupplychain.system', 'BatchProcess');
	event.previoushandler = tx.previoushandler;
	event.currenthandler = tx.currenthandler;
	event.batchstatus = tx.batchstatus;
	event.createddatetime = new Date();

	emit(event);
}

/**
 * BatchHarvest transaction
 * @param {com.coffeesupplychain.system.BatchHarvest} BatchHarvest
 * @transaction
 */

async function BatchHarvest(tx) {
	let BatchId = tx.batch.BatchId;

	const assetRegistry = await getAssetRegistry('com.coffeesupplychain.system.BatchAsset');

	//Check batch is Already available into BatchAssets or not
	var isBatchAvailable = await assetRegistry.exists(BatchId);

	if (isBatchAvailable == false)
		throw new Error("Not found any records with batchId: " + BatchId + " for update batch records");


	let userId = tx.currenthandler.UserId;
	const participantRegistry = await getParticipantRegistry('com.coffeesupplychain.participant.SystemUser');
	var UserData = await participantRegistry.get(userId);
  
	if (UserData.Role != "HARVESTOR")
		throw new Error("not valid user role");
  
	if (UserData.Status != "ACTIVE")
		throw new Error("user is inactive");


	var BatchData = await assetRegistry.get(BatchId);


	if (BatchData.Status != "FARMINSPECTOR")
		throw new Error("Can not perform this transaction with " + tx.BatchStatus + " - Batch Status");


	BatchData.FarmInspector = tx.previoushandler;
	BatchData.Harvestor = tx.currenthandler;
	BatchData.CoffeeVariety = tx.coffeevariety;
	BatchData.Temprature = tx.temprature;
	BatchData.Humidity = tx.humidity;
	BatchData.Status = tx.batchstatus;
	BatchData.HarvesterIntime = new Date();

	//Update batch assets
	await assetRegistry.update(BatchData);


	let event = await getFactory().newEvent('com.coffeesupplychain.system', 'BatchProcess');
	event.previoushandler = tx.previoushandler;
	event.currenthandler = tx.currenthandler;
	event.batchstatus = tx.batchstatus;
	event.createddatetime = new Date();

	emit(event);
}

/**
 * BatchExport
 * @param {com.coffeesupplychain.system.BatchExport} BatchExport
 * @transaction
 */

async function BatchExport(tx) {

	let BatchId = tx.batch.BatchId;

	const assetRegistry = await getAssetRegistry('com.coffeesupplychain.system.BatchAsset');

	//Check batch is Already available into BatchAssets or not
	var isBatchAvailable = await assetRegistry.exists(BatchId);

	if (isBatchAvailable == false)
		throw new Error("Not found any records with batchId: " + BatchId + " for update batch records");

	let userId = tx.currenthandler.UserId;
	const participantRegistry = await getParticipantRegistry('com.coffeesupplychain.participant.SystemUser');
	var UserData = await participantRegistry.get(userId);

	if (UserData.Role != "EXPORTOR")
		throw new Error("not valid user role");
  
	if (UserData.Status != "ACTIVE")
		throw new Error("user is inactive");


	var BatchData = await assetRegistry.get(BatchId);


	if (BatchData.Status != "HARVESTOR")
		throw new Error("Can not perform this transaction with " + tx.BatchStatus + " - Batch Status");


	BatchData.Harvestor = tx.previoushandler;
	BatchData.Exportor = tx.currenthandler;
	BatchData.ExportorQuantity = tx.exportorquantity;
	BatchData.DestAddr = tx.destaddr;
	BatchData.ShipName = tx.shipname;
	BatchData.ShipNo = tx.shipno;
	BatchData.EstimatedDatetime = tx.estimateddatetime;
	BatchData.Status = tx.batchstatus;
	BatchData.ExporterIntime = new Date();
	//Update batch assets
	await assetRegistry.update(BatchData);


	let event = await getFactory().newEvent('com.coffeesupplychain.system', 'BatchProcess');
	event.previoushandler = tx.previoushandler;
	event.currenthandler = tx.currenthandler;
	event.batchstatus = tx.batchstatus;
	event.createddatetime = new Date();

	emit(event);
}


/**
 *  BatchImport
 * @param {com.coffeesupplychain.system.BatchImport} BatchImport
 * @transaction
 */

async function BatchImport(tx) {
	let BatchId = tx.batch.BatchId;

	const assetRegistry = await getAssetRegistry('com.coffeesupplychain.system.BatchAsset');

	//Check batch is Already available into BatchAssets or not
	var isBatchAvailable = await assetRegistry.exists(BatchId);

	if (isBatchAvailable == false)
		throw new Error("Not found any records with batchId: " + BatchId + " for update batch records");


	let userId = tx.currenthandler.UserId;
	const participantRegistry = await getParticipantRegistry('com.coffeesupplychain.participant.SystemUser');
	var UserData = await participantRegistry.get(userId);

	if (UserData.Role != "IMPORTOR")
		throw new Error("not valid user role");
  
	if (UserData.Status != "ACTIVE")
		throw new Error("user is inactive");


	var BatchData = await assetRegistry.get(BatchId);


	if (BatchData.Status != "EXPORTOR")
		throw new Error("Can not perform this transaction with " + tx.BatchStatus + " - Batch Status");


	BatchData.Exportor = tx.previoushandler;
	BatchData.Importor = tx.currenthandler;
	BatchData.ImportorQuantity = tx.importorquantity;
	BatchData.ShipName = tx.shipname;
	BatchData.ShipNo = tx.shipno;
	BatchData.TransportInfo = tx.transportinfo;
	BatchData.WarehouseName = tx.warehousename;
	BatchData.WarehouseAddr = tx.warehouseaddr;
	BatchData.Status = tx.batchstatus;
	BatchData.ImporterIntime = new Date();
	//Update batch assets
	await assetRegistry.update(BatchData);


	let event = await getFactory().newEvent('com.coffeesupplychain.system', 'BatchProcess');
	event.previoushandler = tx.previoushandler;
	event.currenthandler = tx.currenthandler;
	event.batchstatus = tx.batchstatus;
	event.createddatetime = new Date();

	emit(event);
}


/**
 * BatchProcessor
 * @param {com.coffeesupplychain.system.BatchProcessor} BatchProcessor
 * @transaction
 */

async function BatchProcessor(tx) {
	let BatchId = tx.batch.BatchId;

	const assetRegistry = await getAssetRegistry('com.coffeesupplychain.system.BatchAsset');

	//Check batch is Already available into BatchAssets or not
	var isBatchAvailable = await assetRegistry.exists(BatchId);

	if (isBatchAvailable == false)
		throw new Error("Not found any records with batchId: " + BatchId + " for update batch records");

	let userId = tx.currenthandler.UserId;
	const participantRegistry = await getParticipantRegistry('com.coffeesupplychain.participant.SystemUser');
	var UserData = await participantRegistry.get(userId);
  
	if (UserData.Role != "PROCESSOR")
		throw new Error("not valid user role");
  
	if (UserData.Status != "ACTIVE")
		throw new Error("user is inactive");


	var BatchData = await assetRegistry.get(BatchId);


	if (BatchData.Status != "IMPORTOR")
		throw new Error("Can not perform this transaction with " + tx.BatchStatus + " - Batch Status");

	BatchData.Importor = tx.previoushandler;
	BatchData.Processor = tx.currenthandler;
	BatchData.ProcessedQuantity = tx.processedquantity;
	BatchData.RoastingTemp = tx.roastingtemp;
	BatchData.TimeForRoasting = tx.timeforroasting;
	BatchData.PackagingDatetime = tx.packagingdatetime;
	BatchData.ProcessorName = tx.processorname;
	BatchData.ProcessorAddr = tx.processoraddress;
	BatchData.Status = tx.batchstatus;
	BatchData.ProcessorIntime = new Date();

	//Update batch assets
	await assetRegistry.update(BatchData);


	let event = await getFactory().newEvent('com.coffeesupplychain.system', 'BatchProcess');
	event.previoushandler = tx.previoushandler;
	event.currenthandler = tx.currenthandler;
	event.batchstatus = tx.batchstatus;
	event.createddatetime = new Date();

	emit(event);
}