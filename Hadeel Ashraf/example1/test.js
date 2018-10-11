/*global console, alert, prompt*/
var myNum= 120,
    mySnum= myNum.toString(),
    myString= "I Love \"JavaScript\" and 'CSS'",
    mysearch= myString.indexOf("Love"),
    s=myString.search("Love"),
    mySplit= myString.split(" "),
    k= mySplit.length();
console.log(myString);
console.log(myString.length);
console.log(typeof(mySnum));
console.log(mysearch);
console.log(s);
console.log(mySplit);
console.log(mySplit.length);


function sayHi() {
    "use strict";
    var Name = prompt("what's your name?"); 
    if (Name == ""){
    return alert("WELCOME"); 
    }else{
         return alert ("HELLO " + Name);
    }
};

var input= document.getElementById("degree");
input.onchange= function() {
    "use strict";
    document.getElementById("result").innerHTML= (input.value * 4.75) + " Pounds";  
}

function mirror(val,nam){
    "use strict";
    document.getElementById("m1").innerHTML=nam;
    document.getElementById("m2").innerHTML=val;
}
var myhover= document.getElementById("result");
myhover.onmouseover= function(){
    "use strict";
    myhover.innerHTML= input.value + " Riyals";
}