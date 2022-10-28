<?php
include 'config.php';
include 'nav.php';
extract($_REQUEST);
?>
<!doctype html>
<html>
    <head>
        <title>edit image page</title>
        <link href="editStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="left">
            </div>
            <div class="right_box">
                <?php
                $query = "SELECT * from emp where id=$empid";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    ?>
                <form class="editform" id="updateform" enctype="multipart/form-data">
                    <table cellspacing="20">
                       
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="empname" id="empname" value="<?= $row['name'] ?>" readonly/> </td>
                        </tr>
                                
                        <tr>
                            <td>Photo</td>
                            <td><img src="<?= $row['imagee'] ?>" alt="Profile Picture" width="200" height="200"/></td>
                        </tr>

                        <tr>
                            <td>Change</td>
                            <td><input type="file" name="imagee"  id="imagee" /></td>
                        </tr>

                        <tr>
                            <td><button class="sbtn" name="submit" id="submit" value="update">Update</button></td>
                        </tr>

                    <?php
                        }
                    ?>
                    </table>
                </form>

                    <?php
                        } else {
                        echo 'Record Not found';
                        }
                    ?>
            </div>
        </div> 

        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>
    </body>
</html>


