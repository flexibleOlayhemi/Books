<?php  
require_once('main.php');
 $con = createDatabase();
//delete all
  if(isset($_POST['deleteAll'])){

 	deleteAllRecord();
 }

 function deleteAllRecord(){
 	$query = "DROP TABLE books";

 	if (mysqli_query($GLOBALS['temp'],$query)){
 		echo "All records deleted successfully"."</br>";
 	}
 	else {
 		echo "unable to delete All record"."</br>";
 	}
 }

//delete 

 if(isset($_POST['delete'])){

 	deleteRecord();
 }

function deleteRecord(){
	$id = textboxValue("id");
	$query = "DELETE FROM books where id='$id'";
	if (mysqli_query($GLOBALS['temp'],$query)){
		echo "Record successfully deleted"."</br>";
	}else{
		echo "Unable to deleted record"."</br>";
	}
}

//update 
if (isset($_POST['update'])){

	updateData();
}

 function updateData(){
$bookid = textboxValue("id");
$bookname = textboxValue("name");
$bookpublisher = textboxValue("publisher");
$bookprice = textboxValue("price");

 	$sql = "UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id ='$bookid'";

 if ($bookid && $bookname && $bookpublisher && $bookprice){
 	if (mysqli_query($GLOBALS['temp'],$sql)){
 		echo "Data successfully updated!!"."</br>";
 	}else {
 		echo "Unable to update data"."</br>";
 	}


 }else {

 	echo "Provide values for all the entries"."</br>";
 }
}



 //create operation

 if (isset($_POST['create'])){
 	createData();
 }

 //read operation

 function getData(){

 	$sql = "SELECT * FROM books";
 	$result = mysqli_query($GLOBALS['temp'],$sql);
 	if (mysqli_num_rows($result) > 0){
 		return $result;
 		}

 	}

 

 //funtion create data

 function createData(){

 	$bookname		= textboxValue("name");
 	$bookpublisher 	= textboxValue("publisher");
 	$bookprice		 	= textboxValue("price");

 	if ($bookprice && $bookpublisher && $bookname){
 		$sql = "INSERT INTO books(book_name,book_publisher,book_price)
 		values('$bookname','$bookpublisher','$bookprice')";
 				//temp
 		if (mysqli_query($GLOBALS['temp'],$sql)){
 			echo "data succesfully added"."</br>";
 		}else 
 		{
 			echo "Unable to add data"."</br>";
 		}

 	}else {
 		echo "Provide data in the textboxes"."</br>";
 	}
}

 function textboxValue($value){

 	$textbox = mysqli_real_escape_string($GLOBALS['temp'],trim($_POST[$value]));
 	//$textbox = trim($_POST[$value]);
 	if (empty($textbox)){
 		return false;
 	}else
 	{
 		return $textbox;
 	}
 }


//delete all button
function deleteAllbutton(){

 $result = getData();
 	$i = 0;
	  if ($result){
	 	while (mysqli_fetch_assoc($result)){
	 		$i++;
	 		if ($i > 3){
	 			addButton();
	 			return;
	 		}
	 	}
	 }

 }

function addButton(){
	echo "<button class=\"btn btn-danger\" name=\"deleteAll\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Delete All\"><i class=\"fas fa-trash-alt\"></i></button>";
}

?>