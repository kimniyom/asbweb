<!-- ScriptUpload By Uploadify -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#file_upload').uploadify({
            'buttonText': 'กรุณาเลือกรูปภาพ ...',
            'auto': true, //เปิดใช้การอัพโหลดแบบอัติโนมัติ
            'swf': '<?= base_url() ?>lib/images/uploadify.swf', //โฟเดอร์ที่เก็บไฟล์ปุ่มอัพโหลด
            'uploader': '<?= site_url('backend/menubar/upload_logo/') ?>', //เมื่อ submit แล้วให้ action ไปที่ไฟล์ไหน
            'fileSizeLimit': '2MB', //อัพโหลดได้ครั้งละไม่เกิน 1024kb
            //'width': '350',
            //'height': '40',
            'fileTypeExts': '*.gif; *.jpg; *.png; *.JPG;', //กำหนดชนิดของไฟล์ที่สามารถอัพโหลดได้
            'multi': false, //เปิดใช้งานการอัพโหลดแบบหลายไฟล์ในครั้งเดียว
            'queueSizeLimit': 1, //อัพโหลดได้ครั้งละ 5 ไฟล์
            'onUploadComplete': function (success) { //เมื่ออัพโหลดเสร็จแล้วให้เรียกใช้งาน function load()
                window.location.reload();
            }
        });
    });

</script>

<?php
$this->load->library('takmoph_libraries');
$this->load->model('homepage_model');
$this->load->model('sub_homepage_model');
$model = new takmoph_libraries();
$navbarModel = new menubar_model();
$homepage = new homepage_model();
$sub_homepage = new sub_homepage_model();
$mas_homepage = $homepage->get_menu();

$list = array(
    array('url' => 'takmoph_admin', 'label' => 'เมนูหลัก'),
        //array('url' => '', 'label' => 'menu2')
);

$active = $head;
?>


<div class="row" style=" margin: 0px; padding: 0px;">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
        <h3 id="head_submenu"><i class="fa fa-magic"></i> <?php echo $head ?></h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
        <?php echo $model->breadcrumb($list, $active); ?>
    </div>
</div>

<hr id="hr"/>
<br/>
อัพโหลดได้ไม่เกินครั้งละ 2MB,<br/>
อัพโหลดได้ไม่เกินครั้งละ 1 ไฟล์
<br /><br />
<form>
    <div id="queue"></div>
    <div style="width:350px;">
        <input id="file_upload" name="file_upload" type="file" multiple>
    </div>
</form><br />

<label>ภาพพื้นหลัง</label><br/>
<img src="<?php echo base_url()?>upload_images/logo/<?php echo $style->logo ?>" class="img-responsive" style="max-width:200px;"/>
