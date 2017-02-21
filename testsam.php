<?php

require 'vendor/autoload.php';

$cluster = new CouchbaseCluster('couchbase://couchbase');
$bucket = $cluster->openBucket('sessions', '');
var_dump($bucket->remove($argv[1]));
