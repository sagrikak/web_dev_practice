//all the modules that import this module will not be getting copies of this module but this very module
//so a change made by any importing module to this module will apply to every other module importing this module
function max(a, b)
{
	if(a>b)
		return a;
	else return b;
}

function min(a, b)
{
	if(a<b)
		return a;
	else return b;
}

//if we want to use these functions in another program, we need to export them
//each file which contains related code is called module
//here mathematical functions are separated than rest of the code by creating another file
//hence this is a module

//if only a certain function or variable is to be exported
//module.exports.findmax=max;//exporting function to other modules

/*module.exports=
{
	favmove: ""//exporting a variable
};*/
//this variable can't have multiple values for different files importing it as they are all accessing the same variable
//therefore we need object factory

module.exports= function()//object factory//object that creates another object
{//returns different variable everytime//hence all the modules operate on different variables
	return
	{
		favmove: ""
	}
};
module.exports=
{
	max: function(a, b)
	{
		if(a>b)
			return a;
		else return b;
	}
}

//another way to export functions and variables
//easier as we only have to write the function once with very little extra code
//exports the stuff written in it
/*
module.exports=
{
	max: function(a, b)
	{
		if(a>b)
			return a;
		else return b;
	},
	min: function(a, b)
	{
		if(a<b)
			return a;
		else return b;
	}
}
*/