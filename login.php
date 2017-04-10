<?php
session_start();
$count = "";
   include("connection.php");
   
   if(isset($_POST["Username"]) && isset($_POST["Password"])) 
   {
      // username and password sent from form 
      
      $Username = mysqli_real_escape_string($connection, $_POST['Username']);
      $Password = mysqli_real_escape_string($connection, $_POST['Password']); 

      $query = "SELECT Password FROM Users WHERE Username='".$Username."'";
      $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0)
    {

        Header("Location: menu.html");
        $_SESSION["username"] = $Username;
    }

    else
    {

      Header("Location: signup.php");
    }
      
     
      

     
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
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

        </style>
   </head>
   
   <body >
	
      <div align = "center">
              <br>
               <h1>  login here</h1>
               <div class= "main">
               <br></br><br></br>
               <?php
              if(isset($_GET["code"]) && !empty($_GET["code"]))
              {
                echo "Signup successful";
              }
               ?>
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "Username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "Password" name = "Password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
                  
               </form>
               
              
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>