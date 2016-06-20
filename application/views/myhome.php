<style type="text/css">
    #box_new{ padding:0px 0px 0px 0px; background:#FFF;}
    h3{text-shadow: 0 1px 0 rgba(255, 255, 255, 0.4); color: #002166;}
</style>

<?php
$this->load->library("takmoph_libraries");

$this->load->model('photo_model');
$libraries = new takmoph_libraries();

$style = $this->menubar_model->get_style();
?>

<!--
 ########### HomePage ################
-->
<div class="box_homepage">
    <div class="container" id="set_homepage">
        <div id="homepage"></div>
    </div>
</div>

<script type="text/javascript">
    loadhomepage();
    $(document).ready(function () {
        $("#myCarousel").show();//Set Banner Show
        $("#menu_and_news").show();
        $("#main-album").show();
        $("#main-menu-system").show();
        $("#controlmenu").show();
        $("#controlnewhot").show();
        $("#controlnew").show();
        $(".BL").show();
    });

    function loadhomepage() {
        var url = "<?php echo site_url('homepage/index') ?>";
        var data = {a: 1};
        $.post(url, data, function (success) {
            $("#homepage").html(success);
        });

    }
</script>
