function takeorder(order)//function for handling multiple requests
{
	console.log('order no.:', order);//prints order no.
	process(function()//creating anonymous function
	{
		console.log('order no.', order, 'delivered');
	});
}

function process(callback)//represents waiting time for process
{
	setTimeout(callback, 5000);//does not pauses the program//reminds the program to execute callback after 5 seconds
}

takeorder(1);//requests
takeorder(2);
takeorder(7);
takeorder(9);
takeorder(8);
takeorder(3);