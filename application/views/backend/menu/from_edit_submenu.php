<style type="text/css">
    .t_box{ width:97%;}
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $("#save_edit_submenu").click(function () {
            //alert("1234");
            var url = "<?= site_url('menager_menu/save_edit_submenu') ?>";
            var sub_id = $("#_sub_id").val();
            var sub_name = $("#_sub_name").val();
            var data = {sub_id: sub_id, sub_name: sub_name};
            $.post(url, data,
                    function (success) {
                        window.location.reload();
                    });// Endpost
        });
    });
</script>

<div class="form-group">
    <label>รหัส :</label>
    <input type="text" id="_sub_id" value="<?= $mas_menu->sub_id ?>" readonly="readonly" class="form-control input-sm"/>
</div>
<div class="form-group">
    <label>เมนู :</label>
    <input type="text" id="_sub_name" value="<?= $mas_menu->sub_name ?>" class="form-control input-sm"/>
</div>
