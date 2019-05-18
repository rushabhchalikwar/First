function tableShow(){
alert("Rushabh");
var myTable=document.getElementById("customers");
var ref=firebase.database().ref().child('AREA');
	//var ref2=ref.child('name');
	alert(ref);
	ref.on('value', function(snapshot){
		alert("hhh");
	});
}