<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Warranty registration</title>
</head>
<body>
<div class="container" style="background-color: black ; color:white"  >

<img src="logo.png" />
<h5 >Product Warranty Registration Form</h5>

</div>


<div class="container" >

  <form id="warrantyForm" enctype="multipart/form-data" action="./process/process_form.php" method="post">
    <div class="field">
      <label for="orderNo">Installation Service Order No</label>
      <input type="text" id="orderNo" name="orderNo" pattern="[A-Za-z]{3}[0-9]{10}" required  title="Invalid format. Should be like ABC1234567890" >
    </div>
    <div class="field">
      <label for="modelName">Model Name (LTW or Aero)</label>
      <input type="text" id="modelName" name="modelName" pattern="(LTW|Aero)" required title="Invalid format. Should be like LTW or Aero" >
    </div>
   
    <div class="field">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="field">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@gmail.com" required>
    </div>
   
<div class="field">
    <label for="mobile">Mobile Number</label>
    <input type="tel" id="mobile" name="mobile" pattern="'^[+]{1}(?:[0-9\\-\\(\\)\\/''\\.]\\s?){6, 15}[0-9]{1}$'" required>
</div>
    <div class="field">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" required>
    </div>
    <div class="field">
      <label for="city">City</label>
      <input type="text" id="city" name="city" required>
    </div>
    <div class="field">
      <label for="state">State</label>
      <input type="text" id="state" name="state" required>
    </div>
    <div class="field">
      <label for="pincode">Pincode</label>
      <input type="text" id="pincode" name="pincode" pattern="[0-9]{6}" required>
    </div>
   
    <div class="field">
      <label for="serialNo">Serial Number</label>
      <input type="text" id="serialNo" name="serialNo" required>
    </div>
    <div class="field">
      <label for="purchaseDate">Purchase Date</label>
      <input type="date" id="purchaseDate" name="purchaseDate" required>
    </div>
    <div class="field">
      <label for="invoice">Scan of Invoice (PDF)</label>
      <input type="file" id="invoice" name="invoice" accept="application/pdf" required>
    </div>
    <div class="field">
      <label for="warrantyForm">Scan of Lifetime Warranty Registration Form (PDF)</label>
      <input type="file" id="warrantyForm" name="warrantyForm" accept="application/pdf" required>
    </div>
    <div class="submit">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>

<br>
<br>

</body>
</html>



