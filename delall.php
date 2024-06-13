<?php
 
    $pdo = require 'db.php'; 

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