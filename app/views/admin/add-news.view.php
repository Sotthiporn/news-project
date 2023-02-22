<?php 
    require 'portal/header.admin.view.php';  
    $categoryController = new CategoryController();
    $cate = $categoryController->get_cate_on_form();
?>
    
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Add new News</h1>
        <form action="/admin/add-news-data" method="post" class="upl">
            <div class="form-group">
                <label>Category *</label>
                <select class="form-control" name="txt-cate" id="txt-cate" required>
                    <option value="0">---Choose category---</option>
                    <?php
                        foreach ($cate as $key => $row) {
                            ?>
                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Title *</label>
                <input type="text" class="form-control" name="txt-title" id="txt-title" required>
            </div>
            <div class="form-group">
                <label>Description *</label>
               <textarea class="form-control" name="txt-des" id="txt-des"></textarea>
            </div>
            <div class="form-group">
                <label>Location *</label>
                <select class="form-control" name="txt-location" id="txt-location" required>
                    <option value="1">General</option>
                    <option value="2">News by category</option>
                </select>
            </div>
            <div class="form-group">
                <label>Order *</label>
                <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= isset($news_data[0]->od) ? $news_data[0]->od+1 : 0 ?>" required>
            </div>
            <div class="form-group">
                <label>Status *</label>
                <select class="form-control" name="txt-status" id="txt-status" required>
                    <option value="1">Enable</option>
                    <option value="2">Disable</option>
                </select>
            </div>
            <div><label>Photo *</label></div>
            <div class="form-group img-box">
                <input type="file" name="txt-file" id="txt-file">
                <input type="hidden" name="txt-photo" id="txt-photo" required>
            </div>
            <div style="float: right;">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin/news"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
        </form>
    </div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
$(document).ready(function(){
  var body = $('body');
    
    //upload img
    body.on('change','#txt-file',function(){
            var loading='<div class="loading-img"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';
            var eThis = $(this);
            var imgBox = $('.img-box');
            var photo =$('#txt-photo');
            var frm = eThis.closest('form.upl');
            var frm_data= new FormData(frm[0]);
            $.ajax({
                url:'/admin/upl-img-news',
                type:'POST',
                data:frm_data,
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                beforeSend:function(){
                imgBox.append(loading);
                },
                success:function(data){
                imgBox.css({'background-image':'url(<?php echo $BASE_URL; ?>/public/img/upload/news/'+data.imgName+')'});
                imgBox.find('.loading-img').remove();
                eThis.parent().find('#txt-photo').val(data.imgName);
                }
            });
    });

    //text editor for description textarea
    tinymce.triggerSave();
    calleditor();
    function calleditor(){
      tinymce.remove();
      tinymce.init({selector:"textarea",theme: "modern",width: "760",height:"300",relative_urls: false, remove_script_host: false,
      file_browser_callback:function(field_name, url, type, win){
      var filebrowser = "/public/js/filebrowser.php";
      filebrowser += (filebrowser.indexOf("?") < 0) ? "?type=" + type : "&type=" + type;
      tinymce.activeEditor.windowManager.open({
      title : "Insert Photo",
      width : 560,
      height : 500,
      url : filebrowser
      }, {
      window : win,
      input : field_name
      });
      return false;
      },
      plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern imagetools media code",  
      ],
      menubar:true,toolbar1: "undo redo | insert | sizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
      toolbar2:"fontselect | fontsizeselect | forecolor media code",
      });
      }
});
</script>