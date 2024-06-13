<?php
 
	$id = 1;
	$quantity = 1;
	$itemcount = 0;
    $pdo = require 'db.php'; 

		    $item = $_GET['item'];
			
        try {
				$upsql ='TRUNCATE CART;';
				$upstatement = $pdo->prepare($upsql);
				$upstatement->execute();
            echo '<script>
			window.location.href = "index.php"
			</script>';
		}catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    

    $pdo = null;
    $sql = null;
?>