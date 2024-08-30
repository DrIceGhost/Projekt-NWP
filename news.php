<?php
  include("dbconn.php");
  $stmt = $dbh->query("SELECT * FROM news WHERE archive = 'N' ORDER BY date DESC");

  print '<h1>NEWS</h1>
      <div class="news">';

  while ($row = $stmt->fetch()) {
      echo '<a href="news-single.php?id=' . $row['id'] . '"><img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . htmlspecialchars($row['title']) . '"></a>';
      echo '<h2>' . $row['title'] . '</h2>';
      echo '<p>' . htmlspecialchars(substr($row['description'], 0, 100)) . '... <a href="news-single.php?id=' . $row['id'] . '">More ...</a></p>';
      echo '<p><time datetime="' . $row['date'] . '">' . date('d F Y', strtotime($row['date'])) . '</time></p>';
      echo '<hr>'; }

  print '</div>';
?>

