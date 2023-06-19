<?php
$host = "localhost";
$port = "5432";
$dbname = "server";
$dbuser = "postgres"; // Enter the database username here
$dbpass = "qc9eX5BqwDbdMA"; // Enter the database password here

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection attempt success." . "<br>";
} catch(PDOException $e) {
    echo "Connection attempt failed: " . $e->getMessage();
}

$detakjantung = test_input($_POST['data1']);
$suhu = test_input($_POST['data2']);
$kemiringan = test_input($_POST['data3']);
$gps = test_input($_POST['data4']);


$stmt = $conn->prepare("INSERT INTO detakjantung(detakjantung) VALUES (:detak jantung)");
$stmt->bindParam(':detakjantung', $detakjantung);
$stmt->execute();
echo "New record detakjantung created successfully" . "<br>";

$stmt = $conn->prepare("INSERT INTO suhu(suhu) VALUES (:suhu)");
$stmt->bindParam(':suhu', $suhu);
$stmt->execute();
echo "New record suhu created successfully" . "<br>";

$stmt = $conn->prepare("INSERT INTO kemiringan(kemiringan) VALUES (:kemiringan)");
$stmt->bindParam(':kemiringan', $kemiringan);
$stmt->execute();
echo "New record kemiringan created successfully" . "<br>";

$stmt = $conn->prepare("INSERT INTO gps(gps) VALUES (:gps)");
$stmt->bindParam(':gps', $gps);
$stmt->execute();
echo "New record gps created successfully" . "<br>";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>