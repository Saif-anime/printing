<?php
include "./Admin/conn.php";

if (isset($_POST['paper_size'])) {
    $paperSize = $_POST['paper_size'];
    $paperSizePrice = 0;

    $sql = "SELECT * FROM `paper_size_add` WHERE id='$paperSize'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $paperSizePrice = $data['price'];
    }
}

if (isset($_POST['paper_type'])) {
    $paperType = $_POST['paper_type'];
    $paperTypePrice = 0;

    $sql = "SELECT * FROM `paper_type_add` WHERE id='$paperType'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $paperTypePrice = $data['price'];
    }
}

if (isset($_POST['color'])) {
    $selectedColor = $_POST['color'];
    $colorPrice = 0;

    $sql = "SELECT * FROM `other_information_document`";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $colorPrice = $selectedColor == 'black_white' ? $data['black_white'] : $data['full_color'];
    }
}

if (isset($_POST['side'])) {
    $selectedSide = $_POST['side'];
    $sidePrice = 0;

    $sql = "SELECT * FROM `other_information_document`";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $sidePrice = $selectedSide == 'single_side' ? $data['single_side'] : $data['both_side'];
    }
}

if (isset($_POST['spiral'])) {
    $selectedSpiral = $_POST['spiral'];
    $spiralPrice = 0;

    $sql = "SELECT * FROM `other_information_document`";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $spiralPrice = $selectedSpiral == 'yes' ? $data['spiral_binding'] : 0;
    }
}

$total = $paperSizePrice + $paperTypePrice + $colorPrice + $sidePrice + $spiralPrice ;

echo $total;
?>
