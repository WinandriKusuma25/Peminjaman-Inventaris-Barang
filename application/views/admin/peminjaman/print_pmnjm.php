<!DOCTYPE html>
<html>

<head>
    <title></title>
    <h3 style="text-align:center">DAFTAR PEMINJAMAN</h3><br>
</head>

<body>

    <br>
    <table border="1" align="center">
        <tr>
            <th>No.</th>
            <th>Nama peminjam</th>
            <th>Barang</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
            <th>Status Peminjaman</th>
            <th>Status Pengembalian</th>

        </tr>

        <?php
        $no = 1;
        foreach ($peminjaman as $pmnj) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pmnj->name ?></td>
            <td><?php echo $pmnj->nama ?></td>
            <td><?php echo $pmnj->tgl_peminjaman ?></td>
            <td><?php echo $pmnj->tgl_kembali ?></td>
            <td><?php echo $pmnj->keterangan ?></td>
            <td><?php echo $pmnj->status_peminjaman ?></td>
            <td><?php echo $pmnj->status_pengembalian ?></td>

        </tr>

        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
    window.print(); <
    /body></html >