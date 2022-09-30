<?php
class  DButil{
    private $host ="localhost";
    private $user_name = "root";
    private $password = "";
    private $database = "crud";
    private $stdTable = "student";
    protected $conn;
    public function __construct(){
         if(!isset($this->conn)){
            $this->conn = new mysqli($this->host,$this->user_name,$this->password,$this->database);
            //session_start();
         }
        return $this->conn;
    }

    public function insertData($dataArr = []){
       $sqlIns = "INSERT INTO `student`(`name`, `address`, `marks`) VALUES ('".$dataArr['name']."','".$dataArr['address']."',".$dataArr['marks'].")";
        $result = $this->conn->query($sqlIns);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

    ### function for fetching data
    public function fetchData(){
        $sqlStr = "SELECT * FROM `student`";
        $result = $this->conn->query($sqlStr);
        if($result->num_rows > 0){
            $data = [];
            while($row = $result->fetch_assoc()){
               $data[] = $row;
            }
            //print_r($data);die();
            return $data;
        }else{
            return false;
        }
    }

    ## function for getting data by id
    public function getDataById($roll = null){
        $sqlstr = "SELECT * FROM `student` WHERE roll=".$roll;
        $result = $this->conn->query($sqlstr);
        if($result->num_rows>0){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    ## function for update data --- written by pralay mondal
    public function saveUpdate($dataArr = []){
        $sqlUpdate = "UPDATE `student` SET `name`='".$dataArr['name']."',`address`='".$dataArr['address']."',`status`=2,`marks`=".$dataArr['marks']." WHERE roll=".$dataArr['roll'];
        $result = $this->conn->query($sqlUpdate);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }


    ## delete data by roll
    public function deleteData($roll=NULL){
        $sqlDelete = "DELETE FROM `student` WHERE roll=".$roll;
        $result = $this->conn->query($sqlDelete);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

        // function for getting single data (search)
        public function readSingleData($roll=NULL){
            $sqlFetch = "SELECT * FROM `student` WHERE roll=".$roll;
            $result = $this->conn->query($sqlFetch);
            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }
     

        ## login  function
        public function checkCredentials($userName = NULL , $password = NULL){
            $_sqlstr = "SELECT * FROM `users`  WHERE username='".$userName."' AND password='".$password."' AND is_active=1";
            $result = $this->conn->query($_sqlstr);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['is_logged_in'] = 1;
                $_SESSION['name'] = $row['name'];
                return 1;
            }else{
                return 0;
            }
        }
}
?>












