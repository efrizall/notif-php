<?php

include('db.php');

$query = "SELECT * FROM `pesan` WHERE `statusAVP` LIKE 'unread' ";
$data = mysqli_query($conn, $query);
$result = mysqli_num_rows($data); //jumlah pesan yg belum dibaca

function countNotif()
{
    global $result;
    return $result;
}

// function cekUser()
// {
//     if ($_SESSION['user'] == 1) {
//         return true;
//     } else {
//         return false;
//     }
// }

function fetchData($id)
{
    global $conn;
    $query = "SELECT * FROM `pesan` WHERE `id` = $id";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    return $result;
}

function allData()
{
    global $conn;
    $query = "SELECT * FROM `pesan` WHERE `statusAVP` LIKE 'unread' ";
    $data = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($data);
}

function updateData($id)
{
    global $conn;
    $query = "UPDATE `pesan` SET `statusAVP` = 'read' WHERE `pesan`.`id` = $id";
    return mysqli_query($conn, $query);
}

function readData($id)
{
    global $conn;
    $query = "UPDATE `pesan` SET `statusAVP` = 'read' WHERE `pesan`.`id` LIKE $id";
    return mysqli_query($conn, $query);
}

function isRead($id)
{
    global $conn;
    $query = "SELECT `statusAVP` FROM `pesan` WHERE `id` = $id";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    return $result['statusAVP'];
}

function changeButton($id)
{

    if (isRead($id) == 'read') {
        echo 'success';
    } else {
        echo 'danger';
    }
}
