<?php

use Model\Admin;
use Repository\RepositoryAdminImpl;

require_once __DIR__ . "/../Utility/Connection.php";
require_once __DIR__ . "/../Model/Admin.php";
require_once __DIR__ . "/../Repository/RepositoryAdmin.php";

$connection = getConnection();

$repository = new RepositoryAdminImpl($connection);
$admin = new Admin(first_name: "hallo", last_name: "haii");
$insert = $repository->insert($admin);

var_dump($insert->getId());

$connection = null;