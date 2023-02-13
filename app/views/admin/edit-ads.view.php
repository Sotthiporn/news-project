<?php 
    require 'portal/header.admin.view.php'; 
?>
    
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Edit slide</h1>
        <form method="post" class="upl">
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $val->id ?>" readonly>
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" class="form-control" name="txt-url" id="txt-url" value='<?= $val->url ?>'>
            </div>
            <div class="form-group">
                <label>Location</label>
                <select class="form-control" name="txt-location" id="txt-location" require>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <input type="hidden" name="txt-location-val" id="txt-location-val" value="<?= $val->location ?>">
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="txt-type" id="txt-type" require>
                    <option value="Photo">Photo</option>
                    <option value="Video">Video</option>
                </select>
                <input type="hidden" name="txt-type-val" id="txt-type-val" value="<?= $val->type ?>">
            </div>
            <div class="form-group">
                <label>Status(1=Enable,2=Disable)</label>
                <select class="form-control" name="txt-status" id="txt-status" require>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="hidden" name="txt-status-val" id="txt-status-val" value="<?= $val->status ?>">
            </div>
            <div><label>Photo</label></div>
            <div class="form-group img-box" style="background-image: url(/public/img/upload/ads/<?= $val->img ?>);">
                <input type="file" name="txt-file" id="txt-file">
                <input type="hidden" name="txt-photo" id="txt-photo" value="<?= $val->img ?>">
            </div>
            <div style="float: right;">
            <button type="submit" class="btn btn-primary btn-edit-ads">Update</button>
            <a href="/admin/ads"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
        </form>
    </div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
$(document).ready(function(){
    var body = $('body');
    var photo = $('#txt-photo');
    var imgBox = $('.img-box');
    var location_val = $('#txt-location-val').val();
    var type_val = $('#txt-type-val').val();
    var status_val = $('#txt-status-val').val();

    $('.btn-edit-ads').click(function(){
        var id = $('#txt-id').val();
        var url = $('#txt-url').val();
        var photo = $('#txt-photo').val();
        var location = $('#txt-location').val();
        var type = $('#txt-type').val();
        var status = $('#txt-status').val();
       
        $.ajax({
            url: "/admin/update-ads?id=" + <?php echo $val->id ?>,
            type: "POST",
            data: {
                url:url,
                photo:photo,
                location:location,
                type:type,
                status:status
            },
            success:function(result){
                var message = JSON.parse(result);
                if(message.message == "updated_success"){
                    alert("Your data has been updated!");
                    window.location.href = "/admin/ads";
                }else{
                    alert("somthing went wrong please try again later!");
                }
            },
            error: function(){
                alert("somthing went wrong please try again later!");
            }
        });
    });

    //upload img
    body.on('change','#txt-file',function(){
            var loading='<div class="loading-img"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';
            var eThis = $(this);
            var frm = eThis.closest('form.upl');
            var frm_data= new FormData(frm[0]);
            $.ajax({
                url:'/admin/upl-img-ads',
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
                imgBox.css({'background-image':'url(/public/img/upload/ads/'+data.imgName+')'});
                imgBox.find('.loading-img').remove();
                eThis.parent().find('#txt-photo').val(data.imgName);
                }
            });
    });

    $('#txt-location').val(location_val);
    $('#txt-type').val(type_val);
    $('#txt-status').val(status_val);

});
</script>