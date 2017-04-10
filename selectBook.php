<?php
session_start();
include_once 'connection.php';

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
						color: white;
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
		<div div align="center">

		<h1>Book Selection</h1>
			<div class ="main">
			<p><br></br> Please choose </p>
				<form method = "post">

					
				    	<input type="text" name="Search" class="text" placeholder="book"  />
				    	<input type="text" name="Author" class="text" placeholder ="Author"  />
				    
					<select name="Category">

						<option value="Any">Any</option>
						<?php 
						$sql = mysqli_query($connection, "SELECT CategoryID, CategoryDE FROM Category");
						while ($row = $sql->fetch_assoc()){
						echo '<option value="'.$row["CategoryID"].'">' . $row['CategoryDE'] . '</option>';
						}
						?>
					</select>

					<button type="submit" class="text" name="btn-save"><strong>submit</strong></button>

				</form>
				</div>
				</div>
</html>
<?php
if(isset($_POST['btn-save']))
{


	if($connection)
	{	
		
		if(isset($_POST['btn-save']))
		{	
			$Search = mysql_real_escape_string($_POST['Search']);
			$Category = mysql_real_escape_string($_POST['Category']);
			$Author = mysql_real_escape_string($_POST["Author"]);

			if($_POST["Category"] == "Any") 
			{

				if(isset($_POST["Search"]) && !empty($_POST["Search"]))
				{
					$query = "SELECT ISBN, BookTitle, Author, Year, Reserve
					  FROM Books WHERE BookTitle LIKE '%$Search%'"; 
			
					$result = $connection->query($query);
					
						if($result->num_rows > 0) //If there are more than 0 results
						{  
							?>
							
							<form method = "post">
							</br>
								</br>
								<table align = "center">
									<tr>
									<th>ISBN</th>
									<th>Book Title</th> 
									<th>Author</th>
									<th>Year</th>
									<th>Reserved</th>
									</tr>
							<?php
							
							while($row = $result->fetch_assoc()) 
							{
								?>
									<tr>
										<td><?php echo $row["ISBN"]; ?></td>
										<td><?php echo $row["BookTitle"]; ?></td> 
										<td><?php echo $row["Author"]; ?></td>
										<td><?php echo $row["Year"]; ?></td>
										<td><?php echo $row["Reserve"];?></td>
										<td><?php if($row["Reserve"] == 'N')
										         {
										?>
											<a href="ReserveTable.php?ISBN=<?php echo $row["ISBN"]; ?>"> Reserve </a>
										<?php	
												 }
										?></td>
									</tr>
									<?php
							}
							?></table>
							<?php	
						}
					}
				
				else if(isset($_POST["Author"]) && !empty($_POST["Author"]))
				{
					$query = "SELECT ISBN, BookTitle, Author, Year, Reserve
					  FROM Books WHERE Author LIKE '%$Author%'"; 
			
					$result = $connection->query($query);
					
						if($result->num_rows > 0) //If there are more than 0 results
						{  
							?>
							
							</br>
								</br>
								<table align = "center">
									<tr>
									<th>ISBN</th>
									<th>Book Title</th> 
									<th>Author</th>
									<th>Year</th>
									<th>Reserved</th>
									</tr>
							<?php
							
							while($row = $result->fetch_assoc()) 
							{
								?>
									<tr>
										<td><?php echo $row["ISBN"]; ?></td>
										<td><?php echo $row["BookTitle"]; ?></td> 
										<td><?php echo $row["Author"]; ?></td>
										<td><?php echo $row["Year"]; ?></td>
										<td><?php echo $row["Reserve"];?></td>
										<td><?php if($row["Reserve"] == 'N')
										         {
										?>
											<a href="ReservedTable.php?ISBN=<?php echo $row["ISBN"]; ?>"> Reserve </a>
										<?php	
												 }
										?></td>
									</tr>
									<?php
							}
							?></table>
							<?php	
						}
					}




				}
		}
			else {

				if(isset($_POST["Search"]) && !empty($_POST["Search"]))
				{
					$query = "SELECT ISBN, BookTitle, Author, Year, Reserve
					  FROM Books WHERE BookTitle LIKE '%$Search%' AND CategoryID = '$Category'"; 
			
					$result = $connection->query($query);
					
						if($result->num_rows > 0) //If there are more than 0 results
						{  
							?>

							</br>
								</br>
								<table align = "center">
									<tr>
									<th>ISBN</th>
									<th>Book Title</th> 
									<th>Author</th>
									<th>Year</th>
									<th>Reserved</th>
									</tr>
							<?php
							
							while($row = $result->fetch_assoc()) 
							{
								?>
									<tr>
										<td><?php echo $row["ISBN"]; ?></td>
										<td><?php echo $row["BookTitle"]; ?></td> 
										<td><?php echo $row["Author"]; ?></td>
										<td><?php echo $row["Year"]; ?></td>
										<td><?php echo $row["Reserve"];?></td>
										<td><?php if($row["Reserve"] == 'N')
										         {
										?>
											<a href="ReservedTable.php?ISBN=<?php echo $row["ISBN"]; ?>"> Reserve </a>
										<?php	
												 }
										?></td>
									</tr>
									<?php
							}
							?></table>
							<?php	
						}
					}
				
				else if(isset($_POST["Author"]) && !empty($_POST["Author"]))
				{
					$query = "SELECT ISBN, BookTitle, Author, Year, Reserve
					  FROM Books WHERE Author LIKE '%$Author%' AND CategoryID = '$Category'"; 
			
					$result = $connection->query($query);
					
						if($result->num_rows > 0) //If there are more than 0 results
						{  
							?>
							</br>
								</br>
								<table align = "center">
									<tr>
									<th>ISBN</th>
									<th>Book Title</th> 
									<th>Author</th>
									<th>Year</th>
									<th>Reserved</th>
									</tr>
							<?php
							
							while($row = $result->fetch_assoc()) 
							{
								?>
									<tr>
										<td><?php echo $row["ISBN"]; ?></td>
										<td><?php echo $row["BookTitle"]; ?></td> 
										<td><?php echo $row["Author"]; ?></td>
										<td><?php echo $row["Year"]; ?></td>
										<td><?php echo $row["Reserve"];?></td>
										<td><?php if($row["Reserve"] == 'N')
										         {
										?>
											<a href="ReservedTable.php?ISBN=<?php echo $row["ISBN"]; ?>"> Reserve </a>
										<?php	
												 }
										?></td>
									</tr>
									<?php
							}
							?></table>
							<?php	
						}
					}


				

				}
			
	}

}
	

?>
