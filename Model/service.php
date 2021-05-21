<?php

class service{

    private int $idProd;
    private int $idUsr;
    private string $titreProd;
    private string $descProd;
    private string $prixProd;
    private int $quantProd;
    private string $img1;
    private string $img2;
    private string $img3;

    function __construct(int $idUsr,string $titreProd,string $descProd,string $prixProd,int $quantProd,string $img1,string $img2,string $img3){
        $this->idUsr=$idUsr;
        $this->titreProd=$titreProd;
        $this->descProd=$descProd;
        $this->prixProd=$prixProd;
        $this->quantProd=$quantProd;
        $this->img1=$img1;
        $this->img2=$img2;
        $this->img3=$img3;
    }

function getIdUsr() { return $this->idUsr; }
function setIdUsr($idUsr) { $this->idUsr = $idUsr; }

function setIdProd($idProd) { $this->idProd = $idProd; }
function getIdProd() { return $this->idProd; }

function setTitreProd($titreProd) { $this->titreProd = $titreProd; }
function getTitreProd() { return $this->titreProd; }

function setDescProd($descProd) { $this->descProd = $descProd; }
function getDescProd() { return $this->descProd; }

function setPrixProd($prixProd) { $this->prixProd = $prixProd; }
function getPrixProd() { return $this->prixProd; }

function setQuantProd($quantProd) { $this->quantProd = $quantProd; }
function getQuantProd() { return $this->quantProd; }

function setImg1($img1) { $this->img1 = $img1; }
function getImg1() { return $this->img1; }

function setImg2($img2) { $this->img2 = $img2; }
function getImg2() { return $this->img2; }

function setImg3($img3) { $this->img3 = $img3; }
function getImg3() { return $this->img3; }


}


?>