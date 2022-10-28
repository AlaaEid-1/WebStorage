<?php
include 'config.php';
include 'nav.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>uploade image page</title>
        <link href="libs/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <link href="createStyle.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>     
        <div class="login-box">
            <h2>upload your image here</h2>
            <form class="empform" id="empform" action="" enctype="multipart/form-data">   
                <div class="user-box">
                    <input type="text" name="empname" id="empname" /> <br>
                    <label>Name</label>
                </div>

                <div class="user-box">
                    <label>image</label>
                    <input type="file" name="profilepic" id="profilepic" />
                </div>
                <button  id="button" class="option-btn" name="submit" id="submit" value="create">Submit</button>
            </form>
        </div>

        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>

    </body>
</html>

