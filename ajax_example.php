<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
	$(document).ready(function(){

		//bind to the click event of the button
		$("#btn-fetch-data").on('click', function(){

			$.ajax({
				url:"server_data.php",
				datatype: 'json',
				method: 'POST',
				data: {
					action: 'get_scores',
					student: 'samir'
				},
				success: function(jsonData){
					
					var name = jsonData.name;
					var time = jsonData.time;

					$('#div-data').append(name + ' ' + time + '<br>');

					console.log('name = ' + name);
					console.log('time = ' + time);
				}
			});
		});

		console.log('document is ready!');
	});
	</script>
</head>
<body>

<input type = "button" value = "Fetch Data" class="cls-buttonz" id="btn-fetch-data">

<div id = "div-data"></div>

</body>

</html>

