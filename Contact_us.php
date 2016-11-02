<?php
  include("header.php");
?>

<div class="container" style=
  "padding:5px;
  border: 5px solid;
  background-color:#E6EBF0;
  text-align:center;
  border-color: #F8F8FC;">
  <h2 style="color:#00005C;">Please Fill Up The Form To Inform Us Your Query</h2>
</div>
</br>
<div class="container">
  <form role="form">
    <div class="form-group">
      <label for="email">Your Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="pwd">Your Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="region">Enter Your Region</label>
        <select class="form-control" id="region">
          <option>Your Region</option>
          <option>Asia</option>
          <option>Europe</option>
          <option>Australia</option>
          <option>America</option>
        </select>
    </div>
    <div class="form-group">
      <label for="age">Enter Your Age</label>
        <select class="form-control" id="age">
          <option>Your Age</option>
          <option>06 to 15</option>
          <option>15 to 30</option>
          <option>30 to 50</option>
          <option>50 to 70</option>
        </select>
    </div>
    <div class="form-group">
      <label for="comment">Query:</label>
      <input type="text" class="form-control" id="query" placeholder="Enter Your Query">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default" style="text-align:center;">Submit</button>
  </form>
</div>

<?php
  include("footer.php");
?>
