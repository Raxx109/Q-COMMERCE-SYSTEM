<?php
 
	$id = 1;
	$quantity = 1;
	$itemcount = 0;
    $pdo = require 'db.php'; 

		    $item = $_GET['item'];
			
        try {
				$upsql ='DELETE FROM `cart` WHERE `itemID` = :item';
				$upstatement = $pdo->prepare($upsql);
				$upstatement->bindValue(':item',$item);
				$upstatement->execute();
            echo '<script>
			window.location.href = "cart.php"
			</script>';
		}catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    

    $pdo = null;
    $sql = null;
?>