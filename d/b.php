<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล  วุฑฒะกุล(เตอร์)</title>
</head>

<body>
<h1>ฟอร์มสมัครสมาชิก--ชัชวาล  วุฑฒะกุล(เตอร์)</h1>
<form method="post"action="">
ชื่อ-สกุล<input type="text" name="fullname" required autofocus><br> 
เบอร์โทร<input type="text" name="phone" required><br> 
ความสูง<input type="number" name="height" min="100" max="200"  required>ซม.<br>
สี<input type="color" name="color">
สาขาวิชา
<select name="mejor">
	<option value="การบัญชี">การบัญชี</option>
    <option value="การจัดการ">การจัดการ	</option>
    <option value="การตลาด">การตลาด</option>
    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
</select><br>

<!--<input type="submit" name="submit"value="สมัครสมาชิก">-->
<button type="submit" name="submit">สมัครสมาชิก</button>
<button type="reset" name="reset">RESET</button>
<button type="button" onMouseOver=
"https://www.msu.ac.th/th/%E0%B8%84%E0%B8%93%E0%B8%B0-%E0%B8%A7%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%A2/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9A%E0%B8%B1%E0%B8%8D%E0%B8%8A%E0%B8%B5%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2/" >go to MBS msu</button>
<button type="button" onClick ="window.print()'.">print</button>
</form>
<hr>

<?php
if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $color = $_POST['color'];
    $major = $_POST['mejor'];

    echo "ขื่อ-นามสกุล".$fullname."<br>";
    echo "เบอร์โทร".$phone."<br>";
    echo "ความสูง".$height."<br>";
    echo"สี".$color."<br>";
    echo "คณะ".$major."<br>";

}
?>
</body>
</html>
