<?php

   // Alle Fehler anzeigen
   error_reporting(E_ALL);
	 
   require("SparkassenCsvImporter.php");
	 
   require("ViewTransaction.php");
	 /*
   $importer = new SparkassenCsvImporter();
   $transations = $importer->readData("csv/31_12.csv"); 
   $importer->writeData($transations);
	 */
	 
	 


?>

<html>
	<head>
		<title>Titel</title>
		
		
		
	</head>
	
	<body>
		
		<h1>Datenimport</h1>
		
		<?php
		
		$sparkassenCsvImporter = new SparkassenCsvImporter();
		$transactions = $sparkassenCsvImporter->readData("csv/31_12.csv");
		$sparkassenCsvImporter->writeData($transactions);
		?>
		
		
		<h1>Zahlungsdaten</h1>
		<table>
	  <?php
 	    $viewTransaction = new ViewTransaction();
 	    $transactions = $viewTransaction->getAllTransactions();		
			
			
			
			foreach ($transactions as $transaction) {
				
				
				echo '<tr>
                <td>'.$transaction->getValutadatum().'</td>
		            <td>'.$transaction->getBuchungstext().'</td>
		            <td>'.$transaction->getVerwendungszweck().'</td>
		            <td>'.$transaction->getBeguenstigter_zahlungspflichtiger().'</td>
		            <td>'.$transaction->getKontonummer().'</td>
		            <td>'.$transaction->getBlz().'</td>
		            <td>'.$transaction->getBetrag().'</td>
								
										
  		       </tr>';

						 /*
						 TODO: Anhand der Info eine Filterung erlauben
						 
		            <td>'.$transaction->getInfo().'</td>
		            * 
		            * Sortierung nach Konten einbauen
			          <td>'.$transaction->getAuftragskonto().'</td>	
						 
						 
						 */


				/*
				$transaction->getAuftragskonto()
				$transaction->getBuchungstag() 
				$transaction->getValutadatum() 
				$transaction->getBuchungstext()
				$transaction->getVerwendungszweck()
				$transaction->getBeguenstigter_zahlungspflichtiger()
				$transaction->getKontonummer()
				$transaction->getBlz()
				$transaction->getBetrag()
				$transaction->getWaehrung()
				$transaction->getInfo());*/

			}
		
		?>
	</table>
	</body>
	
</html>