<?php
require 'vendor/autoload.php';

use RestKlient\Producer\ProducerApiModel;

$getter = new ProducerApiModel();
var_dump(json_decode($getter->getAll()));

$creator = new ProducerApiModel(3, 'mxr industries2', 'localhost2.mxr', 'mxr_indstrs2', 2, null);
var_dump(json_decode($creator->createOne()));