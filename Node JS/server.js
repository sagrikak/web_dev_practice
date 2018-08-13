var http=require('http');//importing core module

function onRequest(request, response)//function that handles requests
{
	console.log("A user made a request.", request.url);//request is made twice. Once for the url, another for the icon.
	response.writeHead(404, {"Content-Type": "text/plain"});//tells the program the data that is to be sent back is plain text//200 means that that if everything is running okay//404 would be the error code
	response.write("Here is your response.");//allows you to write response
	response.end();//ends response  
}

http.createServer(onRequest).listen(8888);//while the program is running, server is listening to requests. On request it executes the function onRequest, Listening on port 8888
console.log("Server is now running.....");