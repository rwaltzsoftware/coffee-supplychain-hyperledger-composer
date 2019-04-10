

# Table of Contents


  - [Implementation of Coffee Supply chain using Hyperledger](#Implementation of Coffee Supply chain using Hyperledger )
    + [Problems in Existing System](#Problems in Existing System)
    + [What we are providing?](#What we are providing?)
    + [Application Workflow Diagram](#Application Workflow Diagram)
    + [In this application we have Six stages](#Six stages In this application)
    + [Included Components](#Included Components)
    + [Basic Terminologies in Hyperledger Composer](# Basic Terminologies in Hyperledger Composer)
    + [Prerequisites](#Prerequisites)
    + [Hyperledger Installation](#Hyperledger Installation)
    + [Development Screen's](#Development Screen's)
    + [Login Page](#Login Page)
    + [Admin Dashboard](#Admin Dashboard)
    + [Admin Activities](#Admin Activities)
    + [User Dashboard](#User Dashboard)
    + [User Activities](#User Activities)
     [Reference  Links](#Reference  Links)







# Implementation of Coffee Supply chain using Hyperledger 

This project showcases the journey of coffee beans on the blockchain.

The coffee supply chain is the sequence of activities and processes to bring raw coffee beans from coffee farms to processed coffee in markets.

### Problems in Existing System
- Currently, Coffee trade mostly relies on fax machines and emails to send and receive contracts across the globe, resulting in slower and error-prone paperwork.

- Blockchain can solve this by providing immutable and verifiable data sources

### What we are providing?
- We have implemented a chain code addressing the issue of storing critical data necessary at different stages of the supply chain and making it verifiable by all stakeholders in the supply chain.

### Application Workflow Diagram

![](https://github.com/imperialsoftech/coffee-supplychain-ethereum/raw/master/screens/workflow.png)

### In this application we have Six stages
1.Admin
2.Farm-Inspector
3.Harvester
4.Exporter
5.Importer
6.Processor

**Admin:** Admin creates a new batch which is the initial stage of the coffee batch.

**Farm-Inspector:** Farm-inspectors are responsible for inspecting coffee farms and updating the information like coffee family, type of seed and fertilizers used for growing coffee.

**Harvester:** Harvesters conducting plucking, hulling, polishing, grading and sorting activities, further updating the information of crop variety, the temperature used and humidity maintained during the process.

**Exporter:** Exporters are the organization who exports coffee beans throughout the world. Exporter adds quantity, destination address, ship name, ship number, estimated date.

**Importer:** Importers imports the coffee from coffee suppliers and updates quantity, ship name, ship number, transporters information, warehouse name, warehouse address, and the importer's address.

**Processor:** Processors are the organizations who process raw coffee beans by roasting them on a particular temperature and humidity and makes it ready for packaging and to sale into markets. The processor adds the information like quantity, temperature, roasting duration, packaging date time, processor name and processor address.

### Included Components
- Hyperledger Composer
- Hyperledger Fabric 
- Apache and PHP

### Basic Terminologies in Hyperledger Composer
 - Hyperledger Fabric is an open source framework for making private (permission) blockchain business networks, where identities and roles of members are known to other members. The network built on fabric serves as the back-end, with a client-side application front-end. SDK’s are available for Nodejs and Java to build client applications, with Python and Golang support coming soon.

 - Hyperledger Composer is a set of Javascript based tools and scripts that simplify the creation of Hyperledger Fabric networks. Using these tools, we can generate a business network archive (BNA) for our network.

### Prerequisites

- follow these steps before you begin your installation

https://hyperledger.github.io/composer/v0.19/installing/installing-prereqs

### Hyperledger Installation

**Step 1: Install the CLI tools**

i)Essential CLI tools:
>npm install -g composer-cli@0.19

ii) Utility for running a REST Server on your machine to expose your business networks as RESTful APIs:

>npm install -g composer-rest-server@0.19

iii) Useful utility for generating application assets
>npm install -g generator-hyperledger-composer@0.19

iv) Yeoman is a tool for generating applications, which utilises generator-hyperledger-composer 
> npm install -g yo

**Step 2: Install Playground**

i) Browser app for simple editing and testing Business Networks
>npm install -g composer-playground@0.19

**Step 3: Install Hyperledger Fabric**

i) In a directory of your choice (we will assume ~/fabric-dev-servers), get the .tar.gz file that contains the tools to install Hyperledger Fabric.

>mkdir ~/fabric-dev-servers && cd ~/fabric-dev-servers
curl -O https://raw.githubusercontent.com/hyperledger/composer-tools/master/packages/fabric-dev-servers/fabric-dev-servers.tar.gz
tar -xvf fabric-dev-servers.tar.gz

A zip is also available if you prefer: just replace the .tar.gz file with fabric-dev-servers.zip and the tar -xvf command with a unzip command in the preceding snippet.

ii) Use the scripts you just downloaded and extracted to download a local Hyperledger Fabric v1.1 runtime.
>cd ~/fabric-dev-servers
export FABRIC_VERSION=hlfv11
./downloadFabric.sh

iii) Starting and stopping Hyperledger Fabric
 >cd ~/fabric-dev-servers
   export FABRIC_VERSION=hlfv11
   ./startFabric.sh
   ./createPeerAdminCard.sh

**Step 4: Start the web app ("Playground")**

To start the web app, run:
> composer-playground

It will typically open your browser automatically, at the following address: http://localhost:8080/login

**1.Instantiating your Business Blockchain with Composer**
> mkdir project folder name
 cd project folder name

**2 .Instantiate a Business network & Deploying the .bna file on the Hyperledger Fabric Blockchain**
> yo hyperledger-composer
? Please select the type of project: Business Network
You can run this generator using: 'yo hyperledger-composer:businessnetwork'
Welcome to the business network generator
? Business network name: coffee_supply_chain
? Description: supply chain application
? Author name:  author name
? Author email: author email
? License: Apache-2.0
? Namespace: test
? Do you want to generate an empty template network? Yes: generate an empty template network

2) copy Model.cto into (models/test.cto)

3) create lib folder in test-bank and in lib folder create logic.js file and paste the JS code here

4) Generate the Business Network Archive (BNA)
Run 
> cd coffee_supply_chain 
> composer archive create -t dir -n .

5) Install composer network 
Run
> composer network install --archiveFile coffee_supply_chain@0.0.1.bna  --card PeerAdmin@hlfv1  

Update
>composer network upgrade -n (business-network-name) -V (business-network-version> -c PeerAdmin@hlfv1

6) Start Composer Network 
Run
> composer network start --networkName (name of your network)  --networkVersion 0.0.1 --card PeerAdmin@hlfv1 --networkAdmin admin --networkAdminEnrollSecret adminpw --file networkadmin.card

7) Import the network administrator identity as a usable business network card
Run
> composer card import --file networkadmin.card

8) To check that the business network has been deployed successfully,
Run
> composer network ping --card (name of card)

**Interfacing you blockchain with Restfull CRUD Apis**
> composer-rest-server
 
Explore your Restful Apis created by loopback on http://localhost:3000 


### Development Screen's

### Login Page
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/home.png)

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/home.png?raw=true)

