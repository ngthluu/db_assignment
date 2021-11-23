<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function hashing($str) {
    return hash('sha256', $str . "db_assignment");
}