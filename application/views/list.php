<div class="col-sm-12">
<div id ="test">
<div class="row">
<div class="col-sm-4">
<?php

foreach($fbj_28_1 as $value){
    
    ?>
    <div class="ticketing" style="background-color:#ffaf40;color:white">
    <p><?= $value['major']?></p>
    <?php
    $total_ticket = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$value['idJurusan'],'id_acara'=>$id_acara,'kelas'=>$kelas),'','','','ticket.id');
    echo "<p>".count($total_ticket)."/".$value['kuota']."</p>";
    ?>
    </div>
    <?php
}
?>
</div>
<div class="col-sm-4">
<?php
foreach($fbj_28_2 as $value){
    ?>
    <div class="ticketing" style="background-color:#ff3838;color:white">
    <p><?= $value['major']?></p>
    <?php
    $total_ticket = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$value['idJurusan'],'id_acara'=>$id_acara,'kelas'=>$kelas),'','','','ticket.id');
    echo "<p>".count($total_ticket)."/".$value['kuota']."</p>";
    ?>
    </div>
    <?php
}
?>
</div>
<div class="col-sm-4">
<?php
foreach($fbj_28_3 as $value){
    ?>
    <div class="ticketing" style="background-color:#17c0eb;color:white">
    <p><?= $value['major']?></p>
    <?php
    $total_ticket = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$value['idJurusan'],'id_acara'=>$id_acara,'kelas'=>$kelas),'','','','ticket.id');
    echo "<p>".count($total_ticket)."/".$value['kuota']."</p>";
    ?>
    </div>
    <?php
}
?>
</div>
</div> 
</div> 
</div>

<script>
// $(document).ready(
    //         function() {
        //                 setInterval(function() {
            //                         $('#test').load('<?= base_url('index.php/main/lists') ?>');
            //                     }, 5000);
            //                 });
            </script>