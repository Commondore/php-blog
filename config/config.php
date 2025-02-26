<?php

function getConnect()
{
  try {
    $conn = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (PDOException $error) {
    echo "Ошибка подключения " . $error->getMessage();
  }
}
