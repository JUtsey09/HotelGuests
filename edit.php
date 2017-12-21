<?php require('db.php');?>
<!DOCTYPE html>
<html>
  <head>
     <title>Hotel Guests Edit Page</title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>  
  <body>
      <div>
      <form class="form-horizontal" method="post" action="index.php">
<fieldset>
<legend align="center">Hotel Guest Edit Page</legend>
<div class="form-group">
<input type="hidden" id="ID" name="ID" value="<?php echo $_POST['Edit']?>"><!--Getting the ID(assigned to the Edit button from index.php via POST method) and adding to the hidden input value-->
  <p align="Center">Enter updated Guest Information then click "Update".</p>
  <label class="col-md-4 control-label" for="FirstName">First Name</label>  
  <div class="col-md-4">
  <input id="FirstName" name="FirstName" placeholder="ex. John" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="LastName">Last Name</label>  
  <div class="col-md-4">
  <input id="LastName" name="LastName" placeholder="ex. Smith" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="CheckIn">Check-in Date</label>
  <div class="col-md-4">
    <input id="CheckIn" name="CheckIn" placeholder="yyyy-mm-dd" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="CheckOut">Check-Out Date</label>  
  <div class="col-md-4">
  <input id="CheckOut" name="CheckOut" placeholder="yyyy-mm-dd" class="form-control input-md" type="text">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Update"></label>
  <div class="col-md-4">
    <button id="Update" name="Update" class="btn btn-primary">Update</button>
    <form class="form1">
      <button id="HomePage" name="HomePage" class="btn btn-info">Home Page</button>
      </form>
  </div>
</div>
</fieldset>
</form>
      </div>
      <form id="form1" runat="server" method="post">
          <div class="container">
            <h2>Selected Hotel Guest</h2>           
            <table class="table table-bordered">
              <thead>             
                <tr>
                  <th>ID</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Check-in Date</th>
                  <th>Check-Out Date</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_array($result)) {?><!--Getting the contents of the Database and assigning it to the $row variable-->
                <tr>
                  <td><?php echo $row['ID'];?></td><!--Displaying the ID from each Database query and displaying it in the table-->
                  <td><?php echo $row['FirstName'];?></td><!--Displaying the FirstName from each Database query and displaying it in the table-->
                  <td><?php echo $row['LastName'];?></td><!--Displaying the LastName from each Database query and displaying it in the table-->
                  <td><?php echo $row['CheckIn'];?></td><!--Displaying the Checkin from each Database query and displaying it in the table-->
                  <td><?php echo $row['CheckOut'];?></td><!--Displaying the Checkout from each Database query and displaying it in the table-->          
              <?php }?>
              </tbody>
            </table>
          </div>
      </form>
  </body>
</html>