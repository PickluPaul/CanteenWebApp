<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.7.4/firebase.js"></script>
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
			Div.innerHTML = Div.innerHTML + '<br/> &#8377';
			Div.append(price);
		
			createUl.appendChild(Li);
            
	   
   console.log(childData.itemUrl);});});
		
}, false);
		
function alertFilename()
            {
				var saveDataRef = firebase.database().ref('appData/megabiteCH/foodItem/'+document.getElementById('item').value);
                var thefile = document.getElementById('thefile').files[0];
                alert(thefile.name);
				var storageRef = firebase.storage().ref('test/'+thefile.name);
				var uploadTask = storageRef.put(thefile);
				 
                uploadTask.on('state_changed', null, (err)=> {
						  console.log('Upload error:', err);
						}, ()=> {
						  saveDataRef.update({
							price:document.getElementById('price').value,
							quantity:document.getElementById('quantity').value,
							itemUrl: uploadTask.snapshot.downloadURL
						  });
						});				
            }


 </script>

<head>
<style>
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
	width:300px;
	height:300px;
	
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
    background-color: #111111;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
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
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
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
	
        <h3> Club House</h3>
    
      </div></center>
    
  </header>
   <header class="mdl-layout__header mdl-color-text--black mdl-color--grey-100" style="height:10px;">
   <br>
   <!--<a href="result.php"><right>Sign Out</right></a>
   
   <!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	     <form>
          <label for="usrnm" class="ui-hidden-accessible">Name:</label>
          <input type="text" name="user" id="item" placeholder="Username"><br>
          <label for="pswd" class="ui-hidden-accessible">Price:</label>
          <input type="text" name="passw" id="price" placeholder="Password"><br>
          <label for="pswd" class="ui-hidden-accessible">Quantity:</label>
          <input type="text" name="passw" id="quantity" placeholder="Password"><br> 
          <input type="file" id="thefile" />
          <input type="button" onclick="alertFilename()" value="Upload Details" />
        </form>
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
<script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script>
<ul id="gamediv">
  
         <script type="text/javascript">
             insert();
         </script>
     
</ul>
    
</body>
</html>