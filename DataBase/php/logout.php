<?php

session_start();
unset($_SESSION['sessionUser']);
session_destroy();

header("Location: ../../index.html");

?>