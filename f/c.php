<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> ชัชวาล วุฑฒะกุล(เตอร์)</title>
</head>

<body>
<h1>ชัชวาล วุฑฒะกุล(เตอร์)</h1>

<form method = "post">
กรอกตัวเลข <input type="number"name="a" autofocus require min = 0 max = 100>
<button type = "submit"name = "submit">OK</button>
</form>
<?php
if(isset($_POST['submit'])){
    
    $score = $_POST['a'];
if ($score >= 80) {
    $grade = "A" ;
    } else if ($score >= 70) {
        $grade = "B" ;
    } else if ($score >= 60) {
        $grade = "C" ;
    } else if ($score >= 50) {
        $grade = "D" ;
    } else {
        $grade = "F" ;
    }
}
echo "คะแนน $score ได้เกรด $grade" ;
?>
</body>
</html>

