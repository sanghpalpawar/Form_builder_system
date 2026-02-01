<?php
include '../config/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM forms WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$form = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
<h2>Edit Form</h2>

<form method="POST">
    <label>Form Title</label>
    <input type="text" name="title" value="<?= $form['title'] ?>" required>

    <label>Form Structure (JSON)</label>
    <textarea name="structure_json" rows="10" required><?= $form['structure_json'] ?></textarea>

    <button name="update">Update Form</button>
</form>

<?php
if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE forms SET title=?, structure_json=? WHERE id=?"
    );
    $stmt->bind_param("ssi", $_POST['title'], $_POST['structure_json'], $id);
    $stmt->execute();

    echo "<p>Form updated successfully.</p>";
}
?>
</div>
</body>
</html>
