<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$Count_IN = $_GET['country'];
$Cit=$_GET['lookup'];

Detect($Count_IN,$Cit,$conn);
function Detect($Count_IN,$Cit,$conn){
  if($Count_IN=="")
  {
    if($Cit=="cities"){
      $stmt =  $conn->query("SELECT cities.name AS CN, district, cities.population AS Pop FROM cities JOIN countries ON countries.code = cities.country_code");  
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      Districts($results);
      return;
    }  
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      CountIN($results);
      return;
  }
  if ($Cit=="cities"){
    $stmt =  $conn->query("SELECT cities.name AS CN, district, cities.population AS Pop  FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$Count_IN%' ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Districts($results);
    return;
  }
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$Count_IN%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  CountIN($results);
  
}
function CountIN($results){

?> 
<table>
<tr>
<th>Name</th>
<th>Continent</th>
<th>Independence Year</th>
<th>Head of State</th>
</tr>

<?php foreach ($results as $row): ?>
<tr>
  <td><?=$row['name'] ?></td>
  <td><?=$row['continent'] ?></td>
  <td><?=$row['independence_year'] ?></td>
  <td><?=$row['head_of_state'] ?></td>
</tr>  
<?php endforeach;?>
</table>
<?php
}
function Districts($results){ ?>
  <table>
  <tr>
  <th>Name</th>
  <th>District</th>
  <th>Population</th>
  </tr>
  
  <?php foreach ($results as $row): ?>
  <tr>
    <td><?=$row['CN'] ?></td>
    <td><?=$row['district'] ?></td>
    <td><?=$row['Pop'] ?></td>
  </tr>  
  <?php endforeach;?>
  </table>
<?php }
?>

