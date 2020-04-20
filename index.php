<?php
 require_once('main.php');
 require_once('operation.php');  

createDatabase();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bookstore</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
	<div class="container" >
		<div calss="forminput">
			<form action="index.php" method="post">
				<p class="details"><label for="ID">ID: </label></p><input type="text" name="id" plsceholder="id">
				<p class="details"><label for="publisher">Publisher:</label> </p><input type="text" name="publisher" plsceholder="id">
				<p class="details">Name: </p><input type="text" name="name" plsceholder="name">
				<p class="details">Price: </p><input type="text" name="price" plsceholder="price"></br>
				<button class="btn" name="create">create</button>
				<button class="btn" name="read">Read</button>
				<button class="btn" name="update">Update</button>
				<button class="btn" name="delete">Delete</button>
				<?php deleteAllbutton(); ?>
			

			</form>
			<div class ="outputTable">
					<table>
						<thead>
							<tr class ="hClass">
								<th>ID</th>
								<th>Book Name</th>
								<th>Publisher</th>
								<th>Book Price</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<?php 
								if (isset($_POST['read'])){
									$result = getData();

									if($result){
										while($rows = mysqli_fetch_assoc($result)){?>

											<tr>
												<td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></td>
												<td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['book_name']; ?></td>
												<td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['book_publisher']; ?></td>
												<td data-id="<?php echo $rows['id']; ?>"><?php echo $rows['book_price']; ?></td>
												<td><button class="edit" name= "edit" data-id="<?php echo $rows['id']; ?>">edit</button></td>
											</tr>
									<?php 
										}
									}
								}


							 ?>
						</tbody>
					</table>
				</div>
		</div>
		
	</div>
<script type="text/javascript" src="main.js"></script>
</body>
</html>