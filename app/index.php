<?php

require_once 'Entities/GameMap.php';
require_once 'Entities/Position.php';

use App\Entities\GameMap;
use App\Entities\Position;


$map = [
    [true, true, true, true, true],
    [true, false, false, false, true],
    [true, true, true, true, true],
    [true, true, true, true, true],
    [true, true, true, true, true]
];

$gameMap = new GameMap($map);

$start = new Position(0, 1); // P position
$end = new Position(3, 2); // Q position

$distance = $gameMap->pathfind($start, $end);
echo "Shortest path distance: {$distance}";
