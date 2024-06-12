<?php
    $pdo=require 'db.php';
  
    function fillcart($pdo){ 
        try {
			$sqlquery = 'SELECT * FROM `cart` WHERE `cartID` = 1';
			$qstatement = $pdo->query($sql);
            $qrow = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($qrow as $qr){
				$query = $qr['itemID'];
            $sql = 'SELECT * FROM `item` where `itemID` = $query';
            $statement = $pdo->query($sql);
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $r){
				$total = $r['quantity'] * $r['price'];
                echo '
                        <td>'.$r['itemID'].'</td>
                        <td>'.$r['name'].'</td>
                        <td>'.$r['price'].'</td>
                        <td><input type = "button" onclick="decrease()">-</input>'.$r['quantity'].' <input type = "button" onclick="increase()">+</input></td>
                        <td>'.$total.'</td>
                ';
				}
				}
			echo '</tr>';
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    $pdo = null;
    $sql = null;
    }

?>