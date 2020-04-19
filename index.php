<html>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Currency Converter</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

      
      
</head>
<body>
    
<div id="head">
<p><strong>Welcome to Currency Converter!</strong></p>    
</div>    
<div id="wrapper">

<div id="convert_div">
<form method="post">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
 <input type="text" name="amount" placeholder="            Enter Amount">
    <br /><br />
  <div class="buttons">
          <select name="convert_from">
          <option  value="USD">US Dollar</option>
          </select>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <select name="convert_to">
          <option  value="INR">Indian Rupee</option>
          <option  value="USD">US Dollar</option>
          <option  value="SGD">Singapore Dollar</option>
          <option  value="EUR">Euro</option>
          <option  value="AED">UAE Dirham</option>
         </select>  
    
  </div>
 <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="submit" name="convert_currency" value="Convert Currency">
</form>
</div>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<?php

if(isset($_POST['convert_currency']))
{
    $from=$_POST['convert_from'];
    $to=$_POST['convert_to'];
    $amount=$_POST['amount'];
 $request = curl_init('http://apilayer.net/api/live?access_key=36a72f4a5ede8aeb3789dcdac7d16413&currencies='.$to.'&source=USD&format=1'); 
 
 curl_setopt ($request, CURLOPT_RETURNTRANSFER, true); 
 
 $response = curl_exec($request); 
 curl_close($request); 
 
$converseResult=json_decode($response,true);
$result = $amount*$converseResult['quotes']["USD$to"];
echo "<div class='result'><p>Your Conversion Rate is $result.</p></div>" ;

}
?>

</body>
</html>