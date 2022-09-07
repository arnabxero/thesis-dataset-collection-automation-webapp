<?php


$con = mysqli_connect('localhost', 'root', '', 'whiteboard');

if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

function GenerateFileName($class)
{   
    

}

if (!empty($_POST["class"])) {
    $class = $_POST['class'];
    $filename = GenerateFileName($class);

    $img = $_POST['imgBase64'];
    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    //saving
    $fileName = '../savedimages/circle/photo.jpeg';
    file_put_contents($fileName, $fileData);

    echo "Work DOne";
}
