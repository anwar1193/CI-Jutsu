<?php 
    $no=1;
    foreach($data_pegawai as $data){ ?>

    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nip']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['tahun_masuk']; ?></td>
    </tr>

<?php } ?>