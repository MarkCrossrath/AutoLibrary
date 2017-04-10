<?php
include_once 'connection.php';




if(isset($_POST['btn-save']))
{
 // variables for input data
 $Username= mysql_real_escape_string($_POST['Username']);
 $Password = mysql_real_escape_string($_POST['Password']);
 $FirstName = mysql_real_escape_string($_POST['FirstName']);
 $Surname = mysql_real_escape_string($_POST['Surname']);
 $AddressLine1 = mysql_real_escape_string($_POST['AddressLine1']);
 $AddressLine2 = mysql_real_escape_string($_POST['AddressLine2']);
 $city = mysql_real_escape_string($_POST['city']);
 $Telephone = mysql_real_escape_string($_POST['Telephone']);
 $Mobile = mysql_real_escape_string($_POST['Mobile']);
     if (!is_numeric($Mobile))
	{
        ?>
			<script>alert('Moblie Number is not a numeric value');</script>
		<?php
	}
	else
 	{
    $sql_query = "INSERT INTO Users (Username, Password, FirstName, Surname, AddressLine1, AddressLine2, city, Telephone, Moblie)
     VALUES ('".$Username."','".$Password."','".$FirstName."', '".$Surname."', '".$AddressLine1."', '".$AddressLine2."','".$city."', '".$Telephone."', '".$Mobile."')";
		mysqli_query($connection, $sql_query);

        Header("Location: login.php?code=signup");
	}
}
?>	
<html>
<head>
<title>Sign up </title>
</head>
<style>
      
        body {
            margin: 0px;
            padding: 0px;
            background: #4CAF50;;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 12pt;
            font-weight: 400;
            color: white;
          }
          div.main {
                
                  border: 0px solid black;
                  color :black;
                  height: 500px;
                  margin-top: 20px;
                  border-radius: 25px;

                  margin-right: 20px;
                  margin-left: 20px;
                  background-color: white;
                  color :black;

              }
            .button {
                            background-color: #4CAF50;
                            border: none;
                            color: white;
                            padding: 16px 50px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 40px 0px;
                            cursor: pointer;
                        }

        </style>
<body>

<div align="center">
<h1> Sign Up</h1>
<div class="main">
    <form method="post" action="">
    <table align="center">
    <tr>
    <td align="center">
    </tr>
    <br></br>
    <tr>
    <td><input type="text" name="Username" placeholder="Username" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="Password" placeholder="Password" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="FirstName" placeholder="FirstName" required /></td>
    </tr>
   <tr>
    <td><input type="text" name="Surname" placeholder="Surname" required /></td>
    </tr>

	<tr>
    <td><input type="text" name="AddressLine1" placeholder="AddressLine1" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="AddressLine2" placeholder="AddressLine2" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="city" placeholder="city" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="Telephone" placeholder="Telephone" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="Mobile" placeholder="Mobile" required /></td>
    </tr>
    <tr>
    <td><input type="submit" value="Add User" name="btn-save"></td>
    
    </tr>
    </table>
    </form>
    </div>
    </div>

</body>
</hmtl>