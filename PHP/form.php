<DOCTYPE<!DOCTYPE html>
<html>
<head>
<?php include 'conn.php';?>
<title>form</title>
</head>
<body>
    <form action="reg_user.php" method="post" id="register">
Email: <br> <input type="email" class="input-field" name="Email" placeholder="email" required>  <br>
<label for="Role">Role:</label><br>
<select id="Role" name="Role" required>
    <option value="guest">guest</option>
    <option value="teacher">teacher</option>
    <option value="student">student</option>
</select><br>
password: <br> <input type="password" class="input-field" name="password"placeholder="Enter Password"required><br>
Repeat password: <br> <input type="password" class="input-field" name="Rpassword"placeholder="Repeat Password"required><br>
<button type="submit"  name="register" class="submit-bttn" value="Register">Register</button>  
</form>
</body>   

</html>    
