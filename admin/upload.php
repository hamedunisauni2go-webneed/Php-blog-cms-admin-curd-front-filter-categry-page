<?php

if(isset($_FILES['upload']['name'])){

    $file = $_FILES['upload']['name'];
    $tmp = $_FILES['upload']['tmp_name'];

    move_uploaded_file($tmp,"../uploads/".$file);

    $url = "uploads/".$file;

    $response = [
        "url" => $url
    ];

    echo json_encode($response);
}
?>