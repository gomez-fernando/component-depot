USE component_depot;

-- INSERTS--------------------------------------

--
-- insert into 'users'
--
INSERT INTO `users` VALUES(NULL, 'admin', 'Emilio', 'Rivas', 'Admin 1', NULL, 'admin@admin.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, CURTIME(), CURTIME(), NULL);
INSERT INTO `users` VALUES(NULL, 'user', 'nombre1', 'apellido1', 'nick1', 'novato', 'user1@user1.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, CURTIME(), CURTIME(), NULL);

--
-- insert into `categories`
--
INSERT INTO `categories` VALUES(null, 1, 'Tarjetas gráficas', 'Tarjetas gráficas para PC y portátil', CURTIME(), CURTIME() );
INSERT INTO `categories` VALUES(null, 1, 'Discos Duros HD', 'Discos duros HD para PC y portátil', CURTIME(), CURTIME() );
INSERT INTO `categories` VALUES(null, 1, 'Discos Duros SD', 'Discos duros SD para PC y portátil', CURTIME(), CURTIME() );

--
-- insert into `components`
--

INSERT INTO `components` VALUES(null, 2, 1, 'Toshiba HDD 500GB 5400RPM SATA3 ', 'toshiba-hdd-500gb-5400rpm-sata3.jpg', '
    Factor de forma 2.5"
    Velocidad de 5400 rpm
    Capacidad de almacenamiento 500 GB
', CURTIME(), CURTIME() ),
(null, 1, 1, 'Gigabyte GeForce GT 710 2GB GDDR', 'GT710.jpg', 'Disfruta de toda la potencia de esta Gigabyte GeForce GT 710 con 2GB de memoria y conectores de primera calidad chapados en oro, con conectores de gran superficie fabricadas para una durabilidad increible. Con conexiones HDMI, DVI y D-sub podrás conectar tus dispositivos favoritos a tu ordenador y poder disfrutar aun más de tu ordenador.', CURTIME(), CURTIME()),
(null, 1, 1, 'Asus Dual GeForce RTX 2070 SUPER EVO OC Edition 8GB GDDR6', 'RTX2070.jpg', 'Gráfica ASUS Dual GeForce® RTX 2070 SUPER™ EVO OC edition 8GB GDDR6 con dos potentes ventiladores Axial-tech para disfrutar de juegos triple A y VR con frecuencias de refresco más altas.', CURTIME(), CURTIME()),
(null, 1, 1, 'Asus GeForce GTX 1650 Dual 4GB OC GDDR5', 'GTX1650.jpg', 'La ASUS Dual GeForce® GTX 1650 está construida con el rendimiento gráfico de vanguardia de la galardonada arquitectura NVIDIA Turing ™ para potenciar sus juegos favoritos. Prepare el juego con un rendimiento que es dos veces más rápido que la GeForce GTX 950 y hasta un 70% más rápido que la GTX 1050. GeForce Experience te permite capturar y compartir videos, capturas de pantalla y transmisiones en vivo con amigos, mantener actualizados los controladores de GeForce y optimizar fácilmente la configuración del juego.', CURTIME(), CURTIME()),
(null, 2, 1, 'AMD Ryzen 7 3800X 3.9GHz BOX', 'RYZEN3800X.jpg', 'Fabricados para rendir. Diseñados para ganar. Más velocidad. Más memoria. Mayor ancho de banda. Exígelos al máximo, exprime hasta la última gota de rendimiento, llévalos al límite. Los procesadores AMD Ryzen™ de 3ª generación se diseñaron para superar todas las expectativas y marcar un nuevo camino en materia de procesadores de alto rendimiento.\r\n\r\nLos procesadores AMD Ryzen™ de 3.ª generación nacen de la tecnología de fabricación más avanzada del mundo para garantizar un rendimiento ganador y un sistema con un funcionamiento asombrosamente refrigerado y silencioso.\r\n\r\nLos procesadores Ryzen de 3ª generación integran la primera plataforma de conectividad PCIe® 4.0 del mundo para poner en tus manos las tecnologías de motherboards, tarjetas gráficas y almacenamiento más avanzadas que existen.', CURTIME(), CURTIME()),
(null, 2, 1, 'Intel Core i7-9700K 3.6Ghz', 'I79700K.jpg', 'Sólo compatible con sus placas base basadas en chipset de la serie 300, el procesador Intel Core i7-9700K 12M cache, hasta 4.90 GHz está diseñado para juegos, creación y productividad.\r\n\r\nTiene una velocidad de reloj base de 3.6 GHz y viene con características como la compatibilidad con Intel Optane Memory, el cifrado AES-NI, la tecnología Intel vPro, Intel TXT, la Protección de dispositivos Intel con Boot Guard, la tecnología de virtualización Intel VT-d para E / S.\r\n\r\nCon la tecnología Intel Turbo Boost Max 3.0, la frecuencia máxima de turbo que este procesador puede alcanzar es de 4.9 GHz. Además, este procesador cuenta con 8 núcleos con 6 subprocesos en un zócalo LGA 1151, tiene 12 MB de memoria caché y 16 líneas PCIe. Tener 8 núcleos permite que el procesador ejecute varios programas simultáneamente sin ralentizar el sistema, mientras que los 6 subprocesos permiten que una secuencia de instrucciones ordenada básica pase o sea procesada por un solo núcleo de CPU. Este procesador también admite memoria RAM DDR4-2666 de doble canal y utiliza tecnología de novena generación.', CURTIME(), CURTIME()),
(null, 2, 1, 'AMD Ryzen 5 3600X 3.8GHz BOX', 'RYZEN3600X.jpg', 'Fabricados para rendir. Diseñados para ganar. Más velocidad. Más memoria. Mayor ancho de banda. Exígelos al máximo, exprime hasta la última gota de rendimiento, llévalos al límite. Los procesadores AMD Ryzen™ de 3ª generación se diseñaron para superar todas las expectativas y marcar un nuevo camino en materia de procesadores de alto rendimiento.\r\n\r\nLos procesadores AMD Ryzen™ de 3.ª generación nacen de la tecnología de fabricación más avanzada del mundo para garantizar un rendimiento ganador y un sistema con un funcionamiento asombrosamente refrigerado y silencioso.\r\n\r\nLos procesadores Ryzen de 3ª generación integran la primera plataforma de conectividad PCIe® 4.0 del mundo para poner en tus manos las tecnologías de motherboards, tarjetas gráficas y almacenamiento más avanzadas que existen.', CURTIME(), CURTIME()),
(null, 3, 1, 'Adata XPG Spectrix D80 DDR4 3200 PC4-25600 16GB 2x8GB CL16 Negro', 'DDR43200SPECTRIS.jpg', 'Conoce la primera memoria RGB DDR4 del mundo con un sistema híbrido de enfriamiento de aire y líquido, el SPECTRIX D80. Utiliza una combinación de un disipador de calor líquido sellado herméticamente con fluido no conductor, y un disipador de calor de aluminio para proporcionar un enfriamiento térmico efectivo. Además, el disipador de calor líquido está iluminado con iluminación RGB para darle a tu equipo un toque distintivo.', CURTIME(), CURTIME()),
(null, 3, 1, 'Corsair Dominator Platinum RGB DDR4 3200 SPD 2133 PC4-25600 16GB 2x8GB CL16', 'DDR43200CORSAIR.jpg', 'La memoria DDR4 CORSAIR DOMINATOR PLATINUM RGB redefine las memorias premium DDR4, con un diseño superior en aluminio, chips de memoria de alta frecuencia estrictamente verificados y 12 LED RGB CAPELLIX de direccionamiento individual y gran intensidad.\r\n', CURTIME(), CURTIME()),
(null, 3, 1, 'Corsair Vengeance LPX DDR4 2400 PC4-19200 16GB 2x8GB CL16', 'DDR43200CORSAIRVEGEANCE.jpg', 'La memoria Vengeance LPX se ha diseñado para overclocking de alto rendimiento. El disipador de calor, fabricado en aluminio puro, permite una disipación térmica más rápida; la placa impresa de ocho capas administra el calor y proporciona una capacidad superior para incrementar el overclocking. Cada circuito integrado está seleccionado individualmente para el máximo potencial de rendimiento. El formato DDR4 está optimizado para las placas base Intel de la serie X99/100 Series más recientes y ofrece frecuencias más elevadas, mayor ancho de banda y menor consumo energético que los módulos DDR3.\r\n\r\nSe ha verificado la compatibilidad de los módulos Vengeance LPX DDR4 para toda las placas base de la serie X99/100 Series, lo que asegura un rendimiento rápido y fiable. Compatibilidad con XMP 2.0 para un overclocking automático sin problemas. Y están disponibles en distintos colores para combinar con su placa base, sus componentes, o sencillamente con su estilo personal.', CURTIME(), CURTIME());


--
-- insert into `comments`
--
INSERT INTO `comments` VALUES(null, 1, 2, 'Excelente tarjeta gráfica. La recomiendo para gamers', CURTIME(), CURTIME() );

--
-- insert into `likes`
--
INSERT INTO `likes` VALUES(null, 2, 1, CURTIME(), CURTIME() );

--
-- insert into `ratings`
--
INSERT INTO `ratings` VALUES(null, 2, 1, 5, CURTIME(), CURTIME() );
