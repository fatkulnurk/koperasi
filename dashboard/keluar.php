<?php
session_start();
session_destroy();

// redirect header
header("location:../?ref=dashboard&message=logout+success");