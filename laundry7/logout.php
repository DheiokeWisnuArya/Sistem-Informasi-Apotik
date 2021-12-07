<?php

require 'conn.php';

session_destroy();
header('location: index.php');

?>