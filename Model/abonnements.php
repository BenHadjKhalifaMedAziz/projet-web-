<?php
class abonne{
    private string $email;


function __construct(string $email){
    $this->email=$email;
}

function setEmail($email) { $this->email = $email; }
function getEmail() { return $this->email; }


}

?>