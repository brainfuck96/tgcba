<?php
include_once 'php/Database.php';
include_once 'php/Queries.php';


$count = Queries::GetAdminUsers('admin', '314159265');

echo $count;