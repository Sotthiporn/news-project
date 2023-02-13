<?php 
    require 'portal/header.admin.view.php';  
    $cate = $class->get_cate_on_form();
    foreach ($slide_data as $key => $val) {
    }
?>
    
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Add new slide</h1>
        <form action="/admin/add-slide-data" method="post" class="upl">
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $val->id+1 ?>" readonly>
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
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="txt-title" id="txt-title" require>
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= $val->id+1 ?>" require>
            </div>
            <div class="form-group">
                <label>Status(1=Enable,2=Disable)</label>
                <select class="form-control" name="txt-status" id="txt-status" require>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div><label>Photo</label></div>
            <div class="form-group img-box">
                <input type="file" name="txt-file" id="txt-file">
                <input type="hidden" name="txt-photo" id="txt-photo">
            </div>
            <div style="float: right;">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin/slide"><button type="button" class="btn btn-danger">Cancel</button></a>
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
                url:'/admin/upl-img-slide',
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
                imgBox.css({'background-image':'url(/public/img/upload/slide/'+data.imgName+')'});
                imgBox.find('.loading-img').remove();
                eThis.parent().find('#txt-photo').val(data.imgName);
                }
            });
    });
});
</script>