<?php
include '../config/db.php';

$form_id = $_GET['id'] ?? 0;

// Fetch submissions for the form
$stmt = $conn->prepare("SELECT * FROM form_submissions WHERE form_id = ?");
$stmt->bind_param("i", $form_id);
$stmt->execute();
$res = $stmt->get_result();

$total = $male = $female = $other = 0;
$submissions = [];

while ($row = $res->fetch_assoc()) {
    $data = json_decode($row['response_json'], true);
    if (!$data) continue; // skip if JSON is invalid
    $submissions[] = $data;
    $total++;

    // Check for gender key case-insensitively
    foreach ($data as $k => $v) {
        if (strtolower($k) === 'gender') {
            $gender = strtolower(trim($v));
            if ($gender === 'male') $male++;
            elseif ($gender === 'female') $female++;
            else $other++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<div class="container">
    <h2>Form Submissions</h2>

    <?php if ($total === 0): ?>
        <p style="text-align:center;">No submissions yet.</p>
    <?php else: ?>
        <?php foreach ($submissions as $data): ?>
            <div class="submission-card">
                <?php foreach ($data as $k => $v): ?>
                    <b><?= htmlspecialchars($k) ?>:</b> <?= htmlspecialchars($v) ?><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <div class="analytics">
            <div>
                <p>Total</p>
                <p><?= $total ?></p>
            </div>
            <div>
                <p>Male</p>
                <p><?= $male ?></p>
            </div>
            <div>
                <p>Female</p>
                <p><?= $female ?></p>
            </div>
            <div>
                <p>Other</p>
                <p><?= $other ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
