<?php
 require_once('main.php');
 require_once('operation.php');  

createDatabase();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title>Bookstore</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<script type="text/javascript" src="jquery.js"></script>
	<style>
		.d-flex button{

		margin : 1.5em 0.6em;
		padding: 0.5em 2.4em;
	}
	
	table .btnedit{
		color: lightsalmon;
		cursor: pointer;
	}

	</style>
</head>
<body background="bg.jpg">
	<main class="container">
		<div class="container text-center">
			<h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>Book Store</h1>
		</div>
		<div class="d-flex justify-content-center">
			<form action="index.php" method="post" class="w-50">
				<div class="py-2">
				<div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text bg-warning"><i class="fas fa-id-badge"></i></span>
				    </div>
				    <input type="text" class="form-control" name="id" placeholder="ID" >
				 </div>
				 </div>

				 <div class="pt-2">
				 	<div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text bg-warning"><i class="fas fa-people-carry"></i></span>
				    </div>
				    <input type="text" class="form-control" name="publisher" placeholder="Publisher">
				 </div>
				 </div>
				 <div class="row">
				 	<div class="col">
						 <div class="pt-2">
						 	<div class="input-group mb-3">
						    <div class="input-group-prepend">
						      <span class="input-group-text bg-warning"><i class="fas fa-book"></i></span>
						    </div>
						    <input type="text" class="form-control" name="name" placeholder="name">
						 </div>
						 </div> 
					</div>

					<div class="col">
						 <div class="py-2">
						 	<div class="input-group mb-3">
						    <div class="input-group-prepend">
						      <span class="input-group-text bg-warning"><i class="fas fa-dollar-sign"></i></span>
						    </div>
						    <input type="text" class="form-control" name="price" placeholder="price">
						 </div>
						 </div>
					</div>

				 </div>
				
				
			<div class="d-flex justify-content-center">
				<button class="btn btn-success" name="create" data-toggle="tooltip" data-placement="bottom" title="Create"><i class="fas fa-plus"></i></button>
				<button class="btn btn-primary" name="read" data-toggle="tooltip" data-placement="bottom" title="Read"><i class="fas fa-sync"></i></button>
				<button class="btn btn-warning" name="update" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="fas fa-pen-alt"></i></button>
				<button class="btn btn-danger" name="delete" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
				<?php deleteAllbutton(); ?>
			</div>
			</form>
		</div>

		<div class="container">
		<div class ="d-flex table-data">
			<div class="table table-striped ">
  				<table class="table" >
						<thead class="thead-dark">
							<tr>
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
												<td data-id="<?php echo $rows['id']; ?>"><?php echo '$'.$rows['book_price']; ?></td>
												<td><i name= "edit" class="fas fa-edit btnedit" data-id="<?php echo $rows['id']; ?>"></i></td>
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
	</main>
		
<script type="text/javascript" src="main.js"></script>
</body>
</html>