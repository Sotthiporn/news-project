<?php

class AdminController{

    //category
    public function index(){
        //get category data into tbl
        $cate_data = App::get('database')->getAll_tbl('tbl_category','id>0','id DESC');
        return view_admin('admin', ['cate_data' => $cate_data]);   
    }
    public function get_add_cate(){
         //get category autoid and form add
        $cate_data = App::get('database')->getAll_tbl('tbl_category','id>0','id');
        return view_admin('add-cate', ['cate_data' => $cate_data]);
    }
    public function add_cate_data(){
        $query = "insert into tbl_category (name,od,status) values
        (?,?,?)";

        $insert = App::get('connection')->prepare($query);

        $input = $_POST;
        $insert->execute([
            $input['txt-name'],
            $input['txt-od'],
            $input['txt-status']
        ]);

        return redirect('/admin');
    }
    public function get_edit_cate(){
         //get category form edit
        $id= $_GET['id'];
        $cate_data = App::get('database')->getAll_tbl('tbl_category','id='.$id.'','id DESC');
        return view_admin('edit-cate', ['cate_data' => $cate_data]);
    }
    public function update_cate(){
        //update category data
        $id = $_GET['id'];
        $name = $_POST['name'];
        $od = $_POST['od'];
        $status = $_POST['status'];

        $query = "update tbl_category set name = ?, od = ?,status = ? where id = ?";
        
        $update = App::get('connection')->prepare($query);
        
        $update->execute([
           $name,
           $od,
           $status,
           $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_cate(){
        //delete category data
        $query = "delete  from tbl_category where id = :id";
        
        $delete = App::get('connection')->prepare($query);
        
        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function get_cate_on_form(){
        //get category id & name into option category on form add
       $cate_data = App::get('database')->getAll_tbl('tbl_category','id>0','id');
       return $cate_data;
   }
  

    //slide
    public function slide(){
        //get slide data into tbl
        $slide_data = App::get('database')->getAll_tbl_multi('tbl_slide.*,tbl_category.id,tbl_category.name','tbl_slide INNER JOIN tbl_category','tbl_slide.cate_id = tbl_category.id','tbl_slide.id DESC');
        return view_admin('slide', ['slide_data' => $slide_data]);   
    }
    public function get_add_slide(){
         //get slide autoid and form add
        $slide_data = App::get('database')->getAll_tbl('tbl_slide','id>0','id');
        return view_admin('add-slide', ['slide_data' => $slide_data]);
    }
    public function add_slide_data(){
        $query = "insert into tbl_slide (title,img,od,cate_id,status) values
        (?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);
        $input = $_POST;
        
        if( $input['txt-cate'] == 0){
            return redirect('/admin/add-slide');
        }else{
            $insert->execute([
                $input['txt-title'],
                $input['txt-photo'],
                $input['txt-od'],
                $input['txt-cate'],
                $input['txt-status']
            ]);
            return redirect('/admin/slide');
        }
        
    }
    public function get_edit_slide(){
         //get slide form edit
        $id= $_GET['id'];
        $slide_data = App::get('database')->getAll_tbl('tbl_slide','id='.$id.'','id DESC');
        return view_admin('edit-slide', ['slide_data' => $slide_data]);
    }
    public function update_slide(){
        //update slide data
        $id = $_GET['id'];
        $title = $_POST['title'];
        $photo = $_POST['photo'];
        $od = $_POST['od'];
        $cate_id = $_POST['cate_id'];
        $status = $_POST['status'];

        $query = "update tbl_slide set title = ?, img = ?, od = ?, cate_id = ?,status = ? where id = ?";
        
        $update = App::get('connection')->prepare($query);
        
        $update->execute([
           $title,
           $photo,
           $od,
           $cate_id,
           $status,
           $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_slide(){
        //delete slide data
        $query = "delete  from tbl_slide where id = :id";
        
        $delete = App::get('connection')->prepare($query);
        
        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_slide(){
        $file = $_FILES['txt-file']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "public/img/news/";
        $ext = pathinfo($_FILES['txt-file']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        $filesize = filesize($file);
        $dst_w =760;
        $dst_h ='';
        if($filesize <= (500*1024))
        {    
        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
        $res['imgName']=$fileNewName. ".". $ext;
        echo json_encode($res);
        return;
        }
        switch ($imageType) {
        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
            imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext);
            break;

        case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
            imagegif($targetLayer,$folderPath. $fileNewName. ".". $ext);
            break;
        case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
            imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext);
            break;
        default:
            echo "Invalid Image type.";
            exit;
            break;
        }
        $res['imgName']= $fileNewName. ".". $ext;
        echo json_encode($res);
    }


    //advertise
    public function ads(){
      //get advertise data into tbl
      $ads_data = App::get('database')->getAll_tbl('tbl_ads','id>0','id DESC');
      return view_admin('ads', ['ads_data' => $ads_data]);   
  }
    public function get_add_ads(){
        //get advertise autoid and form add
        $ads_data = App::get('database')->getAll_tbl('tbl_ads','id>0','id');
        return view_admin('add-ads', ['ads_data' => $ads_data]);
    }
    public function add_ads_data(){
        $query = "insert into tbl_ads (url,img,location,type,status) values
        (?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);

        $input = $_POST;
        // var_dump($input);
        $insert->execute([
            $input['txt-url'],
            $input['txt-photo'],
            $input['txt-location'],
            $input['txt-type'],
            $input['txt-status']
        ]);

        return redirect('/admin/ads');
    }
    public function get_edit_ads(){
        //get advertise form edit
        $id= $_GET['id'];
        $ads_data = App::get('database')->getAll_tbl('tbl_ads','id='.$id.'','id DESC');
        return view_admin('edit-ads', ['ads_data' => $ads_data]);
    }
    public function update_ads(){
        //update advertise data
        $id = $_GET['id'];
        $url = $_POST['url'];
        $photo = $_POST['photo'];
        $location = $_POST['location'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        $query = "update tbl_ads set url = ?, img = ?, location = ?, type = ?,status = ? where id = ?";
        
        $update = App::get('connection')->prepare($query);
        
        $update->execute([
          $url,
          $photo,
          $location,
          $type,
          $status,
          $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_ads(){
        //delete advertise data
        $query = "delete  from tbl_ads where id = :id";
        
        $delete = App::get('connection')->prepare($query);
        
        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_ads(){
      $file = $_FILES['txt-file']['tmp_name']; 
      $sourceProperties = getimagesize($file);
      $fileNewName = time();
      $folderPath = "public/img/ads/";
      $ext = pathinfo($_FILES['txt-file']['name'], PATHINFO_EXTENSION);
      $imageType = $sourceProperties[2];
      $filesize = filesize($file);
      $dst_w =760;
      $dst_h ='';
      if($filesize <= (500*1024))
      {    
      move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
      $res['imgName']=$fileNewName. ".". $ext;
      echo json_encode($res);
      return;
      }
      switch ($imageType) {
      case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($file); 
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
          imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext);
          break;

      case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($file); 
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
          imagegif($targetLayer,$folderPath. $fileNewName. ".". $ext);
          break;
      case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($file); 
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
          imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext);
          break;
      default:
          echo "Invalid Image type.";
          exit;
          break;
      }
      $res['imgName']= $fileNewName. ".". $ext;
      echo json_encode($res);
  }


    //news
    public function news(){
        //get news data into tbl
        $news_data = App::get('database')->getAll_tbl_multi('tbl_news.*,tbl_category.id,tbl_category.name','tbl_news INNER JOIN tbl_category','tbl_news.cate_id = tbl_category.id','tbl_news.id DESC');
        return view_admin('news', ['news_data' => $news_data]);   
    }
    public function get_add_news(){
        //get news autoid and form add
        $news_data = App::get('database')->getAll_tbl('tbl_news','id>0','id');
        return view_admin('add-news', ['news_data' => $news_data]);
    }
    public function add_news_data(){
        $query = "insert into tbl_news (date_post,title,name_link,des,img,od,location,cate_id,status) values
        (?,?,?,?,?,?,?,?,?)";
        $query2 = "insert into tbl_slide (title,img,od,cate_id,news_id,status) values
        (?,?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);
        $insert2 = App::get('connection')->prepare($query2);
        
        $input = $_POST;
        $des = trim($input['txt-des']);
        
        date_default_timezone_set("Asia/Phnom_Penh");
        $date = date("Y/m/d")." ".date("h:i:s");
        
        $name_link = $input['txt-title'];
        $connect_string=trim($name_link);
        $connect_string=preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $name_link);

        if( $input['txt-cate'] == 0){
            return redirect('/admin/add-news');
        }else{
            $insert->execute([
                $date,
                $input['txt-title'],
                $connect_string,
                $des,
                $input['txt-photo'],
                $input['txt-od'],
                $input['txt-location'],
                $input['txt-cate'],
                $input['txt-status']
            ]);
            $insert2->execute([
                $input['txt-title'],
                $input['txt-photo'],
                $input['txt-od'],
                $input['txt-cate'],
                $input['txt-id'],
                $input['txt-status']
            ]);
            return redirect('/admin/news');
        }
        
    }
    public function get_edit_news(){
        //get news form edit
        $id= $_GET['id'];
        $news_data = App::get('database')->getAll_tbl('tbl_news','id='.$id.'','id DESC');
        return view_admin('edit-news', ['news_data' => $news_data]);
    }
    public function update_news(){
        //update news data
        $id = $_GET['id'];

        $query = "update tbl_news set title = ?, name_link = ?, des = ?, img = ?, od = ?, location = ?, cate_id = ?,status = ? where id = ?";
        
        $update = App::get('connection')->prepare($query);
        
        $input = $_POST;
        $des = trim($input['txt-des']);
        $name_link = $input['txt-title'];
        $connect_string=trim($name_link);
        $connect_string=preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $name_link);
       
        $update->execute([
            $input['txt-title'],
            $connect_string,
            $des,
            $input['txt-photo'],
            $input['txt-od'],
            $input['txt-location'],
            $input['txt-cate'],
            $input['txt-status'],
            $id
        ]);
        return redirect('/admin/news');
    }
    public function delete_news(){
        //delete news data
        $query = "delete from tbl_news where id = :id";
        
        $delete = App::get('connection')->prepare($query);
        
        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_news(){
        $file = $_FILES['txt-file']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "public/img/news/";
        $ext = pathinfo($_FILES['txt-file']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        $filesize = filesize($file);
        $dst_w =760;
        $dst_h ='';
        if($filesize <= (500*1024))
        {    
        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
        $res['imgName']=$fileNewName. ".". $ext;
        echo json_encode($res);
        return;
        }
        switch ($imageType) {
        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
            imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext);
            break;

        case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
            imagegif($targetLayer,$folderPath. $fileNewName. ".". $ext);
            break;
        case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$dst_w,$dst_h);
            imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext);
            break;
        default:
            echo "Invalid Image type.";
            exit;
            break;
        }
        $res['imgName']= $fileNewName. ".". $ext;
        echo json_encode($res);
    }


    //resize image
    public function imageResize($imageResourceId,$src_w,$src_h,$dst_w,$dst_h) {   
        $src_x = $src_y = 0;
        if(!empty($dst_w) AND !empty($dst_h)){
          if($dst_w > $dst_h){
            $scale_w = $dst_w;
            $scale_h = ($src_h * $dst_w / $src_w);        
            if($scale_h < $dst_h){
              $scale_h = $dst_h;
              $scale_w = ($src_w * $dst_h / $src_h);
            }
          }else{
            $scale_h = $dst_h;
            $scale_w = ($src_w * $dst_h / $src_h);        
            if($scale_w < $dst_w){
              $scale_w = $dst_w;
              $scale_h = ($src_h * $dst_w / $src_w);      }
          }
          
          $dst_w = $scale_w;
          $dst_h = $scale_h;
        }else{    
          if(empty($dst_w)){
            if($src_h > $dst_h){
              $dst_w=($src_w/$src_h)*$dst_h;
            }else{
              $dst_w=$src_w;
              $dst_h=$src_h;
            }
          }
          if(empty($dst_h)){
            if($src_w > $dst_w){
              $dst_h=($src_h/$src_w)*$dst_w;
            }else{
              $dst_h=$src_h;
              $dst_w=$src_w;
            }
          }
        }
          $targetLayer=imagecreatetruecolor($dst_w,$dst_h);
          imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$dst_w,$dst_h, $src_w,$src_h);  
          return $targetLayer;
      }
    
}