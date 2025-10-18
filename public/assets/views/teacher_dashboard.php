<!DOCTYPE html>
<html>
<head>
  <title>Teacher Dashboard</title>
  <link rel="stylesheet" href="<?= $base_url ?>/assets/css/style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['name'] ?? 'Teacher') ?>!</h2>
    <h3>Student Quiz Attempts</h3>

    <?php if (empty($attempts)): ?>
      <p>No quiz attempts found.</p>
    <?php else: ?>
      <?php foreach (array_reverse($attempts) as $attempt): ?>
        <div class="result">
          <strong>Student:</strong> <?= htmlspecialchars($attempt['student']) ?><br>
          <strong>Time:</strong> <?= $attempt['timestamp'] ?><br>
          <strong>Question:</strong> <?= $attempt['question'] ?><br>
          <strong>Answer:</strong> <?= nl2br(htmlspecialchars($attempt['answer'])) ?><br><br>
          <strong>AI Grade:</strong><br>
          <?= nl2br(htmlspecialchars($attempt['grading'])) ?><br><br>
          <strong>Recommendation:</strong><br>
          <?= nl2br(htmlspecialchars($attempt['recommendation'])) ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <br>
    <a href="<?= $base_url ?>/role">← Back to Role Selection</a><br><br>
    <a href="<?= $base_url ?>/teacher/clear"><button>Clear History</button></a>

    <form method="POST" action="<?= $base_url ?>/role/logout" style="margin-top: 20px;">
        <button type="submit">Logout</button>
    </form>
  </div>
</body>
</html>

