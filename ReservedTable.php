<?php





session_start();
include 'connection.php';

if(isset($_GET["ISBN"]) && !empty($_GET["ISBN"])) {
    $ISBN= $_GET["ISBN"];



if($connection) 
{

$Reserve = 'Y';
	$sql = "INSERT INTO reserved_books (ISBN, Username) VALUES ('".$ISBN."', '".$_SESSION["username"]."')";
	$result = $connection->query($sql);
	
	$sql = "UPDATE books SET Reserve='".$Reserve."' WHERE isbn = '".$ISBN."'";
	$result = $connection->query($sql);
	
		
		
}
}
?>	

<html>
   <body>
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



         .button {
						 background-color: #4CAF50;
					    border: none;
					    color: white;
						 padding: 15px 40px;
						 text-align: center;
						 text-decoration: none;
						 display: inline-block;
						 font-size: 16px;
						 margin: 50px 50px;
						 cursor: pointer;
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
	<div div align="center">

		<h1>Book Resvered</h1>
			<div class ="main">
			<p><br></br> your book has been reserved please return to the menu</p>

					<a href="menu.html"><input type="button" class="button" value="menu"></a>

			</div>
		</div>
	</body>
</html>

