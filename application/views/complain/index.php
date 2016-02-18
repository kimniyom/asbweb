<?php $path = base_url() . "assets/CK-Editor/"; ?>
<script src="<?= base_url() ?>assets/CK-Editor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        CKEDITOR.replace('detail_complain', {
            //filebrowserBrowseUrl: '<?//php echo $path; ?>ckfinder/ckfinder.html',
            //filebrowserImageBrowseUrl: '<?//php echo $path; ?>ckfinder/ckfinder.html?Type=Images',
            filebrowserUploadUrl: '<?php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '<?php echo $path; ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    });
</script>

<script type="text/javascript">
    function Send_complain() {
        var detail_complain = CKEDITOR.instances.detail_complain.getData();
        var url = "<?php echo site_url('complain/send_complain'); ?>";
        var name = $("#name").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var card = $("#card").val();
        var head_complain = $("#head_complain").val();
        var captcha = $("#captcha").val();
        var word = "<?php echo $word ?>";
        var detail = detail_complain;

        var data = {
            name: name,
            email: email,
            card: card,
            tel: tel,
            head_complain: head_complain,
            detail: detail
        };

        if (name == '' || email == '' || card == '' || head_complain == '' || detail == '') {
            alert("ท่านกรอกข้อมูลไม่ครบ ...");
            return false;
        }

        if (card.length != 13) {
            alert("เลขบัตรประชาชนไม่ถูกต้อง");
            return false;
        }

        if (captcha != word) {
            alert("กรอกรหัสภาพไม่ถูกต้อง");
            return false;
        }

        $.post(url, data, function (success) {
            window.location = "<?php echo site_url('complain/success') ?>";
        });

    }

    function CheckNum() {
        if (event.keyCode < 48 || event.keyCode > 57) {
            event.returnValue = false;
        }
    }
</script>

<h1><?php echo $head; ?></h1>
<div class="alert alert-danger">
    กรุณากรอกข้อมูลที่เป็นจริงเท่านั้น เพื่อประโยชน์แก่ตัวท่านเอง
</div>
<div class="well">
    <label>ชื่อผู้ร้องเรียน</label>
    <input type="text" id="name" style="width: 98%;"/>
    <label>อีเมล์ผู้ร้องเรียน</label>
    <input type="email" id="email" style="width: 98%;"/>
    <label>เลขบัตรประชาชน</label>
    <input type="text" id="card" style="width: 98%;" onkeypress="CheckNum();"/>
    <label>เบอร์โทรศัพท์</label>
    <input type="text" id="card" style="width: 98%;" onkeypress="CheckNum();"/>
    <label>หัวข้อร้องเรียน</label>
    <input type="text" id="head_complain" style="width: 98%;"/>
    <label>รายละเอียด</label>
    <textarea id="detail_complain" name="detail_complain" class="detail_complain"  rows="10" style="width: 98%;"></textarea>
    <label>พิมพ์ตัวอักษรที่เห็นในรูปด้านล่าง</label>
    <input type="text" name="captcha" id="captcha" value="" /><br/>
    <img src="<?php echo base_url(); ?>captcha/<?php echo $images . ".jpg"; ?>"/><br/><br/>
    <div class="btn btn-primary" onclick="Send_complain();">ส่งเรื่องร้องเรียน</div>
</div>