<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include_once("DButil.php");
    if($_SESSION['captcha'] != $_POST['captcha']){
        $servMsg = [
            'code' => '0',
            'status' => 'Invalid Captcha'
        ];
    }else{
        $dbResp = new DButil();
        $result = $dbResp->checkCredentials($_POST["userName"], $_POST['password']);
        if($result){
            $servMsg = [
                'code' => '1',
                'status' => 'Success'
            ];
        }else{
            $servMsg = [
                'code'=> '2',
                'status'=> 'Invalid Credentials'
            ];
        }
    }
    echo json_encode($servMsg);
}


?>