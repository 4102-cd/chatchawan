<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ชัชวาล วุฑฒะกุล(เตอร์)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .container { margin-top: 30px; }
    </style>
</head>

<body>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">ชัชวาล วุฑฒะกุล(เตอร์) - รายการสินค้า</h3>
        </div>
        <div class="card-body">
            
            <table id="productTable" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>สินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>วันที่</th>
                        <th>ประเทศ</th>
                        <th>จำนวนเงิน</th>
                        <th>รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ตรวจสอบว่าไฟล์ connectdb.php มีอยู่จริงหรือไม่ เพื่อป้องกัน Error
                    if(file_exists("connectdb.php")){
                        include_once("connectdb.php");
                        
                        // ตรวจสอบการเชื่อมต่อ (สมมติว่าตัวแปร $conn มาจาก connectdb.php)
                        if(isset($conn)) {
                            $sql = "SELECT * FROM popsupermarket";
                            $rs = mysqli_query($conn, $sql);
                            $total = 0;

                            while ($data = mysqli_fetch_array($rs)){
                                $total += $data['p_amount'];
                    ?>
                    <tr>
                        <td><?php echo $data['p_order_id'];?></td>
                        <td><?php echo $data['p_product_name'];?></td>
                        <td><?php echo $data['p_category'];?></td>
                        <td><?php echo date('d/m/Y', strtotime($data['p_date']));?></td> <td><?php echo $data['p_country'];?></td>
                        <td class="text-end"><?php echo number_format($data['p_amount'], 0);?></td>
                        <td class="text-center">
                            <?php 
                                $img_name = $data['p_product_name'] . ".jpg";
                                if(file_exists($img_name)) {
                            ?>
                                <img src="<?php echo $img_name; ?>" width="50" class="img-thumbnail">
                            <?php } else { echo "-"; } ?>
                        </td>
                    </tr>
                    <?php 
                            } 
                        }
                    }
                    ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="5" class="text-end fw-bold">ยอดรวมทั้งหมด</td>
                        <td class="text-end fw-bold text-success"><?php echo number_format($total ?? 0, 0);?></td>
                        <td>บาท</td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            "language": {
                "lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูล",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
                "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                "search": "ค้นหา:",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            },
            "order": [[ 0, "asc" ]] // เรียงลำดับตามคอลัมน์แรก (Order ID)
        });
    });
</script>

</body>
</html>