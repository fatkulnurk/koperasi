<?php
include "../app.php";
// menghapus semua session
session_destroy();

// redirect header
header("location:../?ref=dashboard&message=logout+success");