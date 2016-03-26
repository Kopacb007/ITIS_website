function showPage(str) {

	// Info about POST
	// https://stackoverflow.com/questions/7071544/post-from-xmlhttp-with-parameters
	var xmlhttp = new XMLHttpRequest();
	var url = "editForm.php";
	var params = "id=" + str;
	xmlhttp.open("POST", url, true);

	//Send the proper header information along with the request
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
            }
        };
        
        xmlhttp.send(params);
    }