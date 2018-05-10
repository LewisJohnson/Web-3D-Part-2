$(document).ready(function() {
	
	//Intilise the mobile web page on load
	var objID = 0;
	update(objID);
	
	//Update HTML page with new cultural object data from the AJAX request
	$("#model0").click(function() {
		update(objID=0);
	});
	$("#model1").click(function() {
		update(objID=1);
	});
	$("#model2").click(function() {
		update(objID=2);
	});
	$("#model3").click(function() {
		update(objID=3);
	});
	
	function update(objID) {	
	
 		//Read the JSON file as an AJAX request 
		$.getJSON('http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/index/getModelsJSON', function(jsonObj) {
			console.log(jsonObj);
			//Assign the AJAX requested data in to approriate <div> tag wrapped in HTML
			//Start by making AJAX request for the selected object name and its description
			$('#json-name').text(jsonObj.models[objID].name);
			$('#json-origin').text(jsonObj.models[objID].placeOfOrigin);
			$('#json-materials').text(jsonObj.models[objID].materials);
			$('#json-manufacturer').text(jsonObj.models[objID].manufacturer);
			$('#json-production-date').text(jsonObj.models[objID].productionDate);
			$('#json-description').text(jsonObj.models[objID].description);

			//Next grab (AJAX request) the thumbnails for each object to create the links to each cultural object, note that we are only dealing with 4 objects here.  
			//In reality, if we had multiple cultural objects, for example being returned by a search for 'bowl', we would be building a 'gallery' selector to browse the multiple objects
			//So in this particular case, we have hard wired each object 0 to 3
			$('#model0').attr('src', jsonObj.models[0].imageUrl);
			$('#model1').attr('src', jsonObj.models[1].imageUrl);
			$('#model2').attr('src', jsonObj.models[2].imageUrl);
			$('#model3').attr('src', jsonObj.models[3].imageUrl);

			//And grab any 3D media objects
			//Every time the user clicks on a X3DOM object
			var file = jsonObj.models[objID].x3domUrl;

			//Replace the x3d file in the context (if not already loaded)
			if(file != $('#x3domUrl').attr('url')){
				$('#x3domUrl').attr('url', file);
			}
		});
		
	}
	
});