<?php
declare(strict_types=1);

namespace App\Entities;

class GameMap
{
    private array $map;

    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * Finding the shortest distance using the Breadth-First Search (BFS) algorithm that is checking the available position of neighbours
     *
     * @param Position $start
     * @param Position $end
     * @return int
     */
    public function pathfind(Position $start, Position $end): int
    {
        $queue = [];
        $visited = [];

        $queue[] = [$start, 0];
        $visited[$start->horizontal][$start->vertical] = true;

        while (!empty($queue)) {
            [$current, $distance] = array_shift($queue);

            if ($current->horizontal === $end->horizontal && $current->vertical === $end->vertical) {
                return $distance;
            }

            $neighbors = $this->getAvailableNeighbourPositions($current);
            foreach ($neighbors as $neighbor) {
                if (!isset($visited[$neighbor->horizontal][$neighbor->vertical])) {
                    $queue[] = [$neighbor, $distance + 1];
                    $visited[$neighbor->horizontal][$neighbor->vertical] = true;
                }
            }
        }

        return -1; // No path found
    }

    /**
     * Checking what positions are available next (up, down, left, right) to the given Position
     *
     * @param Position $position
     * @return array
     */
    private function getAvailableNeighbourPositions(Position $position): array
    {
        $neighbors = [];
        $moves = [
            [-1, 0], // up
            [1, 0], // down
            [0, -1], // left
            [0, 1] // right
        ];

        foreach ($moves as $move) {
            $horizontal = $position->horizontal + $move[0];
            $vertical = $position->vertical + $move[1];

            if (!empty($this->map[$horizontal][$vertical]) && $this->isValidPosition($horizontal, $vertical)) {
                $neighbors[] = new Position($horizontal, $vertical);
            }
        }

        return $neighbors;
    }

    /**
     * Checking if the position is valid based on the Horizontal and Vertical Position
     *
     * @param int $horizontal
     * @param int $vertical
     * @return bool
     */
    private function isValidPosition(int $horizontal, int $vertical): bool
    {
        $rows = count($this->map);
        $cols = count($this->map[0]);

        return $horizontal >= 0 && $horizontal < $rows && $vertical >= 0 && $vertical < $cols;
    }
}
