<?php
include 'config.php';
include 'nav.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `emp` WHERE CONCAT(`name`, `imagee`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `emp`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
  $conn = mysqli_connect('localhost', 'root','', 'im_db');
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>search page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="libs/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="searchStyle.css">
    </head>

    <body>
    <div class="search_box">
       <!-- <p>type key :</p> -->
        <form action="search.php" method="post">
            <input class = "search_input" type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <button  type="submit" name="search" value="Filter">filtter</button>
            
            <table>
                <tr class ="table_header">
                    <!-- <th>Id</th> -->
                    <th>name</th>
                    <th>image</th>
                
                </tr>
                <div class="line"><hr></div>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                 
                    <td><?php echo $row['name'];?></td>
                    <td><img src="<?= $row['imagee'] ?>" width= "150px" height = "outo" border-radius= "20px"></td></tr>
                <?php endwhile;?>
            </table>
        </form></div>
    </body>
</html>
