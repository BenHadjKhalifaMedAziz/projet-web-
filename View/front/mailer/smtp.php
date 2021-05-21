<?php


class phpmailer {
    // Set default variables for all new objects
    var $From     = "hamza.ghariani@esprit.tn";
    var $FromName = "MiniArt NewsLetter";
    var $Host     = "smtp.gmail.com";
    var $Mailer   = "smtp";                         // Alternative to IsSMTP()
    var $WordWrap = 465;hx;<kbd></kbd>

    // Replace the default error_handler
    function error_handler($msg) {
        print("My Site Error");
        print("Description:");
        printf("%s", $msg);
        exit;
    }

    // Create an additional function
    function do_something($something) {
        // Place your new code here
    }
}
?>