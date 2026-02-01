<?php
include '../config/db.php';

/* Fetch all forms */
$stmt = $conn->prepare("SELECT * FROM forms ORDER BY created_at DESC");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Forms</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

    <h2>📋 My Created Forms</h2>

    <a href="create-form.php" class="btn">➕ Create New Form</a>

    <br><br>

    <?php if ($result->num_rows == 0): ?>
        <p>No forms created yet.</p>
    <?php endif; ?>

    <?php while ($row = $result->fetch_assoc()): ?>

        <div class="submission-card">

            <h3><?= htmlspecialchars($row['title']) ?></h3>

            <p>
                <small>
                    Created on: <?= date("d M Y, h:i A", strtotime($row['created_at'])) ?>
                </small>
            </p>

            <!-- PUBLIC FORM URL -->
            <div class="form-url">
                <b>Form URL:</b><br>
                <a href="../public/form.php?id=<?= $row['id'] ?>" target="_blank">
                    http://localhost/form-builder/public/form.php?id=<?= $row['id'] ?>
                </a>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="actions">

                <a class="btn btn-secondary"
                   href="edit-form.php?id=<?= $row['id'] ?>">
                   ✏ Edit
                </a>

                <a class="btn"
                   href="submissions.php?id=<?= $row['id'] ?>">
                   📊 View Responses
                </a>

                <a class="btn btn-danger"
                   href="deleteform.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Are you sure you want to delete this form?')">
                   🗑 Delete
                </a>

            </div>

        </div>

    <?php endwhile; ?>

</div>

</body>
</html>
