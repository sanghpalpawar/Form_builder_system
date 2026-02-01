<?php
include '../config/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM forms WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$form = $stmt->get_result()->fetch_assoc();

$fields = json_decode($form['structure_json'], true);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/form-builder.js"></script>
</head>
<body>

<div class="container">
<h2><?= $form['title'] ?></h2>

<form method="POST" action="submit.php" onsubmit="return validateForm()">
<input type="hidden" name="form_id" value="<?= $id ?>">

<?php foreach ($fields as $f):
    $label = $f['label'] ?? '';
    $type = $f['type'] ?? 'text';
    $required = $f['required'] ?? false;
?>

<label><?= $label ?></label>

<?php if ($type === 'gender'): ?>
<select name="<?= $label ?>" <?= $required ? 'required' : '' ?>>
    <option value="">Select</option>
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
</select>
<?php else: ?>
<input type="<?= $type ?>" name="<?= $label ?>" <?= $required ? 'required' : '' ?>>
<?php endif; ?>

<?php endforeach; ?>

<button type="submit">Submit</button>
</form>
</div>

</body>
</html>
