<?php

require_once 'W07_01_connectDB.php';

$sql = "SELECT * FROM products";

$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    //echo "<h2>พบ ข้อมูลในตาราง Product</h2>";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    
    //echo "<br>";
    //echo "<pre>";
    //print_r($data);
    //echo "</pre>";

    // ===================================================
    // แสดงผลข้อมูลที่ดึงมาด้วย JSON
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


    // output data of each rowCount
    
    // ===================================================
    // $data = $result->fetchAll(PDO::FETCH_NUM);
    // $data = $result->fetchAll(PDO::FETCH_ASSOC);
    // $data = $result->fetchAll(PDO::FETCH_BOTH);
    
    // print_r($data); // แสดงข้อมูลทั้งหมดแบบ array
    
    // echo "$data[0][0] <br>";
    // ===================================================
    // ใช้ prepared statement เพื่อป้องกัน SQL injection
    // ใช้ execute() เพื่อสั่งประมวลผล SQL
    // ใช้ fetchAll() เพื่อดึงข้อมูลทั้งหมดในคร้ังเดียว
    // ใช้ print_r() เพื่อแสดงข้อมูลทั้งหมดในรูปแบบ array
    // ===================================================
    
} else {

    echo "0 results";
    echo "<h2>ไม่พบ ข้อมูลในตาราง Product</h2>";
}
?>


