<?php
require './pub/tools.func.php';
deleteSession('id', 'admin');
header('location:login.php');