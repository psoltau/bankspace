<?php

   // Alle Fehler anzeigen
   error_reporting(E_ALL);

   require("DAOSparkassenTransaction.php");
	 
	 class ViewTransaction {
		
	 	 public function getAllTransactions() {
	 
	      $daoSparkassenTransaction = new DAOSparkassenTransaction();
	      return $daoSparkassenTransaction->readAllTransactions();
				
     }


   }
?>