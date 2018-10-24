<?php
// menginisialisasi session
session_start();

// menghapus semua session yang ada
session_destroy();

// redirect header
header("location:../?ref=dashboard&message=logout+success");