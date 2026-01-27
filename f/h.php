<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> ชัชวาล วุฑฒะกุล(เตอร์)</title>
</head>

<body>
<h1>ชัชวาล วุฑฒะกุล(เตอร์) สูตรคูณ</h1>

<form method = "post">
กรอกตัวเลข <input type="number"name="a" autofocus require >
<button type = "submit"name = "submit">OK</button>
</form>
<hr>
<?php
if(isset($_POST['submit'])){
    
    $id = $_POST['a'];
    echo $id ;
    $y = substr($id,0,2)
    echo "<img src='https://202.28.32.210/picture/{$y}/{$id}.jpg' width= '200'>"
}

?>
</body>
</html>