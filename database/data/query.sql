
INSERT INTO proveedores(nombre, rfc, telefono, email, estatus, created_user_id) VALUES
('PROVEEDOR UNO', 'PROV000001', '1234567890', 'correo@correo.com', TRUE, 1),
('PROVEEDOR DOS', 'PROV000002', '1234567890', 'correo@correo.com', TRUE, 1),
('PROVEEDOR TRES', 'PROV000003', '1234567890', 'correo@correo.com', TRUE, 1),
('PROVEEDOR CUATRO', 'PROV000004', '1234567890', 'correo@correo.com', TRUE, 1),
('PROVEEDOR CINCO', 'PROV000005', '1234567890', 'correo@correo.com', TRUE, 1);

INSERT INTO categorias(nombre, cve_cat, estatus, created_user_id) VALUES
('CATEGORIA UNO', 'CAT0000001', TRUE, 1),
('CATEGORIA DOS', 'CAT0000002', TRUE, 1),
('CATEGORIA TRES', 'CAT0000003', TRUE, 1),
('CATEGORIA CUATRO', 'CAT0000004', TRUE, 1),
('CATEGORIA CINCO', 'CAT0000005', TRUE, 1);

INSERT INTO areas (nombre, cve_area, estatus, created_user_id) VALUES
('AREA UNO', 'AU00000001', TRUE, 1),
('AREA DOS', 'AD00000002', TRUE, 1),
('AREA TRES', 'AT00000003', TRUE, 1),
('AREA CUATRO', 'AC00000004', TRUE, 1),
('AREA CINCO', 'AC00000005', TRUE, 1);

INSERT INTO productos(nombre, proveedor_id, codigo, precio_venta, precio_venta, cantidad, categoria_id, estatus, created_user_id) VALUES 
('producto uno', 1, 'PROD000001', 189.99, 214.88, 200, 1, TRUE, 1),
('producto dos', 2, 'PROD000002', 189.99, 214.88, 200, 2, TRUE, 1),
('producto tres', 3, 'PROD000003', 189.99, 214.88, 200, 3, TRUE, 1),
('producto cuatro', 4, 'PROD000004', 189.99, 214.88, 200, 4, TRUE, 1),
('producto cinco', 5, 'PROD000005', 189.99, 214.88, 200, 5, TRUE, 1);

INSERT INTO inventario_entradas(cve_entrada, proveedor_id, factura, fac_fecha_emision, fac_fecha_operacion, fac_subtotal, fac_impuestos, fac_total, fac_total_letra, fac_forma_pago, fac_metodo_pago, created_user, updated_user) VALUES
('ETD220000001', 1, 1, '2022-07-11', '2022-07-11',16800.00, 3200.00, 20000.00, 'VEINTE MIL PESOS 00/100 M.N.', 'Efectivo', 'Pago en una sola exhibicion', 'admin', 'admin'),
('ETD220000002', 2, 2, '2022-07-11', '2022-07-11',16800.00, 3200.00, 20000.00, 'VEINTE MIL PESOS 00/100 M.N.', 'Efectivo', 'Pago en una sola exhibicion', 'admin', 'admin'),
('ETD220000003', 3, 3, '2022-07-11', '2022-07-11',16800.00, 3200.00, 20000.00, 'VEINTE MIL PESOS 00/100 M.N.', 'Efectivo', 'Pago en una sola exhibicion', 'admin', 'admin'),
('ETD220000004', 4, 4, '2022-07-11', '2022-07-11',16800.00, 3200.00, 20000.00, 'VEINTE MIL PESOS 00/100 M.N.', 'Efectivo', 'Pago en una sola exhibicion', 'admin', 'admin'),
('ETD220000005', 5, 5, '2022-07-11', '2022-07-11',16800.00, 3200.00, 20000.00, 'VEINTE MIL PESOS 00/100 M.N.', 'Efectivo', 'Pago en una sola exhibicion', 'admin', 'admin');