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
function Login() {
if (document.getElementById("cafe").value && document.getElementById("user_id").value !='Username' && document.getElementById("password").value !='Password'){
   //hello world   
    var database =  firebase.database();    
	var state=0;
	database.ref().child('Admin_login').on("value", function(snapshot) {
    snapshot.forEach(function(childSnapshot) {
    var childKey = childSnapshot.key;
    var childData = childSnapshot.val();
	if (document.getElementById("cafe").value==childKey && document.getElementById("user_id").value==childData.user_id && document.getElementById("password").value==childData.password){
	state=1;
	$.post('varify.php', { val: 1 }, function(result) { 	
   alert(result); 
   window.location="mainpage.php";
   
});

	}
	
  });
  if(state==0)
		alert("Please enter correct details to login Successfully");},
        function (errorObject) {  // Deal with errors
          console.log("The read failed: " + errorObject.code);
        });  }
else
			   {
				   $(document).ready(function(){
                   alert("Please enter all the details before clicking Login button")});
			  
				
			   }		
}
</script>
<head>
  <title>Cisco Canteen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  <style type="text/css">
body {
background-color: #f4f4f4;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 16px;
line-height: 1.5em;
}
a { text-decoration: none; }
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }

/* ---------- LOGIN ---------- */
#login {
margin: 50px auto;
width: 300px;
}
fieldset select {
background-color: #e5e5e5;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 280px;
-webkit-appearance:none;
}
fieldset input[type="text"], input[type="password"] {
background-color: #e5e5e5;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 280px;
-webkit-appearance:none;
}
button {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
text-transform: uppercase;
width: 300px;
-webkit-appearance:none;
}
form fieldset a {
color: #5a5656;
font-size: 10px;
}
form fieldset a:hover { text-decoration: underline; }
.btn-round {
background-color: #5a5656;
border-radius: 50%;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
color: #f4f4f4;
display: block;
font-size: 12px;
height: 50px;
line-height: 50px;
margin: 30px 125px;
text-align: center;
text-transform: uppercase;
width: 50px;
}

</style>

</head>
<body style="background-color:#E1E2E3;opacity: 1; filter: alpha(opacity=100); background-size: 100% 100vh; background-repeat:repeat;position: center; font-family:tahoma;">

 <div id="fb-root"></div>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
  
</script>

 <header class="mdl-layout__header mdl-color-text--white mdl-color--light-blue-700">
    <div class=><center>
	
        <h3> Cisco Canteen </h3>
    
      </div></center>
    </div>
  </header>
<br>
<div class="container">
  <div class="row">
<div class="col-sm-4" style="solid Black;padding: 1px;float:centre">
 </div>
    <div class="col-sm-4" id = "about" style="opacity: 0.7;background-color:#FFFFFF ; ">
	<br>
      <b><center><strong>Please Login</strong></center></b>
 <div id="login">

<fieldset>
<p><select id="cafe">
  <option value="megabiteCH">Megabite Club House</option>
  <option value="saab">Megabite BGL 16</option>
  <option value="css">CSS</option>
  <option value="audi">CCD</option>
</select></p>
<form style="display: hidden" action="/the/url" method="POST" id="form">
<p><input type="text" required value="Username" id="user_id" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "></p>
<p><input type="password" required value="Password" id="password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
</form>
<p><a href="#">Forgot Password?</a></p>
</fieldset>
<button type="submit" id="reset_btn"  onclick='Login();'> Login  </button>


</div> <!-- end login --> </div>
<div class="col-sm-4" id = "about" style="opacity: 0.5;  ">
      </div>
  </div>
</div>


</body>
</html>