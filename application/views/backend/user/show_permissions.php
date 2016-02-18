
<script type="text/javascript">
    $(document).ready(function () {
        $("#add_new").click(function () {
            $("#box_insert_new").show();
        });
    });
</script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#tb_mas_menu,#tb_permission_homepage').dataTable({
            //"sPaginationType" : "full_numbers",// แสดงตัวแบ่งหน้า
            //"bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            //"iDisplayLength": 20, // กำหนดค่า default ของจำนวน record
            //"sScrollY": "100px",
            "bFilter": false, // แสดง search box
            "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "sSearch": "ค้นหา :",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sLast": "หน้าสุดท้าย",
                    "sNext": "ถัดไป",
                    "sPrevious": "กลับ"
                }
            },
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>

<script type="text/javascript">
    function check_false(user_id, admin_menu_id) {
        var url = "<?= site_url('backend/users/add_permissions/') ?>";
        var data = {
            user_id: user_id,
            admin_menu_id: admin_menu_id
        };
        $.post(url, data,
                function (success) {
                    swal("Success", "", "success");
                    //window.location.reload();
                }
        );// Endpost
    }
</script>

<script type="text/javascript">
    function check_true(id) {
        var url = "<?= site_url('backend/users/del_permissions/') ?>";
        var data = {id: id};
        $.post(url, data,
                function (success) {
                    swal("Success", "", "success");
                    //window.location.reload();
                }
        );// Endpost
    }
</script>

<script type="text/javascript">

    function edit_user() {
        var url = "<?= site_url('backend/users/edit_user') ?>";
        var user_id = $("#user_id").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var name = $("#name").val();
        var lname = $("#lname").val();

        var data = {
            user_id: user_id,
            username: username,
            password: password,
            name: name,
            lname: lname
        };

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

</script>

<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

$list = array(
    array('url' => 'takmoph_admin', 'label' => 'เมนูหลัก'),
    array('url' => 'backend/users/show_user', 'label' => 'ผู้ใช้งาน')
);

$active = "แก้ไข";
echo $model->breadcrumb($list, $active);
?>

<br/>
<!-- Dialog Insert News -->

<h3><i class="fa fa-user"></i> <?= $user->name . ' ' . $user->lname ?></h3>
<hr/>

<div class="well" id="box_insert_new" style="margin-bottom:20px;">

    <label>ชื่อ</label>
    <input type="hidden" value="<?php echo $user->user_id; ?>" id="user_id" name="user_id" class="form-control"/>
    <input type="text" id="name" name="name" style="width:98%;" required="required" value="<?= $user->name ?>" class="form-control"/>
    <label>นามสกุล</label>
    <input type="text" id="lname" name="lname" style="width:98%;" required="required" value="<?= $user->lname ?>" class="form-control"/>
    <label>username</label>
    <input type="text" id="username" name="username" style="width:98%;" required="required" value="<?= $user->username ?>" class="form-control"/>
    <label>password</label>
    <input type="text" id="password" name="password" style="width:98%;" required="required" value="<?= $user->password ?>" class="form-control"/>
    <br/>
    <input type="button" class="btn btn-primary" value="แก้ไขข้อมูลผู้ใช้งาน" onclick="edit_user();"/>

</div>


<?php if ($user->status != 'S') { ?>

    <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-group"></i> <?php echo $head ?></h4>
                </div>
                <div class="panel-body">
                    <table width="100%" id="tb_mas_menu" class="table">
                        <thead>
                            <tr>
                                <th align="left" width="5%">#</th>
                                <th align="left">เมนู</th>
                                <th style=" text-align: center;">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($menu_admin->result() as $rs):
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td align="left"><?= $rs->admin_menu_name ?></td>
                                    <td style=" text-align: center;">
                                        <?php if ($rs->active == 1) { ?>
                                            <input type="checkbox" id="status_show"  checked="checked" onclick="return check_true('<?= $rs->id ?>');"/>
                                        <?php } else { ?>
                                            <input type="checkbox" id="status_noshow" onclick="return check_false('<?= $user->user_id ?>', '<?= $rs->admin_menu_id ?>');"/>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- End Col -->

        <div class="col-sm-12 col-md-6 col-lg-6">

            <!--
              ######### สิทธิ์การใช้งาน เมนู Homepage ###########
            -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-tasks"></i> สิทธิ์จัดการเมนูหน้าเว็บ</h4>
                </div>
                <div class="panel-body">
                    <table class="table" id="tb_permission_homepage">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>เมนู</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($permission_homepage->result() as $per):
                                $i++;
                                ?>
                                <tr>
                                    <td style="width:10%;"><?php echo $i; ?></td>
                                    <td><?php echo $per->title_name ?></td>
                                    <td style="text-align:center;">
                                        <?php if ($per->menu_active != '') { ?>
                                            <input type="checkbox" checked="checked" onclick="set_delete_homepage('<?php echo $per->permission_id ?>')"/>
                                        <?php } else { ?>
                                            <input type="checkbox" onclick="set_add_homepage('<?php echo $per->id ?>')"/>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- End Col -->

    </div> <!-- End Row -->
<?php } ?>

<script type="text/javascript">
    function set_add_homepage(homepage_id) {
        var url = "<?php echo site_url('backend/users/addpermission_homepage') ?>";
        var user_id = $("#user_id").val();
        var data = {
            user_id: user_id,
            homepage_id: homepage_id
        };

        $.post(url, data, function (success) {
            swal("Success", "", "success");
        });
    }

    function set_delete_homepage(id) {
        var url = "<?php echo site_url('backend/users/deletepermission_homepage') ?>";
        var data = {id: id};

        $.post(url, data, function (success) {
            swal("Success", "", "success");
        });
    }
</script>
