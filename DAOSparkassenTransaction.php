<?php

// Alle Fehler anzeigen
error_reporting(E_ALL);



class DAOSparkassenTransaction {
		
	public function writeTransaction($transaction) {
		
		$configuration = parse_ini_file("config.ini");
		$host = $configuration["host"];
		$username = $configuration["username"];
		$password = $configuration["password"];
		$schema = $configuration["schema"];
		
		// Create connection
		$conn = new mysqli($host, $username, $password, $schema);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO transactions (Auftragskonto,
		Buchungstag,
		Valutadatum,
		Buchungstext,
		Verwendungszweck,
		Beguenstigter_Zahlungspflichtiger,
		Kontonummer,
		BLZ,
		Betrag,
		Waehrung,
		Info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
																			 
		$stmt->bind_param("sssssssssss", 
		$transaction->getAuftragskonto(), 
		$transaction->getBuchungstag(), 
		$transaction->getValutadatum(), 
		$transaction->getBuchungstext(), 
		$transaction->getVerwendungszweck(), 
		$transaction->getBeguenstigter_zahlungspflichtiger(), 
		$transaction->getKontonummer(), 
		$transaction->getBlz(), 
		$transaction->getBetrag(), 
		$transaction->getWaehrung(), 
		$transaction->getInfo());

		$stmt->execute();
		$stmt->close();
		$conn->close();	
	}
	
	
	public function readAllTransactions() {
	
		$configuration = parse_ini_file("config.ini");
		$host = $configuration["host"];
		$username = $configuration["username"];
		$password = $configuration["password"];
		$schema = $configuration["schema"];	
		
		$conn = new mysqli($host, $username, $password, $schema);

		/* check connection */
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		/* create a prepared statement */
		if ($stmt = $conn->prepare("SELECT * FROM transactions")) {

			/* execute query */
			$stmt->execute();

			/* bind result variables */
			$stmt->bind_result($transaction_id,
			$auftragskonto, 
			$buchungstag, 
			$valutadatum, 
			$buchungstext, 
			$verwendungszweck, 
			$beguenstigter_zahlungspflichtiger, 
			$kontonummer, 
			$blz, 
			$betrag, 
			$waehrung, 
			$info);

			/* fetch values */	
			$row = 0;
			while($stmt->fetch()) {
		    	
				$sparkassenTransaction = new SparkassenTransaction();
				$sparkassenTransaction->setAuftragskonto($auftragskonto);        				 
				$sparkassenTransaction->setBuchungstag($buchungstag);        				 
				$sparkassenTransaction->setValutadatum($valutadatum);        				 
				$sparkassenTransaction->setBuchungstext($buchungstext);        				 
				$sparkassenTransaction->setVerwendungszweck($verwendungszweck);        				 
				$sparkassenTransaction->setBeguenstigter_zahlungspflichtiger($beguenstigter_zahlungspflichtiger);        				 
				$sparkassenTransaction->setKontonummer($kontonummer);        				 
				$sparkassenTransaction->setBlz($blz);        				 
				$sparkassenTransaction->setBetrag($betrag);        				 
				$sparkassenTransaction->setWaehrung($waehrung);        				 
				$sparkassenTransaction->setInfo($info);        				 
												 
				$transactions[$row] = $sparkassenTransaction;
				 
				$row++;					
					
			}

			/* close statement */
			$stmt->close();		
			$conn->close();		
		}
		
		
		return $transactions;  
	}
	
}

?>