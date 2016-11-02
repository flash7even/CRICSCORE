<?php
  include("header.php");
?>

<div class="container" style=
  "padding:5px;
  border: 5px solid;
  background-color:#E6EBF0;
  text-align:center;
  border-color: #F8F8FC;">
  <h2 style="color:#00005C;">Please Fill Up The Form To Register for Editorial Section</h2>
</div>
</br>
<div class="container">
  <form role="form" method="POST" action="Register_here.php">

    <div class="form-group">
        <label for="pwd">User Name:</label>
        <input type="text" name="user_name" id="user_name" class="form-control" id="user_name" placeholder="Enter User Name">
    </div>

    <div class="form-group">
        <label for="pwd">Your Full Name:</label>
        <input type="text" name="full_name" id="full_name" class="form-control" id="full_name" placeholder="Enter Your Full Name">
    </div>
    <div class="form-group">
      <label for="email">Your Email:</label>
      <input type="email" name="email" id="email" class="form-control" id="email" placeholder="Enter Email">
    </div>

    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="text" name="password" id="password" class="form-control" id="password" placeholder="Enter Password">
    </div>
    
    <div class="form-group">
        <label for="pwd">Your Country:</label>
        <input type="text" name="country" id="country" class="form-control" id="country" placeholder="Enter Your Country Name">
    </div>
    <div class="form-group">
      <label for="region">Where did you know about us?</label>
        <select class="form-control" id="know">
          <option>From a friend</option>
          <option>From facebook</option>
          <option>From google</option>
          <option>I myself found it</option>
        </select>
    </div>
    <div class="form-group">
        <label for="pwd">Your Age:</label>
        <input type="text" name="age" id="age" class="form-control" id="age" placeholder="Enter Your Age">
    </div>
    <button type="submit" name="registration" id="registration" value="registration" class="btn btn-default" style="text-align:center;">Submit</button>
  </form>
</div>

        <?php
            if(isset($_POST["user_name"])){

                require('connectdb.php');

                $user_name = $_POST["user_name"];
                $full_name = $_POST["full_name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $age = $_POST["age"];
                $country = $_POST["country"];

                $sql = "SELECT * FROM blog_registration WHERE user_name = $user_name";
                $result = mysqli_query($cnctdb, $sql);
                if(!$result){
                      $sql =  "INSERT INTO blog_registration(full_name,email,user_name,password,country,age)".
                              "VALUES('$full_name','$email','$user_name','$password','$country','$age')";
                      $result1 = mysqli_query($cnctdb, $sql);

                      if(!$result1){
                        echo "Data Insertion Failed!";
                      }else{
                        $url = "logintest.php?";
                        //header("Location: $url");
                        exit;
                      }
                }
        }
        ?>

<?php
  include("footer.php");
?>