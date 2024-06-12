<?php
  
	$id = 1;
	$quantity = 1;
	$itemcount = 0;
    $pdo = require 'db.php'; 


		    $item = $_GET['item'];
			$itemcount = $_GET['quantity'];
			
        try {
			if ($itemcount > 1) {
				$upsql ='UPDATE `cart` SET `quantity` = `quantity` - 1 WHERE `itemID` = :item';
				$upstatement = $pdo->prepare($upsql);
				$upstatement->bindValue(':item',$item);
				$upstatement->execute();
            echo '<script>
			window.location.href = "cart.php"
			</script>';
			} else {
				$delsql ='DELETE FROM `cart` WHERE `itemID` = :item';
				$delstatement = $pdo->prepare($delsql);
				$delstatement->bindValue(':item',$item);
				$delstatement->execute();
            echo '<script>
			window.location.href = "cart.php"
			alert("Item Removed Successfully")
			</script>';
			}
		}catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    
    $pdo = null;
    $sql = null;
?>