- Log in - You can login to user or admin

### Admin Dashboard

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/admindashbord.png?raw=true)
- Total Number of Users
- Total Roles
- Total Batches
- Batches Overview
- List of User Roles
- List of all Users in Coffee Supply Chain
- In the admin dashboard, you will be able to find out total users registered, a total number of roles and total coffee batches created.
- In batches overview section you will be able to find out the progress of each batch. By clicking on the button 
- Create Batch, an admin will be able to create a new batch of coffee beans.
- Below these, on the left side, you can find out all the roles available in the coffee supply chain and their slugs, on the right side you will find out all users list and their details.
- Using Create User button you can add a new user into the coffee supply chain.

### Admin Activities
**Create user**

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/adduser.png?raw=true)
- Only admin can add a new user in the coffee supply chain
- In the Add User form, admin has to provide basic information of user like User, Username, User Contact Number, Role of User, User Status means the user is activated or deactivated.
- A user can play his role and update information only if he is have activated status.
- Admin can find out the newly added user in Users List on the Admin dashboard.

**Create New Batch**

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/addbatch.png?raw=true)
- To add new coffee beans batch, you can use create a batch button in batches overview section in the admin dashboard.

**Batch Overview**
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/batchoverview.png?raw=true)

- Get all coffee batch information in a batch overview. We get them in at what stage the batch is processing. You can find out the progress of batch using eye icon ( view batch page).
- By clicking on the read arrow at the end of batch id, the admin can find out the transaction details of that particular batch.
-- Processing: when the stage is in process
-- completed: when the stage is completed by respective roles
-- Not Available: Batch is not reached up to this stage

