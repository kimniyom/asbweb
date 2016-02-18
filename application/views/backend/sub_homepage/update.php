<?php $path = base_url() . "assets/CK-Editor/"; ?>
<script src="<?= base_url() ?>assets/CK-Editor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //Modify By Kimniyom

        CKEDITOR.replace('detail', {
            baseUrl: 'http://localhost/takmoph2015upgrad/EDITOR_FILE/',
            //baseDir = 'd:\inetpub\wwwroot\www.yourdomain.com\website\assets\images\',
            language: 'th',
            height: 500,
            uiColor: '#FFFFFF',
            removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools,find',
            removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Editing,Templates,Preview,NewPage,Source,Save,Scayt,About',
            filebrowserBrowseUrl: '<?php echo $path; ?>ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '<?php echo $path; ?>ckfinder/ckfinder.html?Type=Images',
            //filebrowserFlashBrowseUrl: '<?//php echo $path; ?>ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl: '<?php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '<?php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                    //filebrowserFlashUploadUrl: '<?//php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
    });

    function Save_update() {
        var url = "<?php echo site_url('backend/sub_homepage/save_update') ?>";
        var title = $("#title").val();
        var detail = CKEDITOR.instances.detail.getData();
        var id = "<?php echo $result->id ?>";

        if (title == '' || detail == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }
        var data = {
            id: id,
            title: title,
            detail: detail
        };
        $.post(url, data, function (success) {
            window.location = "<?php echo site_url() ?>/backend/sub_homepage/view/" + id;
        });
    }
</script>
<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

$list = array(
    array('url' => 'backend/homepage', 'label' => 'ตัวอย่าง'),
    array('url' => 'backend/sub_homepage/all/' . $result->homepage_id, 'label' => $result->title_name)
);

$active = "update";
//$list = "";
echo $model->breadcrumb($list, $active);
?>
<h3>
    <i class="fa fa-newspaper-o"></i> 
    <?php
    $text = strlen($result->title);
    if ($text > 250) {
        //echo iconv_substr($news->titel,'0','100')."...";
        print mb_substr($result->title, 0, 50, 'UTF-8') . "...";
    } else {
        echo $result->title;
    }
    ?>

</h3>
<hr/>

<div class="form-group">
    <label>เรื่อง</label>
    <input type="text" class="form-control" id="title" value="<?php echo $result->title ?>"/>
    <label>รายละเอียด</label>
    <textarea id="detail" class="form-control"><?php echo $result->detail ?></textarea>
    <hr/>
    <button type="button" class="btn btn-primary" onclick="Save_update()">บันทึกข้อมูล</button>
</div>