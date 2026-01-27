<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบรับสมัครงานออนไลน์ - Future Tech</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f4f6f9;
            padding: 30px 0;
        }
        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            background: white;
        }
        .header-bg {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .result-box {
            background-color: #f8f9fa;
            border-left: 5px solid #0d6efd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="main-card">
                <div class="header-bg">
                    <h2><i class="bi bi-building-check"></i> บริษัท Future Tech จำกัด</h2>
                    <p class="mb-0">ระบบรับสมัครพนักงานใหม่</p>
                </div>

                <div class="card-body p-4">

                <?php
                    // -----------------------------------------------------------
                    // ตรวจสอบ: ถ้ากดปุ่มส่งมา (submit_btn) ให้แสดงผลลัพธ์
                    // -----------------------------------------------------------
                    if (isset($_POST['submit_btn'])) {
                        
                        $position   = $_POST['position'];
                        $prefix     = $_POST['prefix'];
                        $fullname   = $_POST['fullname'];
                        $dob        = $_POST['dob'];
                        $education  = $_POST['education'];
                        $skills     = $_POST['skills'];
                        $experience = $_POST['experience'];

                        // คำนวณอายุ
                        $birthDate = new DateTime($dob);
                        $today     = new DateTime();
                        $age       = $today->diff($birthDate)->y;
                        $dob_show  = $birthDate->format('d/m/Y'); 
                ?>
                    <div class="text-center mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                        <h3 class="text-success mt-2">บันทึกข้อมูลการสมัครเรียบร้อยแล้ว</h3>
                        <p class="text-muted">ขอบคุณที่ให้ความสนใจร่วมงานกับเรา</p>
                    </div>

                    <div class="result-box">
                        <h5 class="text-primary mb-3"><i class="bi bi-person-vcard"></i> ข้อมูลผู้สมัคร</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <strong>ตำแหน่งที่สมัคร:</strong> <span class="badge bg-primary"><?php echo $position; ?></span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>ชื่อ-สกุล:</strong> <?php echo $prefix . $fullname; ?>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>วันเกิด:</strong> <?php echo $dob_show; ?> (อายุ <?php echo $age; ?> ปี)
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>ระดับการศึกษา:</strong> <?php echo $education; ?>
                            </div>
                        </div>
                    </div>

                    <div class="result-box" style="border-left-color: #ffc107;">
                        <h5 class="text-warning text-dark mb-3"><i class="bi bi-stars"></i> ความสามารถและประสบการณ์</h5>
                        <div class="mb-3">
                            <strong>ความสามารถพิเศษ:</strong><br>
                            <?php echo empty($skills) ? "-" : nl2br($skills); ?>
                        </div>
                        <div>
                            <strong>ประสบการณ์ทำงาน:</strong><br>
                            <?php echo empty($experience) ? "-" : nl2br($experience); ?>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button onclick="window.print()" class="btn btn-secondary me-2"><i class="bi bi-printer"></i> พิมพ์ใบสมัคร</button>
                        <a href="" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> กลับไปหน้าแบบฟอร์ม</a>
                    </div>

                <?php
                    } else {
                    // -----------------------------------------------------------
                    // ตรวจสอบ: ถ้ายังไม่กดปุ่ม (เปิดไฟล์ครั้งแรก) ให้แสดงฟอร์ม
                    // -----------------------------------------------------------
                ?>
                    <form action="" method="post">
                        
                        <h5 class="mb-3 text-primary">1. ข้อมูลตำแหน่งงาน</h5>
                        <div class="mb-3">
                            <label class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                            <select name="position" class="form-select" required>
                                <option value="" selected disabled>-- เลือกตำแหน่ง --</option>
                                <option value="Web Developer">Web Developer (นักพัฒนาเว็บไซต์)</option>
                                <option value="Graphic Designer">Graphic Designer (กราฟิกดีไซน์)</option>
                                <option value="Marketing">Marketing (การตลาด)</option>
                                <option value="Accountant">Accountant (บัญชี)</option>
                            </select>
                        </div>

                        <h5 class="mb-3 mt-4 text-primary">2. ข้อมูลส่วนตัว</h5>
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <label class="form-label">คำนำหน้า</label>
                                <select name="prefix" class="form-select">
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control" required placeholder="ระบุชื่อและนามสกุล">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                                <select name="education" class="form-select" required>
                                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                                    <option value="ปริญญาโท">ปริญญาโท</option>
                                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    <option value="ปวส.">ปวส.</option>
                                    <option value="อื่น ๆ">อื่น ๆ</option>
                                </select>
                            </div>
                        </div>

                        <h5 class="mb-3 mt-4 text-primary">3. รายละเอียดเพิ่มเติม</h5>
                        <div class="mb-3">
                            <label class="form-label">ความสามารถพิเศษ</label>
                            <textarea name="skills" class="form-control" rows="3" placeholder="เช่น ภาษาอังกฤษดีเยี่ยม, เขียนโปรแกรมได้"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">ประสบการณ์ทำงาน</label>
                            <textarea name="experience" class="form-control" rows="3" placeholder="ระบุประวัติการทำงาน (ถ้ามี)"></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="submit_btn" class="btn btn-primary btn-lg">
                                <i class="bi bi-send"></i> ส่งใบสมัครงาน
                            </button>
                        </div>
                    </form>
                <?php } ?>
                
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>