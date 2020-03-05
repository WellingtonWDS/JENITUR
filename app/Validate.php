<?php
Namespace App;


class Validate {

    public function validateBoard($string){

        if (preg_match('/^[A-Z]{3}\-[0-9]{4}$/', $string)) {
            return 'ok';
        } else {
            return 'placa invalida';
        }

    }


}