<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <script type="text/javascript">
      
      function ValidateEmail(inputText){
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(inputText.value.match(mailformat)){
          document.form1.text1.focus();
          return true;
        }else
      {
      alert("You have entered an invalid email address!");
      document.form1.text1.focus();
      return false;
      }
      }



    </script>







<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password]{
  width: 100%;
  padding: 15px;
  margin: 5px 20 22px 20;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding-top: 10px;
  padding-left: 150px;
  padding-right: 150px;

}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
</head>


<body>

<form action="signupVal.php" style="border:1px solid #ccc" name="signup" method="POST">
  <div class="container">
    <h1 align="center">Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter your name" name="name" required>

    <label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter your age" name="age" required>

    <label for="adress"><b>Address</b></label>
    <input type="text" placeholder="Enter your home adress" name="adress" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <a href="login.php"> <button align="center" type="button" class="cancelbtn" onclick="" >Log in</button> </a>
      <button align="center" type="submit" class="signupbtn" onclick="ValidateEmail(document.signup.email)">Sign Up</button>



    </div>
  </div>
</form>

</body>
</html>
