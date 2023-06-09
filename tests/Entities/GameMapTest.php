<?php
declare(strict_types=1);
namespace Entities;

use App\Entities\GameMap;
use App\Entities\Position;
use Generator;
use PHPUnit\Framework\TestCase;

class GameMapTest extends TestCase
{
    public static function pathfindDataProvider(): Generator
    {
        // The desired solution
        yield [
            [
                [true, true, true, true, true],
                [true, false, false, false, true],
                [true, true, true, true, true],
                [true, true, true, true, true],
                [true, true, true, true, true],
            ],
            new Position(0, 1),
            new Position(3, 2),
            6
        ];

        // Impossible to reach the end of the map
        yield [
            [
                [true, true, true, true, true],
                [false, false, false, false, false],
                [true, true, true, true, true],
                [true, true, true, true, true],
                [true, true, true, true, true],
            ],
            new Position(0, 0),
            new Position(4, 4),
            -1
        ];

        // Same Start and End position
        yield [
            [
                [true],
            ],
            new Position(0, 0),
            new Position(0, 0),
            0
        ];

        // Empty Map
        yield [
            [
                [],
            ],
            new Position(0, 0),
            new Position(0, 0),
            0
        ];
    }

    /**
     * @dataProvider pathfindDataProvider
     */
    public function testShortestPathFromMapWithPositions($map, $startPosition, $endPosition, $expectedOutcome): void
    {
        $gameMap = new GameMap($map);
        $distance = $gameMap->pathfind($startPosition, $endPosition);

        self::assertSame($expectedOutcome, $distance);
    }
}
