<?php


$con = mysqli_connect('localhost', 'root', '', 'whiteboard');

if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

function GenerateFileName($class)
{
    $con = mysqli_connect('localhost', 'root', '', 'whiteboard');
    $filename = "errorname";

    if ($class == "circle") {
        $sql = "SELECT * FROM serial_numbers";
        $res = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($res);
        $last_count = $row['circle'];
        $id = $row['id'];
        $filename = "../savedimages/circle/complete/" . strval($last_count + 1) . ".jpg";

        $incr = $last_count + 1;

        $sql = "UPDATE serial_numbers SET circle=$incr WHERE id=$id";
        $res = mysqli_query($con, $sql);
    } else if ($class == "triangle") {
        $sql = "SELECT * FROM serial_numbers";
        $res = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($res);
        $last_count = $row['triangle'];
        $id = $row['id'];
        $filename = "../savedimages/triangle/complete/" . strval($last_count + 1) . ".jpg";

        $incr = $last_count + 1;

        $sql = "UPDATE serial_numbers SET triangle=$incr WHERE id=$id";
        $res = mysqli_query($con, $sql);
    } else if ($class == "rectangle") {
        $sql = "SELECT * FROM serial_numbers";
        $res = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($res);
        $last_count = $row['rectangle'];
        $id = $row['id'];
        $filename = "../savedimages/rectangle/complete/" . strval($last_count + 1) . ".jpg";

        $incr = $last_count + 1;

        $sql = "UPDATE serial_numbers SET rectangle=$incr WHERE id=$id";
        $res = mysqli_query($con, $sql);
    } else if ($class == "heart") {
        $sql = "SELECT * FROM serial_numbers";
        $res = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($res);
        $last_count = $row['heart'];
        $id = $row['id'];
        $filename = "../savedimages/heart/complete/" . strval($last_count + 1) . ".jpg";

        $incr = $last_count + 1;

        $sql = "UPDATE serial_numbers SET heart=$incr WHERE id=$id";
        $res = mysqli_query($con, $sql);
    } else if ($class == "star") {
        $sql = "SELECT * FROM serial_numbers";
        $res = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($res);
        $last_count = $row['star'];
        $id = $row['id'];
        $filename = "../savedimages/star/complete/" . strval($last_count + 1) . ".jpg";

        $incr = $last_count + 1;

        $sql = "UPDATE serial_numbers SET star=$incr WHERE id=$id";
        $res = mysqli_query($con, $sql);
    }


    return $filename;
}

if (!empty($_POST["class"])) {
    $class = $_POST['class'];

    $name = GenerateFileName($class);

    $img = $_POST['imgBase64'];
    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    //saving
    $fileName = $name;
    file_put_contents($fileName, $fileData);

    echo "Work Done";
}
