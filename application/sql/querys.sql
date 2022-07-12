-- Realizar una consulta que permita conocer cuál es el producto que más stock tiene
SELECT * FROM productos WHERE stock = (SELECT MAX(stock) FROM productos);

-- Realizar una consulta que permita conocer cuál es el producto más vendido.
SELECT *, SUM(cantidad) AS can_total FROM productos p
INNER JOIN ventas v ON p.id = v.id_producto
GROUP BY p.id
ORDER BY can_total DESC LIMIT 1