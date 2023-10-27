<?php
require_once("./model.php");
$model = new Model();

if(isset($_POST['type']))
$type = $_POST['type'];
else
$type = '';

$data= '';
switch ($type) {
    case 'login':
        # fetch login details and create session
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if($username && $password){
            $data = login($username,$password);
        }else{
            $data = array(
                "success"=>"0",
                "message"=>"Invalid username or Password",
                "error_code"=>"1_A"
            );
        }
        break;

    case 'addCategory':
        # add category to datatable
        $catName = $_POST['catName'];
        $catDesc = $_POST['catDesc'];
        $id = $_POST['id'];


        $data = addCategory($catName,$catDesc,$id);
        break;
    
    case 'fetchCat':
        # fetch category from datatable
        $id = 0;
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $data = fetchCategory($id);
        break;

    case 'deleteCategory':
        # delete category from datatable
            $id = $_POST['id'];
        $data = deleteCategory($id);
        break;

    case 'addLocation':
        # add category to datatable
        $locName = $_POST['locName'];
        $locDesc = $_POST['locDesc'];
        $id = $_POST['id'];


        $data = addLocation($locName,$locDesc,$id);
        break;
    
    case 'fetchLocation':
        # fetch category from datatable
        $id = 0;
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $data = fetchLocation($id);
        break;

    case 'deleteLocation':
        # delete category from datatable
            $id = $_POST['id'];
        $data = deleteLocation($id);
        break;

    case 'fetchCatalog':
        # fetch catalog from datatable
        $id = $_POST['id'];
        $locationId = isset($_POST['location'])?$_POST['location']:'';
        $categoryId = isset($_POST['category'])?$_POST['category']:'';

        $data = fetchCatalog($id,$locationId,$categoryId);
        break;
    
    case 'deleteCatalog':
        # delete catalog from datatable
        $id = $_POST['id'];
        $data = deleteCatalog($id);
        break;
    case 'addCatalog':
        # add catalog from datatable
        // $id = $_POST['id'];
        $data = addCatalog($_POST);
        break;
    default:
        # code...
        $data =  "Seems Like you are lost";
        break;
}

echo json_encode($data);

function login($username,$password){
    global $model;
    $checkUser = $model->checkValidCredentials($username,$password);
    if($checkUser==1){
        session_start();
        $_SESSION['isLogin'] = 1;
        $_SESSION['username'] = $username;
        return array(
            "success"=> 1,
            "message"=>"Login Successful",
            "success_code" =>"1_C"
        );
    }else{
        return array(
            "success"=> 0,
            "message"=>"Incorrect credentials",
            "error_code" =>"1_B"
        );
    }

    
}

function addCategory($catName,$catDesc,$id){
    global $model;
    $data = $model->addCat($catName,$catDesc,$id);
    return $data;
}
function fetchCategory($id){
    global $model;
    $data = $model->fetchCat($id);
    return $data;
}
function deleteCategory($id){
    global $model;
    $data = $model->deleteCat($id);
    return $data;
}

function addLocation($locName,$locDesc,$id){
    global $model;
    $data = $model->addLoc($locName,$locDesc,$id);
    return $data;
}
function fetchLocation($id){
    global $model;
    $data = $model->fetchLoc($id);
    return $data;
}
function deleteLocation($id){
    global $model;
    $data = $model->deleteLoc($id);
    return $data;
}
function fetchCatalog($id,$locationId,$categoryId){
    global $model;
    $data = $model->fetchCatalog($id,$locationId,$categoryId);
    return $data;
}

function deleteCatalog($id){
    global $model;
    $data = $model->deleteCatalog($id);
    return $data;
}

function addCatalog($post){
    global $model;
    $data = $model->addCatalog($post);
    return $data;
}
?>