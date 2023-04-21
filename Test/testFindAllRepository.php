<?php

use Model\Admin;
use Repository\RepositoryAdminImpl;

require_once __DIR__ . "/../Utility/Connection.php";
require_once __DIR__ . "/../Model/Admin.php";
require_once __DIR__ . "/../Repository/RepositoryAdmin.php";

$connection = getConnection();

$repository = new RepositoryAdminImpl($connection);
$findAll = $repository->findAll();
var_dump($findAll);

$connection = null;