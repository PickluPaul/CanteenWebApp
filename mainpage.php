<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 ?>
<html lang="en">
<!DOCTYPE html>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.7.4/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAc4TooiNvw4Frvhze26Nxl3MZRccFSS0U",
    authDomain: "cisco-canteen-app.firebaseapp.com",
    databaseURL: "https://cisco-canteen-app.firebaseio.com",
    storageBucket: "cisco-canteen-app.appspot.com",
    messagingSenderId: "600007043989"
  };
  firebase.initializeApp(config);

var database = firebase.database();
 var storage = firebase.storage();
document.addEventListener('DOMContentLoaded', function() {
	
   database.ref().child('appData/megabiteCH/foodItem/').on("value", function(snapshot) {
	   snapshot.forEach(function(childSnapshot) {
    var childKey = childSnapshot.key;
    var childData = childSnapshot.val();
	var createUl = document.getElementById("gamediv");
	var Li= document.createElement("li");
    var img = document.createElement("img");
	var Div = document.createElement("div");
	var P = document.createElement("p");
	var itemName =childKey;
	var itemName =childKey;
	var price =childData.price;
            img.src = childData.itemUrl;
			Li.appendChild(Div);
			Div.appendChild(img);
			Div.append(itemName);
			Div.innerHTML = Div.innerHTML + '<br/>&#8377';
			Div.append(price);
		
			createUl.appendChild(Li);
            
	   
   console.log(childData.itemUrl);});});
		
}, false);
		

function uploadFood()
            {
				var saveDataRef = firebase.database().ref('appData/megabiteCH/foodItem/'+document.getElementById('item').value);
                var thefile = document.getElementById('thefile').files[0];
               
				var storageRef = firebase.storage().ref('test/'+thefile.name);
				var uploadTask = storageRef.put(thefile);
				 
                uploadTask.on('state_changed', null, (err)=> {
						  console.log('Upload error:', err);
						}, ()=> {
						  saveDataRef.update({
							price:document.getElementById('price').value,
							quantity:document.getElementById('quantity').value,
							additionalInfo:document.getElementById('additionalInfo').value,
							itemUrl: uploadTask.snapshot.downloadURL
						  });
						});				
           alert("uploaded successfully");
		   }


 </script>

<head>
<style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: #f4f7f8;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: #1abc9c;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #109177;
}
ul {
    list-style-type: none;	
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #FFFFFF;
}

li p {
font-weight:bold;
font-style:italic;
letter-spacing:3pt;
word-spacing:-6pt;font-size:26px;
text-align:center;
font-family:comic sans, comic sans ms, cursive, verdana, arial, sans-serif;line-height:1;
color: white;
text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}

li {
    float: left;
	width:315px;
	height:300px;
	padding: 10px;
}
li div {
    position:absolute;
	width:280px;
	height:280px;
    text-align: center;
	font-weight:bold;
font-style:italic;
letter-spacing:3pt;
word-spacing:-6pt;font-size:26px;
text-align:center;
font-family:comic sans, comic sans ms, cursive, verdana, arial, sans-serif;line-height:1;
color: white;
text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    text-decoration: none;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
	font-size: 25px;
    
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}
li img {
    display: block;
    color: white;
	width:280px;
	height:220px;
    text-align: center;
  
    text-decoration: none;
}
li div:hover {
    background-color: #9DE0FF;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 10px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 2px;
    border: 1px solid #888;
    width: 35%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
  <title>Club House</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</head>
<body style="background-color:#FFFFFF;opacity: 1; filter: alpha(opacity=100); background-size: 100% 100vh; background-repeat:repeat;position: center; font-family:tahoma;">

 
 <header class="mdl-layout__header mdl-color-text--white mdl-color--light-green-700">
    <div class=><center>
	
        <h3> Megabite Club House</h3>
    
      </div></center>
    
  </header>
   <header class="mdl-layout__header mdl-color-text--black mdl-color--grey-100" style="height:10px;">
   <br>
   <!--<a href="result.php"><right>Sign Out</right></a>
   
   <!-- Trigger/Open The Modal -->
 <!--<button id="myBtn">Open Modal</button>-->
 <div style="height:10px;">
 <button id="signOut" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left" style="height:40px;float:right">Sign Out</button>
<button id="myBtn" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left" style="height:40px;float:right">Upload</button>

</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	    <div class="form-style-5">
<form id="foodDetails">
<fieldset>
<legend><span class="number">1</span> Food Item </legend>

          
          <input type="text" name="user" id="item" placeholder="Food Item"><br>

          <input type="text" name="passw" id="price" placeholder="Amount"><br>
         
          <input type="text" name="passw" id="quantity" placeholder="No.of Servings"><br> 
          <input type="file" id="thefile" " />
    <br>          
</fieldset>
<fieldset>
<legend><span class="number">2</span> Additional Info</legend>
<textarea name="field3" id="additionalInfo" placeholder="About the food"></textarea>
</fieldset>
<input type="button" onclick="uploadFood()" value="Upload Details" /> 
</form>
</div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>  
  </header>
  <br>
<ul id="gamediv">
  
         
     
</ul>   
</body>
</html>
	<?php
} else {
	?>
    <html>
	<h1 style =" font-family: 'Tangerine', serif;width:1567px; height:100px;font-size:65px"><font style="color:#6A0046;size:35px;"><i><b>Please Login. Ridrecting.....</b></i>
	</font>
   <div  style ="float:right" class="fb-like" data-href="http://playteer.freeiz.com" data-width="10" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
 </h1>
	</html>
	<?php
	header("refresh:3;url=index.php");
}
?>
