<script type="text/javascript">
    function delete_complain(id) {
        var url = "<?php echo site_url('complain/delet') ?>";
        var data = {id: id};

        var r = confirm("คถณต้องการลบข้อมูลนี้ ใช่ หรือ ไม่");
        if (r == true) {
            $.post(url, data, function (success) {
                window.location = "<?php echo site_url('complain/view') ?>";
            });
        }
    }
</script>

<ul class="breadcrumb">
    <li><a href="<?php echo site_url('complain/view') ?>"><i class="icon icon-home"></i> หน้าร้องเรียน</a> <span class="divider">/</span></li>
    <li class="active">รายละเอียด</li>
</ul>

<p style="font-size: 25px; font-weight: normal; margin-bottom: 15px;"><?php echo $head; ?></p>
<div class="well" style=" position: relative; background: #FFF;">
    <div class="btn btn-default btn-sm" style=" position: absolute; top: 5px; right: 5px;"
         onclick="delete_complain('<?php echo $complain->id ?>');">
        <i class="icon icon-trash"></i>
    </div>
    <h3>
        <?php echo $complain->head_complain; ?>
    </h3>
    <hr>
    <?php echo $complain->detail; ?>
    <br/>
    <hr>
    <div class="alert alert-danger">
        ผู้ร้องเรียน : <?php echo $complain->name; ?> | 
        เวลา : <?php echo $this->tak->thaidate($complain->d_update); ?> | 
        IP : <?php echo $complain->ip; ?><br/>
    </div>
</div>