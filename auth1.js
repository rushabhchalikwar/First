var username=document.getElementById("username");
var password=document.getElementById("password");
var counter=0;
var data;
var option=document.getElementById("select1");
var flag=true;

function pressed(){
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


function logout(){
	
	firebase.auth().signOut().then(function() {
  			 alert("User is Successfully Signed out");
		     username.value="";
			password.value="";
			document.getElementById("loginform").style.display="none";
			document.getElementById("login").innerHTML="LOGIN";
			document.getElementById("canvasd").style.display="none";
			document.getElementById("sec4").style.display="none";
			document.getElementById("secid3").style.display="none";
}).catch(function(error) {
  // An error happened.
		 alert("Error");
	
});
}



//PIECHART

var myCanvas = document.getElementById("myCanvas");

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(centerX,centerY);
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fill();
	}
	


var Piechart = function(options){
    this.options = options;
    this.canvas = options.canvas;
    this.ctx = this.canvas.getContext("2d");
    this.colors = options.colors;
 
    this.draw = function(){
        var total_value = 0;
        var color_index = 0;
        for (var categ in this.options.data){
            var val = this.options.data[categ];
            total_value += val;
        }
 
        var start_angle = 0;
        for (categ in this.options.data){
            val = this.options.data[categ];
            var slice_angle = 2 * Math.PI * val / total_value;
 
            drawPieSlice(
                this.ctx,
                this.canvas.width/2,
                this.canvas.height/2,
                Math.min(this.canvas.width/2,this.canvas.height/2),
                start_angle,
                start_angle+slice_angle,
                this.colors[color_index%this.colors.length]
            );
 
            start_angle += slice_angle;
            color_index++;
        }
 
        //drawing a white circle over the chart
        //to create the doughnut chart
		
        if (this.options.doughnutHoleSize){
            drawPieSlice(
                this.ctx,
                this.canvas.width/2,
                this.canvas.height/2,
                this.options.doughnutHoleSize * 170,
                0,
                2 * Math.PI,
                "#DDD8D8"
            );
        }
		
				start_angle = 0;
for (categ in this.options.data){
    val = this.options.data[categ];
    slice_angle = 2 * Math.PI * val / total_value;
    var pieRadius = Math.min(this.canvas.width/2,this.canvas.height/2);
    var labelX = this.canvas.width/2 + (pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
    var labelY = this.canvas.height/2 + (pieRadius / 2) * Math.sin(start_angle + slice_angle/2);
 
    if (this.options.doughnutHoleSize){
        var offset = (pieRadius * this.options.doughnutHoleSize ) / 2;
        labelX = this.canvas.width/2 + (offset + pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
        labelY = this.canvas.height/2 + (offset + pieRadius / 2) * Math.sin(start_angle + slice_angle/2);               
    }
 
    var labelText = Math.round(100 * val / total_value);
    this.ctx.fillStyle = "white";
    this.ctx.font = "bold 20px Arial";
    this.ctx.fillText(labelText+"%", labelX-15,labelY);
    start_angle += slice_angle;
}
 
    }
}
var myVinyls = {
   	music: 0 ,
	songs :0
};

function setValue(data,flag){
	var ui=parseInt(data);
	//alert(counter+"setvalue");
	if(flag==false){
		//alert("In setvalue if statement");
		ui=0;
	}
	else{
		//alert("In setvalue else statement");
	myVinyls.music=ui;
	myVinyls.songs=100-ui;
		
var myTable=document.getElementById("customers");
var x = document.getElementById("myTable").rows.length;
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
			if(i!==0 && key!=="areas"){
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
				}
				if(name>64 && name<89){
		cell2.style.backgroundColor="#00FF00";
				}
		cell3.innerHTML="12 FEB 14:26";
		var buttonnode= document.createElement('input');
		buttonnode.setAttribute('type','button');
		buttonnode.setAttribute('name','show');
		buttonnode.setAttribute('value','show');
		buttonnode.setAttribute('onClick','valueSet('+i+')');
		cell4.appendChild(buttonnode);
		var fac1=document.getElementById("select1");
		fac1.selectedIndex=2;
		//cell4.innerHTML="tttt";
		counter++;
				
			}
		}
	});
	
	}
	
	var myDougnutChart = new Piechart(
    {
        canvas:myCanvas,
        data:myVinyls,
        colors:["red","green", "#57d9ff","#937e88"],
        doughnutHoleSize:0.5
    }
);
	myDougnutChart.draw();
}

