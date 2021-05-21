<?php
class utilisateur
{

private int $id;
private string $nomUt;
private string $pass;
private string $email;
private string $nomPrenom;
private string $pays;
private string $adresse;
private string $tel;
private string $sexe;
private int $verifier=0;


function __construct(string $nomUt,string $pass,string $email
,string $nomPrenom,string $pays,string $adresse,string $tel,string $sexe)
{

$this->nomUt=$nomUt;
$this->pass=$pass;
$this->email=$email;
$this->nomPrenom=$nomPrenom;
$this->pays=$pays;
$this->adresse=$adresse;
$this->tel=$tel;
$this->sexe=$sexe;
}

function getId() { return $this->id; }
function setNomUt($nomUt) { $this->nomUt = $nomUt; }
function getNomUt() { return $this->nomUt; }
function setPass($pass) { $this->pass = $pass; }
function getPass() { return $this->pass; }
function setEmail($email) { $this->email = $email; }
function getEmail() { return $this->email; }
function setNomPrenom($nomPrenom) { $this->nomPrenom = $nomPrenom; }
function getNomPrenom() { return $this->nomPrenom; }
function setPays($pays) { $this->pays = $pays; }
function getPays() { return $this->pays; }
function setAdresse($adresse) { $this->adresse = $adresse; }
function getAdresse() { return $this->adresse; }
function setTel($tel) { $this->tel = $tel; }
function getTel() { return $this->tel; }
function setSexe($sexe) { $this->sexe = $sexe; }
function getSexe() { return $this->sexe; }
function setVerifier($verifier) { $this->verifier = $verifier; }
function getVerifier() { return $this->verifier; }

}


?>