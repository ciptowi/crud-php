<?php
include "connection.php";

$query_post = "INSERT INTO user_games (name, gender, difficulty, have_won, have_lost) 
VALUES ('".$_POST['name']."', '$_POST[gender]', '$_POST[difficulty]', '$_POST[have_won]', '$_POST[have_lost]')";

if(isset($_POST['save'])) {
  $save = $conn -> query($query_post);
}
// if($save){
//   echo "<script>
//   alert('Create data success!!');
//   document.location='index.php';
//   </script>";
// } elseif {
//   echo "<script>
//   alert('Create data FAILED!!');
//   document.location='index.php';
//   </script>";
// }
//   endif;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>CRUD APP</title>
</head>

<body>

  <div class="container">
    <div class="title">
      <h2 class="text-center mt-5">
        CRUD APP
      </h2>
      <h5 class="text-center">
        PHP, MySQL, Bootstrap v4.6
      </h5>
    </div>

    <div class="card col-8 mx-auto mt-3">
      <div class="card-header bg-primary text-white font-weight-bold">
        Form Create
      </div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" required placeholder="Your Name">
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" name="gender" required placeholder="Gender">
          </div>
          <div class="form-group">
            <label for="difficulty">Difficulty</label>
            <input type="text" class="form-control" name="difficulty" required placeholder="Easy | Medium | Hard">
          </div>
          <div class="form-group">
            <label for="have_won">Have Won</label>
            <input type="number" class="form-control" name="have_won" required placeholder="0">
          </div>
          <div class="form-group">
            <label for="have_lost">Have Lost</label>
            <input type="number" class="form-control" name="have_lost" required placeholder="0">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="save">Submit</button>
            <button type="reset" class="btn btn-danger">Kosongkan</button>
          </div>
        </form>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header font-weight-bold">
        Table :
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Gender</th>
              <th scope="col">Difficulty</th>
              <th scope="col">Have Won</th>
              <th scope="col">Have Lost</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $n = 1;
            $query_get = "SELECT * from user_games order by id desc";
            $run = $conn -> query($query_get);
            while ($data = $run -> fetch_object()) {

            ?>
              <tr>
                <th scope="row"><?= $n++; ?></th>
                <td><?php echo $data->name; ?></td>
                <td><?php echo $data->gender; ?></td>
                <td><?php echo $data->difficulty; ?></td>
                <td><?php echo $data->have_won; ?></td>
                <td><?php echo $data->have_lost; ?></td>
                <td>
                  <a href="#" class="btn btn-success">Edit</a>
                  <a href="#" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

  </div>

  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>