<?php
// Отримуємо дані з форми
$pib = $_POST['pib'];
$tel = $_POST['tel'];
$com = $_POST['com'];

// Параметри для підключення
$db_host = "mysql"; 
$db_user = "user3"; 
$db_password = "12345"; 
$db_base = "lab1sskbd"; 
$db_table = "zakaz"; 

// Підключення до бази даних
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

// Якщо є помилка підключення, виводимо її
if ($mysqli->connect_error) {
    die('Помилка підключення: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Захист від SQL-ін'єкцій
$pib = $mysqli->real_escape_string($pib);
$tel = $mysqli->real_escape_string($tel);
$com = $mysqli->real_escape_string($com);

// Виконуємо запит
$query = "INSERT INTO $db_table (pib, tel, com) VALUES ('$pib', '$tel', '$com')";
$result = $mysqli->query($query);

// Перевіряємо виконання запиту
if ($result) {
    echo '<center>Інформація занесена в базу даних!<br><a href="index.html">Повернутись на головну</a></center>';
} else {
    echo "Помилка при внесенні даних: " . $mysqli->error;
}

// Закриваємо підключення
$mysqli->close();
?>
