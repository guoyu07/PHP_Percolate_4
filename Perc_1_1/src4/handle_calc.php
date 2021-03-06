<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Product Cost Calculator</title>
	<style type="text/css" media="screen">
		.number { font-weight: bold; }
	</style>
</head>
<body>

<?php	// Script 4.2 - handle_calc.php #3
ini_set('display_errors',1);         // learn from my mistakes!
error_reporting (E_ALL | E_STRICT);  // turn on all error reporting

$price = $_POST['price'];
$quantity = $_POST['quantity'];
$discount = $_POST['discount'];
$tax = $_POST['tax'];
$shipping = $_POST['shipping'];
$payments = $_POST['payments'];

// this is the original format of the calculation
// $total = $price * $quantity;
// $total = $total + $shipping;
// $total = $total - $discount;

// $taxrate = $tax/100;
// $taxrate = $taxrate + 1;
// $total = $total * $taxrate;
// $monthly = $total / $payments;

// Calculate the total (new method using parens):
$total = (($price * $quantity) + $shipping) - $discount;

// Determine the tax rate
$taxrate = ($tax/100) + 1;

// factor in the tax rateL
$total = $total * $taxrate;

// Calculate the monthly payments:
$monthly = $total / $payments;

$total = number_format($total, 2);
$monthly = number_format($monthly, 2);

print "<p>You have selected to purchase:<br />
<span class=\"number\">$quantity</span> widget(s) at <br />
$<span class=\"number\">$price</span> price each plus a <br />
$<span class=\"number\">$shipping</span> shipping cost and a <br />
<span class=\"number\">$tax</span> percent tax rate. <br />
After your $<span class=\"number\">$discount</span> discount, the total cost is
$<span class=\"number\">$total</span>.<br />
Divided over
<span class=\"number\"> $payments</span> monthly payments,
that would be $<span class=\"number\">$monthly</span> each.</p>";

?>
</body>
</html>