**Batch Details**

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/batchdetails.png?raw=true)
- In View Batch Page,/ admin will be able to see the progressive information of the coffee batch.
- Here we can get all the details of each stage and also the name and address of the user who updated the particular stage.

**Edit User Profile**
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/edituser.png?raw=true)

- here admin can edit the users' information



### User Dashboard
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/userdashbord.png?raw=true)
### User Activities

**Update User Profile**
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/updateuser.png?raw=true)

- To update, user profile you can use Update Profile form where you have to fill the information of users like the full name of a user, his / her contact number and profile image of a user.

- In this form role of user and user status can only be modified by admin, a user can not edit this information.

***Batch Updation by Farm-inspector***
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/farminspector.png?raw=true)

- To submit the farm inspection information, a user’s having the role of Farm inspector will be able to see the update button in a batch overview.
- By pressing on update button farm inspector can update information by providing Type of Seed, Coffee Family and Fertilizer Used.
- After successful submission of farm inspectors information batch progress to the next step which is harvesting.

***Batch Updation by Harvester***
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/harvester.png?raw=true)

- Harvester grows coffee beans and after complete nourishing of coffee beans harvester makes the bean ready to export by updating Coffee Variety, Temperature and humidity to the blockchain.

***Batch Updation by Exporter***

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/exporter.png?raw=true)
- Exporters send the raw coffee beans for further process on beans as per demands and they update their own information to the blockchain.
- Once the coffee beans are ready to export, Users having a role of Exporters updates the information of Exporting.
- It includes quantity, destination address, ship name, ship number, estimated DateTime.
- By pressing the submit button on the form, exporting information gets stored on the blockchain.


***Batch Updation by Importer***

![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/importer.png?raw=true)

- Warehouses and Organizations who process on raw beans imports the raw coffee beans. While importing coffee beans they have to update their information on the blockchain.
- Information of Quantity, Ship Name, Ship Number, Transporter Information, Warehouse Name, Warehouse Address.
- After importing coffee beans, it goes for the processing stage.

***Batch Updation by Processor***
![](https://github.com/imperialsoftech/coffee-supplychain-hyperledger-composer/blob/master/screens/processor.png?raw=true)

- At last, the Processors have to update the processing information like roasting temperature of coffee and coffee gets ready to sell out in markets.
- Processing has to fill the information of quantity, temperature, time for roasting, packaging date.
- And this is how the Coffee Supply Chain completes for one batch.

### Reference  Links

https://hyperledger.github.io/composer/v0.19/reference/glossary

https://medium.freecodecamp.org/how-to-build-a-blockchain-network-using-hyperledger-fabric-and-composer-e06644ff801d

https://hyperledger.github.io/composer/v0.19/installing/development-tools

https://medium.com/coinmonks/ibm-blockchain-demystified-3af55ab7c7bb



