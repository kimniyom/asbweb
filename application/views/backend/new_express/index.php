   
<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();
/*
  $list = array(
  array('url' => '', 'label' => 'menu1'),
  array('url' => '', 'label' => 'menu2')
  );
 * 
 */
$active = $head;
$list = "";
echo $model->breadcrumb($list, $active);
?>
<h3><i class="fa fa-newspaper-o"></i> <?php echo $head ?></h3>
<hr/>
<p>
    <a href="<?php echo site_url('backend/newexpress/create') ?>">
        <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> สร้างข่าวด่วน</button>
    </a>
</p>
<table class="table" id="tb_news_express">
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
        foreach ($express->result() as $rs):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rs->title; ?> <font style="color:red;">(<?php echo $rs->create_date ?>)</font></td>
                <td>
                    <a href="<?php echo site_url('backend/newexpress/view/' . $rs->id) ?>" title="ราละเอียด">
                        <i class="fa fa-eye text-info"></i></a>
                    <a href="<?php echo site_url('backend/newexpress/update/' . $rs->id) ?>" title="แก้ไข">
                        <i class="fa fa-pencil text-primary"></i></a>
                    <a href="javascript:delete_express('<?php echo $rs->id ?>')" title="ลบ">
                        <i class="fa fa-trash text-danger"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_news_express").dataTable();
    });
    function delete_express(id) {
        var r = confirm("คุณต้องการลบ ใช่ หรือ ไม่ ...");
        if (r == true) {
            var url = "<?php echo site_url('backend/newexpress/delete') ?>";
            var data = {id: id};

            $.post(url, data, function (success) {
                window.location = "<?php echo site_url() ?>/backend/newexpress";
            });
        }
    }
</script>