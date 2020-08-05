<?php  
//process_tableadmin.php
$connect = mysqli_connect('localhost', 'root', '', 'register');

$input = filter_input_array(INPUT_POST);

$firstname = mysqli_real_escape_string($connect, $input["firstname"]);
$lastname = mysqli_real_escape_string($connect, $input["lastname"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE user 
 SET firstname = '".$firstname."', 
 lastname = '".$lastname."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM user 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>

