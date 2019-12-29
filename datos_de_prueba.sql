USE component_depot;

-- INSERTS--------------------------------------

--
-- insert into 'users'
--
INSERT INTO `users` VALUES(NULL, 'admin', 'active', 'Emilio', 'Rivas', 'Admin 1', NULL, 'admin@admin.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO `users` VALUES(NULL, 'user', 'active', 'José', 'Duarte', '@soy_novato', 'novato', 'user1@user1.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO `users` VALUES(NULL, 'user', 'active', 'Luis', 'Rivas', '@soy_avanzado', 'novato', 'user2@user2.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, '2019-05-28 13:41:04', CURTIME(), NULL, NULL);
INSERT INTO `users` VALUES(NULL, 'user', 'active', 'Emilio', 'Zambrano', '@soy_experto', 'novato', 'user3@user3.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, '2016-10-28 13:41:04', CURTIME(), NULL, NULL);

--
-- insert into `categories`
--
INSERT INTO `categories` VALUES
(null, 1, 'Tarjetas gráficas', 'Tarjetas gráficas para PC y portátil', CURTIME(), CURTIME()),
(null, 1, 'Procesadores CPU', 'AMD e INTEL', CURTIME(), CURTIME()),
(null, 1, 'Memoria RAM', 'Memoria RAM DDR para PC y portátil', CURTIME(), CURTIME()),
(null, 1, 'Discos duros', 'Discos duros para PC y portátil', CURTIME(), CURTIME());


--
-- insert into `components`
--

INSERT INTO `components` VALUES
(null, 1, 1, 'Gigabyte GeForce GT 710 2GB GDDR', 'GT710.jpg', 'Disfruta de toda la potencia de esta Gigabyte GeForce GT 710 con 2GB de memoria y conectores de primera calidad chapados en oro, con conectores de gran superficie fabricadas para una durabilidad increible. Con conexiones HDMI, DVI y D-sub podrás conectar tus dispositivos favoritos a tu ordenador y poder disfrutar aun más de tu ordenador.', CURTIME(), CURTIME()),
(null, 1, 1, 'Asus Dual GeForce RTX 2070 SUPER', 'RTX2070.jpg', 'Gráfica ASUS Dual GeForce® RTX 2070 SUPER™ EVO OC edition 8GB GDDR6 con dos potentes ventiladores Axial-tech para disfrutar de juegos triple A y VR con frecuencias de refresco más altas.', CURTIME(), CURTIME()),
(null, 1, 1, 'Asus GeForce GTX 1650 Dual 4GB', 'GTX1650.jpg', 'La ASUS Dual GeForce® GTX 1650 está construida con el rendimiento gráfico de vanguardia de la galardonada arquitectura NVIDIA Turing ™ para potenciar sus juegos favoritos. Prepare el juego con un rendimiento que es dos veces más rápido que la GeForce GTX 950 y hasta un 70% más rápido que la GTX 1050. GeForce Experience te permite capturar y compartir videos, capturas de pantalla y transmisiones en vivo con amigos, mantener actualizados los controladores de GeForce y optimizar fácilmente la configuración del juego.', CURTIME(), CURTIME()),
(null, 2, 1, 'AMD Ryzen 7 3800X 3.9GHz BOX', 'RYZEN3800X.jpg', 'Fabricados para rendir. Diseñados para ganar. Más velocidad. Más memoria. Mayor ancho de banda. Exígelos al máximo, exprime hasta la última gota de rendimiento, llévalos al límite. Los procesadores AMD Ryzen™ de 3ª generación se diseñaron para superar todas las expectativas y marcar un nuevo camino en materia de procesadores de alto rendimiento.\r\n\r\nLos procesadores AMD Ryzen™ de 3.ª generación nacen de la tecnología de fabricación más avanzada del mundo para garantizar un rendimiento ganador y un sistema con un funcionamiento asombrosamente refrigerado y silencioso.\r\n\r\nLos procesadores Ryzen de 3ª generación integran la primera plataforma de conectividad PCIe® 4.0 del mundo para poner en tus manos las tecnologías de motherboards, tarjetas gráficas y almacenamiento más avanzadas que existen.', CURTIME(), CURTIME()),
(null, 2, 1, 'Intel Core i7-9700K 3.6Ghz 300', 'I79700K.jpg', 'Sólo compatible con sus placas base basadas en chipset de la serie 300, el procesador Intel Core i7-9700K 12M cache, hasta 4.90 GHz está diseñado para juegos, creación y productividad.\r\n\r\nTiene una velocidad de reloj base de 3.6 GHz y viene con características como la compatibilidad con Intel Optane Memory, el cifrado AES-NI, la tecnología Intel vPro, Intel TXT, la Protección de dispositivos Intel con Boot Guard, la tecnología de virtualización Intel VT-d para E / S.\r\n\r\nCon la tecnología Intel Turbo Boost Max 3.0, la frecuencia máxima de turbo que este procesador puede alcanzar es de 4.9 GHz. Además, este procesador cuenta con 8 núcleos con 6 subprocesos en un zócalo LGA 1151, tiene 12 MB de memoria caché y 16 líneas PCIe. Tener 8 núcleos permite que el procesador ejecute varios programas simultáneamente sin ralentizar el sistema, mientras que los 6 subprocesos permiten que una secuencia de instrucciones ordenada básica pase o sea procesada por un solo núcleo de CPU. Este procesador también admite memoria RAM DDR4-2666 de doble canal y utiliza tecnología de novena generación.', CURTIME(), CURTIME()),
(null, 2, 1, 'AMD Ryzen 5 3600X 3.8GHz BOX', 'RYZEN3600X.jpg', 'Fabricados para rendir. Diseñados para ganar. Más velocidad. Más memoria. Mayor ancho de banda. Exígelos al máximo, exprime hasta la última gota de rendimiento, llévalos al límite. Los procesadores AMD Ryzen™ de 3ª generación se diseñaron para superar todas las expectativas y marcar un nuevo camino en materia de procesadores de alto rendimiento.\r\n\r\nLos procesadores AMD Ryzen™ de 3.ª generación nacen de la tecnología de fabricación más avanzada del mundo para garantizar un rendimiento ganador y un sistema con un funcionamiento asombrosamente refrigerado y silencioso.\r\n\r\nLos procesadores Ryzen de 3ª generación integran la primera plataforma de conectividad PCIe® 4.0 del mundo para poner en tus manos las tecnologías de motherboards, tarjetas gráficas y almacenamiento más avanzadas que existen.', CURTIME(), CURTIME()),
(null, 3, 1, 'Adata XPG Spectrix D80 DDR4 3200', 'DDR43200SPECTRIS.jpg', 'Conoce la primera memoria RGB DDR4 del mundo con un sistema híbrido de enfriamiento de aire y líquido, el SPECTRIX D80. Utiliza una combinación de un disipador de calor líquido sellado herméticamente con fluido no conductor, y un disipador de calor de aluminio para proporcionar un enfriamiento térmico efectivo. Además, el disipador de calor líquido está iluminado con iluminación RGB para darle a tu equipo un toque distintivo.', CURTIME(), CURTIME()),
(null, 3, 1, 'Corsair Vengeance LPX DDR4 2400', 'DDR43200CORSAIRVEGEANCE.jpg', 'La memoria Vengeance LPX se ha diseñado para overclocking de alto rendimiento. El disipador de calor, fabricado en aluminio puro, permite una disipación térmica más rápida; la placa impresa de ocho capas administra el calor y proporciona una capacidad superior para incrementar el overclocking. Cada circuito integrado está seleccionado individualmente para el máximo potencial de rendimiento. El formato DDR4 está optimizado para las placas base Intel de la serie X99/100 Series más recientes y ofrece frecuencias más elevadas, mayor ancho de banda y menor consumo energético que los módulos DDR3.\r\n\r\nSe ha verificado la compatibilidad de los módulos Vengeance LPX DDR4 para toda las placas base de la serie X99/100 Series, lo que asegura un rendimiento rápido y fiable. Compatibilidad con XMP 2.0 para un overclocking automático sin problemas. Y están disponibles en distintos colores para combinar con su placa base, sus componentes, o sencillamente con su estilo personal.', CURTIME(), CURTIME()),
(null, 3, 1, 'Corsair Dominator Platinum RGB DDR4', 'DDR43200CORSAIR.jpg', 'La memoria DDR4 CORSAIR DOMINATOR PLATINUM RGB redefine las memorias premium DDR4, con un diseño superior en aluminio, chips de memoria de alta frecuencia estrictamente verificados y 12 LED RGB CAPELLIX de direccionamiento individual y gran intensidad.\r\n', CURTIME(), CURTIME()),
(null, 4, 1, 'Kingston UV500 Disco Duro SSD 240GB', 'suv500ms-120g-s-hr.jpg', 'La familia UV500 de unidades de estado sólido (SSD) de Kingston mejora drásticamente la capacidad de respuesta de su sistema existente con increíbles tiempos de arranque, carga y transferencia en comparación con los discos duros mecánicos. Apoyadas en un controlador Marvell Dean aunado a memoria Flash NAND 3D, ofrecen velocidades de lectura y escritura de hasta 520 MB/s y 500 MB/s1 respectivamente. Estas unidades SSD son 10 veces más rápidas que los discos duros tradicionales y proveen un mejor rendimiento, velocidad de respuesta ultrarrápida en el procesamiento multitareas y una aceleración general del sistema. Las UV500 suministran protección de los datos de extremo a extremo, y admiten cifrado AES de 256 bits basado en hardware además de soluciones TCG Opal 2.0 de gestión de la seguridad.\r\n\r\nMás fiables y duraderas que las unidades de disco duro, las UV500 incorporan tecnología de memoria Flash con semiconductores NAND. No tienen piezas móviles, lo que las hace mucho menos susceptibles a fallos que los discos duros mecánicos. Además generan menos calor y son más silenciosas, y su alta resistencia a impactos y vibraciones las hace ideales para portátiles y otros dispositivos móviles.\r\n\r\nLas UV500 están disponibles en varias capacidades, de 120 GB hasta 960 GB2, de modo que usted puede utilizarlas como unidades de arranque o aprovechar las de mayores capacidades para almacenar vídeos, fotos y alojar las aplicaciones que más utilice.', CURTIME(), CURTIME()),
(null, 4, 1, 'Kingston SSDNow Disco Duro SSD 120GB M.2', 'suv500m8-120g-s-hr.jpg', 'Ésta unidad de estado sólido (SSD) de Kingston mejora drásticamente la capacidad de respuesta de su sistema existente con increíbles tiempos de arranque, carga y transferencia en comparación con los discos duros mecánicos. Apoyadas en un controlador Marvell Dean aunado a memoria Flash NAND 3D, ofrecen velocidades de lectura y escritura de hasta 520 MB/s y 500 MB/s1 respectivamente. Estas unidades SSD son 10 veces más rápidas que los discos duros tradicionales y proveen un mejor rendimiento, velocidad de respuesta ultrarrápida en el procesamiento multitareas y una aceleración general del sistema. Las UV500 suministran protección de los datos de extremo a extremo, y admiten cifrado AES de 256 bits basado en hardware además de soluciones TCG Opal 2.0 de gestión de la seguridad.\r\n\r\nMás fiables y duraderas que las unidades de disco duro, las UV500 incorporan tecnología de memoria Flash con semiconductores NAND. No tienen piezas móviles, lo que las hace mucho menos susceptibles a fallos que los discos duros mecánicos. Además generan menos calor y son más silenciosas, y su alta resistencia a impactos y vibraciones las hace ideales para portátiles y otros dispositivos móviles.\r\n\r\nLas UV500 están disponibles en varias capacidades, de 120 GB hasta 960 GB2, de modo que usted puede utilizarlas como unidades de arranque o aprovechar las de mayores capacidades para almacenar vídeos, fotos y alojar las aplicaciones que más utilice.', CURTIME(), CURTIME()),
(null, 4, 1, 'Toshiba OCZ TR200 SSD 480GB SATA3', 'discoduro1.jpg', 'Actualizar desde una unidad de disco duro (HDD) debería ser fácil y asequible y es ahí donde entran las SSD OCZ TR200. Diseñada para aumentar la velocidad de su computadora portátil o PC en discos duros convencionales, la Serie TR200 aprovecha la avanzada tecnología 3D BiCS FLASH ™ de 64 capas de Toshiba, para ofrecer un rendimiento equilibrado, fiabilidad y valor que transformará su sistema móvil o de escritorio.\r\n\r\nCon una estructura celular de 64 capas apiladas verticalmente, la tecnología Toshiba BiCS FLASH permite una mayor capacidad, resistencia, rendimiento y eficiencia en el mismo espacio, ofreciendo una experiencia de almacenamiento de última generación.\r\n\r\nMejore su productividad con la serie TR200 y disfrute de arranques más rápidos, transferencias de archivos y capacidad de respuesta del sistema. Despídase del retraso de la unidad de disco duro y obtenga una experiencia informática digna de su tiempo.\r\n\r\nEn comparación con las unidades de disco duro, las unidades Toshiba OCZ TR200 SSD también ofrecen mayor durabilidad y menos consumo de energía, lo que se traduce en una mayor duración de la batería para mantenerlo en funcionamiento más tiempo.', CURTIME(), CURTIME());



--
-- insert into `comments`
--
INSERT INTO `comments` VALUES(null, 1, 2, 'Excelente tarjeta gráfica. La recomiendo para gamers', CURTIME(), CURTIME() );

--
-- insert into `likes`
--
INSERT INTO `likes` VALUES(null, 2, 1, CURTIME(), CURTIME() );

-- ---------------------------
-- insert 28 ratings a @soy_avanzado
-- ---------------------------
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '3', '7', '5', curtime(), curtime());

-- ---------------------------------
-- insert 52 ratings a @soy_experto
-- ------------------------------------
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
INSERT INTO `ratings` VALUES (NULL, '4', '7', '5', curtime(), curtime());
