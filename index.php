<!DOCTYPE html>
<html>
<head>
	<title>Covid-19</title>
	<!--link of files-->
	<?php include 'links.php'; ?>
	<?php include 'style.php'; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="fetch();loader();">
	<!--pre loader-->
    <div id="loader"></div>
<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-center">
 <h1 class="navbar-brand line" href="#">COVID-19 LIVE STATS</h1>
 <h6 style="color:#fff;">Developed by findfardin</h6>
</nav>

<!--CORONA UPDATES-->
<section class="corona-update container-fluid">
	<div class="mb-5">
		<h2 class="text-center text-uppercase pt-5">covid-19 update</h2>
	</div>

	<div class="row text-center">
		<div class="col-lg-4 col-md-4 col-12">
			<h5 class="font-weight-bold">Total Confirmed</h5>
			<h3 class="count pb-4" id="TC"></h3>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<h5 class="font-weight-bold">Total Recovered</h5>
			<h3 class="count pb-4" id="TR"></h3>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<h5 class="font-weight-bold">Total Deaths</h5>
			<h3 class="count pb-4" id="TD"></h3>
		</div>
	</div>
	<div class="text-center">
		<!--Search box-->
		<input class=" text-center mb-3 pl-5 pr-5 pt-2 pb-2 search-box" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for countries.." title="Search here">
		<p>[Please avoid spaces after name]</p>
                <div class="scrollLeft"><p>Scroll left-></p></div>


	</div>

	<div class="text-center table-responsive">
		<!--Search box-->
		<!-- <input class=" text-center mb-3 pl-5 pr-5 pt-2 pb-2 search-box" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for countries.." title="Type in a name"> -->
		<!--Table start-->
		<table class=" table table-bordered table-striped text-center table-dark" id="corona_table" style="padding: 0px;margin: 0px;">
		<tr>
		<th>Country</th>
		<th>Total confirmed cases</th>
		<th>Total Recovered</th>
		<th>Total Deaths</th>
	</tr>
		</table>
	</div>
</section>
<script type="text/javascript">
//DAta fetching
function fetch(){

		$.get("https://api.covid19api.com/summary",//taking data from api

		function (data){//got all data

					//console.log(data['Countries'].length);
					var corona_table = document.getElementById('corona_table');//take table
					for(i=1;i<(data['Countries'].length);i++)
					{
						var x= corona_table.insertRow(); //row inserted
							//All required row inserting
							x.insertCell(0);
							corona_table.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];

							x.insertCell(1);
							corona_table.rows[i].cells[1].innerHTML = data['Countries'][i-1]['TotalConfirmed'];

							x.insertCell(2);
							corona_table.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalRecovered'];

							x.insertCell(3);
							corona_table.rows[i].cells[3].innerHTML = data['Countries'][i-1]['TotalDeaths'];

						}

						/*To show global values*/

						document.getElementById('TC').innerHTML = data['Global']['TotalConfirmed'];
						document.getElementById('TR').innerHTML = data['Global']['TotalRecovered'];
						document.getElementById('TD').innerHTML = data['Global']['TotalDeaths'];

					 }


			);

}


/*For search box*/
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("corona_table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}



var preLoad=document.getElementById("loader");
  function loader(){
    preLoad.style.display='none';
}

</script>


</body>
</html>