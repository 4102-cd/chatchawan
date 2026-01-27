<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> ชัชวาล วุฑฒะกุล(เตอร์)</title>
</head>

<body>
<h1>ชัชวาล วุฑฒะกุล(เตอร์) สูตรคูณ</h1>

<form method = "post">
กรอกตัวเลข <input type="number"name="a" autofocus require min = 2 max = 12>
<button type = "submit"name = "submit">OK</button>
</form>
<hr>
<?php
if(isset($_POST['submit'])){
    
    $m = $_POST['a'];
    

    for($i=2;$i<=12;$i++){
        $b = $m*$i;
        echo "{$m} x {$i} = {$b} <br>";
    }

}

?>
</body>
</html>