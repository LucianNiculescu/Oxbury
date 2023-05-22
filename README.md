## Table of Contents

- [Requirements](#requirements)
- [Details](#details)
- [What I'm Pleased With](#what-im-pleased-with)
- [What I Would Have Done With More Time](#what-i-would-have-done-with-more-time)


### Requirements
The project has been created using the `Docker` and `docker-compose` utils. These will be required before doing `docker-compose up` for booting up the Project

### Details
- The GameMap Class represents the 2D array that will hold the game map and contains the `pathfind()` method that calculates the shortest path between two points. 
- The Position Class represents a position on the map.
- The solution has been created utilizes a Breadth-First Search (BFS) algorithm to find the shortest path between two points on the array map.
- BFS is a graph traversal algorithm that explores all the vertices of a graph in breadth-first order, i.e., it visits all the neighbors of a vertex before moving on to their respective neighbors. In the context of the grid map, the algorithm explores the map layer by layer, starting from the initial position, and expands outward until it reaches the target position.
- During the BFS traversal, the algorithm keeps track of visited positions to avoid revisiting them and maintains a distance array to store the shortest distance from the start position to each visited position. 
This allows the algorithm to terminate early when the target position is reached, ensuring that the distance returned is indeed the shortest path distance.
By using BFS, the solution guarantees finding the shortest path while respecting the walls (blocked positions) in the grid map.
- The array $queue is used to maintain the queue of positions to visit. The array_shift() function is used to dequeue the next position from the front of the array.

### What I'm Pleased With
1. Added Docker, Composer, PhpUnit and tried to make the Project containerised and stand alone;
2. Simple solution using PhP OOP and SOLID Principles;

### What I Would Have Done With More Time
1. Had some problems with the Namespace on the PhpUnit, would fix that
2. Would implement different types of algorithms and check the performance between them. I was reading about different types like Dijkstra shortest path algorithm, the Yen’s algorithm or The All Pairs Shortest Path. These can all be implemented as individual Classes that implement an Interface that has the `pathfind()` as common method between them (also required)
3. Would add the MySQL ( or any type of DB connection ) to store information like the performance of the code
4. Would add traits or Abstract Classes for a more complex solution ( didn't see the need of it for the moment )
5. For the sake of this exercise, I kept the naming of `pathfind()` as a requirement but I would've name this `getClosestPath()`
