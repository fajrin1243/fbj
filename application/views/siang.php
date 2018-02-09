<div class="col-sm-12">
<h3><?= getField('acara','nama_acara',array('id'=>$fbj_28_1[0]['id_acara'])) ?> </h3>
<?php 
if($this->session->flashdata('success'))
{
    ?>
    <div class='alert alert-success flashMsg flashSuccess'> <?= $this->session->flashdata('success')?> </div>
    <?php
}
?>

<form action="<?= base_url('index.php/main/save_ticket_siang')?>" method="post">
<div class="form-group">
<input type="hidden" name="id_acara" value="<?= $fbj_28_1[0]['id_acara'] ?>">
<input type="hidden" name="kelas" value="<?= ucfirst($kelas) ?>">
<label for="">Nama Peserta</label>
<input type="text" required name="nama_peserta" id="" class="form-control" placeholder="Tulis nama anda disini" aria-describedby="helpId">
</div>
<div class="form-group">
<label for="">Jurusan Sesi 1</label>
<select name="id_jurusan[]"  class="custom-select" name="" id="sesi1">
<?php
foreach($fbj_28_1 as $major_value){
    $total_kursi = count_all('ticket_detail_siang',array('jurusan_id'=>$major_value['idJurusan']));
    $kuota = $major_value['kuota'];
    $sisa_kursi = $kuota-$total_kursi;
    ?>  
    <option value="<?= $major_value['idJurusan'] ?>"><?= $major_value['major']." (".$sisa_kursi.")" ?> </option>
    <?php 
}
?>
</select>   
</div>
<div class="form-group">
<label for="">Jurusan Sesi 2</label>
<select name="id_jurusan[]"  class="custom-select" name="" id="sesi2">
<?php
foreach($fbj_28_2 as $major_value){
    $total_kursi = count_all('ticket_detail_siang',array('jurusan_id'=>$major_value['idJurusan']));
    $kuota = $major_value['kuota'];
    $sisa_kursi = $kuota-$total_kursi;
    ?>  
    <option value="<?= $major_value['idJurusan'] ?>"><?= $major_value['major']." (".$sisa_kursi.")" ?></option>
    <?php 
}
?>
</select>   
</div>
<div class="form-group">
<label for="">Jurusan Sesi 3</label>
<select name="id_jurusan[]"  class="custom-select" name="" id="sesi3">
<?php
foreach($fbj_28_3 as $major_value){
    $total_kursi = count_all('ticket_detail_siang',array('jurusan_id'=>$major_value['idJurusan']));
    $kuota = $major_value['kuota'];
    $sisa_kursi = $kuota-$total_kursi;
    ?>  
    <option value="<?= $major_value['idJurusan'] ?>"><?= $major_value['major']." (".$sisa_kursi.")" ?></option>
    <?php 
}
?>
</select>   
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script>
$(document).ready(function(){ 
    $("form").submitchange(function(){ 
        var sesi1 = $("#sesi1").val(); 
        
        alert(sesi1);
        
    });
});
</script>