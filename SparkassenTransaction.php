<?php

// Alle Fehler anzeigen
error_reporting(E_ALL);

class SparkassenTransaction {
	
	private $auftragskonto;
	private $buchungstag;
	private $valutadatum;
	private $buchungstext;
	private $verwendungszweck;
	private $beguenstigter_zahlungspflichtiger;
	private $kontonummer;
	private $blz;
	private $betrag;
	private $waehrung;
	private $info;
	
	  
  public function getAuftragskonto() {
 
      return $this->auftragskonto;
  }

  public function setAuftragskonto($auftragskonto) {                   

      $this->auftragskonto = $auftragskonto;
  }


  public function getBuchungstag() {
 
      return $this->buchungstag;
  }

  public function setBuchungstag($buchungstag) {                   

      $this->buchungstag = $buchungstag;
  }


  public function getValutadatum() {
 
      return $this->valutadatum;
  }

  public function setValutadatum($valutadatum) {                   

      $this->valutadatum = $valutadatum;
  }


  public function getBuchungstext() {
 
      return $this->buchungstext;
  }

  public function setBuchungstext($buchungstext) {                   

      $this->buchungstext = $buchungstext;
  }


  public function getVerwendungszweck() {
 
      return $this->verwendungszweck;
  }

  public function setVerwendungszweck($verwendungszweck) {                   

      $this->verwendungszweck = $verwendungszweck;
  }


  public function getBeguenstigter_zahlungspflichtiger() {
 
      return $this->beguenstigter_zahlungspflichtiger;
  }

  public function setBeguenstigter_zahlungspflichtiger($beguenstigter_zahlungspflichtiger) {                   

      $this->beguenstigter_zahlungspflichtiger = $beguenstigter_zahlungspflichtiger;
  }


  public function getKontonummer() {
 
      return $this->kontonummer;
  }

  public function setKontonummer($kontonummer) {                   

      $this->kontonummer = $kontonummer;
  }


  public function getBlz() {
 
      return $this->blz;
  }

  public function setBlz($blz) {                   

      $this->blz = $blz;
  }


  public function getBetrag() {
 
      return $this->betrag;
  }

  public function setBetrag($betrag) {                   

      $this->betrag = $betrag;
  }
	
	
  public function getWaehrung() {
 
      return $this->waehrung;
  }

  public function setWaehrung($waehrung) {                   

      $this->waehrung = $waehrung;
  }


  public function getInfo() {
 
      return $this->info;
  }

  public function setInfo($info) {                   

      $this->info = $info;
  }
	
	
}

?>