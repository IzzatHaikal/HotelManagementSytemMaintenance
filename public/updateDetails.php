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
      <div class="container">
      <div class="col">
          <div class="Account-page">
            <form id="updateDetails" method="post" class="form">
              <?php
                  $sql = "SELECT * FROM users WHERE user_id = :user_id";
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute(array(
                    ":user_id" => $_SESSION["user_id"],
                  ));
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="form-group">
                  <label for="user_fname">First name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_fname"
                    id="user_fname"
                    placeholder="<?= $row["user_fname"] ?>"
                    
                    
                  />
                </div>
                <div class="form-group">
                  <label for="user_lname">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_lname"
                    id="user_lname"
                    placeholder="<?= $row["user_lname"] ?>"
                    
                    
                  />
                </div>
                <div class="form-group">
                  <label for="user_email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="user_email"
                    id="user_email"
                    placeholder="Email"
                    value="<?= $row["user_email"] ?>"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="user_phone">Phone number</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_phone"
                    id="user_phone"
                    placeholder="<?= $row["user_phone"] ?>"
                    
                    
                  />
                </div>
                <div class="form-group">
                  <label for="user_phone">Date of birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="user_dob"
                    id="user_dob"
                    placeholder="Date of birth"
                    value="<?= $row["user_dob"] ?>"
                    readonly
                  />
                </div>
                
                <button type="submit" class="btn btn-success">Confirm details</button>
                
            </form>
            <!-- <button type="submit" class="btn btn-danger">Confirm Details</button> -->
          </div>
        </div>
      </div>
      
      </section>
    <main/>
    <?php include("./includes/footer.php"); ?>
    <script>
    $(document).ready(function() {
      $("nav").eq(0).addClass("bg-dark");
      $("nav").eq(0).addClass("navbar-dark");
      // bg-dark navbar-dark 
    });

    $("#updateDetails").submit(function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      
      $.ajax({
        url: "core/updateUserDetails.php",
        type: "POST",
        data: formData,
        success: function (data) {
          if (data.error == 1) {
            console.log('Error!');
            window.location.href="updateDetails.php";
          } else {
            window.location.href="accounts.php";
            return;
          }
        },
        error: function (data, message, errorThrown) {
          console.log(message);
          console.log(data);
          console.log(errorThrown);
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  </script>
  </body>