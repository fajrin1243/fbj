<div class="col-sm-12">
<h3>Data Peserta <?= getField('acara','nama_acara',array('id'=>@$getPeserta[0]['id_acara'])) ?> <?= ucfirst($kelas) ?></h3>
<table id="peserta" class="display peserta" cellspacing="0" width="100%">
<thead>
<tr>
<th>Nomor</th>
<th>Nama</th>
<th>Pilihan 1</th>
<th>Pilihan 3</th>
<th>Pilihan 2</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
foreach($getPeserta as $value)
{
    ?>
    
    <tr>
    <td><?= $no++ ?></td>
    <td><?= ucwords($value['nama_peserta']); ?></td>
    <?php
    $get_ticket_detail = $this->Main_model->join('ticket_detail','*,ticket_detail.id as idTiketD',array(array('table'=>'jurusan','parameter'=>'jurusan.id=ticket_detail.jurusan_id')),array('ticket_id'=>$value['id']),'','','','ticket_detail.id');
    foreach ($get_ticket_detail as $value_ticket)
    {
        echo "<td>".$value_ticket['major']."</td>";
    }	
    ?>
    <td><a href="<?= base_url("index.php/main/peserta_edit/".$id_acara."/".$kelas."/".$value['id']) ?>"><button class="btn btn-primary get-data" ata-idpeserta="<?= $value['id'] ?>" data-toggle="modal" data-target="#exampleModal">Edit</button></a> <a href="<?= base_url("index.php/main/peserta_delete/".$value['id']) ?>"><button class="btn btn-danger">Delete</button></a></td>
    </tr>
    
    <?php
}
?>
</tbody>
</table>
</div>

<script>
$(document).ready(function() {
    $('.peserta').DataTable();
} );

</script>