<?php require('db.php');?>
<!DOCTYPE html>
<html>
  <head>
     <title>Hotel Guests Database</title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>  
  <body>
      <div>
      <form class="form-horizontal" method="post">
<fieldset>

<legend align="center">Hotel Guest Database Main Page</legend>

<?php if ($result == !null){?>
  <div class="alert alert-success alert-dismissable fade in">
  <a href="index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Guest Information Successfully Changed!</strong>
  </div>
<?php }?>

<div class="form-group">

  <input type="hidden" id="ID" name="ID" value="">
  <p align="Center">Enter Guest Information then click "Submit".</p>
  <label class="col-md-4 control-label" for="FirstName">First Name</label>  
  <div class="col-md-4">
  <input id="FirstName" name="FirstName" placeholder="ex. John" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="LastName">Last Name</label>  
  <div class="col-md-4">
  <input id="LastName" name="LastName" placeholder="ex. Smith" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="CheckIn">Check-in Date</label>
  <div class="col-md-4">
    <input id="CheckIn" name="CheckIn" placeholder="yyyy-mm-dd" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="CheckOut">Check-Out Date</label>  
  <div class="col-md-4">
  <input id="CheckOut" name="CheckOut" placeholder="yyyy-mm-dd" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</fieldset>
</form>
      </div>
      <form id="form1" runat="server" method="post" action="edit.php">
          <div class="container">
            <h2>Hotel Guests Database</h2>           
            <table class="table table-bordered">
              <thead>             
                <tr>
                  <th>ID</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Check-in Date</th>
                  <th>Check-Out Date</th>
                  <th colspan="2">Options</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_array($results)) {?><!--Getting the contents of the Database and assigning it to the $row variable-->
                <tr>
                  <td><?php echo $row['ID'];?></td><!--Displaying the ID from each Database query and displaying it in the table-->
                  <td><?php echo $row['FirstName'];?></td><!--Displaying the FirstName from each Database query and displaying it in the table-->
                  <td><?php echo $row['LastName'];?></td><!--Displaying the LastName from each Database query and displaying it in the table-->
                  <td><?php echo $row['CheckIn'];?></td><!--Displaying the Checkin from each Database query and displaying it in the table-->
                  <td><?php echo $row['CheckOut'];?></td><!--Displaying the Checkout from each Database query and displaying it in the table-->
                  <td><button class="btn btn-success" name="Edit" id="Edit" value="<?php echo $row['ID'];?>">Edit</button><!--Getting the ID from the database query and assigning it to the value for the Edit Button. This value will be submitted as a POST request-->
                  <button class="btn btn-danger" name="Delete" id="Delete" value="<?php echo $row['ID'];?>">Delete</button><!--Getting the ID from the database query and assigning it to the value for the Delete Button. This value will be submitted as a POST request-->
                  </td>
              <?php }?>
              </tbody>
            </table>
          </div>
      </form>
  </body>
</html>