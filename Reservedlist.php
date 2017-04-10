<?php

session_start();
include 'connection.php';


if(isset($_SESSION['User'])!=""){
	header("Location: index.php");
}
?>

<html>
<head>
<title>Search</title>
</head>
<style>
				body {
						margin: 0px;
						padding: 0px;
						background: #4CAF50;;
						font-family: 'Source Sans Pro', sans-serif;
						font-size: 12pt;
						font-weight: 400;
						color: black;
					}

				.text {
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

				.white {
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
		<?php
					//$_SESSION["username"] = "Username";		

				
	if($connection)
	{	

					$sql="SELECT reserved_books.*, Books.* FROM reserved_books INNER JOIN Books ON reserved_books.ISBN =  Books.ISBN WHERE Username = '".$_SESSION["username"]."'";
						$result = $connection->query($sql );

						if($result->num_rows > 0) //If there are more than 0 results
						{  
							?>
							<div align="center">
							<h1 class="white"> Reserved Books</h1>
							<div class ="main">
							<form method = "post">
							</br>
								</br>
								<table align = "center">
									<tr>
									<th>ISBN</th>
									<th>Username</th> 
									<th>ReservedDate</th>
									
									</tr>

							<?php
							
							while($row = $result->fetch_assoc()) 
							{
								?>
									<tr>
										<td><?php echo $row["ISBN"]; ?></td>
										<td><?php echo $row["Username"]; ?></td> 
										<td><?php echo $row["ReservedDate"]; ?></td>
											
									</tr>
					
									<?php
							}
							?>
							</table>
							</form>
							</div>
							</div>
							<?php
	
						}	
					}
						?>






