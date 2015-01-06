<?php
// Alle Fehler anzeigen
error_reporting(E_ALL);

require("SparkassenTransaction.php");


class SparkassenCsvImporter {
	
	 const CSV_DELIMITER = ';';
	
	
   public function readData($filepath) {
		 
			 $filePointer = fopen($filepath, "r");
			 
			 if ($filePointer !== FALSE) {
				 
			     $lineCount = 0;
			     while (($csvLine = fgetcsv($filePointer, 0, SparkassenCsvImporter::CSV_DELIMITER)) !== FALSE) {
						 
						   $sparkassenTransaction = new SparkassenTransaction();
					 		 $sparkassenTransaction->setAuftragskonto($csvLine[0]);        				 
					 		 $sparkassenTransaction->setBuchungstag($csvLine[1]);        				 
					 		 $sparkassenTransaction->setValutadatum($csvLine[2]);        				 
					 		 $sparkassenTransaction->setBuchungstext($csvLine[3]);        				 
					 		 $sparkassenTransaction->setVerwendungszweck($csvLine[4]);        				 
					 		 $sparkassenTransaction->setBeguenstigter_zahlungspflichtiger($csvLine[5]);        				 
					 		 $sparkassenTransaction->setKontonummer($csvLine[6]);        				 
					 		 $sparkassenTransaction->setBlz($csvLine[7]);        				 
					 		 $sparkassenTransaction->setBetrag($csvLine[8]);        				 
					 		 $sparkassenTransaction->setWaehrung($csvLine[9]);        				 
					 		 $sparkassenTransaction->setInfo($csvLine[10]);        				 
															 
							 $transactions[$lineCount] = $sparkassenTransaction;
							 
							 $lineCount++;
							 							 						 
			     }
			     fclose($filePointer);
					 						 
			 }
			 
			 return $transactions;
   }


   public function writeData($transactions) {
		 
	   $daoSparkassenTransaction = new DAOSparkassenTransaction();
		 foreach ($transactions as $transaction) {
        $daoSparkassenTransaction->writeTransaction($transaction);
		 }

   }  
}

?>