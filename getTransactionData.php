<?php

   // Alle Fehler anzeigen
   error_reporting(E_ALL);

   require("DAOSparkassenTransaction.php");
   require("SparkassenTransaction.php");
	 
	 
	 //TODO: Make this secure!
 
	 $daoSparkassenTransaction = new DAOSparkassenTransaction();
	 $transactions = $daoSparkassenTransaction->readAllTransactions();
   echo json_encode($transactions); 
?>