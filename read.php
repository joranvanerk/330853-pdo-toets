<?php

include_once("./db.php");

$sqlget = "SELECT * FROM `pizza` ORDER BY id DESC";
$sqldata = $dbh->query($sqlget) or die("Onbekende fout opgetreden");

$data_finished = "";

while($row = $sqldata->fetch(PDO::FETCH_ASSOC)) {

$data_finished .= '
<tr>
<th scope="row">' . $row["id"] . '</th>
<td>' . $row["bodemformaat"] . '</td>
<td>' . $row["saus"] . '</td>
<td>' . $row["pizzatoppings"] . '</td>
<td>' . $row["kruiden"] . '</td>
<td><a href="./edit.php?id=' . $row["id"] . '" class="btn btn-primary"><i class="far fa-edit"></i></a> <a href="./read.php?delete=' . $row["id"] . '" class="btn btn-primary"><i class="fas fa-trash-alt"></i></a></td>
</tr>';

}

if(isset($_GET["delete"])){
  $delete = $_GET["delete"];
  $sqll = "DELETE FROM `pizza` WHERE `pizza`.`id` = ?";
  $dbh->prepare($sqll)->execute([$delete]);
  header("location: ./read.php?success-delete");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Bekijk bestellingen</title>
  </head>
  <body class="text-center">
    <div class="container">
    <h1>Bekijk bestellingen</h1>
    <?php if(isset($_GET["success-delete"])){ echo '<div class="alert alert-success" role="alert">
  Bestelling verwijderd!
</div>'; }
if(isset($_GET["bijgewerkt"])){ echo '<div class="alert alert-success" role="alert">
Bestelling bijgewerkt!
</div>'; }
 ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Bodemformaat</th>
      <th scope="col">Saus</th>
      <th scope="col">Pizzatoppings</th>
      <th scope="col">kruiden</th>
      <th scope="col">Opties</th>
    </tr>
  </thead>
  <tbody>
      <?php echo $data_finished; ?>
  </tbody>
</table>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
