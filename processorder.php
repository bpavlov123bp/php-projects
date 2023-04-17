<?php
$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<title>Bob's Auto part - Order Result</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
</body>
</html>
HTML;
echo $html;
echo "<p>Order processed at: ";
echo date('H:i, d-m-Y') . "</p>";
$tireqty = $_POST['tireqty'];
$oilqty  = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
echo "Your order is as follows:<br/>";
echo "$tireqty tires.<br>";
echo "$oilqty bottles of oil.<br>";
echo "$sparkqty spark plugs.<br>";
