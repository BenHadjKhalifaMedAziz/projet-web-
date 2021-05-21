<?php
class avis{
    private int $idav;
    private int $idusr;
    private int $idProd;
    private string $nomUt;
    private string $email;
    private string $message;
    private int $etoiles;
    private string $imgUsr;
    private string $dateAv;


function __construct(int $idusr,int $idprod,string $nomUt,string $email,string $message,int $etoiles,string $imgUsr,string $dateAv){
    $this->idusr=$idusr;
    $this->idprod=$idprod;
    $this->nomUt=$nomUt;
    $this->email=$email;
    $this->message=$message;
    $this->etoiles=$etoiles;
    $this->imgUsr=$imgUsr;
    $this->dateAv=$dateAv;
}

function setIdav($idav) { $this->idav = $idav; }
function getIdav() { return $this->idav; }

function setIdusr($idusr) { $this->idusr = $idusr; }
function getIdusr() { return $this->idusr; }

function setIdprod($idprod) { $this->idprod = $idprod; }
function getIdprod() { return $this->idprod; }

function setNomUt($nomUt) { $this->nomUt = $nomUt; }
function getNomUt() { return $this->nomUt; }

function setEmail($email) { $this->email = $email; }
function getEmail() { return $this->email; }

function setMessage($message) { $this->message = $message; }
function getMessage() { return $this->message; }

function setEtoiles($etoiles) { $this->etoiles = $etoiles; }
function getEtoiles() { return $this->etoiles; }

function setImgUsr($imgUsr) { $this->imgUsr = $imgUsr; }
function getImgUsr() { return $this->imgUsr; }

function setDateAv($dateAv) { $this->dateAv = $dateAv; }
function getDateAv() { return $this->dateAv; }

}

?>