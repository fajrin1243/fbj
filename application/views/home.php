<div class="col-sm-12">
<h3><?= getField('acara','nama_acara',array('id'=>$fbj_28_1[0]['id_acara'])) ?> <?= ucfirst($kelas) ?> </h3>
<?php 
if($this->session->flashdata('success'))
{
    ?>
    <div class='alert alert-success flashMsg flashSuccess'> <?= $this->session->flashdata('success')?> </div>
    <?php
}
?>
<?php 
if($this->session->flashdata('error'))
{
    ?>
    <div class='alert alert-danger flashMsg flashError'> <?= $this->session->flashdata('error')?> </div>
    <?php
}
?>
<?php echo validation_errors(); ?>

<form action="<?= base_url('index.php/main/save_ticket')?>" method="post">
<div class="form-group">
<input type="hidden" name="id_acara" value="<?= $fbj_28_1[0]['id_acara'] ?>">
<input type="hidden" name="kelas" value="<?= ucfirst($kelas) ?>">
<label for="">Nama Peserta</label>
<input type="text"  name="nama_peserta" id="" class="form-control" placeholder="Tulis nama anda disini" aria-describedby="helpId">
</div>
<div class="form-group">
<label for="">Jurusan Sesi 1</label>
<select name="id_jurusan[]"  class="custom-select" name="" id="sesi1">
<?php
foreach($fbj_28_1 as $major_value){
    $total_ticket = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$major_value['idJurusan'],'id_acara'=>$id_acara,'kelas'=>$kelas),'','','','ticket.id');
    $kuota = $major_value['kuota'];
    $sisa_kursi = $kuota-count($total_ticket);
    if (count($total_ticket)<$kuota)
    {
        ?>  
        <option value="<?= $major_value['idJurusan'] ?>"><?= $major_value['major']." (".$sisa_kursi.")" ?></option>
        <?php 
    } 
}
?>
</select>   
</div>
<div class="form-group">
<label for="">Jurusan Sesi 2</label>
<select name="id_jurusan[]"  class="custom-select" name="" id="sesi2">
<?php
foreach($fbj_28_2 as $major_value){
    $total_ticket = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$major_value['idJurusan'],'id_acara'=>$id_acara,'kelas'=>$kelas),'','','','ticket.id');
    $kuota = $major_value['kuota'];
    $sisa_kursi = $kuota-count($total_ticket);
    if (count($total_ticket)<$kuota)
    {
        ?>  
        <option value="<?= $major_value['idJurusan'] ?>"><?= $major_value['major']." (".$sisa_kursi.")" ?></option>
        <?php 
    }
}
?>
</select>   
</div>
<div class="form-group">
<label for="">Jurusan Sesi 3</label>
<select name="id_jurusan[]"  class="custom-select" name="" id="sesi3">
<?php
foreach($fbj_28_3 as $major_value){
    $total_ticket = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$major_value['idJurusan'],'id_acara'=>$id_acara,'kelas'=>$kelas),'','','','ticket.id');
    $kuota = $major_value['kuota'];
    $sisa_kursi = $kuota-count($total_ticket);
    if (count($total_ticket)<$kuota)
    {
        ?>  
        <option value="<?= $major_value['idJurusan'] ?>"><?= $major_value['major']." (".$sisa_kursi.")" ?></option>
        <?php 
    }
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
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
        });
    });    

});

</script>