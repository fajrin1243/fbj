<div class="col-sm-12">
<form action="<?= base_url('index.php/main/save_major')?>" method="post">
<div class="form-group">
<label for="">Jurusan</label>
<select name="id_jurusan"  class="custom-select" name="" id="">
<?php
foreach($major as $major_value){
    ?>  
    <option value="<?= $major_value['id'] ?>"><?= $major_value['major'] ?></option>
    <?php 
}
?>
</select>   
</div>

<div class="form-group">
<label for="">Acara</label>
<select name="id_acara"  class="custom-select" name="" id="">
<?php
foreach($acara as $acara_value){
    ?>  
    <option value="<?= $acara_value['id'] ?>"><?= $acara_value['nama_acara'] ?></option>
    <?php 
}
?>
</select>   
</div>

<div class="form-group">
  <label for="">Pembicara</label>
  <input type="text" name="pembicara" id="" class="form-control" placeholder="Pembicara" required aria-describedby="helpId">
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
