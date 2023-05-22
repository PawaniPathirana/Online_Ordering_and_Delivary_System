<!DOCTYPE html>
<html>
 <head>
<title>staff</title>
 <link rel="stylesheet" type="text/css" href="style1.css"> 
 <style>
body {
  background-image: url('staff1.png');
}
</style>
 </head>
 <body>
  
<form action="staffLogin.php" method="POST">
  <h2>LOGIN</h2>
  <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php }?> 
  <label>User Name</label>
  <input type="text" name="uname" placeholder="User Name" id="userName">
  <label>Password</label>
  <input type="password" name="password" placeholder="Password" id="passWord">
  
  <button onclick="clear()" type ="reset">Reset</button>
  <button type="submit">Login</button>
 
</form>
<script type="text/javascript">
   function clear(){

  document.getElementById("userName").value="";
  document.getElementById("passWord").value="";

}
 </script>
</body>
</html>