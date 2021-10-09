<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="<?= base_url() ?>/myfavicon.ico" type="ico" sizes="16x16">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h2>Laporan stok CU-44A akhir bulan <?php
                                        if ($bulan == "01") {
                                            echo "Januari";
                                        } else if ($bulan == "02") {
                                            echo "Februari";
                                        } else if ($bulan == "03") {
                                            echo  "Maret";
                                        } else if ($bulan == "04") {
                                            echo  "April";
                                        } else if ($bulan == "05") {
                                            echo  "Mei";
                                        } else if ($bulan == "06") {
                                            echo  "Juni";
                                        } else if ($bulan == "07") {
                                            echo  "Juli";
                                        } else if ($bulan == "08") {
                                            echo  "Agustus";
                                        } else if ($bulan == "09") {
                                            echo  "September";
                                        }
                                        ?> -
        <?= $tahun ?>
    </h2>

    <table style="width:100%">
        <tr>
            <th></th>
            <th>Data Stok Total</th>
            <th>Data Stok Masuk</th>
            <th>Data Stok Keluar</th>
        </tr>
        <tr>
            <?php

            use PhpParser\Node\Stmt\Foreach_;



            (int)$data1 = $StokMasuk[0]->quantity;
            (int)$data2 = $StokKeluar[0]->quantity;
            $totaldata = $data1 - $data2;
            ?>
            <td>jumlah</td>
            <td><?= number_format($totaldata)  ?> pcs</td>
            <td><?= number_format($StokMasuk[0]->quantity)  ?> pcs</td>
            <td><?= number_format($StokKeluar[0]->quantity)  ?> pcs</td>
        </tr>
    </table>

    <h2>Data Stock Card CU-44</h2>
    <table style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($StokBulan as $key => $value) : ?>
                <tr>
                    <td><?= $value->date_transaction ?></td>
                    <td><?= number_format($value->quantity)  ?></td>
                    <td><?= $value->remark ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>



    </table>

</body>

</html>