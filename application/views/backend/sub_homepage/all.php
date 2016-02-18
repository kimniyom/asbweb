<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

$list = array(
    array('url' => 'backend/homepage', 'label' => 'ตัวอย่าง'),
        //array('url' => '', 'label' => 'menu2')
);

$active = $head;
//$list = "";
echo $model->breadcrumb($list, $active);
?>
<h3><i class="fa fa-newspaper-o"></i> <?php echo $head ?></h3>
<hr/>

<table class="table table-striped" id="tb_subhome">
    <thead>
        <tr>
            <th>#</th>
            <th>เรื่อง</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($result->result() as $rs):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $model->thaidate($rs->create_date) ?> <?php echo $rs->title; ?></td>
                <td style=" text-align: right; width: 15%;">
                    <a href="<?php echo site_url('backend/sub_homepage/view/' . $rs->id) ?>">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye text-info"></i></button></a>
                        <?php if($rs->owner == $this->session->userdata('user_id') || $this->session->userdata('status') == 'S'){?>
                    <a href="<?php echo site_url('backend/sub_homepage/update/' . $rs->id) ?>">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil text-warning"></i></button></a>
                    <button type="button" class="btn btn-default btn-sm" onclick="delete_subhomepage('<?php echo $rs->id ?>')"><i class="fa fa-trash text-danger"></i></button>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    function delete_subhomepage(Id) {
        var r = confirm("คุณต้องการลบข้อมูลใช่ หรือ ไม่ ...?");
        if (r == true) {
            var url = "<?php echo site_url('backend/sub_homepage/delete') ?>";
            var data = {id: Id};

            $.post(url, data, function (success) {
                window.location.reload();
            });
        }
    }
</script>
