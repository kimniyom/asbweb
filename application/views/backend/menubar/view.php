
<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

$list = array(
    array('url' => 'backend/menubar', 'label' => 'MenuBar'),
        //array('url' => '', 'label' => 'menu2')
);

$active = $head;
//$list = "";
echo $model->breadcrumb($list, $active);
?>
<h3><i class="fa fa-magic"></i> <?php echo $head ?></h3>
<hr/>
<a href="<?php echo site_url('backend/menubar/update/'.$page->id)?>">
  <button type="button" class="btn btn-default"><i class="fa fa-pencil text-warning"></i></button></a>
<button type="button" class="btn btn-default"
  onclick="delete_page('<?php echo $page->id?>')"><i class="fa fa-trash text-danger"></i></button>
<h4><?php echo $page->title ?></h4>
<?php echo $page->page ?>

<script type="text/javascript">
    function delete_page(id){
      var r = confirm("คุณแน่ใจหรือไม่ที่จะลบ ...");
      if(r == true){
        var url = "<?php echo site_url('backend/menubar/delete')?>";
        var data = {id: id};
        $.post(url,data,function(success){
            window.location="<?php echo site_url('backend/menubar')?>";
        });
      }
    }
</script>
