var area=document.getElementById('area');
var filled=document.getElementById('filled');
function addDustbin(){
	var ref=firebase.database().ref();
	var fill=filled.value;
	ref.child(area.value).set(fill);
	alert("Dustbin is successfully added");
	window.location.href="index.php";
}