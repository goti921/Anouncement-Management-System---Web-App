
var h1 = document.getElementById("container").clientHeight;
var h2 = document.getElementById("vnav");
var p  = document.getElementById("container");

var style       = p.currentStyle || window.getComputedStyle(p);
var marginTop   = parseInt(style.marginTop);

//alert(marginTop + " " + h1 + " " + window.innerHeight);

if(marginTop + h1>=window.innerHeight)
	h2.style.height = (h1 + marginTop) + "px";
else
	h2.style.height = (window.innerHeight - marginTop) + "px";
