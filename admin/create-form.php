<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/form-builder.js"></script>
</head>
<body>

<div class="container">
<h2>Create Form</h2>

<form method="POST">
    <label>Form Title</label>
    <input type="text" name="title" required>

    <div id="fields"></div>

    <input type="hidden" name="structure_json" id="structure_json">

    <button type="button" onclick="addField()">Add Field</button>
    <button type="submit" name="save">Save Form</button>
</form>

<?php
if (isset($_POST['save'])) {
    $stmt = $conn->prepare(
        "INSERT INTO forms (title, structure_json) VALUES (?, ?)"
    );
    $stmt->bind_param("ss", $_POST['title'], $_POST['structure_json']);
    $stmt->execute();

    $id = $conn->insert_id;

    echo "<div class='form-url'>
            <b>Form Created Successfully</b><br><br>
            <b>Form URL:</b><br>
            <a href='../public/form.php?id=$id' target='_blank'>
              http://localhost/form-builder/public/form.php?id=$id
            </a><br><br>

            <a class='btn' href='edit-form.php?id=$id'>Edit Form</a>
            <a class='btn btn-secondary' href='submissions.php?id=$id'>View Responses</a>
          </div>";
}
?>

</div>
</body>
</html>
