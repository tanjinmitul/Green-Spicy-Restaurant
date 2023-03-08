<!DOCTYPE html>
<html>
  <head>
    <title>Green Order Form</title>
    <link href="2-theme.css" rel="stylesheet">
  </head>
  <body>
    <?php
    // (A) PROCESS ORDER FORM
    if (isset($_POST['name'])) { 
      require "3-process.php"; 
      echo $result == "" 
        ? "<div class='notify'>Thank You! We have received your order</div>" 
        : "<div class='notify'>$result</div>" ;
    }
    ?>

    <!-- (B) ORDER FORM -->
    <form id="orderform" method="post" target="_self">
      <h1>Green spicy Order Form</h1>
      <label for="name">Name:</label>
      <input type="text" name="name" required value=""/> 
      <label for="email">Email:</label>
      <input type="email" name="email" required value=""/> 
      <label for="tel">Telephone:</label>
      <input type="text" name="tel" required value=""/> 
      <label for="qty">Quantity Needed:</label>
      <input type="number" name="qty" required value="1"/> 
      <label for="Food_Name">Food Names:</label>
      <textarea name="Food_Name"></textarea>
      <label for="notes">Additional Notes (if any):</label>
      <textarea name="notes"></textarea>
      <input type="submit" value="Place Order"/>
    </form>
  </body>
</html>