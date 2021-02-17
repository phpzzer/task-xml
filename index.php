<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

$feed = new ymlFeed("task.xml");
$finder = new Finder();

$items = $feed->getOffersIds();
$diffArray = $finder::findMissedNumbers($items);
$result = $finder::wrapErrors($diffArray);

echo $result;