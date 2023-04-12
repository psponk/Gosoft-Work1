<!DOCTYPE html>
<html>
  <head>
    <title>Request Form</title>
  </head>
  <body>
    <h1>Request Form</h1>
    <form action="process_form.php" method="post">
      <label for="request_type">Request Type:</label>
      <select id="request_type" name="request_type">
        <option value="wfh">Work From Home</option>
        <option value="fix">Fix</option>
        <option value="upgrade">Upgrade</option>
        <option value="transfer">Transfer</option>
        <option value="return_asset">Return Asset</option>
      </select><br><br>
      
      <label for="details">Details:</label><br>
      <textarea id="details" name="details" rows="4" cols="50"></textarea><br><br>
      
      <label for="database">Database:</label>
      <input type="text" id="database" name="database"><br><br>
      
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
