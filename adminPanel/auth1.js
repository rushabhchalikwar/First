var data;
//var option=document.getElementById("select1");
var flag=true;
var warnigs=0;
var counter=0;
var myTable=document.getElementById("customers");
//var x = document.getElementById("myTable").rows.length;
//$("#customers").remove();
//myTable.innerHTML = "";
var ref=firebase.database().ref();
	//var ref2=ref.child('name');
	ref.on('value', function(snapshot){
		var users=snapshot.val();
		var keys=Object.keys(users);
		for(var i=0;i<keys.length;i++){
		var key=keys[i];
			//alert(key);
		var name=users[key];
			if(i!==0 && key!=="areas" && key!=="pageview"){
		//myTable.rows[i].cells[0].innerHTML =key;
		//myTable.rows[i].cells[1].innerHTML =name;
			if(counter>=(keys.length-1)){
				myTable.deleteRow(i);
			}
		var row = myTable.insertRow(i);
        var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
    	cell1.innerHTML = key;
    	cell2.innerHTML = name;
		var name1=parseInt(name);
				if(name>90){
		cell2.style.backgroundColor="#FF0000";
		warnigs++;
				}
				if(name>64 && name<89){
		cell2.style.backgroundColor="#00FF00";
				}
		cell3.innerHTML="27 April 2018";
		counter++;
		document.getElementById("warnigs").innerHTML=warnigs;
			}
		}
		warnigs=0;
	});

//Date and Time

function dateAndTime(){
	var d = new Date(); // for now
	d.getHours(); // => 9
	d.getMinutes(); // =>  30
	d.getSeconds(); // => 51
	var hours=d.getHours();
	var minutes=d.getMinutes();
	var day=d.getDate();
	var month=d.getMonth();
	var year=d.getFullYear();
	var date=hours+":"+minutes+" "+day+"-"+month+"-"+year;
	return date;
}

//Authetication Change

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
      var displayName = user.displayName;
      var email = user.email;
      var emailVerified = user.emailVerified;
      var photoURL = user.photoURL;
      var isAnonymous = user.isAnonymous;
      var uid = user.uid;
	  var providerData = user.providerData;
	  
	  var userStatus=document.getElementById("userStatus");
	  userStatus.innerHTML=email;
      // ...
    } else {
      // User is signed out.
	  // ...
	  window.location.href="login.php";
    }
  });
  
/*
function pressed(){
	alert("In pressed");
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
	
		if(username!="" && password!=""){
firebase.auth().signInWithEmailAndPassword(username, password).catch(function(error) {
		  flag=false;
		  var errorCode = error.code;
          var errorMessage = error.message;
		  if (errorCode == 'auth/wrong-password') {
            alert('Wrong password.');
          } else {
            alert(errorMessage);
          }
			document.getElementById("canvasd").style.display="block";
	
});
			document.getElementById("loginform").style.display="none";
			//alert("In if");
	}
	
	var ref3=firebase.database().ref().child(option.value);
			ref3.on('value',function(snapshot){
				//alert(select;);
				data=snapshot.val();
				//alert("In else");
				//alert(counter+"value");
				setValue(data,flag);
			});
			
		document.getElementById("canvasd").style.display="block";
	
}

*/


function logout(){
	
	firebase.auth().signOut().then(function() {
			   alert("User is Successfully Signed out");
			   window.location.href="login.php";
			   window.location.href="session_out.php";
}).catch(function(error) {
  // An error happened.
		 alert("Error");
	
});
}