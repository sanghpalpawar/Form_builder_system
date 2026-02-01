<?php
include '../config/db.php';

$form_id = $_POST['form_id'];
$data = $_POST;
unset($data['form_id']);

$json = json_encode($data);

$stmt = $conn->prepare(
    "INSERT INTO form_submissions (form_id, response_json) VALUES (?, ?)"
);
$stmt->bind_param("is", $form_id, $json);
$stmt->execute();

echo "Form submitted successfully.";
