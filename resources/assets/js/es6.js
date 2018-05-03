// function fire(bool) { 


// 	var foo ; 

// 	if (bool)  {

// 		foo = 'bar' ;

// 		console.log(foo) ;

// 	}else {

// 	}



// }


class TaskCollection { 

	constructor(tasks = []){ 

		this.tasks  = tasks ; 
	}

	log(){

		this.tasks.forEach(function(task){
			console.log(task);
		});

	// or if you have single argument with this it's the  task argument..


	```
	this.tasks.forEach(task => console.log(task));
	```


	//multiple function arguments.. 
	```
	this.tasks.forEach((task,index) => console.log(task));
	```


	// if there's no argument.. 
	``` 
	this.tasks.forEach(() => console.log('task'));
	```


	// if there are multiple tasks. per jeffrey way.. 
	```
	this.tasks.forEach(task => {
		if (tasks.length){
			console.log('task');
		}
		else
		{ 
			console.log('tasks2');
		}
	});
	```

} 


prepare(){
	// this.tasks.forEach(task => task.toGulp());


	this.tasks.forEach(task => {
		console.log(this);
	})
}


}


class Task  {
	toGulp(){
		console.log('converting to gulp ');
	}

} 


new TaskCollection([
	new Task, new Task, new Task
	]).prepare() ;


/*
 Default Parameters

 */

 function defaultDiscountRate(){
 	return .10 ; 
 }




 function applyDiscount(cost, discount = defaultDiscountRate()) {
 	return cost  - (cost * discount) ; 
 }

 alert(applyDiscount(100)) ;


 /*

 Rest and Spread 

 */



// Rest 

function sum (...numbers){

	return numbers.reduce(function(prev,current){

		return prev + current ;  ;
	}); 


	// or  with es6.. 

	``` 
	return numbers.reduce(
	(prev,current) => prev + current)
	)
	```

}


console.log(sum(1,2,3,4,5));


 // Spread Opreator 


 function added(x,y) { 

 	return x + y ;

 }
 
 let nums = [1,2] ; 

 console.log(added(...nums));



 // When passing a parameter though.. Just make sure the rest is on the end of the parameter..

// that means
function add(foo, ...nums) {}




/**

template strings

*/ 


let template = `<div class="alert">
<p>${name}</p>
</div>` ; 





/*

	Awesome object enhancements

------Go Back to this ----


*/




function getPerson(){ 

	let name = "John" ; 
	let age = 25 ; 


	return { 
		name,
		age, 
		greet(){ 
			return `Hello,${this.name}`;
		}

	}; 


};


alert(getPerson().greet()) ; 

	// Object destructuring


	let data = { 
		name : "Karen", 
		age : 42 ,

	}









/*
es6 Classes

*/




class User {

	constructor(username, email){
		this.username = username ; 
		this.email = email ;
	}


	changeEmail(newEmail)
	{
		this.email = newEmail ;  
	}

}

let user  = new User('Abrham Bas','abrhambas01@gmail.com');

user.changeEmail('foo@example.com');


console.dir(user) ; 



function log(strategy) {

}



/**
ES2015 /

ES6

 MODULES

 **/


 export class PostsCollection { 


 	constructor(tasks= []){ 
 		this.tasks = tasks  ;
 	}

 	dump(){
 		console.log(this.tasks);
 	}


 }


// in the main.js
import { PostsCollection } from './PostsCollection';


new PostsCollection([

	'Wow I\'m reading it' ,
	'Is it over?',
	

	])