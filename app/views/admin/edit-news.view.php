<?php 
    require 'portal/header.admin.view.php';  
    $cate = $class->get_cate_on_form();
    foreach ($news_data as $key => $val) {
    }
?>
    
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Edit News</h1>
        <form action="/admin/update-news?id=<?= $val->id ?>" method="post" class="upl">
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $val->id ?>" readonly>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="txt-cate" id="txt-cate" require>
                    <option value="0">---Choose category---</option>
                    <?php
                        foreach ($cate as $key => $row) {
                            ?>
                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php
                        }
                    ?>
                </select>
                <input type="hidden" class="form-control" name="txt-cate-val" id="txt-cate-val" value="<?= $val->cate_id ?>">                
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="txt-title" id="txt-title" value="<?= $val->title ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
               <textarea class="form-control" name="txt-des" id="txt-des"></textarea>
            </div>
            <input type="hidden" class="form-control" name="txt-des-val" id="txt-des-val" value='<?= $val->des ?>'>
            <div class="form-group">
                <label>Location</label>
                <select class="form-control" name="txt-location" id="txt-location" require>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="hidden" class="form-control" name="txt-location-val" id="txt-location-val" value="<?= $val->location ?>">
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= $val->od ?>">
            </div>
            <div class="form-group">
                <label>Status(1=Enable,2=Disable)</label>
                <select class="form-control" name="txt-status" id="txt-status" require>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="hidden" class="form-control" name="txt-status-val" id="txt-status-val" value="<?= $val->status ?>">
            </div>
            <div><label>Photo</label></div>
            <div class="form-group img-box" style="background-image: url(/public/img/upload/news/<?= $val->img ?>);">
                <input type="file" name="txt-file" id="txt-file">
                <input type="hidden" name="txt-photo" id="txt-photo" value="<?= $val->img ?>">
            </div>
            <div style="float: right;">
            <button type="submit" class="btn btn-primary btn-edit-news">Update</button>
            <a href="/admin/news"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
        </form>
    </div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
$(document).ready(function(){
    var body = $('body');
    var photo = $('#txt-photo');
    var imgBox = $('.img-box');
    var cate_val = $('#txt-cate-val').val();
    var location_val = $('#txt-location-val').val();
    var des_val = $('#txt-des-val').val();
    var status_val = $('#txt-status-val').val();

    //upload img
    body.on('change','#txt-file',function(){
            var loading='<div class="loading-img"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';
            var eThis = $(this);
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
                imgBox.css({'background-image':'url(/public/img/upload/news/'+data.imgName+')'});
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

    
    $('#txt-cate').val(cate_val);
    $('#txt-location').val(location_val);
    $('#txt-status').val(status_val);
    $('#txt-des').html(des_val);

});
</script>