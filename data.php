<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_arm";

// تأكدي إن الفورم فعلاً أرسل البيانات
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // استقبال القيم بأمان
    $motor1 = $_POST["motor1"] ?? 0;
    $motor2 = $_POST["motor2"] ?? 0;
    $motor3 = $_POST["motor3"] ?? 0;
    $motor4 = $_POST["motor4"] ?? 0;
    $motor5 = $_POST["motor5"] ?? 0;
    $motor6 = $_POST["motor6"] ?? 0;

    echo "Motor 1: $motor1<br>";
    echo "Motor 2: $motor2<br>";
    echo "Motor 3: $motor3<br>";
    echo "Motor 4: $motor4<br>";
    echo "Motor 5: $motor5<br>";
    echo "Motor 6: $motor6<br>";

    // الاتصال بقاعدة البيانات
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // إدخال القيم
    $sql = "INSERT INTO poses (motor1, motor2, motor3, motor4, motor5, motor6, statusx)
            VALUES ('$motor1', '$motor2', '$motor3', '$motor4', '$motor5', '$motor6', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "✅ New record created successfully!";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "📩 No data sent via POST.";
}
?>