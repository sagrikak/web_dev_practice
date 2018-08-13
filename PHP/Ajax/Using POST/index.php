<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
	<script type="text/javascript">
		function insert()
		{
			if(window.XMLHttpRequest)
				xmlhttp = new XMLHttpRequest();
			else 
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status==200)
				{
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}

			parameters = 'text='+document.getElementById('text').value;

			xmlhttp.open('POST', 'update.inc.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
		}
	</script>
</head>
<body>

	Insert: <input type="text" id="text">
	<input type="submit" value="Submit" onclick="insert()">
	<div id="message"></div>
</body>
</html>