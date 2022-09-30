<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Captch Login System</title>
</head>
<body>
    <div class="container-fluide">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div id="errmsg"></div>
                <div class="card">
                    <div class="card-header text-center bg-success">
                        Login 
                    </div>
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Username" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter Password" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <img id="capImg" src="captcha.php"/>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter Captcha Here" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-block" id="refreshBtn"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-md-6">
                                <div class="form-group" id="lgLoad">
                                    <input type="button" class="form-control btn btn-success" id="lgBtn" value="Login" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $("#refreshBtn").on("click", function(){
        $('#capImg').attr('src','captcha.php');        
    });

    $("#lgBtn").on("click", function(){
        let uname = $("#name").val();
        let pass = $("#pass").val();
        let capt = $("#captcha").val();

        if(uname == '' || pass == '' || capt == ''){
            $("#errmsg").html("<p class='alert alert-danger text-center'>All Fields Are Required...</p>").hide(5000);
        }else{
            $.ajax({
                type:"POST",
                url:"login.php",
                data:{
                    userName : uname,
                    password : pass,
                    captcha : capt
                },
                success:function(data){
                    data = JSON.parse(data);
                    if(data.code == '0'){
                        $("#errmsg").html("<p class='alert alert-danger text-center'>"+data.status+"</p>").hide(5000);
                    }else if(data.code == '2'){
                        $("#errmsg").html("<p class='alert alert-danger text-center'>"+data.status+"</p>").hide(5000);
                    }else{
                        window.location.href="dashboard.php?page=home";
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });
        }
    });
</script>