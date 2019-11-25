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
INSERT INTO `components` VALUES(null, 1, 1, 'Gigabyte GeForce GT 710 2GB GDDR', 'gigabyte-geforce-gt-710-2gb-gffr5.jpg', 'Disfruta de toda la potencia de esta Gigabyte GeForce GT 710 con 2GB de memoria y conectores de primera calidad chapados en oro, con conectores de gran superficie fabricadas para una durabilidad increible. Con conexiones HDMI, DVI y D-sub podrás conectar tus dispositivos favoritos a tu ordenador y poder disfrutar aun más de tu ordenador.', CURTIME(), CURTIME() );

INSERT INTO `components` VALUES(null, 2, 1, 'Toshiba HDD 500GB 5400RPM SATA3 ', 'toshiba-hdd-500gb-5400rpm-sata3.jpg', '
    Factor de forma 2.5"
    Velocidad de 5400 rpm
    Capacidad de almacenamiento 500 GB
', CURTIME(), CURTIME() );

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
