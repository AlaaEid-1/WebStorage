<?php
include 'config.php';
include 'nav.php';
?>
<!doctype html>
<html>
    <head>
        <title>view data page</title>
        <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="libs/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="dataview.css">
        </head>
    <body>
                <?php
                $query = "SELECT * from emp";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    ?>
                     <h3 class="heading">view List :</h3>
                    <table>
                    <thead class="table_header">
                            <tr>
                                <th>Name</th>
                                <th class = "profile_cell">Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <!-- <td><?= $row['id'] ?></td> -->
                                    <td class="first_col"><?= $row['name'] ?></td>
                                    <td class="img_col"><img src="<?= $row['imagee'] ?>" width= "150px" height = "outo" border-radius= "20px"></td>
                                    <td class="last_col">
                                        <a class="edit_button" href="edit.php?empid=<?= $row['id'] ?>">Edit</a> 
                                        <a class="delet_button" href="javascript:void(0)" onclick="deleteFunction('<?= $row['id'] ?>',this)">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                } else {
                    echo 'Record Not found';
                }
                ?>
          

        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>

    </body>
</html>




