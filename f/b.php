<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> ชัชวาล วุฑฒะกุล(เตอร์)</title>
</head>

<body>
<h1>ชัชวาล วุฑฒะกุล(เตอร์)</h1>

<form method = "post">
กรอกตัวเลข <input type="number"name="a" autofocus require>
<button type = "submit"name = "submit">OK</button>
</form>
<?php
if(isset($_POST['submit'])){
    
    $gender = $_POST['a'];

    if($gender == 1){
    echo"เพศชาย";
    } else if ($gender == 2){
        echo"เพศหญิง";
    } else if ($gender == 3){
        echo"เพศที่3";
    } else  {
        echo"กรุณากรอกให้ถูกต้อง";
    }
}

?>
</body>
</html>
