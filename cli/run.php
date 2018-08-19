<?php

error_reporting(0);

use Maaaxim\UsingPhotoGpsCommand\Command\GetPhotoGpsCommand;
use Maaaxim\UsingPhotoGpsCommand\Command\SetPhotoGpsCommand;
use Symfony\Component\Console\Application;

require("./vendor/autoload.php");

$app = new Application('Welcome', "v1.0.0");
$app->add(new GetPhotoGpsCommand());
$app->add(new SetPhotoGpsCommand());
$app->run();