
<?php $path = base_url() . "assets/CK-Editor/"; ?>

<input type="hidden" id="_group_id" name="_group_id" value="<?= $groupnews->id ?>"/>
<label>ชื่อกลุ่ม</label>
<input type="text" id="_groupname" name="_groupname" style="width:98%;" class="form-control input-mini" required="required" value="<?= $groupnews->groupname ?>"/>

<script type="text/javascript">
    function edit_groupnews() {

        var data = {
            id: $("#_group_id").val(),
            groupname: $("#_groupname").val()
        };

        $.ajax({
            type: "POST",
            url: "<?= site_url('backend/groupnews/save_update') ?>",
            data: data,
            success: function () {
                window.location.reload();
            }
        });
    }

</script>