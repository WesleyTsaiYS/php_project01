<?php
session_start();
session_unset();
session_destroy();
header("location: ../not_logged.php");

exit();
