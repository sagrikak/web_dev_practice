var fs=require('fs');//importing core modules//usually the var is named similar to the module for easier understanding
var path=require('path');

console.log('hell!');//prints

var person=
{//an object can have properties
	firstName: "SK",
	lastname: "Khandelwal",
	age: "28"
};
console.log(person);//prints all the properties of object

function add(a, b)
{
	return a+b;
}
console.log(add(44,1));

function worthless()
{
	console.log("\nI am worthless.\n");
	console.log("Testing for global", this===global);//prints false when called by another object
	//for functions which are not created in any object, "this" iss global
}
console.log(worthless);//nothing happens as the function in empty
worthless();

var printstuff=function()//anonymous function//does not need name
{
	console.log("a function assigned to a variable.");
}
printstuff();//this object(which is a function) can be passed as a parameter to other function
setTimeout(printstuff, 5000);//calls printstuff after 5 secs

var human=person;//in node js, everything is a reference
human.firstName="Adam";//changing name of human object will actually change the name of person object as we set human=person
console.log(person.firstName);

console.log(20=='20');//prints true even though one is string and other is int//compares only the values 
console.log(20==='20');//prints false because one is string and other is int//compares values and types

var thisfunc=
{
	print: function()//creating function as a property in object
	{
		console.log(person.firstName);
		console.log("Testing 'this'", this===person);//false 
		console.log("Testing 'this'", this===thisfunc);//true
		setTimeout(worthless, 7000);
		//"this" refers to whatever object is calling it
	}
}
thisfunc.print();

fs.writeFileSync("writing_file.txt", "Node js wrote me!! Yay!!");//creating a text file using core module "fs"
console.log(fs.readFileSync("writing_file.txt").toString());

var address="Home\sagrika/documents//irctc.txt";
console.log(path.normalize(address));//normalizes the path based on your operating system
console.log(path.dirname(address));
console.log(path.basename(address));
console.log(path.extname(address));

setInterval(function()
{
	console.log("It's been 2 secs since I said something.");
}, 2000);//runs the function after every 2 secs

console.log(__dirname);//gives the directory of the file that's calling it
console.log(__filename);//gives the whole path of the file that's calling it