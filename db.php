<?php
//Variables for the Database
$host = "localhost";
$user = "jutsey09_wp2";
$password = "q1w2e3r4";
$db = "EMP_Database";

$connection = mysqli_connect($host,$user,$password,$db);//Connecting to the DB

if ($connection === false)
{
    die("ERROR: Could not connect. " . $connection->connect_error);//Error message if the connection fails
}
//Show the contents of the Database on the main page

$results = mysqli_query($connection, "SELECT * FROM HotelGuests");//Assign the results of the SELECT query and display them in the table

if(isset($_POST['Edit']))
{
    $_id = $_POST['Edit'];
    $result = mysqli_query($connection, "SELECT * FROM HotelGuests WHERE ID = $_id");//Assign the results of the SELECT query and display them in the table on the Edit.php page
}
if (isset($_POST['Submit']))//When the "Submit" button is clicked then insert that data into the database. 
{
    $id = $_POST['ID'];//Getting the ID from the POST method and assigning it to a variable
    $firstName = mysqli_real_escape_string($connection, $_POST['FirstName']);//Getting the FirstName from the POST method and assigning it to a variable
    $lastName = mysqli_real_escape_string($connection, $_POST['LastName']);//Getting the LastName from the POST method and assigning it to a variable
    $checkIn = mysqli_real_escape_string($connection, $_POST['CheckIn']);//Getting the CheckIn from the POST method and assigning it to a variable
    $checkOut = mysqli_real_escape_string($connection, $_POST['CheckOut']);//Getting the CheckOut from the POST method and assigning it to a variable

    $query = "INSERT INTO HotelGuests (ID, FirstName, LastName, CheckIn, CheckOut) VALUES ('$id', '$firstName', '$lastName', '$checkIn', '$checkOut')";//Create SQL Query
 
    if(mysqli_query($connection, $query))//Running the query and performing error checking
    {
        echo "Records added successfully.";//If query is successful display this text
    }
    else
    {
        echo "ERROR: Could not $query. " . mysqli_error($connection);//If query failed display the error
    }
    header('location: index.php');//Redirect back to home page after loop is ran
}
//When the Edit button is clicked the cooresponding record is updated
if (isset($_POST['Update']))
{
    $id = $_POST['ID'];//Getting the ID from the POST method and assigning it to a variable
    $firstName = $_POST['FirstName'];//Getting the FirstName from the POST method and assigning it to a variable
    $lastName = $_POST['LastName'];//Getting the LastName from the POST method and assigning it to a variable
    $checkIn = $_POST['CheckIn'];//Getting the CheckIn from the POST method and assigning it to a variable
    $checkOut = $_POST['CheckOut'];//Getting the CheckOut from the POST method and assigning it to a variable

    $query = "UPDATE HotelGuests SET FirstName='$firstName', LastName='$lastName', CheckIn='$checkIn', CheckOut='$checkOut' WHERE ID = '$id'";//Update SQL Query
    if (mysqli_query($connection, $query))//Running the query and performing error checking
    {
        echo "Update Successful";//If query is successful display this text       
    }
    else 
    {
        echo "$query. " . mysqli_error($connection);//If query failed display the error
    }
    header('location: index.php');//Redirect back to home page after loop is ran
}
//When the Delete button is clicked the coresponding record is deleted
if (isset($_POST['Delete']))
{
    $id = $_POST['Delete'];
    $query = "DELETE FROM HotelGuests WHERE ID = '$id'";//Delete SQL Query
    if (mysqli_query($connection, $query))//Running the query and performing error checking
    {
        echo "Records Updated";//If query is successful display this text
    }
    else 
    {
        echo "$query. " . mysqli_error($connection);//If query failed display the error
    }
    header('location: index.php');//Redirect back to home page after loop is ran
}
?>

