var maxi=require('./game2');//importing from game2.js// "./" means look in the same directory

maxi.favmove="cut";//using imported variable//can be set to any value without affecting other modules because of the use of object factory
console.log("The move for this game is", maxi.favmove);

function Player()
{
	this.name = "";//use this to define properties and functions
	this.life = 100;
	this.givelife = function givelife(targetplayer)//creating function(method) within function//takes another instance of that function as parameter
	{ 
		targetplayer.life+=1;
		this.life-=1;
		console.log(this.name, "just gave one life to", targetplayer.name);
	}
}

var sherlock=new Player();//creating instances of function
var watson=new Player();
sherlock.name="Sherlock";//setting values for names
watson.name="Watson";

sherlock.givelife(watson);

console.log("Sherlock:", sherlock.life);
console.log("Watson:", watson.life);

Player.prototype.cut=function cut(targetplayer)//prototyping//to add additional methods to a class
{
	targetplayer.life-=3;
	console.log(this.name, "just cut", targetplayer.name);
}

var moriarty=new Player();
moriarty.name="Moriarty";

moriarty.cut(sherlock);

console.log("Sherlock:", sherlock.life);
console.log("Watson:", watson.life);
console.log("Moriarty:", moriarty.life);

Player.prototype.money=1000;//can also be used to add other properties to the class
console.log("\nMoney:");
console.log("Sherlock:", sherlock.money);
console.log("Watson:", watson.money);
console.log("Moriarty:", moriarty.money);

//if we import using the first way
//the function in file game2.js was exported as a variable named "findmax". The variable "maxi" is the imported module
//using imported function
/*if(maxi.findmax(sherlock.life, watson.life)==sherlock.life && maxi.findmax(sherlock.life, moriarty.life)==sherlock.life)
	console.log(sherlock.name, "wins!");
else if(maxi.findmax(sherlock.life, watson.life)==watson.life && maxi.findmax(watson.life, moriarty.life)==watson.life)
	console.log(watson.name, "wins!");
else if(maxi.findmax(sherlock.life, moriarty.life)==moriarty.life && maxi.findmax(watson.life, moriarty.life)==moriarty.life)
	console.log(moriarty.name, "wins!");
*/

//if we import using the second way

if(maxi.max(sherlock.life, watson.life)==sherlock.life && maxi.max(sherlock.life, moriarty.life)==sherlock.life)
	console.log(sherlock.name, "wins!");
else if(maxi.max(sherlock.life, watson.life)==watson.life && maxi.max(watson.life, moriarty.life)==watson.life)
	console.log(watson.name, "wins!");
else if(maxi.max(sherlock.life, moriarty.life)==moriarty.life && maxi.max(watson.life, moriarty.life)==moriarty.life)
	console.log(moriarty.name, "wins!");




