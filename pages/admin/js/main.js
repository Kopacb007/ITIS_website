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

function goTo(url) {

	 $.ajax({
	  url: url,
	  cache: false,
	  success: function(result){
	    $("#content").html(result);
	  }
	});
  // $("#content").load("maincontent.php");
}

function showChartLine(canvasid, data) {
    Chart.defaults.global.responsive = true;
    // Get the context of the canvas element we want to select
    var LineChart = document.getElementById(canvasid).getContext("2d");
    
    var options = {
        ///Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines : true,

        //String - Colour of the grid lines
        scaleGridLineColor : "rgba(0,0,0,.05)",

        //Number - Width of the grid lines
        scaleGridLineWidth : 1,

        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,

        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,

        //Boolean - Whether the line is curved between points
        bezierCurve : true,

        //Number - Tension of the bezier curve between points
        bezierCurveTension : 0.4,

        //Boolean - Whether to show a dot for each point
        pointDot : true,

        //Number - Radius of each point dot in pixels
        pointDotRadius : 4,

        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth : 1,

        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,

        //Boolean - Whether to show a stroke for datasets
        datasetStroke : true,

        //Number - Pixel width of dataset stroke
        datasetStrokeWidth : 2,

        //Boolean - Whether to fill the dataset with a colour
        datasetFill : true,

        //String - A legend template
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

    };
    return new Chart(LineChart).Line(data, options);
}

function test() {
    var selector = document.getElementById('users');
    var value = selector[selector.selectedIndex].value;
	var url = "showprofile.php";
    
    $.ajax({
        url: url,
        type: 'post',
        data: { user_id : value },
        success: function(data, status){
            $("#result").html(data);
        }
    });
}

function save_f() {
    var url = "showprofile.php";
    var selector = document.getElementById('users');
    var useridVal = selector[selector.selectedIndex].value;
    selector = document.getElementById('nome');
    var nomeVal = selector.value;
    selector = document.getElementById('cognome');
    var cognomeVal = selector.value;
    selector = document.getElementById('telefono');
    var telefonoVal = selector.value;
    selector = document.getElementById('cellulare');
    var cellulareVal = selector.value;
    selector = document.getElementById('email');
    var emailVal = selector.value;
    selector = document.getElementById('password');
    var passwordVal = selector.value;
    selector = document.getElementById('newpass');
    var newpassVal = selector.value;
    selector = document.getElementById('repass');
    var repassVal = selector.value;
    
    $.ajax({
        url: url,
        type: 'post',
        data: 
        { 
            save : true,
            userid : useridVal,
            nome : nomeVal,
            cognome : cognomeVal,
            telefono : telefonoVal,
            cellulare : cellulareVal,
            email : emailVal,
            password : passwordVal,
            newpass : newpassVal,
            repass : repassVal
        },
        success: function(data){
            $("#result").html(data);
        }
    });
}