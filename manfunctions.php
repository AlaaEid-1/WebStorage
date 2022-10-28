<?php
include 'config.php';
include 'nav.php';
extract($_REQUEST);
if (isset($submit) && $submit == 'create') {
    $fname = $_FILES['profilepic']['name'];
    $tr = explode('.', $fname);
    $ext = strtolower(end($tr));
    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
        $dir = 'image';
        $newfname = $empname . '.' . $ext;
        $profilepic_path = $dir . '/' . $newfname;
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);

        $query = "INSERT INTO emp(name,imagee) values('$empname','$profilepic_path')";
        $result = mysqli_query($link, $query);
        if ($result) {
            //header('location:create.php');
            echo 'success';
        } else {
            echo mysqli_error($link);
        }
    } else {
        echo 'You have choosen ' . $ext . ' file. Please choose png or jpg or jpeg file.';
    }
} else if (isset($submit) && $submit == 'update') {

    if ($_FILES['imagee']['size'] == 0) {
        $query = "UPDATE emp set name='$empname' where name='$empname'";
        $result = mysqli_query($link, $query);
        if ($result) {
            echo 'success';
            // header('location:dataview.php');
        } else {
            echo mysqli_error($link);
        }
    } else {
        $fname = $_FILES['imagee']['name'];
        $dd = explode('.', $fname);
        $ext = strtolower(end($dd));

        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
            $dir = 'image';
            $newfname = $empname . '.' . $ext;
            $profilepic_path = $dir . '/' . $newfname;
            move_uploaded_file($_FILES['imagee']['tmp_name'], $profilepic_path);

            $query = "UPDATE emp set name='$empname',imagee='$profilepic_path' where name='$empname'";
            $result = mysqli_query($link, $query);
            if ($result) {
                //header('location:dataview.php');
                echo 'success';
            } else {
                echo mysqli_error($link);
            }
        } else {
            echo 'You have choosen ' . $ext . ' file. Please choose png or jpg or jpeg file.';
        }
    }
} else if (isset($submit) && $submit == 'delete') {
    $query = "SELECT imagee from emp where id=$empid";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $profilepic_path = $row['profilepic'];
    if (file_exists($profilepic_path)) {
        unlink($profilepic_path);
    }
    $dquery = "delete from emp where id=$empid";
    $result = mysqli_query($link, $dquery);
    if ($result) {
        ///header('location:dataview.php');
        echo 'success';
    }
}
