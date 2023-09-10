<?php

$first = "select * from objects WHERE type = (1) order by price asc";

$second = "select  a.id, a.lastName
	from(

			SELECT clients.id as id, clients.lastName as lastName, COUNT(rents.id) as times
			FROM clients
			JOIN rents ON rents.clientId = clients.id
			GROUP BY clients.id
	) as a
	where a.times = 2";

$third = "select  a.id, a.type, a.price
from(

		SELECT objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times
		FROM objects
		LEFT JOIN rents ON rents.objectId = objects.id
		GROUP BY objects.id
) as a
where a.times = 0";

$fourth = "select  a.id, a.type, a.price
from(

		SELECT objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times
		FROM objects
		LEFT JOIN rents ON rents.objectId = objects.id
		GROUP BY objects.id
) as a
where a.times > 3";

$fifth = "select  a.id, a.type, a.price, a.times
from(
			SELECT objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times
			FROM objects
			JOIN rents ON rents.objectId = objects.id
			WHERE rents.rentDuration > 12
			GROUP BY objects.id, rents.objectId
) as a
where a.times > 2";

$six = "select objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times, SUM(objects.price) as summ
FROM objects
JOIN rents ON rents.objectId = objects.id
GROUP BY objects.id, rents.objectId";

$seven = "select clients.id as id, clients.lastName as lastName, SUM(rents.rentDuration)/COUNT(rents.id) AS average, COUNT(rents.id) as count, SUM(rents.rentDuration) as sumDuration
FROM clients
JOIN rents ON rents.clientId = clients.id
GROUP BY clients.id";

$eighth = "select objects.id as id, objects.type as type, objects.price as price, rents.dateRent
FROM objects
JOIN rents ON rents.objectId = objects.id
where objects.type = 1 and rents.dateRent BETWEEN '2023-04-10' AND '2023-09-10'
ORDER BY rents.dateRent ASC";

$nine = "select clients.id as id, clients.lastName as lastName, count(rents.objectId) as objectsCount
FROM clients
JOIN rents ON rents.clientId = clients.id
GROUP BY clients.id";

$ten = "UPDATE objects SET price = price * 1.12 WHERE type = 1";