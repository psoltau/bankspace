<?php

interface Importer {
	
   public function readData($filepath);
   public function writeData($transactions);

}

?>