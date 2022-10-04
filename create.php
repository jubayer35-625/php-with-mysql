<?php
require 'db.php';
$message = '';
$nameErr = $emailErr = $genderErr = $nidErr = $passwordErr = $re_passwordErr =$relationshipErr ="";  

if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])   && isset($_POST['nid'])  && isset($_POST['gender']) && isset($_POST['relationship']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  $nid = $_POST['nid'];
  $gender = $_POST['gender'];
  $relationship = $_POST['relationship'];



  if($password == $re_password){

    $sql = 'INSERT INTO people(name, email,password,nid,gender,relationship) VALUES(:name, :email, :password, :nid, :gender, :relationship)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':email' => $email, ':password' =>$password, ':nid' => $nid, ':gender' =>$gender,':relationship' => $relationship   ])) {
      $message = 'Data inserted successfully'; 
    }
  }else{
    echo "don't match password";
  }

}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="password">Possword</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="re-password">re-password</label>
          <input type="password" name="re_password" id="re_password" class="form-control">
        </div>

        <div class="form-group">
          <label for="NID">NID</label>
          <input type="text" name="nid" id="nid" class="form-control">
        </div>

        <div class="form-group">
        <p>What is your gender?</p>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
        </div>

        <div class="form-group">
        <p>Relationship Status</p>
        <input type="radio" name="relationship" value="marid"> Marid
        <input type="radio" name="relationship" value="unmarid"> Unmarid
        <input type="radio" name="relationship" value="in_a_relationship"> In a Relastionship
        </div>
       

        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>

      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
