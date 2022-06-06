<?php
  require("../config.php");
  include("./includes/header.php");
?>
      <section class="content">
        <table
          id="dtVerticalScrollExample"
          class="table table-striped table-bordered small"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="th-sm">No.</th>
              <th class="th-sm">Impression</th>
              <th class="th-sm">First Hear</th>
              <th class="th-sm">Missing Features</th>
              <th class="th-sm">Recommend</th>
              <th class="th-sm">Useful Features</th>
              <th class="th-sm">Ease of Use</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $counter = 1;
            $sql = "SELECT * FROM feedback";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
                 ?>
            <tr>
              <td><?= $counter ?></td>
              <td><?= $row["impression"] ?></td>
              <td><?= $row["first_hear"] ?></td>
              <td><?= $row["missing_features"] ?></td>
              <td><?= $row["recommend"] ?></td>
              <td><?= $row["useful_features"] ?></td>
              <td><?= $row["ease_of_use"] ?></td>
            </tr>
            <?php
            $counter +=1;
            }
            ?>
          </tbody>
        </table>
      </section>

    <?php include("./includes/footer.php"); ?>
    
</body>
</html>
