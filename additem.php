<?php
   
	$id = 1;
	$quantity = 1;
	$itemcount = 0;
    $pdo = require 'db.php'; 


		    $item = $_GET['item'];
			
        try {
			$itemcheck = "SELECT COUNT(*) FROM `cart` WHERE `itemID` = $item";
			$checkstatement = $pdo->prepare($itemcheck);
			$checkstatement->bindValue(':item',$item);
			$checkstatement = $pdo->query($itemcheck);
			$itemcount = $checkstatement->fetchColumn();
			if ($itemcount >= 1) {
				$upsql ='UPDATE `cart` SET `quantity` = `quantity` + 1 WHERE `itemID` = :item';
				$upstatement = $pdo->prepare($upsql);
				$upstatement->bindValue(':item',$item);
				$upstatement->execute();
            echo '<script>
			window.location.href = "shop.php"
			</script>';
			}
			else {
            $sql ='INSERT INTO `cart` (cartID, itemID, quantity) VALUES (:id, :item, :quantity)';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id',$id);
            $statement->bindValue(':item',$item);
			$statement->bindValue(':quantity',$quantity);
            $statement->execute();
            echo '<script>
			window.location.href = "shop.php"
			</script>';
			
        }
		}catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    

    $pdo = null;
    $sql = null;
?>