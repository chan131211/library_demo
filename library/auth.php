<?php
require './pub/tools.func.php';
if (empty(getSession('id', 'admin'))) {
    header('location:login.php');
    exit;
}
