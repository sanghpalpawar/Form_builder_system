<?php
$conn = new mysqli("localhost", "root", "", "form_builder");

if ($conn->connect_error) {
    die("Database Connection Failed");
}
?>
