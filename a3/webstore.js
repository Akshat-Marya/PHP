
// reference : http://www.newthinktank.com/2014/12/html-5-tutorial/


function init(){

	// Check if we can get a location
	if(navigator.geolocation){
	
		// Notify the user we are trying to find their location
		document.getElementById("notify").innerHTML = "We are trying to find you";
		
		// Declare what function to call on success and error
		navigator.geolocation.getCurrentPosition(successFunc, errorFunc);
	
	} else {
	
		// Notify the user that we can't get their location
		document.getElementById("notify").innerHTML = "Your browser doesn't support geolocation";
	
	}
}

function successFunc(pos){

	// Get the lat and long and output it
	var lat = pos.coords.latitude;
	var long = pos.coords.longitude;
	document.getElementById("notify").innerHTML = "You are at Lat: " +
		lat + " Long: " + long;

}

// Notify the user that an error occurred
function errorFunc(pos){

	document.getElementById("notify").innerHTML = "Error Occurred Locating You";

}


onload = init;