/*
var httpRequest;
function startFunc() {
    var arr = document.getElementById("numArray").value;
    
    var Title = document.getElementById("string1").value;
    var Artist = document.getElementById("string2").value;
    var numList = document.getElementById("numbox1").value;
    var prevDate = document.getElementById("checkbox1").value;
    var Title = document.getElementById("string1").value;
  
    //loadData('data.php', arr); //this is our Request1
    GetData('GetItem.php', 0); //this is our Request2. get first elem in array, so iter=0.

}
*/
/*
function loadData(url, arr) { //url=file and type
httpRequest = new XMLHttpRequest(); // create the object
if (!httpRequest) { // check if the object was properly created
// issues with the browser, example: old browser
alert('Cannot create an XMLHTTP instance');
return false;
}
httpRequest.onreadystatechange = DisplayObj; // we assign a function to the property onreadystatechange (callback function)
httpRequest.open('POST','data.php'); // ACTION + (string containing address of the file + parameters if needed)
httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
httpRequest.send('arr=' + arr);  // POST = send with parameter (the string with the relevant information)
}
 */
/*
function DisplayObj() { //purpose: take JSON, push into a form in html.
//dom.getElement, form, take its contents, replace values with JSON values.
//var form = document.getElementById("element");
try {
if (httpRequest.readyState === XMLHttpRequest.DONE) {
if (httpRequest.status === 200) {
// We retrieve a piece of text corresponding to some JSON
// now you have a nice object in the response, you can access its properties and values to populate the different fields of your form
// the next stages will be about the creation of this JSON from the PHP side, in relation to some data that we extracted from a database
alert(httpRequest.responseText); // If you have a bug, use an alert of what is given back from the server (for textual content)
// if you return something that cannot be converted to an object, then debug the PHP side !
//THIS IS WHERE INFORMATION IS TAKEN!!!
var response = JSON.parse(httpRequest.responseText);
alert(response.computedString); // display the value of property computedString from the JSON object
} else {
alert('There was a problem with the request.');
}
}
}
catch( e ) { // Always deal with what can happen badly, client-server applications --> there is always something that can go wrong on one end of the connection
alert('Caught Exception: ' + e.description);
}
}
 */
 /*
function GetData(url, i) {
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) { // check if the object was properly created
        // issues with the browser, example: old browser
        alert('Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = GetItem; // we assign a function to the property onreadystatechange (callback function)
    httpRequest.open('POST', url); // ACTION + (string containing address of the file + parameters if needed)
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('i=' + i); // POST = send with parameter (the string with the relevant information)
    //top line might not be needed?
    //No, how else would we send the iterator?
}
function GetItem(url, iterator) { //this changes the html page, to whatever formpage we are on.
    try {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                //change the form, get elements based on ID and change their values to whatever was in the array.
            } else {
                alert('There was a problem with the request.');
            }
        }
    } catch (e) { // Always deal with what can happen badly, client-server applications --> there is always something that can go wrong on one end of the connection
        alert('Caught Exception: ' + e.description);
    }

}
*/
/*
function SaveItem(i, obj) {}
function FormToObj() {}
function ObjToForm() {}
*/
//client gets json file
//server sends content, saves in array
var httpRequest;

			function startFunc() {
				var arr = document.getElementById("numArray").value;
				GetData('GetItem.php', 0);
			}

			function GetData(url, i) {
				httpRequest = new XMLHttpRequest();
				if (!httpRequest) {
					alert('Cannot create an XMLHTTP instance');
					return false;
				}
				httpRequest.onreadystatechange = GetItem;
				httpRequest.open('POST', url);
				httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				httpRequest.send('i=' + i);
			}

			function GetItem() {
				try {
					if (httpRequest.readyState === XMLHttpRequest.DONE) {
						if (httpRequest.status === 200) {
							// Process response and update form elements with the response data
							var response = JSON.parse(httpRequest.responseText);
							alert(response.computedString); // Example of processing response
						} else {
							alert('There was a problem with the request.');
						}
					}
				} catch (e) {
					alert('Caught Exception: ' + e.description);
				}
			}