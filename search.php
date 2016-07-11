<?php
  $pdo = new PDO('mysql:host=localhost;dbname=trip planner', 'root', '');
  $select = 'SELECT region';
  $from = ' FROM markers';
  $where = ' WHERE TRUE';
  $opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');
 
  if (in_array("type", $opts)){
    $where .= " AND type = 'golf'";
  }
 
  if (in_array("category", $opts)){
    $where .= " AND category = 'land'";
  } 

  if (in_array("rating", $opts)){
    $where .= " AND rating = 4";
  }
 
  $sql = $select . $from . $where;
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($results);
  echo($json);
?>