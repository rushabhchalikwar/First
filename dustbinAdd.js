var area=document.getElementById('area');
var filled=document.getElementById('filled');
function addDustbin(){
	var ref=firebase.database().ref();
	var fill=filled.value;
	ref.child(area.value).set(fill);
	var x = document.getElementById("select1");
    var option = document.createElement("option");
	var area1=area.value;
    option.text = area1;
    x.add(option);
	alert("Dustbin is successfully added");
	window.location.href="index.php";
}