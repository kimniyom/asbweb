<?php $path = base_url() . "assets/CK-Editor/"; ?>
<script src="<?= base_url() ?>assets/CK-Editor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //Modify By Kimniyom
        var admin = "<?php echo $this->session->userdata('status')?>";
        if(admin == "S"){
          CKEDITOR.replace('detail', {
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
        } else {
          CKEDITOR.replace('detail', {
              language: 'th',
              height: 500,
              uiColor: '#FFFFFF',
              removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools,find',
              removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Editing,Templates,Preview,NewPage,Source,Save,Scayt,About',
              /*
              filebrowserBrowseUrl: '<?//php echo $path; ?>ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl: '<?//php echo $path; ?>ckfinder/ckfinder.html?Type=Images',
              */
              //filebrowserFlashBrowseUrl: '<?//php echo $path; ?>ckfinder/ckfinder.html?Type=Flash',
              filebrowserUploadUrl: '<?php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
              filebrowserImageUploadUrl: '<?php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                      //filebrowserFlashUploadUrl: '<?//php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
          });
        }

    });
    function Save_subhomepage() {
        var url = "<?php echo site_url('backend/sub_homepage/save_subhomepage') ?>";
        var title = $("#title").val();
        var detail = CKEDITOR.instances.detail.getData();
        var homepage_id = "<?php echo $menu->id ?>";
        if (title == '' || detail == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }
        var data = {
            title: title,
            detail: detail,
            homepage_id: homepage_id
        };
        $.post(url, data, function (success) {
            window.location = "<?php echo site_url() ?>/backend/homepage";
        });
    }
</script>

<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

$list = array(
    array('url' => 'backend/homepage', 'label' => 'ตัวอย่าง'),
        //array('url' => '', 'label' => 'menu2')
);

$active = $head;
//$list = "";
echo $model->breadcrumb_backend($list, $active);
?>
<h3><i class="fa fa-newspaper-o"></i> <?php echo $head ?></h3>
<hr/>
<div class="form-group">
    <label>เรื่อง</label>
    <input type="text" class="form-control" id="title"/>
    <label>รายละเอียด</label>
    <textarea id="detail" class="form-control"></textarea>
    <hr/>
    <button type="button" class="btn btn-primary" onclick="Save_subhomepage()">บันทึกข้อมูล</button>
</div>
