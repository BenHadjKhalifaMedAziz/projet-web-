<?php
class reclamation{
    private int $codeRec;
    private int $idUsr;
    private string $titreRec;
    private string $descRec;
    private string $dateRec;

function __construct(int $idUsr,string $titreRec,$descRec,string $dateRec){
    $this->idUsr=$idUsr;
    $this->titreRec=$titreRec;
    $this->descRec=$descRec;
    $this->dateRec=$dateRec;
}


function getCodeRec() { return $this->codeRec; }

function getIdUsr() { return $this->idUsr; }
function setIdUsr($idUsr) { $this->idUsr = $idUsr; }

function getTitreRec() { return $this->titreRec; }
function setTitreRec($titreRec) { $this->titreRec = $titreRec; }

function getDescRec() { return $this->descRec; }
function setDescRec($descRec) { $this->descRec = $descRec; }

function getDateRec() { return $this->dateRec; }
function setDateRec($dateRec) { $this->dateRec = $dateRec; }

}

?>