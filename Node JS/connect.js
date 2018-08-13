//using connect for web server//a framework which contains a lot of functionality that we need to create server
var connect=require('connect');
var http=require('http');

var app=connect();//creating a connect dispatcher

//middleware
//code to handle user request is called middleware
function doThis(request, response, next)
{
	response.write("Home\n");  
	console.log("I am Home.");
	next(); //executes the next object in the stack//that is the next app.use coomand
}
function doFirst(request, response, next)//code to handle user request is called middleware
{
	response.write("First\n");  
	console.log("I am first.");//executes the next object in the stack//that is the next app.use coomand
}
function doSecond(request, response, next)//code to handle user request is called middleware
{
	response.write("Second\n"); 
	console.log("I am second.");   
}
function doThird(request, response, next)//code to handle user request is called middleware
{
	response.write("Third\n");  
	console.log("I am third.");  
}
function doFourth(request, response, next)//code to handle user request is called middleware
{
	response.write("Fourth\n");  
	console.log("I am fourth.");  
	next(); 
}
app.use(doThis);
app.use(doFourth);
app.use('/first', doFirst);//can be used to run different functions for different pages//first runs code for home page then for the specific page
app.use('/second', doSecond); 
app.use('/third', doThird);

http.createServer(app).listen(8888);
console.log("The sever is running...");