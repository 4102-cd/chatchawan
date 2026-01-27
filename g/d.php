<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> ชัชวาล วุฑฒะกุล(เตอร์)</title>
</head>

<body>
<h1>ชัชวาล วุฑฒะกุล(เตอร์) </h1>

<table border ="1">

<tr>

    <th>ประเทศ</th>
    <th>ยอดขาย</th>
</tr>

<?php
include_once("connectdb.php");
$sql = "SELECT p_country,SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country";
$rs = mysqli_query($conn,$sql);
$total = 0 ;
while ($data = mysqli_fetch_array($rs)){
    $total += $data['total'];
?>
<tr>

    <td><?php echo $data ['p_country'];?></td>
    <td align="right"><?php echo number_format($data ['total'],0);?></td>

</tr>
<?php } ?>

<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><b><?php echo number_format($total,0);?><b></td>
    <td>&nbsp;</td>
</table>
</body>
</html>