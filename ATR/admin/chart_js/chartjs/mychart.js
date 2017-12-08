$(document).ready(function(){

$.ajax({


	url:"http://localhost/charts/chart_js/chartjs/db_connection.php",
	method:"GET",
	success: function(data){
			console.log(data);
			var product =[];
			var sold = [];

			for(var i in data){
				product.push("Product" + data[i].id);
				sold.push(data[i].sold);

			}


			var chartdata = {
				labels: product,
				datasets: [
				{
					label:'Product sold',
					backgroundColor: 'rgba(100,234,100,.075)',
					borderColor: 'rgba(200,200,200,0.75)',
					hoverBackgroundColor: 'rgba(120,200,210,1)',
					hoverBorderColor: 'rgba(200,200,200,1)',
					data:sold
				}
				]
			};


			var ctx = $("#chartCanvas");

			var barGraph = new Chart(ctx, {
				type:'pie',
				data: chartdata
			});

	},
	error:function(data){
			console.log(data);
	}


});

});