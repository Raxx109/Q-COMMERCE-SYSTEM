<?php
    ob_start();
    session_start(); 
	
	$pdo = require 'db.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt System</title>
    <link rel="stylesheet" href="css/receipt.css">
	    <link rel="stylesheet" href="css/style.css">

	  <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="https://me.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=MbuXQVrbL26wS--bZ2CvHFB5y__fSLo1wYfMJviViU-WcKECXxZdew2GeaEn2l_yleDhcjv0f0P5kXLTL3Qr848y6cXS0XKzMqPjxI-VfCO_idg9iZ_m73cNapfbR0ohA7d-eUYvwoLI9jfBhsj6h9oq3SFMCmypLu1baqy3ua2Oq3XmadWD08HzxMzyh9023ofEcmvaeb3HTfUdMy14MQFuwcNb6MBM838cJ4-6YqhhsP3AK8prxwKz7drRLe2SF9-6SrOD1Ac98zL-zvLGvxZenbF7JprU0yZHZ3FenTqCMt6K1MQCSUDrhgHJ2_hTypqyjabnWrcaexc1ALh5mSbGGlHxiqCX0Hp_219-23L33-rReXmAZppnAxaQzR_F3mBfXlH7arbyZ6MN3pvUdol4wVwEr8ta1WkhzlsPPkaXsgh1x49TXpqBsiZt12D4uJZm2br8rYQvcOxN9QOjT5vVhWPKcbMw-82moSoU_UPh_dA122CnemNV48N53aNo" charset="UTF-8"></script></head>
<body>
    <div class="receipt-container">
        <div class="header">
            <img src="img/logo.png" alt="Logo" class="logo">
            <div class="company-details">
                <h1>ANGSARAP-Q</h1>
                <p>0998-567-9845| angsarapq@gmail.com</p>
            </div>
        </div>

        <div class="recipient">
            <p class="recipient-title">RECIPIENT:</p>
            <p class="recipient-name"><?php	
			$infosql = "SELECT * FROM `login` WHERE userID = 1";
			$statement = $pdo->prepare($infosql);
			$statement->execute();
			$row = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $r){
                echo ' '. $r['fname'].' '.$r['lname'].' ';
				}

			
			
			?>
			</p>
            <p>Quezon</p>
            <p>Lucban</p>
        </div>

        <div class="receipt-info">
            <div class="receipt-number">Receipt for #<?php echo rand();?></div>
            <div class="transaction-date">Transaction Date: <?php echo date("Y/m/d");?></div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>PRODUCT</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
               <?php
    $ftotal = 0;
        try {
            $sql = 'SELECT item.itemID, item.name, item.price, item.img, cart.quantity FROM `item` INNER JOIN cart ON cart.itemID = item.itemID;';
			$statement = $pdo->prepare($sql);
			$statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $r){
				$total = $r['quantity'] * $r['price'];
                echo '
                        <tr>
						<td> <img src = "img/'.$r['img'].'" style="width: 50px; height: 50px;"></img> &nbsp; '.$r['name'].' </td>
						<td> ₱ '.$r['price'].'</td>
						<td>'.$r['quantity'].'</td> 
						<td> ₱'.$total.'</td>
						</tr>
                ';
				$ftotal +=  $total;
				}
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    $pdo = null;
    $sql = null;
    

?>
            </tbody>
        </table>

        <div class="summary">
            <p>Thanks for your business!</p>
            <div class="payment-summary">
                <p>Receipt for Payment</p>
                <table style = "margin-left: 50px;">
				<tr>
					<td>Shipping</td>
						<td>₱ 50</td>
						</tr>
                    <tr>
                        <td>Total</td>
                        <td>₱ <?php echo $ftotal + 50; ?></td>
                    </tr>
                </table>
				<form action ="delall.php">
                <button type = "submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Finish</button>
				</form>
            </div>
        </div>
    </div>
</body>
</html>
