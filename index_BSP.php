<html>
	<head>
		<title>Titel</title>
		<script src="js/Chart.js"></script>
		
		
		
	</head>
	
	<body>


<?php
   // Alle Fehler anzeigen
   error_reporting(E_ALL);
   require("SparkassenCsvImporter.php"); 
   require("ViewTransaction.php");

?>


		
		<h1>Datenimport</h1>
		
		<?php
		
		//$sparkassenCsvImporter = new SparkassenCsvImporter();
		//$transactions = $sparkassenCsvImporter->readData("csv/31_12.csv");
		//$sparkassenCsvImporter->writeData($transactions);
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
						 

			}
		
		?>
	</table>
	
	<h1>Statistiken</h1>
	
		<div id="canvas-holder">
			<canvas id="chart-area" width="300" height="300"/>
		</div>


	<script>
		
		var transactionData;


			
			function sumMinus(transactionData) {

        var sum = 0;
				for (var i=0; i < transactionData.length; i++) {
					
					var amount = transactionData[i].betrag;
				  
					if(amount < 0) {
						
						amount *= -1;
						sum += amount;
						
					}
	        
				}
        return sum;
			}
		
		
			function sumPlus(transactionData) {

        var sum = 0;
				for (var i=0; i < transactionData.length; i++) {
					
					var amount = transactionData[i].betrag;
				  
					if(amount > 0) {
						
						sum += amount;
						
					}
	        
				}
        return sum;
			}		

			window.onload = function() {
				
				
				
				
				
			  var oReq = new XMLHttpRequest();
			  var minus = 0;
			  var plus = 0; 
        var minusChartData = {}; 
				var plusChartData = {}; 
		  
				
				oReq.onload = function() {
				     
			    
					transactionData = JSON.parse(this.responseText);
					console.log(transactionData);
				  minus = sumMinus(transactionData);
				  plus = sumPlus(transactionData);
					
					minusChartData.value = minus;
					minusChartData.color = "#F7464A"; 
					minusChartData.highlight = "#FF5A5E";
	        minusChartData.label = "Ausgaben";		
				
					plusChartData.value = plus;
					plusChartData.color = "#46BFBD"; 
					plusChartData.highlight = "#5AD3D1";
	        plusChartData.label = "Einnahmen";	
					
					var pieData = [];		
					pieData[0] = minusChartData;
					pieData[1] = plusChartData;				
					
				
					var ctx = document.getElementById("chart-area").getContext("2d");
					window.myPie = new Chart(ctx).Pie(pieData);					
					
					
					
										
			
			  };
			  oReq.open("get", "getTransactionData.php", true);
			  oReq.send();
					
					
				
						
				
				

					
					
					
				/*
			  var pieData = [
				{
						value: 300,
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "Red"
				},
				{
						value: 50,
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "Green"
				}];				
				*/
				

				
			};



	</script>
	</body>
	
</html>