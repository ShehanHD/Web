
$(document).ready(function(){

$("#Vis").hide();

	$("#ins").on('click',function(){
		$("#Vis").hide(600);
		$("#Ins").slideDown(600);
	});
	$("#vis").on('click',function(){
		$("#Ins").hide(600);
		$("#Vis").slideDown(600);

	});
});

function agg(){
	//var elemento = document.getElementById("bot_agg");
var padre = document.getElementById("scegli");
var nome = document.getElementById("add").value;
var optn = document.createElement("option");
var atri = document.createAttribute("value");
var val = document.createTextNode(nome);

atri.value = nome;

optn.setAttributeNode(atri);
optn.appendChild(val);

padre.appendChild(optn);
}
