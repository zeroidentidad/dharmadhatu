<?php

require_once "models/enlaces.php";
require_once "models/ingreso.php";
require_once "models/gestorSlide.php";

require_once "controllers/template.php";
require_once "controllers/enlaces.php";
require_once "controllers/ingreso.php";
require_once "controllers/gestorSlide.php";

$template = new TemplateController();
$template -> template();