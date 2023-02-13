<style>
	.fichero{
	border:1px solid #D5D5D5;
	float:left;
	padding:0px;
	margin:2px;
	cursor:pointer;
	position:relative;
	}
	.fichero img{
		width:100px;
		height:100px;
	}
	.holdup{
		position:absolute;
		background:rgba(0,0,0,0.2);
		width:100px;
		height:100px;
		top:0px;
		visibility:hidden;
	}
	.fichero:hover .holdup{
		visibility:visible;
	}
	
</style>
<?php 
include('~/_config_inc.php');
$BASE_URL=BASE_URL;

$dir =BASE_PATH."public/img/upload/news";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.*"))), SORT_DESC, $files);
foreach($files as $filename)
{
?>	
	<div class='fichero' data-src="<?php echo $BASE_URL; ?>public/img/upload/news/<?php echo $filename; ?>">
		<img src="<?php echo $BASE_URL; ?>public/img/upload/news/<?php echo $filename; ?>" />
	<div class='holdup'></div></div>
<?php
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).on("click","div.fichero",function(){
  item_url = $(this).data("src");
  var args = top.tinymce.activeEditor.windowManager.getParams();
  win = (args.window);
  input = (args.input);
  win.document.getElementById(input).value = item_url;
  top.tinymce.activeEditor.windowManager.close();	
});
</script>