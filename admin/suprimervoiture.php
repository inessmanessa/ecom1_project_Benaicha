<?php
include "./includes/fonction.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        deleteById($id);
    }
?>