var http=require('http');
var fs=require('fs');//for sending a file through response

//404 response//in case we don't have the file that they're looking for
function send404response(response)
{
	response.writeHead(404, {"Content-Type": "text/plain"});
	response.write("Error 404:Page not found!");
	response.end();
}

//handles a user request
function onRequest(request, response)
{
	if(request.method=='GET' && request.url=="/")//to check if they are looking for home page. We only have the home page so if they are not, we execute 404.
	{//We can only send them the html page if they are using GET method
		response.writeHead(200, {"Content-Type": "text/html"}); //file that is to be sent is html
		fs.createReadStream("./index.html").pipe(response);//reads the file, creates the stream and sends it to the response for displaying
	}
	else
	{
		send404response(response);//in case that they try to access anything other than the home page
	}
}

http.createServer(onRequest).listen(8888);
console.log("Server is now running....");