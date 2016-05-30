/*
modifcar FC al tipo de gasto insumos a contabilizar
tipo gasto = 5 -- insumos a contabilizar
*/
/*
select *
from factura_compra
where numero in ('00034603', '00036150')
*/
UPDATE factura_compra
SET tipogastoid=5
WHERE numero IN ('00034603', '00036150')
