<meta charset="UTF-8"/>
<script src="<?php echo base_url() ?>js/jquery-1.11.3.min.js" type="text/javascript"></script>

<!-- Bootstrap 3-->
<link href="<?php echo base_url() ?>themes/2016/css/bootstrap-superhero.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>themes/2016/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>js/login.js" type="text/javascript"></script>

<!-- Icon aware-some -->
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />

<!-- sweet-alert-->
<link href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.min.js" type="text/javascript"></script>

<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" id="dialog-login" data-backdrop="static" style="margin-top:10%;">
        <div class="modal-dialog">
            <div class="modal-content" style="box-shadow:none;">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-group"></i> Admin login</h4>
                </div>
                <div class="modal-body">
                    <form class="form-group">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount"></label>
                            <div class="input-group">
                                <div class="input-group-addon">Username</div>
                                <input type="text" class="form-control" id="username" placeholder="Username">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount"></label>
                            <div class="input-group">
                                <div class="input-group-addon">Password</div>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                <div class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="do_login()"><i class="fa fa-sign-in"></i> login</button>
                </div>
            </div><!-- /.modal-content -->
            <br/>
            <center>
              <font style=" font-size:12px;">
              &copy <?php echo date('Y')?> The Assembler Themes.<br/>
              <a href="<?php echo site_url('')?>"><i class="fa fa-home"></i> Home</a> | <a href="http://www.theassembler.net" target="_blank">www.theassembler.net</a>
            </font>
          </center>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>"/>
<input type="hidden" id="status" value="<?php echo $this->session->userdata('status'); ?>"/>
<script type="text/javascript">
    $(document).ready(function () {
        $("#dialog-login").modal();
    });

    check_user();
    function check_user() {
        var status = $("#status").val();
        if (status != '') {
            window.location = "<?php echo site_url('takmoph_admin') ?>";
        }
    }

</script>
