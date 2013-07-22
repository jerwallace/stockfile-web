var name = $('content').firstChild.nextSibling.innerHTML;

window.onload = function() {
	
	document.getElementById("logout").type = "submit";
	
	var username = $('content').firstChild.nextSibling.innerHTML;
	
	refreshFiles(username);
	refreshClients(username);

	setInterval(function(){refreshFiles(username)},3000);
	setInterval(function(){refreshClients(username)},3000);
};

function refreshClients(username){
		
	var JSONobj = username;

	new Ajax.Request
	(			
		"core/bin/updateClientsTable.php",
		{
			method: 'post',
			requestHeaders: {Accept: 'application/json'},
			parameters: {items: JSONobj},
			onSuccess: populateClientsTable
		}
	);
	
}

function refreshFiles(username){	
	
	var JSONobj = username;

	new Ajax.Request
	(			
		"core/bin/updateFilesTable.php",
		{
			method: 'post',
			requestHeaders: {Accept: 'application/json'},
			parameters: {items: JSONobj},
			onSuccess: populateFilesTable
		}
	);
	
}

function populateFilesTable (response) {
	
	var myObject = JSON.parse(response.responseText);
	
	var listSize = myObject.length;
	
	var tables = document.getElementById('fileListTable');
	if (typeof(tables) != 'undefined' && tables != null)
	{
	  tables.remove();
	}
	
	var content = document.getElementById('fileList');
	
	var table = new Element('table');
	table.id = "fileListTable";
	
	content.appendChild(table);
	
	var caption = new Element('caption');
	caption.innerHTML = "Here is the list of your files" ;
	table.appendChild(caption);
	
	var trHeader = new Element('tr');
	table.appendChild(trHeader);
	
	var th1 = new Element('th');
	th1.innerHTML = "File Path";
	trHeader.appendChild(th1);
	
	var th2 = new Element('th');
	th2.innerHTML = "File Name";
	trHeader.appendChild(th2);

	var th3 = new Element('th');
	th3.innerHTML = "Select";
	trHeader.appendChild(th3);
		
	var count = 1;
	
	for(var i=0; i<listSize; i++) {
		
		var tr = new Element('tr');
		tr.id = "row"+count;

		table.appendChild(tr);
		
		var td1 = new Element('td');
		td1.innerHTML = myObject[i][0];
		tr.appendChild(td1);
		
		var td2 = new Element('td');
		td2.innerHTML = myObject[i][1];
		tr.appendChild(td2);
		
		var td3 = new Element('td');	
		var input = new Element('input');
		input.id = "delete-"+count;
		input.type = "submit";
		input.value = "delete";
		input.observe("click", deleteClick);
		td3.appendChild(input);
		tr.appendChild(td3);
		
		count++;
	}
}

function populateClientsTable (response) {
	
	var myObject = JSON.parse(response.responseText);
		
	var listSize = myObject.length;
	
	var myObject = JSON.parse(response.responseText);
	
	var listSize = myObject.length;
	
	var tables = document.getElementById('clientListTable');
	if (typeof(tables) != 'undefined' && tables != null)
	{
	  tables.remove();
	}
	
	var content = document.getElementById('clientList');
	
	var table = new Element('table');
	table.id = "clientListTable";
	
	content.appendChild(table);
	
	var caption = new Element('caption');
	caption.innerHTML = "Here is the list of your clients" ;
	table.appendChild(caption);
	
	var trHeader = new Element('tr');
	table.appendChild(trHeader);
	
	var th1 = new Element('th');
	th1.innerHTML = "Client Type";
	trHeader.appendChild(th1);
	
	var th2 = new Element('th');
	th2.innerHTML = "Last Sync Date";
	trHeader.appendChild(th2);

	var th3 = new Element('th');
	th3.innerHTML = "Last Known IP";
	trHeader.appendChild(th3);
		
	var count = 1;
	
	for(var i=0; i<listSize; i++) {
		
		var tr = new Element('tr');
		tr.id = "row"+count;

		table.appendChild(tr);
		
		var td1 = new Element('td');
		td1.innerHTML = myObject[i][1];
		tr.appendChild(td1);
		
		var td2 = new Element('td');
		td2.innerHTML = myObject[i][2];
		tr.appendChild(td2);
		
		var td3 = new Element('td');	
		td3.innerHTML = myObject[i][3];
		tr.appendChild(td3);
		
		count++;
	}
}

function deleteClick() {
	var x;
	var r=confirm("Are you sure you want to delete this file?");
	if (r==true) {
		var rowNumber = "row"+this.id.split("-")[1];
		deleteFile(rowNumber);
	}
}

function deleteFile(rowNumber) {
	
	row = $(rowNumber);
	
	var filePath = row.innerHTML.split("<td>")[1].split("</td>")[0];
	
	var fileName = row.innerHTML.split("<td>")[2].split("</td>")[0];
	
//	var JSONobj = 
//				'{ "filePath":' + '"' + filePath + '"' + ',' + '"fileName":' + '"' 
//				+ fileName + '"' + ',' + '"userName":' + '"' + name + '"' + '}';
	
	var JSONobj = filePath + ',' + fileName + ',' + name;
	
	new Ajax.Request
	(			
		"core/bin/deleteUserFile.php",
		{
			method: 'post',
			requestHeaders: {Accept: 'application/json'},
			parameters: {items: JSONobj}
		}
	);
}




