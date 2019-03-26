var CoffeeSupplyChainAbi = [
	{
		"constant": false,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			},
			{
				"name": "_quantity",
				"type": "uint256"
			},
			{
				"name": "_shipName",
				"type": "string"
			},
			{
				"name": "_shipNo",
				"type": "string"
			},
			{
				"name": "_transportInfo",
				"type": "string"
			},
			{
				"name": "_warehouseName",
				"type": "string"
			},
			{
				"name": "_warehouseAddress",
				"type": "string"
			},
			{
				"name": "_importerId",
				"type": "uint256"
			}
		],
		"name": "updateImporterData",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getExporterData",
		"outputs": [
			{
				"name": "quantity",
				"type": "uint256"
			},
			{
				"name": "destinationAddress",
				"type": "string"
			},
			{
				"name": "shipName",
				"type": "string"
			},
			{
				"name": "shipNo",
				"type": "string"
			},
			{
				"name": "departureDateTime",
				"type": "uint256"
			},
			{
				"name": "estimateDateTime",
				"type": "uint256"
			},
			{
				"name": "exporterId",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			},
			{
				"name": "_quantity",
				"type": "uint256"
			},
			{
				"name": "_destinationAddress",
				"type": "string"
			},
			{
				"name": "_shipName",
				"type": "string"
			},
			{
				"name": "_shipNo",
				"type": "string"
			},
			{
				"name": "_estimateDateTime",
				"type": "uint256"
			},
			{
				"name": "_exporterId",
				"type": "uint256"
			}
		],
		"name": "updateExporterData",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_registrationNo",
				"type": "string"
			},
			{
				"name": "_farmerName",
				"type": "string"
			},
			{
				"name": "_farmAddress",
				"type": "string"
			},
			{
				"name": "_exporterName",
				"type": "string"
			},
			{
				"name": "_importerName",
				"type": "string"
			}
		],
		"name": "addBasicDetails",
		"outputs": [
			{
				"name": "",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getNextAction",
		"outputs": [
			{
				"name": "action",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "renounceOwnership",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getFarmInspectorData",
		"outputs": [
			{
				"name": "coffeeFamily",
				"type": "string"
			},
			{
				"name": "typeOfSeed",
				"type": "string"
			},
			{
				"name": "fertilizerUsed",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			},
			{
				"name": "_coffeeFamily",
				"type": "string"
			},
			{
				"name": "_typeOfSeed",
				"type": "string"
			},
			{
				"name": "_fertilizerUsed",
				"type": "string"
			}
		],
		"name": "updateFarmInspectorData",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			},
			{
				"name": "_quantity",
				"type": "uint256"
			},
			{
				"name": "_temperature",
				"type": "string"
			},
			{
				"name": "_rostingDuration",
				"type": "uint256"
			},
			{
				"name": "_internalBatchNo",
				"type": "string"
			},
			{
				"name": "_packageDateTime",
				"type": "uint256"
			},
			{
				"name": "_processorName",
				"type": "string"
			},
			{
				"name": "_processorAddress",
				"type": "string"
			}
		],
		"name": "updateProcessorData",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "owner",
		"outputs": [
			{
				"name": "",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getProcessorData",
		"outputs": [
			{
				"name": "quantity",
				"type": "uint256"
			},
			{
				"name": "temperature",
				"type": "string"
			},
			{
				"name": "rostingDuration",
				"type": "uint256"
			},
			{
				"name": "internalBatchNo",
				"type": "string"
			},
			{
				"name": "packageDateTime",
				"type": "uint256"
			},
			{
				"name": "processorName",
				"type": "string"
			},
			{
				"name": "processorAddress",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getHarvesterData",
		"outputs": [
			{
				"name": "cropVariety",
				"type": "string"
			},
			{
				"name": "temperatureUsed",
				"type": "string"
			},
			{
				"name": "humidity",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			},
			{
				"name": "_cropVariety",
				"type": "string"
			},
			{
				"name": "_temperatureUsed",
				"type": "string"
			},
			{
				"name": "_humidity",
				"type": "string"
			}
		],
		"name": "updateHarvesterData",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getBasicDetails",
		"outputs": [
			{
				"name": "registrationNo",
				"type": "string"
			},
			{
				"name": "farmerName",
				"type": "string"
			},
			{
				"name": "farmAddress",
				"type": "string"
			},
			{
				"name": "exporterName",
				"type": "string"
			},
			{
				"name": "importerName",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newOwner",
				"type": "address"
			}
		],
		"name": "transferOwnership",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_batchNo",
				"type": "address"
			}
		],
		"name": "getImporterData",
		"outputs": [
			{
				"name": "quantity",
				"type": "uint256"
			},
			{
				"name": "shipName",
				"type": "string"
			},
			{
				"name": "shipNo",
				"type": "string"
			},
			{
				"name": "arrivalDateTime",
				"type": "uint256"
			},
			{
				"name": "transportInfo",
				"type": "string"
			},
			{
				"name": "warehouseName",
				"type": "string"
			},
			{
				"name": "warehouseAddress",
				"type": "string"
			},
			{
				"name": "importerId",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"name": "_supplyChainAddress",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "user",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "batchNo",
				"type": "address"
			}
		],
		"name": "PerformCultivation",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "user",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "batchNo",
				"type": "address"
			}
		],
		"name": "DoneInspection",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "user",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "batchNo",
				"type": "address"
			}
		],
		"name": "DoneHarvesting",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "user",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "batchNo",
				"type": "address"
			}
		],
		"name": "DoneExporting",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "user",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "batchNo",
				"type": "address"
			}
		],
		"name": "DoneImporting",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "user",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "indexedbatchNo",
				"type": "address"
			}
		],
		"name": "DoneProcessing",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "previousOwner",
				"type": "address"
			}
		],
		"name": "OwnershipRenounced",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "previousOwner",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "newOwner",
				"type": "address"
			}
		],
		"name": "OwnershipTransferred",
		"type": "event"
	}
]