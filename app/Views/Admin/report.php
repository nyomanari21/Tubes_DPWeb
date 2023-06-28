<!doctype html>
<html lang="en">
<head>
    <title>Export Daftar Transaksi</title>
    <style type="text/css">
        h1 {
            text-align: center;
        }
        .table{

            margin-top: 20px;
            width: 100%;
            border: 1px solid black;
        }

        .table tr td, .table tr th{
            border: 1px solid black;
            padding: 10px;
        }

        p{
            border-top: 4px solid black;
            background-color: #ccc;
        }

    </style>
</head>
<body>
    <h1>Daftar Transaksi</h1>
    <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Username</th>
                        <th width="25%">Judul Kelas</th>
                        <th>Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $i = 1;
                        foreach ($transaksi as $t) : ?>
                            <tr>
                                <td width="5%"><?php echo $i++; ?></td>
                                <td><?php echo $t['username']; ?></td>
                                <td width="25%"><?php echo $t['judul_course']; ?></td>
                                <td><?php echo "Rp" . number_format($t['harga']); ?></td>
                                <td><?php echo $t['metode']; ?></td>
                                <td><?php echo $t['tanggal']; ?></td>
                                <td><?php echo $t['status']; ?></td>
                                <td><img src="/Assets/<?php echo $t['bukti']; ?>"></td>
                            </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
</body>
</html>