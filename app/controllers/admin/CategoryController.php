<?php

class CategoryController {
    
    public function index(){
        //get category data into tbl
        $cate_data = App::get('database')->getAll_tbl('tbl_category','id>0','id DESC');
        return view_admin('admin', ['cate_data' => $cate_data]);   
    }
    public function get_add_cate(){
         //get category auto id and form add
        $cate_data = App::get('database')->getAll_tbl_limit('tbl_category','id>0','od DESC', '1');
        return view_admin('add-cate', ['cate_data' => $cate_data[0]]);
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

        if(empty($cate_data)){
            die('There is no id "'.$id.'" in this category');
        }

        return view_admin('edit-cate', ['cate_data' => $cate_data[0]]);
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
}
