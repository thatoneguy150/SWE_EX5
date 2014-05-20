<!DOCTYPE html5>
<html>
<head>
       <meta charset="UTF-8" />
       <title>Puppy Database</title>
</head>
<body>
       <?php
       if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_puppy")
       {
               $puppy_info = file_get_contents('http://babbage.cs.missouri.edu/~jmd432/swe/api.php?action=get_puppy&id=' . $_GET["id"]);
               $puppy_info = json_decode($puppy_info, true);
       ?>
       <h3>Here's more information about a specific puppy</h3>
               <table>
                       <tr>
                               <td>Puppy Name: </td><td><strong><?php echo $puppy_info["name"] ?></strong></td>
                       </tr>
                       <tr>
                               <td>Puppy Age: </td><td><strong><?php echo $puppy_info["age"] ?></strong></td>
                       </tr>
                       <tr>
                               <td>Puppy Colour: </td><td><strong><?php echo $puppy_info["color"] ?></strong></td>
                       </tr>
                       <tr>
                               <td>Puppy Breed: </td><td><strong><?php echo $puppy_info["breed"] ?></strong></td>
                       </tr>
                       <tr>
                               <td>Puppy Sex: </td><td><strong><?php echo $puppy_info["sex"] ?></strong></td>
                       </tr>
               </table>
               <br />
               <a href="http://babbage.cs.missouri.edu/~jmd432/swe/index.php" alt="puppy list">Return to the puppy list</a>
       <?php
       }
       else
       {
               $puppy_list = file_get_contents('http://babbage.cs.missouri.edu/~jmd432/swe/api.php?action=get_puppy_list');
               $puppy_list = json_decode($puppy_list, true);
       ?>
               <h3>Here is the list of puppies by name:</h3>
               <ul>
               <?php foreach ($puppy_list as $puppy): ?>
                       <li>
                       <a href=<?php echo "http://babbage.cs.missouri.edu/~jmd432/swe/index.php?action=get_puppy&id=" . $puppy["id"] ?> alt=<?php echo "puppy_" . $puppy_["id"] ?>><?php echo $puppy["name"] ?></a>
                       </li>
               <?php endforeach; ?>
               </ul>
               <?php
}
?>
</body>
</html
