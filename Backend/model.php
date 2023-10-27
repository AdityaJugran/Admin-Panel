<?php
require_once("./connection.php");
class Model{
    
    public function checkValidCredentials($user,$pass){
        $conn = OpenCon();
        $sql = "SELECT id FROM user where username='".$user."' AND password = '".$pass."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $check = 1;
        } else {
            $check = 0;
        }

        CloseCon($conn);
        return $check;
    }

    public function addCat($catName,$catDesc,$id){
        $conn = OpenCon();
        if(empty($id)){
            $sql = "INSERT INTO `category` (`catName`, `catDesc`) VALUES('".$catName."', '".$catDesc."')";
            $message = "Inserted Successful";
        }else{
            $sql = "UPDATE `category` SET `catName` = '".$catName."', `catDesc` = '".$catDesc."' WHERE `category`.`id` = '".$id."'";
            $message = "Updated Successful";

        }

        if ($conn->query($sql)===TRUE) {
            $data = array(
                "success"=> 1,
                "message"=>$message,
                "success_code" =>"2_A"
            );
        } else {
            $data = array(
                "success"=> 0,
                "message"=>"Some Error Occured ",
                "error_code" =>"2_B"
            );
        }

        CloseCon($conn);
        return $data;
    }

    public function fetchCat($id){
        $conn = OpenCon();
        $sql = "SELECT id,catName,catDesc FROM category Where status = '1'";
        if(!empty($id)){
            $sql .=" AND id ='".$id."'";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $rowData = array();
            while($row = $result->fetch_assoc()) {
            $rowData[] = array(
                "id"=>$row["id"],
                "catName"=>$row["catName"],
                "catDesc"=>$row["catDesc"]
            ); 
            }
            $data = array(
                "success"=> 1,
                "data"=>$rowData,
                "message"=>"All record fetched",
                "success_code" =>"3_A"
            );
          } else {
            $data = array(
                "success"=> 0,
                "message"=>"No Record Found",
                "error_code" =>"3_B"
            );
          }
        
          CloseCon($conn);
        return $data;
    }

    public function deleteCat($id){
        $conn = OpenCon();
            $sql = "UPDATE `category` SET `status` = '0' WHERE `category`.`id` = '".$id."'";
            $message = "Deleted Successful";

        if ($conn->query($sql)===TRUE) {
            $data = array(
                "success"=> 1,
                "message"=>$message,
                "success_code" =>"4_A"
            );
        } else {
            $data = array(
                "success"=> 0,
                "message"=>"Some Error Occured ",
                "error_code" =>"4_B"
            );
        }

        CloseCon($conn);
        return $data;
    }

    public function addLoc($locName,$locDesc,$id){
        $conn = OpenCon();
        if(empty($id)){
            $sql = "INSERT INTO `location` (`locName`, `locDesc`) VALUES('".$locName."', '".$locDesc."')";
            $message = "Inserted Successful";
        }else{
            $sql = "UPDATE `location` SET `locName` = '".$locName."', `locDesc` = '".$locDesc."' WHERE `location`.`id` = '".$id."'";
            $message = "Updated Successful";

        }

        if ($conn->query($sql)===TRUE) {
            $data = array(
                "success"=> 1,
                "message"=>$message,
                "success_code" =>"7_A"
            );
        } else {
            $data = array(
                "success"=> 0,
                "message"=>"Some Error Occured ",
                "error_code" =>"7_B"
            );
        }

        CloseCon($conn);
        return $data;
    }

    public function fetchLoc($id){
        $conn = OpenCon();
        $sql = "SELECT id,locName,locDesc FROM `location` Where status = '1'";
        if(!empty($id)){
            $sql .=" AND id ='".$id."'";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $rowData = array();
            while($row = $result->fetch_assoc()) {
            $rowData[] = array(
                "id"=>$row["id"],
                "locName"=>$row["locName"],
                "locDesc"=>$row["locDesc"]
            ); 
            }
            $data = array(
                "success"=> 1,
                "data"=>$rowData,
                "message"=>"All record fetched",
                "success_code" =>"5_A"
            );
          } else {
            $data = array(
                "success"=> 0,
                "message"=>"No Record Found ",
                "error_code" =>"5_B"
            );
          }
        
          CloseCon($conn);
        return $data;
    }

    public function deleteLoc($id){
        $conn = OpenCon();
            $sql = "UPDATE `location` SET `status` = '0' WHERE `location`.`id` = '".$id."'";
            $message = "Deleted Successful";

        if ($conn->query($sql)===TRUE) {
            $data = array(
                "success"=> 1,
                "message"=>$message,
                "success_code" =>"6_A"
            );
        } else {
            $data = array(
                "success"=> 0,
                "message"=>"Some Error Occured ",
                "error_code" =>"6_B"
            );
        }

        CloseCon($conn);
        return $data;
    }

    public function fetchCatalog($id,$locationId,$categoryId){
        $conn = OpenCon();
        $sql = "SELECT log.`id`,log.locationId, log.categoryId, log.`name`,log.`quantity`,log.`catalogNumber`,cat.`catName`,loc.`locName`,`log`.`subLocation`,log.`companyName`,log.`dateOfRefill`,log.`remarks`,log.unit FROM `catalog` as log
            INNER JOIN location as loc ON loc.id = log.locationId
            INNER JOIN category as cat ON cat.id = log.categoryId
         Where log.status = '1'";
        if(!empty($id)){
            $sql .=" AND log.id ='".$id."'";
        }
        if(!empty($locationId)){
            $sql .=" AND log.locationId ='".$locationId."'";
        }
        if(!empty($categoryId)){
            $sql .=" AND log.categoryId ='".$categoryId."'";
        }
        // echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $rowData = array();
            while($row = $result->fetch_assoc()) {
            $rowData[] = $row; 
            }
            $data = array(
                "success"=> 1,
                "data"=>$rowData,
                "message"=>"All record fetched",
                "success_code" =>"8_A"
            );
          } else {
            $data = array(
                "success"=> 0,
                "message"=>"No Record Found ",
                "error_code" =>"8_B"
            );
          }
        
          CloseCon($conn);
        return $data;
    }

    public function deleteCatalog($id){
        $conn = OpenCon();
            $sql = "UPDATE `catalog` SET `status` = '0' WHERE `catalog`.`id` = '".$id."'";
            $message = "Deleted Successful";

        if ($conn->query($sql)===TRUE) {
            $data = array(
                "success"=> 1,
                "message"=>$message,
                "success_code" =>"6_A"
            );
        } else {
            $data = array(
                "success"=> 0,
                "message"=>"Some Error Occured ",
                "error_code" =>"6_B"
            );
        }

        CloseCon($conn);
        return $data;
    }

    public function addCatalog($params){
        $id = $params['catalogId'];
        unset($params['catalogId']);
        unset($params['type']);

        $conn = OpenCon();
        if(empty($id)){
            $sqlKey = '';
            $sqlvalue = '';

            foreach($params as $key=>$value){
                $sqlKey .= '`'.$key.'`,';
                $sqlvalue .= "'".$value."',";
            }
            $sqlKey = substr($sqlKey, 0, -1);
            $sqlvalue = substr($sqlvalue, 0, -1);

            $sql = "INSERT INTO `catalog` (".$sqlKey.") VALUES(".$sqlvalue.")";
            $message = "Inserted Successful";
        }else{
            $sqlKey = '';
            $sqlvalue = '';

            foreach($params as $key=>$value){
                $sqlKey .= '`'.$key.'`='."'".$value."',";
            }
            $sqlKey = substr($sqlKey, 0, -1);
            
            $sql = "UPDATE `catalog` SET ".$sqlKey." WHERE `catalog`.`id` = '".$id."'";
            $message = "Updated Successful";

        }

        if ($conn->query($sql)===TRUE) {
            $data = array(
                "success"=> 1,
                "message"=>$message,
                "success_code" =>"7_A"
            );
        } else {
            $data = array(
                "success"=> 0,
                "message"=>"Some Error Occured ",
                "error_code" =>"7_B"
            );
        }

        CloseCon($conn);
        return $data;
    }
}
