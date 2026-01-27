<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ชัชวาล วุฑฒะกุล(เตอร์)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }
        .color-box {
            width: 30px; 
            height: 30px; 
            border-radius: 50%; 
            display: inline-block; 
            vertical-align: middle;
            border: 1px solid #ccc;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="form-container">
        <h2 class="text-center text-primary mb-4">ฟอร์มสมัครสมาชิก</h2>
        <h5 class="text-center text-muted mb-4">ชัชวาล วุฑฒะกุล (เตอร์) gemini</h5>
        
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุล</label>
                <input type="text" name="fullname" class="form-control" placeholder="กรอกชื่อ-นามสกุล" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="text" name="phone" class="form-control" placeholder="0xx-xxx-xxxx" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">ความสูง (ซม.)</label>
                    <input type="number" name="height" class="form-control" min="100" max="200" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="color" class="form-control form-control-color w-100" title="เลือกสีของคุณ">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">สาขาวิชา</label>
                <select name="major" class="form-select">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="การจัดการ">การจัดการ</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                </select>
            </div>

            <div class="d-grid gap-2 d-md-block text-center">
                <button type="submit" name="Submit" class="btn btn-success btn-lg">
                    <i class="bi bi-check-circle"></i> สมัครสมาชิก
                </button>
                <button type="reset" class="btn btn-warning text-white">
                    ล้างค่า
                </button>
                <button type="button" class="btn btn-info text-white" onClick="window.location='https://www.msu.ac.th';">
                    Go to MSU
                </button>
                <button type="button" class="btn btn-secondary" onClick="window.print()">
                    พิมพ์
                </button>
            </div>
        </form>
    </div>

    <?php if (isset($_POST['Submit'])): ?>
        <?php
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $height = $_POST['height'];
            $color = $_POST['color'];
            // ตรวจสอบว่ามีการส่งค่า major มาหรือไม่ (เพื่อป้องกัน Error)
            $major = isset($_POST['major']) ? $_POST['major'] : 'ไม่ได้เลือก';
        
            include_once("connectdb.php");

            $host = "localhost";
            $user = "root";
            $pwd = "";
            $db = "4102db";
            $conn = mysqli_connect($host, $user, $pwd, $db) or die("เชื่อมต่อฐานข้อมูลไม่ได้");
            mysqli_query($conn, "SET NAMES utf8");

          // แก้จาก phone -> r_phone และ height -> r_height
            $sql = "INSERT INTO register (r_id, r_name, r_phone, r_height, r_color, r_major) 
            VALUES (null, '{$fullname}', '{$phone}', '{$height}', '{$color}', '{$major}');";

            mysqli_query($conn, $sql) or die("insert ไม่ได้ Error: " . mysqli_error($conn));
            echo "<script>";
            echo "alert('เพิ่มข้อมูลสำเร็จ');";
            echo "</script>";
        
        
        
        ?>

        
        
        <div class="form-container mt-4 border border-success">
            <h4 class="text-success text-center mb-3">บันทึกข้อมูลสำเร็จ</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>ชื่อ-สกุล:</strong> <?php echo $fullname; ?></li>
                <li class="list-group-item"><strong>เบอร์โทร:</strong> <?php echo $phone; ?></li>
                <li class="list-group-item"><strong>ความสูง:</strong> <?php echo $height; ?> ซม.</li>
                <li class="list-group-item">
                    <strong>สีที่ชอบ:</strong> 
                    <?php echo $color; ?>
                    <span class="color-box" style="background-color: <?php echo $color; ?>;"></span>
                </li>
                <li class="list-group-item"><strong>สาขาวิชา:</strong> <?php echo $major; ?></li>
            </ul>
        </div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>