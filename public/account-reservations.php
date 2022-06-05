<?php
require_once("./config.php");
include("./includes/header.php");
?>
  <body>
    <header class="nav-dark">
    <?php include("./includes/navbar.php"); ?>
    </header>
    <main>
    <section>
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-3">
          <h3>Account Details</h3>
          <div class="sidenav navbar-expand-md">
            <hr />
            <a href="accounts.php">Account</a>
            <hr />
            <a href="account-reservations.php">Reservations</a>
            <hr />
          </div>
        </div>
        <div class="col-md-9">
        <table
          id="dtVerticalScrollExample"
          class="table table-striped table-bordered small"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="th-sm">Check in date</th>
              <th class="th-sm">Check out date</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php

                    $sql = "SELECT room.check_in_date, room.check_out_date, p.amount,reservations.reservation_id,room.room_id FROM reservations LEFT JOIN rooms as room ON room.room_id = reservations.room_id LEFT JOIN payment as p ON p.reservation_id = reservations.reservation_id WHERE reservations.user_id = :user_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ":user_id" => $_SESSION["user_id"],
                    ));
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row) {
                    $id = $row["reservation_id"];
                    $room_id = $row["room_id"];
                      
                ?>
                  <tr>
                  <td><?= $row["check_in_date"] ?></td>
                  <td><?= $row["check_out_date"] ?></td>
                  <td><?= $row["amount"] ?></td>
                  <td>
                    <span>
                    <button name="delete_booking" onclick="delete1(<?php echo $id ?>,<?php echo $room_id?>);" class="details btn btn-sm btn-outline-danger">Detele</button>
                    </span>
                  </td>
                  </tr>
                <?php 
    }
                ?>
                </tbody>
                </table>
        </div>
      </div>
    </div>
    </section>
    </main>
  <?php include("./includes/footer.php"); ?>
  <script>
    $(document).ready(function() {
        $("nav").eq(0).addClass("bg-dark");
        $("nav").eq(0).addClass("navbar-dark");
        // bg-dark navbar-dark 
    });


    function delete1(id,room_id){
      console.log(room_id);
      $.ajax({
            url: "core/reservation_delete.php",
            type: "POST",
            data: {'id':id,
            'room_id':room_id
          },
            success: function (data) {
            console.log("HERE");
            console.log(data); 
            if (data.error == 1) {
              alert('Successfully deleted');
              location.reload();
            } else {
               //window.location.href="account-reservations.php";
               alert('Successfully deleted');
               location.reload();
               return;
            }
            },
            error: function (data, message, errorThrown) {
            console.log(errorThrown);
            // $("#error-form").html("<span class=\"p-2\">" + message + errorThrown + "</span>");
            },
           
        });
    }
  </script>
</body>
</html>
