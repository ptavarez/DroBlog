<nav aria-label="Posts Pagination">
  <ul class="pagination">
    <?php
      $next = $page + 1;
      $previous = $page - 1;
      
      if($page > 1) {
    ?>
        <li class="page-item">
          <a class="page-link" href="index.php?page=<?php echo $previous; ?>" tabindex="-1">Previous</a>
        </li>
    <?php
        } else {
    ?>
        <li class="page-item disabled">
          <a class="page-link" tabindex="-1">Previous</a>
        </li>
    <?php
        }
      for($i = 1; $i <= $post_count; $i++) {
        if($i == $page) {
          echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
        } elseif($i === 1 && !$page) {
          echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
        } else {
          echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
        }
      }
      
      if ($page >= $post_count) {
    ?>
        <li class="page-item disabled">
          <a class="page-link">Next</a>
        </li>
    <?php
      } else {
    ?>
        <li class="page-item">
          <a class="page-link" href="index.php?page=<?php echo $next; ?>">Next</a>
        </li>
    <?php
      }
    ?>
  </ul>
</nav>
