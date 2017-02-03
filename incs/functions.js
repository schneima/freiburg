// JavaScript Document 
function hide(id)
{
	var div = document.getElementById(id);
	div.style.visibility = "hidden";
}

function show(id, img, index)
{
	var div = document.getElementById("showImg");
	var bigImg = document.getElementById("bigImg");
	div.style.visibility = "visible";
	bigImg.src = img;
	bigImg.name = index;
}

function zoom(how)
{
	var bigImg = document.getElementById("bigImg");
	if(how=="in")
	{
		bigImg.width = bigImg.width + 20;
		}else{
		bigImg.width = bigImg.width - 20;
	
	}	
}

function showPics()
{
	var arPictures = document.getElementsByName("divBilder");
	for (var i = 0; i < 3; i++)
	{
		alert("pic: " + arPictures[i].firstChild.nodeValue);
	}
}

function previous()
{
	var arPictures = document.getElementsByName("divBilder");
	var bigImg = document.getElementById("bigImg");
	var index = bigImg.name * 1;
	index--;

	if(index > 0)
	{
		bigImg.src = arPictures[index].value;
		bigImg.name = index;
	}
	else
	{
		alert("Du bist am Anfang der Galerie!");
	}
}

function next()
{
	var arPictures = document.getElementsByName("divBilder");
	var bigImg = document.getElementById("bigImg");
	var index = bigImg.name * 1;
	index++;

	if(index < arPictures.length)
	{
		bigImg.src = arPictures[index].value;
		bigImg.name = index;
	}
	else
	{
		alert("Du bist am Ende der Galerie!");
	}
}

function go(link) {
window.location.href = link;
}

function login()
{
	alert('Falsche Anmeldung!');
}

function hg(){
	var hgs_str = new Array("04bgc.gif", "back031.gif", "lotsadrops.jpg", "utratro.jpg");
	var l = hgs_str.length;
	var rnd_no = Math.round((l-1)*Math.random());
	var img = "images/hg/"+hgs_str[rnd_no];
	document.getElementsByTagName("body")[0].background = img;
}

function color(){
	var colors_str = new Array("green", "blue", "black", "grey","red");
	var l = colors_str.length;
	var rnd = Math.round((l-1)*Math.random());
	var color = colors_str[rnd];
	document.getElementsByTagName("body")[0].style.backgroundColor = color;
}
	
function fenster(){
//innerHeight (H�he des Anzeigebereichs)
//innerWidth (Breite des Anzeigebereichs)
var breite = screen.innerHeight;
var hoehe = screen.innerWidth;
var test = document.getElementById("test");
test.firstChild.data = "breite: "+breite+" höhe: "+hoehe;
}

/*altes Men�
function switchlayer(Layer_Name)
{
  var GECKO = document.getElementById? 1:0 ;
  var NS = document.layers? 1:0 ;
  var IE = document.all? 1:0 ;

  if (GECKO)
       {document.getElementById(Layer_Name).style.display=
	   (document.getElementById(Layer_Name).style.display=='block') ? 'none' : 'block';}
  else if (NS)
       {document.layers[Layer_Name].display=(document.layers[Layer_Name].display==
	   'block') ? 'none' : 'block';}
  else if (IE)
       {document.all[Layer_Name].style.display=(document.all[Layer_Name].style.display==
	   'block') ? 'none' : 'block';}
}
*/