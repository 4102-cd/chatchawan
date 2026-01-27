<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ชัชวาล วุฑฒะกุล(เตอร์)</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary-color: #4e73df;
            --success-color: #1cc88a;
            --bg-color: #f8f9fc;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        /* Layout สำหรับกราฟ */
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* แบ่ง 2 คอลัมน์ */
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .grid-container { grid-template-columns: 1fr; }
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }

        .card:hover { transform: translateY(-5px); }

        h2 { font-size: 1.1rem; color: #555; margin-bottom: 20px; border-left: 4px solid var(--primary-color); padding-left: 10px; }

        /* การตกแต่งตาราง */
        .table-container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #f1f3f9;
            color: #4e73df;
            text-transform: uppercase;
            font-size: 0.9rem;
            padding: 15px;
            border-bottom: 2px solid #e3e6f0;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover { background-color: #fcfdff; }

        .text-right { text-align: right; }
        .total-row { background-color: #4e73df !important; color: white; font-weight: bold; }
        
        .chart-box { position: relative; height: 300px; }
    </style>
</head>

<body>

<div class="container">
    <div class="header">
        <h1 style="margin:0; color:#2e59d9;">รายงานสรุปยอดขาย</h1>
        <p style="color:#888;">ผู้จัดทำ: ชัชวาล วุฑฒะกุล (เตอร์)</p>
    </div>

    <?php
    include_once("connectdb.php");
    $sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country ORDER BY total DESC";
    $rs = mysqli_query($conn, $sql);
    
    $labels = [];
    $dataValues = [];
    $grandTotal = 0;

    // เก็บข้อมูลลง Array เพื่อใช้ซ้ำ
    $rows = [];
    while ($data = mysqli_fetch_array($rs)) {
        $rows[] = $data;
        $labels[] = $data['p_country'];
        $dataValues[] = (float)$data['total'];
        $grandTotal += $data['total'];
    }
    ?>

    <div class="grid-container">
        <div class="card">
            <h2><i class="fas fa-chart-bar"></i> ยอดขายแยกตามประเทศ (Bar Chart)</h2>
            <div class="chart-box">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="card">
            <h2><i class="fas fa-chart-pie"></i> สัดส่วนยอดขาย (Pie Chart)</h2>
            <div class="chart-box">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <div class="table-container">
        <h2>รายละเอียดข้อมูลยอดขาย</h2>
        <table>
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ประเทศ</th>
                    <th class="text-right">ยอดขาย (บาท)</th>
                    <th class="text-right">คิดเป็น (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach($rows as $row) { 
                    $percent = ($grandTotal > 0) ? ($row['total'] / $grandTotal) * 100 : 0;
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><strong><?php echo $row['p_country']; ?></strong></td>
                    <td class="text-right"><?php echo number_format($row['total'], 2); ?></td>
                    <td class="text-right"><?php echo number_format($percent, 1); ?>%</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="2" style="text-align: center;">ยอดขายรวมทั้งสิ้น</td>
                    <td class="text-right"><?php echo number_format($grandTotal, 2); ?></td>
                    <td class="text-right">100%</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const labels = <?php echo json_encode($labels); ?>;
    const dataValues = <?php echo json_encode($dataValues); ?>;
    
    // ชุดสีแบบ Modern
    const colors = [
        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', 
        '#5a5c69', '#6f42c1', '#fd7e14', '#20c997', '#d63384'
    ];

    // --- กราฟแท่ง (Bar Chart) ---
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขาย',
                data: dataValues,
                backgroundColor: 'rgba(78, 115, 223, 0.8)',
                borderColor: '#4e73df',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // --- กราฟวงกลม (Pie Chart) ---
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'doughnut', // ใช้ Doughnut จะดูทันสมัยกว่า Pie ปกติ
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: colors,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 12, padding: 15 } }
            }
        }
    });
</script>

</body>
</html>