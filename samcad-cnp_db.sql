

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productos_id` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `salida` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO almacen VALUES("1","1","6500","3415","3085");
INSERT INTO almacen VALUES("2","2","2000","605","1395");
INSERT INTO almacen VALUES("3","3","4922","1257","3665");
INSERT INTO almacen VALUES("4","4","50000","10","49990");
INSERT INTO almacen VALUES("5","5","0","0","0");
INSERT INTO almacen VALUES("6","6","0","0","0");
INSERT INTO almacen VALUES("7","7","0","0","0");
INSERT INTO almacen VALUES("8","8","0","0","0");
INSERT INTO almacen VALUES("9","9","0","0","0");





CREATE TABLE `bitacoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accion` varchar(60) NOT NULL,
  `sesion_id` int(11) NOT NULL,
  `host` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=513 DEFAULT CHARSET=latin1;

INSERT INTO bitacoras VALUES("1","Registro Nuevo Cliente","13","127.0.0.1","2014-12-03 22:57:46");
INSERT INTO bitacoras VALUES("2","Actualizar Datos Cliente","13","127.0.0.1","2014-12-03 23:09:56");
INSERT INTO bitacoras VALUES("3","Registro de Observaciones","13","127.0.0.1","2014-12-03 23:11:27");
INSERT INTO bitacoras VALUES("4","Actualizar Datos Cliente","13","127.0.0.1","2014-12-03 23:21:23");
INSERT INTO bitacoras VALUES("5","Registro Nuevo Empleado","13","127.0.0.1","2014-12-03 23:25:23");
INSERT INTO bitacoras VALUES("6","Registro Nuevo Camion","13","127.0.0.1","2014-12-03 23:27:48");
INSERT INTO bitacoras VALUES("7","Actualizar Datos Camion","13","127.0.0.1","2014-12-03 23:29:06");
INSERT INTO bitacoras VALUES("8","Actualizar Almacen","13","127.0.0.1","2014-12-03 23:40:48");
INSERT INTO bitacoras VALUES("9","Registro de Reservas entregadas","13","127.0.0.1","2014-12-04 00:06:20");
INSERT INTO bitacoras VALUES("10","Monitoreo de Camion","13","127.0.0.1","2014-12-04 00:07:47");
INSERT INTO bitacoras VALUES("11","Monitoreo de Camion","13","127.0.0.1","2014-12-04 00:13:49");
INSERT INTO bitacoras VALUES("12","Genero Copias de Seguridad","13","127.0.0.1","2014-12-04 00:13:58");
INSERT INTO bitacoras VALUES("13","Crear Venta","13","127.0.0.1","2014-12-04 00:16:49");
INSERT INTO bitacoras VALUES("14","Cancelar Venta","13","127.0.0.1","2014-12-04 00:16:52");
INSERT INTO bitacoras VALUES("15","Genero Copias de Seguridad","13","127.0.0.1","2014-12-04 11:00:16");
INSERT INTO bitacoras VALUES("16","Genero Copias de Seguridad","13","127.0.0.1","2014-12-05 08:48:54");
INSERT INTO bitacoras VALUES("17","Genero Copias de Seguridad","13","127.0.0.1","2014-12-06 16:37:45");
INSERT INTO bitacoras VALUES("18","Genero Copias de Seguridad","13","127.0.0.1","2014-12-06 16:37:48");
INSERT INTO bitacoras VALUES("19","Habilitar usuario","13","127.0.0.1","2014-12-06 18:59:10");
INSERT INTO bitacoras VALUES("20","Habilitar usuario","13","127.0.0.1","2014-12-06 18:59:13");
INSERT INTO bitacoras VALUES("21","Habilitar usuario","13","127.0.0.1","2014-12-06 19:06:40");
INSERT INTO bitacoras VALUES("22","Habilitar usuario","13","127.0.0.1","2014-12-06 19:06:41");
INSERT INTO bitacoras VALUES("23","Habilitar usuario","13","127.0.0.1","2014-12-06 19:06:44");
INSERT INTO bitacoras VALUES("24","Asignar Permiso","13","127.0.0.1","2014-12-06 19:12:40");
INSERT INTO bitacoras VALUES("25","Crear una Reserva","13","127.0.0.1","2014-12-06 23:22:09");
INSERT INTO bitacoras VALUES("26","Confirmar Reserva","13","127.0.0.1","2014-12-06 23:22:19");
INSERT INTO bitacoras VALUES("27","Camion Asignado a una Reserva","13","127.0.0.1","2014-12-06 23:22:27");
INSERT INTO bitacoras VALUES("28","Genero Copias de Seguridad","13","127.0.0.1","2014-12-08 12:56:12");
INSERT INTO bitacoras VALUES("29","Crear una Reserva","13","127.0.0.1","2014-12-08 12:57:25");
INSERT INTO bitacoras VALUES("30","Confirmar Reserva","13","127.0.0.1","2014-12-08 12:57:31");
INSERT INTO bitacoras VALUES("31","Camion Asignado a una Reserva","13","127.0.0.1","2014-12-08 12:57:35");
INSERT INTO bitacoras VALUES("32","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:46:16");
INSERT INTO bitacoras VALUES("33","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:49:31");
INSERT INTO bitacoras VALUES("34","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:50:54");
INSERT INTO bitacoras VALUES("35","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:52:00");
INSERT INTO bitacoras VALUES("36","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:52:55");
INSERT INTO bitacoras VALUES("37","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:53:38");
INSERT INTO bitacoras VALUES("38","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:53:51");
INSERT INTO bitacoras VALUES("39","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:54:18");
INSERT INTO bitacoras VALUES("40","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:54:40");
INSERT INTO bitacoras VALUES("41","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:54:56");
INSERT INTO bitacoras VALUES("42","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:55:11");
INSERT INTO bitacoras VALUES("43","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:56:40");
INSERT INTO bitacoras VALUES("44","Registro Nuevo Cliente","13","192.168.1.103","2014-12-08 13:58:29");
INSERT INTO bitacoras VALUES("45","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 13:59:57");
INSERT INTO bitacoras VALUES("46","Actualizar Datos Cliente","13","192.168.1.103","2014-12-08 14:00:07");
INSERT INTO bitacoras VALUES("47","Registro Nuevo Cliente","13","192.168.1.103","2014-12-08 14:01:30");
INSERT INTO bitacoras VALUES("48","Registro Nuevo Cliente","13","192.168.1.103","2014-12-08 14:06:27");
INSERT INTO bitacoras VALUES("49","Registro Nuevo Cliente","13","192.168.1.103","2014-12-08 14:09:56");
INSERT INTO bitacoras VALUES("50","Registro Nuevo Cliente","13","192.168.1.103","2014-12-08 14:11:16");
INSERT INTO bitacoras VALUES("51","Registro Nuevo Cliente","13","192.168.1.103","2014-12-08 14:12:55");
INSERT INTO bitacoras VALUES("52","Genero Copias de Seguridad","13","192.168.1.103","2014-12-08 14:18:33");
INSERT INTO bitacoras VALUES("53","Crear una Reserva","13","127.0.0.1","2014-12-14 21:05:45");
INSERT INTO bitacoras VALUES("54","Registro Quitar Producto","13","127.0.0.1","2014-12-14 21:05:57");
INSERT INTO bitacoras VALUES("55","Confirmar Reserva","13","127.0.0.1","2014-12-14 21:06:03");
INSERT INTO bitacoras VALUES("56","Cancelar Reserva","13","127.0.0.1","2014-12-14 21:06:08");
INSERT INTO bitacoras VALUES("57","Camion Asignado a una Reserva","13","127.0.0.1","2014-12-14 21:06:21");
INSERT INTO bitacoras VALUES("58","Crear Venta","13","127.0.0.1","2014-12-14 21:11:26");
INSERT INTO bitacoras VALUES("59","Registro de Una Nueva Venta","13","127.0.0.1","2014-12-14 21:11:31");
INSERT INTO bitacoras VALUES("60","Asignar Camion","13","127.0.0.1","2015-01-18 21:46:42");
INSERT INTO bitacoras VALUES("61","Habilitar usuario","13","127.0.0.1","2015-01-18 22:13:23");
INSERT INTO bitacoras VALUES("62","Crear una Reserva","22","127.0.0.1","2015-01-18 23:06:04");
INSERT INTO bitacoras VALUES("63","Cancelar Reserva","22","127.0.0.1","2015-01-18 23:07:37");
INSERT INTO bitacoras VALUES("64","Crear una Reserva","22","127.0.0.1","2015-01-18 23:27:52");
INSERT INTO bitacoras VALUES("65","Cancelar Reserva","22","127.0.0.1","2015-01-18 23:37:15");
INSERT INTO bitacoras VALUES("66","Crear una Reserva","22","127.0.0.1","2015-01-18 23:37:19");
INSERT INTO bitacoras VALUES("67","Registro Quitar Producto","22","127.0.0.1","2015-01-18 23:38:29");
INSERT INTO bitacoras VALUES("68","Registro Quitar Producto","22","127.0.0.1","2015-01-18 23:39:08");
INSERT INTO bitacoras VALUES("69","Confirmar Reserva","22","127.0.0.1","2015-01-18 23:53:17");
INSERT INTO bitacoras VALUES("70","Crear una Reserva","22","127.0.0.1","2015-01-19 00:43:42");
INSERT INTO bitacoras VALUES("71","Registro Nuevo Cliente","13","127.0.0.1","2015-01-30 17:33:58");
INSERT INTO bitacoras VALUES("72","Registro Nuevo Cliente","13","127.0.0.1","2015-01-30 18:09:00");
INSERT INTO bitacoras VALUES("73","Registro Nuevo Cliente","13","127.0.0.1","2015-01-30 18:11:20");
INSERT INTO bitacoras VALUES("74","Registro Nuevo Cliente","13","127.0.0.1","2015-01-30 18:20:56");
INSERT INTO bitacoras VALUES("75","Registro Nuevo Cliente","13","127.0.0.1","2015-01-30 18:29:48");
INSERT INTO bitacoras VALUES("76","Registro Nuevo Cliente","13","127.0.0.1","2015-01-31 21:13:21");
INSERT INTO bitacoras VALUES("77","Registro Nuevo Cliente","13","127.0.0.1","2015-01-31 21:20:42");
INSERT INTO bitacoras VALUES("78","Actualizar Datos Cliente","13","127.0.0.1","2015-02-03 20:07:05");
INSERT INTO bitacoras VALUES("79","Actualizar Datos Cliente","13","127.0.0.1","2015-02-03 20:09:39");
INSERT INTO bitacoras VALUES("80","Actualizar Datos Cliente","13","127.0.0.1","2015-02-03 20:10:48");
INSERT INTO bitacoras VALUES("81","Registro de Observaciones","13","127.0.0.1","2015-02-03 20:49:38");
INSERT INTO bitacoras VALUES("82","Registro de Observaciones","13","127.0.0.1","2015-02-03 20:50:52");
INSERT INTO bitacoras VALUES("83","Registro Nuevo Empleado","13","127.0.0.1","2015-02-03 21:16:36");
INSERT INTO bitacoras VALUES("85","Actulizar datos Empleado","13","127.0.0.1","2015-02-03 21:19:46");
INSERT INTO bitacoras VALUES("86","Registro Nuevo Camion","13","127.0.0.1","2015-02-03 22:51:04");
INSERT INTO bitacoras VALUES("88","Actualizar Datos Camion","13","127.0.0.1","2015-02-03 22:53:25");
INSERT INTO bitacoras VALUES("89","Asignar Camion","13","127.0.0.1","2015-02-03 23:15:20");
INSERT INTO bitacoras VALUES("90","Registrar Nueva Presentacion","13","127.0.0.1","2015-02-04 14:33:51");
INSERT INTO bitacoras VALUES("91","Actualizar Datos de Presentacion","13","127.0.0.1","2015-02-04 14:46:16");
INSERT INTO bitacoras VALUES("92","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:11:30");
INSERT INTO bitacoras VALUES("93","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:26:45");
INSERT INTO bitacoras VALUES("94","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:26:49");
INSERT INTO bitacoras VALUES("95","Registro Nuevo Producto","13","127.0.0.1","2015-02-04 19:27:41");
INSERT INTO bitacoras VALUES("96","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:30:49");
INSERT INTO bitacoras VALUES("97","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:33:10");
INSERT INTO bitacoras VALUES("98","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:33:43");
INSERT INTO bitacoras VALUES("99","Actualizar Datos de Producto","13","127.0.0.1","2015-02-04 19:44:29");
INSERT INTO bitacoras VALUES("100","Actualizar Almacen","13","127.0.0.1","2015-02-04 20:37:33");
INSERT INTO bitacoras VALUES("101","Registro Nuevo Usuario","13","127.0.0.1","2015-02-04 21:44:51");
INSERT INTO bitacoras VALUES("102","Actualizar Datos de usuario","13","127.0.0.1","2015-02-04 21:45:26");
INSERT INTO bitacoras VALUES("103","Habilitar Como Administrador","13","127.0.0.1","2015-02-04 21:57:43");
INSERT INTO bitacoras VALUES("104","Inhabilitar como Administrador","13","127.0.0.1","2015-02-04 21:57:47");
INSERT INTO bitacoras VALUES("105","Habilitar usuario","13","127.0.0.1","2015-02-04 21:58:08");
INSERT INTO bitacoras VALUES("106","Inhabilitar Usuario","13","127.0.0.1","2015-02-04 21:58:11");
INSERT INTO bitacoras VALUES("107","Habilitar usuario","13","127.0.0.1","2015-02-04 22:01:28");
INSERT INTO bitacoras VALUES("108","Inhabilitar Usuario","13","127.0.0.1","2015-02-04 22:01:31");
INSERT INTO bitacoras VALUES("109","Habilitar usuario","13","127.0.0.1","2015-02-04 22:03:45");
INSERT INTO bitacoras VALUES("110","Inhabilitar Usuario","13","127.0.0.1","2015-02-04 22:03:49");
INSERT INTO bitacoras VALUES("111","Habilitar Como Administrador","13","127.0.0.1","2015-02-04 22:10:23");
INSERT INTO bitacoras VALUES("112","Inhabilitar como Administrador","13","127.0.0.1","2015-02-04 22:10:25");
INSERT INTO bitacoras VALUES("113","Inhabilitar como Administrador","13","127.0.0.1","2015-02-04 22:15:25");
INSERT INTO bitacoras VALUES("114","Habilitar Como Administrador","13","127.0.0.1","2015-02-04 22:15:26");
INSERT INTO bitacoras VALUES("115","Asignar Permiso","13","127.0.0.1","2015-02-04 22:30:50");
INSERT INTO bitacoras VALUES("116","Asignar Permiso","13","127.0.0.1","2015-02-04 22:30:51");
INSERT INTO bitacoras VALUES("117","Asignar Permiso","13","127.0.0.1","2015-02-04 22:30:52");
INSERT INTO bitacoras VALUES("118","Quitar Permiso","13","127.0.0.1","2015-02-04 22:30:53");
INSERT INTO bitacoras VALUES("119","Quitar Permiso","13","127.0.0.1","2015-02-04 22:30:55");
INSERT INTO bitacoras VALUES("120","Quitar Permiso","13","127.0.0.1","2015-02-04 22:30:56");
INSERT INTO bitacoras VALUES("121","Asignar Permiso","13","127.0.0.1","2015-02-04 22:30:58");
INSERT INTO bitacoras VALUES("122","Asignar Permiso","13","127.0.0.1","2015-02-04 22:30:59");
INSERT INTO bitacoras VALUES("123","Asignar Permiso","13","127.0.0.1","2015-02-04 22:31:00");
INSERT INTO bitacoras VALUES("124","Quitar Permiso","13","127.0.0.1","2015-02-04 22:31:01");
INSERT INTO bitacoras VALUES("125","Quitar Permiso","13","127.0.0.1","2015-02-04 22:31:02");
INSERT INTO bitacoras VALUES("126","Quitar Permiso","13","127.0.0.1","2015-02-04 22:31:03");
INSERT INTO bitacoras VALUES("127","Asignar Permiso","13","127.0.0.1","2015-02-04 22:37:47");
INSERT INTO bitacoras VALUES("128","Asignar Permiso","13","127.0.0.1","2015-02-04 22:37:48");
INSERT INTO bitacoras VALUES("129","Asignar Permiso","13","127.0.0.1","2015-02-04 22:37:49");
INSERT INTO bitacoras VALUES("130","Quitar Permiso","13","127.0.0.1","2015-02-04 22:37:50");
INSERT INTO bitacoras VALUES("131","Quitar Permiso","13","127.0.0.1","2015-02-04 22:37:51");
INSERT INTO bitacoras VALUES("132","Quitar Permiso","13","127.0.0.1","2015-02-04 22:37:52");
INSERT INTO bitacoras VALUES("133","Quitar Permiso","13","127.0.0.1","2015-02-04 22:37:53");
INSERT INTO bitacoras VALUES("134","Registro Nuevo Usuario","13","127.0.0.1","2015-02-04 22:38:44");
INSERT INTO bitacoras VALUES("135","Actualizar Datos de usuario","13","127.0.0.1","2015-02-04 22:39:35");
INSERT INTO bitacoras VALUES("136","Crear una Reserva","22","127.0.0.1","2015-03-02 16:34:44");
INSERT INTO bitacoras VALUES("137","Crear una Reserva","13","192.168.1.103","2015-03-02 16:40:37");
INSERT INTO bitacoras VALUES("138","Confirmar Reserva","13","192.168.1.103","2015-03-02 16:40:47");
INSERT INTO bitacoras VALUES("139","Camion Asignado a una Reserva","13","192.168.1.103","2015-03-02 16:41:23");
INSERT INTO bitacoras VALUES("140","Camion Asignado a una Reserva","13","192.168.1.103","2015-03-02 16:41:25");
INSERT INTO bitacoras VALUES("141","Monitoreo de Camion","13","192.168.1.103","2015-03-02 16:47:48");
INSERT INTO bitacoras VALUES("142","ver ubicacion de camion","13","192.168.1.103","2015-03-02 16:47:50");
INSERT INTO bitacoras VALUES("143","Crear una Reserva","22","127.0.0.1","2015-03-12 22:08:53");
INSERT INTO bitacoras VALUES("144","Monitoreo de Camion","13","127.0.0.1","2015-03-18 07:30:19");
INSERT INTO bitacoras VALUES("145","Crear Venta","13","127.0.0.1","2015-03-18 07:30:51");
INSERT INTO bitacoras VALUES("146","Crear Venta","13","127.0.0.1","2015-03-18 07:31:12");
INSERT INTO bitacoras VALUES("147","Monitoreo de Camion","13","127.0.0.1","2015-03-18 11:18:12");
INSERT INTO bitacoras VALUES("148","Crear Venta","13","127.0.0.1","2015-03-18 11:20:25");
INSERT INTO bitacoras VALUES("149","Crear una Reserva","13","127.0.0.1","2015-04-06 15:58:41");
INSERT INTO bitacoras VALUES("150","Confirmar Reserva","13","127.0.0.1","2015-04-06 15:58:52");
INSERT INTO bitacoras VALUES("151","Crear una Reserva","13","127.0.0.1","2015-04-06 15:58:58");
INSERT INTO bitacoras VALUES("152","Confirmar Reserva","13","127.0.0.1","2015-04-06 15:59:06");
INSERT INTO bitacoras VALUES("153","Crear una Reserva","13","127.0.0.1","2015-04-06 15:59:11");
INSERT INTO bitacoras VALUES("154","Confirmar Reserva","13","127.0.0.1","2015-04-06 15:59:18");
INSERT INTO bitacoras VALUES("155","Crear una Reserva","13","127.0.0.1","2015-04-06 15:59:28");
INSERT INTO bitacoras VALUES("156","Confirmar Reserva","13","127.0.0.1","2015-04-06 15:59:36");
INSERT INTO bitacoras VALUES("157","Camion Asignado a una Reserva","13","127.0.0.1","2015-04-06 15:59:51");
INSERT INTO bitacoras VALUES("158","Camion Asignado a una Reserva","13","127.0.0.1","2015-04-06 15:59:52");
INSERT INTO bitacoras VALUES("159","Camion Asignado a una Reserva","13","127.0.0.1","2015-04-06 15:59:53");
INSERT INTO bitacoras VALUES("160","Camion Asignado a una Reserva","13","127.0.0.1","2015-04-06 15:59:54");
INSERT INTO bitacoras VALUES("161","Crear una Reserva","13","127.0.0.1","2015-04-06 16:04:24");
INSERT INTO bitacoras VALUES("162","Confirmar Reserva","13","127.0.0.1","2015-04-06 16:04:32");
INSERT INTO bitacoras VALUES("163","Camion Asignado a una Reserva","13","127.0.0.1","2015-04-06 16:04:37");
INSERT INTO bitacoras VALUES("164","Actualizar Datos Cliente","13","127.0.0.1","2015-04-10 11:41:17");
INSERT INTO bitacoras VALUES("165","Registro Nuevo Usuario","13","127.0.0.1","2015-04-15 11:43:51");
INSERT INTO bitacoras VALUES("166","Habilitar Como Administrador","13","127.0.0.1","2015-04-15 11:44:02");
INSERT INTO bitacoras VALUES("167","Inhabilitar como Administrador","13","127.0.0.1","2015-04-15 11:45:02");
INSERT INTO bitacoras VALUES("168","Habilitar Como Administrador","13","127.0.0.1","2015-04-15 11:45:18");
INSERT INTO bitacoras VALUES("169","Actualizar Datos Cliente","13","127.0.0.1","2015-04-15 14:27:25");
INSERT INTO bitacoras VALUES("170","Crear una Reserva","13","127.0.0.1","2015-04-15 15:38:41");
INSERT INTO bitacoras VALUES("171","Crear una Reserva","13","127.0.0.1","2015-04-15 15:40:18");
INSERT INTO bitacoras VALUES("172","Confirmar Reserva","13","127.0.0.1","2015-04-15 16:00:26");
INSERT INTO bitacoras VALUES("173","Crear Venta","13","127.0.0.1","2015-04-16 09:16:33");
INSERT INTO bitacoras VALUES("174","Crear Venta","13","127.0.0.1","2015-04-16 17:24:02");
INSERT INTO bitacoras VALUES("175","Registro de Una Nueva Venta","13","127.0.0.1","2015-04-16 17:24:05");
INSERT INTO bitacoras VALUES("176","confirmar Venta","13","127.0.0.1","2015-04-16 17:44:52");
INSERT INTO bitacoras VALUES("177","Registro Nuevo Usuario","13","127.0.0.1","2015-04-21 08:54:42");
INSERT INTO bitacoras VALUES("178","Asignar Permiso","13","127.0.0.1","2015-04-21 08:56:43");
INSERT INTO bitacoras VALUES("179","Habilitar usuario","13","127.0.0.1","2015-04-21 08:57:03");
INSERT INTO bitacoras VALUES("180","Registro Nuevo Cliente","13","127.0.0.1","2015-04-21 09:01:31");
INSERT INTO bitacoras VALUES("181","Quitar Permiso","13","127.0.0.1","2015-04-21 09:02:38");
INSERT INTO bitacoras VALUES("182","Crear una Reserva","22","192.168.1.100","2015-04-21 09:13:11");
INSERT INTO bitacoras VALUES("183","Confirmar Reserva","22","192.168.1.100","2015-04-21 09:13:52");
INSERT INTO bitacoras VALUES("184","Inhabilitar como Administrador","13","192.168.1.103","2015-04-21 09:16:10");
INSERT INTO bitacoras VALUES("185","Habilitar Como Administrador","13","192.168.1.103","2015-04-21 09:16:39");
INSERT INTO bitacoras VALUES("186","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:11");
INSERT INTO bitacoras VALUES("187","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:12");
INSERT INTO bitacoras VALUES("188","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:13");
INSERT INTO bitacoras VALUES("189","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:14");
INSERT INTO bitacoras VALUES("190","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:14");
INSERT INTO bitacoras VALUES("191","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:15");
INSERT INTO bitacoras VALUES("192","Asignar Permiso","13","192.168.1.103","2015-04-21 09:17:15");
INSERT INTO bitacoras VALUES("193","Habilitar usuario","13","192.168.1.103","2015-04-21 09:17:54");
INSERT INTO bitacoras VALUES("194","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:12");
INSERT INTO bitacoras VALUES("195","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:13");
INSERT INTO bitacoras VALUES("196","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:13");
INSERT INTO bitacoras VALUES("197","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:14");
INSERT INTO bitacoras VALUES("198","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:14");
INSERT INTO bitacoras VALUES("199","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:15");
INSERT INTO bitacoras VALUES("200","Quitar Permiso","13","192.168.1.103","2015-04-21 09:18:15");
INSERT INTO bitacoras VALUES("201","Actualizar Datos Cliente","25","192.168.1.103","2015-04-21 09:19:22");
INSERT INTO bitacoras VALUES("202","Crear una Reserva","25","192.168.1.103","2015-04-21 09:20:17");
INSERT INTO bitacoras VALUES("203","Confirmar Reserva","25","192.168.1.103","2015-04-21 09:20:28");
INSERT INTO bitacoras VALUES("204","Actulizar datos Empleado","25","192.168.1.103","2015-04-21 09:27:06");
INSERT INTO bitacoras VALUES("205","Actulizar datos Empleado","25","192.168.1.103","2015-04-21 09:27:30");
INSERT INTO bitacoras VALUES("206","Habilitar usuario","25","192.168.1.103","2015-04-21 09:28:55");
INSERT INTO bitacoras VALUES("207","Inhabilitar como Administrador","25","192.168.1.103","2015-04-21 09:29:04");
INSERT INTO bitacoras VALUES("208","Asignar Permiso","25","192.168.1.103","2015-04-21 09:29:16");
INSERT INTO bitacoras VALUES("209","Crear Venta","25","192.168.43.238","2015-04-21 10:20:49");
INSERT INTO bitacoras VALUES("210","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:20:56");
INSERT INTO bitacoras VALUES("211","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:21:05");
INSERT INTO bitacoras VALUES("212","confirmar Venta","25","192.168.43.238","2015-04-21 10:21:17");
INSERT INTO bitacoras VALUES("213","Crear Venta","25","192.168.43.238","2015-04-21 10:34:50");
INSERT INTO bitacoras VALUES("214","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:34:58");
INSERT INTO bitacoras VALUES("215","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:03");
INSERT INTO bitacoras VALUES("216","confirmar Venta","25","192.168.43.238","2015-04-21 10:35:04");
INSERT INTO bitacoras VALUES("217","Crear Venta","25","192.168.43.238","2015-04-21 10:35:13");
INSERT INTO bitacoras VALUES("218","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:16");
INSERT INTO bitacoras VALUES("219","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:20");
INSERT INTO bitacoras VALUES("220","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:26");
INSERT INTO bitacoras VALUES("221","confirmar Venta","25","192.168.43.238","2015-04-21 10:35:28");
INSERT INTO bitacoras VALUES("222","Crear Venta","25","192.168.43.238","2015-04-21 10:35:32");
INSERT INTO bitacoras VALUES("223","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:35");
INSERT INTO bitacoras VALUES("224","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:39");
INSERT INTO bitacoras VALUES("225","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:42");
INSERT INTO bitacoras VALUES("226","confirmar Venta","25","192.168.43.238","2015-04-21 10:35:43");
INSERT INTO bitacoras VALUES("227","Crear Venta","25","192.168.43.238","2015-04-21 10:35:51");
INSERT INTO bitacoras VALUES("228","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:35:58");
INSERT INTO bitacoras VALUES("229","confirmar Venta","25","192.168.43.238","2015-04-21 10:36:02");
INSERT INTO bitacoras VALUES("230","Crear Venta","25","192.168.43.238","2015-04-21 10:36:13");
INSERT INTO bitacoras VALUES("231","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:36:16");
INSERT INTO bitacoras VALUES("232","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:36:19");
INSERT INTO bitacoras VALUES("233","confirmar Venta","25","192.168.43.238","2015-04-21 10:36:20");
INSERT INTO bitacoras VALUES("234","Crear Venta","25","192.168.43.238","2015-04-21 10:36:30");
INSERT INTO bitacoras VALUES("235","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:36:33");
INSERT INTO bitacoras VALUES("236","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:36:37");
INSERT INTO bitacoras VALUES("237","confirmar Venta","25","192.168.43.238","2015-04-21 10:36:40");
INSERT INTO bitacoras VALUES("238","Crear Venta","25","192.168.43.238","2015-04-21 10:36:58");
INSERT INTO bitacoras VALUES("239","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:37:02");
INSERT INTO bitacoras VALUES("240","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:37:05");
INSERT INTO bitacoras VALUES("241","Crear Venta","25","192.168.43.238","2015-04-21 10:37:57");
INSERT INTO bitacoras VALUES("242","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:38:02");
INSERT INTO bitacoras VALUES("243","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 10:38:06");
INSERT INTO bitacoras VALUES("244","confirmar Venta","25","192.168.43.238","2015-04-21 10:38:09");
INSERT INTO bitacoras VALUES("245","Registro Nuevo Cliente","25","192.168.43.238","2015-04-21 10:56:23");
INSERT INTO bitacoras VALUES("246","Actualizar Datos Cliente","25","192.168.43.238","2015-04-21 10:58:04");
INSERT INTO bitacoras VALUES("247","Actualizar Datos Cliente","25","192.168.43.238","2015-04-21 10:58:54");
INSERT INTO bitacoras VALUES("248","Actualizar Datos Cliente","25","192.168.43.238","2015-04-21 11:02:18");
INSERT INTO bitacoras VALUES("249","Crear Venta","25","192.168.43.238","2015-04-21 11:08:53");
INSERT INTO bitacoras VALUES("250","Registro de Una Nueva Venta","25","192.168.43.238","2015-04-21 11:08:57");
INSERT INTO bitacoras VALUES("251","confirmar Venta","25","192.168.43.238","2015-04-21 11:08:59");
INSERT INTO bitacoras VALUES("252","Habilitar usuario","25","192.168.43.238","2015-04-21 11:09:44");
INSERT INTO bitacoras VALUES("253","Crear una Reserva","29","192.168.43.238","2015-04-21 11:10:10");
INSERT INTO bitacoras VALUES("254","Confirmar Reserva","29","192.168.43.238","2015-04-21 11:10:34");
INSERT INTO bitacoras VALUES("255","Camion Asignado a una Reserva","25","192.168.43.238","2015-04-21 11:12:00");
INSERT INTO bitacoras VALUES("256","Crear una Reserva","25","192.168.43.238","2015-04-21 11:15:31");
INSERT INTO bitacoras VALUES("257","Confirmar Reserva","25","192.168.43.238","2015-04-21 11:15:37");
INSERT INTO bitacoras VALUES("258","Crear una Reserva","25","192.168.43.238","2015-04-21 11:15:42");
INSERT INTO bitacoras VALUES("259","Confirmar Reserva","25","192.168.43.238","2015-04-21 11:15:54");
INSERT INTO bitacoras VALUES("260","Camion Asignado a una Reserva","25","192.168.43.238","2015-04-21 11:16:03");
INSERT INTO bitacoras VALUES("261","Camion Asignado a una Reserva","25","192.168.43.238","2015-04-21 11:16:05");
INSERT INTO bitacoras VALUES("262","Monitoreo de Camion","25","192.168.43.238","2015-04-21 11:18:25");
INSERT INTO bitacoras VALUES("263","Monitoreo de Camion","25","192.168.43.238","2015-04-21 11:19:05");
INSERT INTO bitacoras VALUES("264","Reservas entregadas","25","192.168.43.238","2015-04-21 11:19:09");
INSERT INTO bitacoras VALUES("265","Monitoreo de Camion","25","192.168.43.238","2015-04-21 11:19:43");
INSERT INTO bitacoras VALUES("266","Reservas entregadas","25","192.168.43.238","2015-04-21 11:19:44");
INSERT INTO bitacoras VALUES("267","Despachar Camion","25","192.168.43.238","2015-04-21 11:20:00");
INSERT INTO bitacoras VALUES("268","Hora de llegada de Vehiculo","25","192.168.43.238","2015-04-21 11:20:06");
INSERT INTO bitacoras VALUES("269","Monitoreo de Camion","25","192.168.43.238","2015-04-21 11:20:17");
INSERT INTO bitacoras VALUES("270","Monitoreo de Camion","25","192.168.1.103","2015-04-22 11:15:32");
INSERT INTO bitacoras VALUES("271","Reservas entregadas","25","192.168.1.103","2015-04-22 11:15:35");
INSERT INTO bitacoras VALUES("272","Habilitar Como Administrador","13","127.0.0.1","2015-04-29 16:00:02");
INSERT INTO bitacoras VALUES("273","Inhabilitar como Administrador","13","127.0.0.1","2015-04-29 16:00:54");
INSERT INTO bitacoras VALUES("274","Crear una Reserva","22","127.0.0.1","2015-04-29 16:01:22");
INSERT INTO bitacoras VALUES("275","Confirmar Reserva","22","127.0.0.1","2015-04-29 16:01:39");
INSERT INTO bitacoras VALUES("276","Camion Asignado a una Reserva","13","127.0.0.1","2015-04-29 16:07:07");
INSERT INTO bitacoras VALUES("277","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 20:39:53");
INSERT INTO bitacoras VALUES("278","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 20:44:41");
INSERT INTO bitacoras VALUES("279","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 20:45:35");
INSERT INTO bitacoras VALUES("280","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 20:46:00");
INSERT INTO bitacoras VALUES("281","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 20:47:00");
INSERT INTO bitacoras VALUES("282","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 21:09:42");
INSERT INTO bitacoras VALUES("283","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 21:23:33");
INSERT INTO bitacoras VALUES("284","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 21:23:52");
INSERT INTO bitacoras VALUES("285","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 21:24:04");
INSERT INTO bitacoras VALUES("286","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 21:45:28");
INSERT INTO bitacoras VALUES("287","Actualizar Datos Cliente","25","127.0.0.1","2015-04-29 21:45:43");
INSERT INTO bitacoras VALUES("288","Actualizar Datos Cliente","25","192.168.1.103","2015-05-04 14:51:33");
INSERT INTO bitacoras VALUES("289","Actualizar Datos de usuario","13","192.168.1.103","2015-05-04 14:57:15");
INSERT INTO bitacoras VALUES("290","Modificar Contrase?a","13","192.168.1.103","2015-05-04 14:57:23");
INSERT INTO bitacoras VALUES("291","Crear una Reserva","22","192.168.1.103","2015-05-05 17:23:13");
INSERT INTO bitacoras VALUES("292","Confirmar Reserva","22","192.168.1.103","2015-05-05 17:23:23");
INSERT INTO bitacoras VALUES("293","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:03:48");
INSERT INTO bitacoras VALUES("294","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:17:07");
INSERT INTO bitacoras VALUES("295","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:18:25");
INSERT INTO bitacoras VALUES("296","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:19:11");
INSERT INTO bitacoras VALUES("297","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:21:17");
INSERT INTO bitacoras VALUES("298","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:23:30");
INSERT INTO bitacoras VALUES("299","Actualizar Datos Cliente","13","192.168.1.103","2015-05-05 21:24:37");
INSERT INTO bitacoras VALUES("300","Crear una Reserva","13","192.168.43.238","2015-05-06 08:56:39");
INSERT INTO bitacoras VALUES("301","Confirmar Reserva","13","192.168.43.238","2015-05-06 08:56:46");
INSERT INTO bitacoras VALUES("302","Camion Asignado a una Reserva","13","192.168.43.238","2015-05-06 08:56:57");
INSERT INTO bitacoras VALUES("303","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-06 12:00:38");
INSERT INTO bitacoras VALUES("304","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-06 12:00:40");
INSERT INTO bitacoras VALUES("305","Crear una Reserva","22","192.168.43.238","2015-05-07 14:22:46");
INSERT INTO bitacoras VALUES("306","Confirmar Reserva","22","192.168.43.238","2015-05-07 14:23:03");
INSERT INTO bitacoras VALUES("307","Camion Asignado a una Reserva","13","192.168.43.238","2015-05-07 14:24:42");
INSERT INTO bitacoras VALUES("308","Camion Asignado a una Reserva","13","192.168.43.238","2015-05-07 14:24:44");
INSERT INTO bitacoras VALUES("309","Despachar Camion","13","192.168.43.238","2015-05-07 14:25:00");
INSERT INTO bitacoras VALUES("310","Actualizar Almacen","25","192.168.43.238","2015-05-14 17:46:23");
INSERT INTO bitacoras VALUES("311","Crear una Reserva","25","192.168.43.238","2015-05-14 17:47:32");
INSERT INTO bitacoras VALUES("312","Confirmar Reserva","25","192.168.43.238","2015-05-14 17:48:03");
INSERT INTO bitacoras VALUES("313","Crear una Reserva","25","192.168.43.238","2015-05-14 17:48:12");
INSERT INTO bitacoras VALUES("314","Confirmar Reserva","25","192.168.43.238","2015-05-14 17:48:18");
INSERT INTO bitacoras VALUES("315","Crear una Reserva","25","192.168.43.238","2015-05-14 17:48:25");
INSERT INTO bitacoras VALUES("316","Confirmar Reserva","25","192.168.43.238","2015-05-14 17:48:31");
INSERT INTO bitacoras VALUES("317","Camion Asignado a una Reserva","25","192.168.43.238","2015-05-14 17:49:01");
INSERT INTO bitacoras VALUES("318","Camion Asignado a una Reserva","25","192.168.43.238","2015-05-14 17:49:02");
INSERT INTO bitacoras VALUES("319","Camion Asignado a una Reserva","25","192.168.43.238","2015-05-14 17:49:03");
INSERT INTO bitacoras VALUES("320","Registro Nuevo Usuario","13","192.168.1.103","2015-05-27 19:30:45");
INSERT INTO bitacoras VALUES("321","Habilitar usuario","13","192.168.1.103","2015-05-27 19:31:13");
INSERT INTO bitacoras VALUES("322","Asignar Permiso","13","192.168.1.103","2015-05-27 19:31:25");
INSERT INTO bitacoras VALUES("323","Crear una Reserva","13","192.168.1.103","2015-05-28 11:03:40");
INSERT INTO bitacoras VALUES("324","Confirmar Reserva","13","192.168.1.103","2015-05-28 11:03:51");
INSERT INTO bitacoras VALUES("325","Crear una Reserva","13","192.168.1.103","2015-05-28 11:03:56");
INSERT INTO bitacoras VALUES("326","Confirmar Reserva","13","192.168.1.103","2015-05-28 11:04:03");
INSERT INTO bitacoras VALUES("327","Crear una Reserva","13","192.168.1.103","2015-05-28 11:04:09");
INSERT INTO bitacoras VALUES("328","Confirmar Reserva","13","192.168.1.103","2015-05-28 11:04:19");
INSERT INTO bitacoras VALUES("329","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-28 11:05:34");
INSERT INTO bitacoras VALUES("330","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-28 11:05:34");
INSERT INTO bitacoras VALUES("331","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-28 11:05:35");
INSERT INTO bitacoras VALUES("332","Registro Nuevo Usuario","13","192.168.1.103","2015-05-28 11:30:41");
INSERT INTO bitacoras VALUES("333","Habilitar usuario","13","192.168.1.103","2015-05-28 11:30:48");
INSERT INTO bitacoras VALUES("334","Asignar Permiso","13","192.168.1.103","2015-05-28 11:31:07");
INSERT INTO bitacoras VALUES("335","Asignar Permiso","13","192.168.1.103","2015-05-28 11:31:29");
INSERT INTO bitacoras VALUES("336","Terminar Asignacion de Camion","31","192.168.1.103","2015-05-28 12:23:02");
INSERT INTO bitacoras VALUES("337","Crear una Reserva","31","192.168.1.103","2015-05-28 12:39:59");
INSERT INTO bitacoras VALUES("338","Confirmar Reserva","31","192.168.1.103","2015-05-28 12:40:05");
INSERT INTO bitacoras VALUES("339","Camion Asignado a una Reserva","31","192.168.1.103","2015-05-28 12:41:00");
INSERT INTO bitacoras VALUES("340","Monitoreo de Camion","31","192.168.1.103","2015-05-28 15:03:43");
INSERT INTO bitacoras VALUES("341","Despachar Camion","31","192.168.1.103","2015-05-28 15:08:02");
INSERT INTO bitacoras VALUES("342","Hora de llegada de Vehiculo","31","192.168.1.103","2015-05-28 15:08:41");
INSERT INTO bitacoras VALUES("343","Monitoreo de Camion","31","192.168.1.103","2015-05-28 15:12:02");
INSERT INTO bitacoras VALUES("344","ver ubicacion de camion","31","192.168.1.103","2015-05-28 15:12:10");
INSERT INTO bitacoras VALUES("345","Monitoreo de Camion","31","192.168.1.103","2015-05-28 15:12:31");
INSERT INTO bitacoras VALUES("346","Reservas entregadas","31","192.168.1.103","2015-05-28 15:14:23");
INSERT INTO bitacoras VALUES("347","Reservas entregadas","31","192.168.1.103","2015-05-28 15:15:48");
INSERT INTO bitacoras VALUES("348","Reservas entregadas","31","192.168.1.103","2015-05-28 15:16:40");
INSERT INTO bitacoras VALUES("349","Crear una Reserva","22","192.168.1.103","2015-05-29 08:27:25");
INSERT INTO bitacoras VALUES("350","Registro Quitar Producto","22","192.168.1.103","2015-05-29 08:32:25");
INSERT INTO bitacoras VALUES("351","Registro Quitar Producto","22","192.168.1.103","2015-05-29 08:32:45");
INSERT INTO bitacoras VALUES("352","Confirmar Reserva","22","192.168.1.103","2015-05-29 08:36:00");
INSERT INTO bitacoras VALUES("353","Registro Nuevo Usuario","13","192.168.1.103","2015-05-29 08:43:20");
INSERT INTO bitacoras VALUES("354","Habilitar Como Administrador","13","192.168.1.103","2015-05-29 08:43:34");
INSERT INTO bitacoras VALUES("355","Asignar Permiso","13","192.168.1.103","2015-05-29 08:43:46");
INSERT INTO bitacoras VALUES("356","Asignar Permiso","13","192.168.1.103","2015-05-29 08:43:47");
INSERT INTO bitacoras VALUES("357","Habilitar usuario","13","192.168.1.103","2015-05-29 08:44:14");
INSERT INTO bitacoras VALUES("358","Inhabilitar como Administrador","13","192.168.1.103","2015-05-29 08:44:46");
INSERT INTO bitacoras VALUES("359","Crear Venta","32","192.168.1.103","2015-05-29 11:34:08");
INSERT INTO bitacoras VALUES("360","Registro de Una Nueva Venta","32","192.168.1.103","2015-05-29 11:38:22");
INSERT INTO bitacoras VALUES("361","Crear una Reserva","32","192.168.1.103","2015-05-29 11:52:46");
INSERT INTO bitacoras VALUES("362","Crear una Reserva","32","192.168.1.103","2015-05-29 11:52:52");
INSERT INTO bitacoras VALUES("363","Cancelar Reserva","32","192.168.1.103","2015-05-29 11:58:36");
INSERT INTO bitacoras VALUES("364","Crear una Reserva","13","192.168.1.103","2015-05-29 22:38:17");
INSERT INTO bitacoras VALUES("365","Confirmar Reserva","13","192.168.1.103","2015-05-29 22:38:22");
INSERT INTO bitacoras VALUES("366","Crear una Reserva","13","192.168.1.103","2015-05-29 22:38:27");
INSERT INTO bitacoras VALUES("367","Cancelar Reserva","13","192.168.1.103","2015-05-29 22:38:32");
INSERT INTO bitacoras VALUES("368","Crear una Reserva","13","192.168.1.103","2015-05-29 22:38:36");
INSERT INTO bitacoras VALUES("369","Confirmar Reserva","13","192.168.1.103","2015-05-29 22:38:44");
INSERT INTO bitacoras VALUES("370","Crear una Reserva","13","192.168.1.103","2015-05-29 22:38:49");
INSERT INTO bitacoras VALUES("371","Confirmar Reserva","13","192.168.1.103","2015-05-29 22:38:56");
INSERT INTO bitacoras VALUES("372","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-29 22:39:00");
INSERT INTO bitacoras VALUES("373","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-29 22:39:01");
INSERT INTO bitacoras VALUES("374","Camion Asignado a una Reserva","13","192.168.1.103","2015-05-29 22:39:02");
INSERT INTO bitacoras VALUES("375","Crear una Reserva","13","127.0.0.1","2015-06-05 21:54:52");
INSERT INTO bitacoras VALUES("376","Confirmar Reserva","13","127.0.0.1","2015-06-05 21:55:04");
INSERT INTO bitacoras VALUES("377","Crear una Reserva","13","127.0.0.1","2015-06-05 21:55:12");
INSERT INTO bitacoras VALUES("378","Confirmar Reserva","13","127.0.0.1","2015-06-05 21:55:23");
INSERT INTO bitacoras VALUES("379","Camion Asignado a una Reserva","13","127.0.0.1","2015-06-05 21:55:30");
INSERT INTO bitacoras VALUES("380","Camion Asignado a una Reserva","13","127.0.0.1","2015-06-05 21:55:31");
INSERT INTO bitacoras VALUES("381","Crear una Reserva","13","127.0.0.1","2015-06-05 21:57:24");
INSERT INTO bitacoras VALUES("382","Confirmar Reserva","13","127.0.0.1","2015-06-05 21:57:31");
INSERT INTO bitacoras VALUES("383","Camion Asignado a una Reserva","13","127.0.0.1","2015-06-05 21:57:46");
INSERT INTO bitacoras VALUES("384","Crear una Reserva","13","127.0.0.1","2015-06-05 21:58:44");
INSERT INTO bitacoras VALUES("385","Confirmar Reserva","13","127.0.0.1","2015-06-05 21:58:55");
INSERT INTO bitacoras VALUES("386","Camion Asignado a una Reserva","13","127.0.0.1","2015-06-05 21:59:07");
INSERT INTO bitacoras VALUES("387","Crear Venta","13","127.0.0.1","2015-06-07 23:57:00");
INSERT INTO bitacoras VALUES("388","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:03:45");
INSERT INTO bitacoras VALUES("389","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:06:58");
INSERT INTO bitacoras VALUES("390","Actualizar Almacen","13","127.0.0.1","2015-06-08 00:07:38");
INSERT INTO bitacoras VALUES("391","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:07:55");
INSERT INTO bitacoras VALUES("392","Crear Venta","13","127.0.0.1","2015-06-08 00:08:03");
INSERT INTO bitacoras VALUES("393","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:10:02");
INSERT INTO bitacoras VALUES("394","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:10:15");
INSERT INTO bitacoras VALUES("395","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:10:25");
INSERT INTO bitacoras VALUES("396","confirmar Venta","13","127.0.0.1","2015-06-08 00:10:30");
INSERT INTO bitacoras VALUES("397","confirmar Venta","13","127.0.0.1","2015-06-08 00:15:16");
INSERT INTO bitacoras VALUES("398","Crear Venta","13","127.0.0.1","2015-06-08 00:15:27");
INSERT INTO bitacoras VALUES("399","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-08 00:15:35");
INSERT INTO bitacoras VALUES("400","confirmar Venta","13","127.0.0.1","2015-06-08 00:15:39");
INSERT INTO bitacoras VALUES("401","Registrar Nueva Presentacion","13","127.0.0.1","2015-06-12 01:44:50");
INSERT INTO bitacoras VALUES("402","Registrar Nueva Presentacion","13","127.0.0.1","2015-06-12 01:45:41");
INSERT INTO bitacoras VALUES("403","Registrar Nueva Presentacion","13","127.0.0.1","2015-06-12 01:46:09");
INSERT INTO bitacoras VALUES("404","Registrar Nueva Presentacion","13","127.0.0.1","2015-06-12 01:54:13");
INSERT INTO bitacoras VALUES("405","Actualizar Datos de Presentacion","13","127.0.0.1","2015-06-12 01:55:38");
INSERT INTO bitacoras VALUES("406","Actualizar Datos de Presentacion","13","127.0.0.1","2015-06-12 01:55:47");
INSERT INTO bitacoras VALUES("407","Actualizar Datos de Presentacion","13","127.0.0.1","2015-06-12 01:55:56");
INSERT INTO bitacoras VALUES("408","Actualizar Datos de Presentacion","13","127.0.0.1","2015-06-12 01:56:03");
INSERT INTO bitacoras VALUES("409","Crear Venta","13","127.0.0.1","2015-06-12 01:56:22");
INSERT INTO bitacoras VALUES("410","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-12 02:05:38");
INSERT INTO bitacoras VALUES("411","Actualizar Datos de Producto","13","127.0.0.1","2015-06-12 02:07:43");
INSERT INTO bitacoras VALUES("412","confirmar Venta","13","127.0.0.1","2015-06-12 02:08:12");
INSERT INTO bitacoras VALUES("413","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-12 02:08:37");
INSERT INTO bitacoras VALUES("414","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-12 02:08:52");
INSERT INTO bitacoras VALUES("415","confirmar Venta","13","127.0.0.1","2015-06-12 02:08:56");
INSERT INTO bitacoras VALUES("416","Actualizar Datos de Presentacion","13","127.0.0.1","2015-06-12 02:09:15");
INSERT INTO bitacoras VALUES("417","Crear Venta","13","127.0.0.1","2015-06-12 02:09:22");
INSERT INTO bitacoras VALUES("418","Registro de Una Nueva Venta","13","127.0.0.1","2015-06-12 02:09:39");
INSERT INTO bitacoras VALUES("419","Crear una Reserva","13","192.168.1.106","2015-10-25 03:45:16");
INSERT INTO bitacoras VALUES("420","Crear una Reserva","13","192.168.1.106","2015-10-25 03:45:49");
INSERT INTO bitacoras VALUES("421","Confirmar Reserva","13","192.168.1.106","2015-10-25 03:45:55");
INSERT INTO bitacoras VALUES("422","Crear una Reserva","13","192.168.1.106","2015-10-25 03:46:35");
INSERT INTO bitacoras VALUES("423","Confirmar Reserva","13","192.168.1.106","2015-10-25 03:46:37");
INSERT INTO bitacoras VALUES("424","Camion Asignado a una Reserva","13","192.168.1.106","2015-10-25 03:47:48");
INSERT INTO bitacoras VALUES("425","Camion Asignado a una Reserva","13","192.168.1.106","2015-10-25 03:47:53");
INSERT INTO bitacoras VALUES("426","Genero Copias de Seguridad","13","192.168.1.106","2015-10-25 03:52:15");
INSERT INTO bitacoras VALUES("427","Asignar Permiso","13","192.168.1.106","2015-10-25 03:54:03");
INSERT INTO bitacoras VALUES("428","Quitar Permiso","13","192.168.1.106","2015-10-25 03:54:14");
INSERT INTO bitacoras VALUES("429","Asignar Permiso","13","192.168.1.106","2015-10-25 03:54:24");
INSERT INTO bitacoras VALUES("430","Quitar Permiso","13","192.168.1.106","2015-10-25 03:54:29");
INSERT INTO bitacoras VALUES("431","Actualizar Almacen","13","192.168.1.103","2015-11-12 01:58:59");
INSERT INTO bitacoras VALUES("432","Habilitar usuario","13","127.0.0.1","2016-02-23 20:12:56");
INSERT INTO bitacoras VALUES("433","Inhabilitar Usuario","13","127.0.0.1","2016-02-23 20:12:58");
INSERT INTO bitacoras VALUES("434","Habilitar usuario","13","127.0.0.1","2016-02-23 20:13:01");
INSERT INTO bitacoras VALUES("435","Inhabilitar Usuario","13","127.0.0.1","2016-02-23 20:13:03");
INSERT INTO bitacoras VALUES("436","Genero Copias de Seguridad","13","127.0.0.1","2016-02-24 01:33:42");
INSERT INTO bitacoras VALUES("437","Registro Nuevo Producto","13","127.0.0.1","2016-02-25 01:00:57");
INSERT INTO bitacoras VALUES("438","Crear Venta","13","127.0.0.1","2016-02-25 01:03:27");
INSERT INTO bitacoras VALUES("439","Registro de Una Nueva Venta","13","127.0.0.1","2016-02-25 01:04:09");
INSERT INTO bitacoras VALUES("440","confirmar Venta","13","127.0.0.1","2016-02-25 01:04:15");
INSERT INTO bitacoras VALUES("441","Terminar Asignacion de Camion","13","127.0.0.1","2016-02-25 01:06:55");
INSERT INTO bitacoras VALUES("442","Registrar Nueva Presentacion","13","127.0.0.1","2016-02-25 01:07:27");
INSERT INTO bitacoras VALUES("443","Monitoreo de Camion","13","127.0.0.1","2016-02-25 01:08:39");
INSERT INTO bitacoras VALUES("444","Crear Venta","13","127.0.0.1","2016-02-25 01:10:10");
INSERT INTO bitacoras VALUES("445","Registro de Una Nueva Venta","13","127.0.0.1","2016-02-25 01:11:10");
INSERT INTO bitacoras VALUES("446","confirmar Venta","13","127.0.0.1","2016-02-25 01:11:13");
INSERT INTO bitacoras VALUES("447","Bloqueo de cliente","13","127.0.0.1","2016-03-02 02:53:26");
INSERT INTO bitacoras VALUES("448","Desbloqueo de Cliente","13","127.0.0.1","2016-03-02 02:53:30");
INSERT INTO bitacoras VALUES("449","Bloqueo de cliente","13","127.0.0.1","2016-03-02 03:53:08");
INSERT INTO bitacoras VALUES("450","Bloqueo de cliente","13","127.0.0.1","2016-03-02 03:53:11");
INSERT INTO bitacoras VALUES("451","Desbloqueo de Cliente","13","127.0.0.1","2016-03-02 03:53:12");
INSERT INTO bitacoras VALUES("452","Desbloqueo de Cliente","13","127.0.0.1","2016-03-02 03:53:14");
INSERT INTO bitacoras VALUES("453","Bloqueo de cliente","13","127.0.0.1","2016-03-02 21:11:18");
INSERT INTO bitacoras VALUES("454","Desbloqueo de Cliente","13","127.0.0.1","2016-03-02 21:11:23");
INSERT INTO bitacoras VALUES("455","Crear una Reserva","13","127.0.0.1","2016-03-03 03:38:27");
INSERT INTO bitacoras VALUES("456","Crear Venta","13","127.0.0.1","2016-03-03 03:38:37");
INSERT INTO bitacoras VALUES("457","Registro de Una Nueva Venta","13","127.0.0.1","2016-03-03 03:38:55");
INSERT INTO bitacoras VALUES("458","confirmar Venta","13","127.0.0.1","2016-03-03 03:39:01");
INSERT INTO bitacoras VALUES("459","Crear una Reserva","13","127.0.0.1","2016-03-03 03:59:07");
INSERT INTO bitacoras VALUES("460","Monitoreo de Camion","13","127.0.0.1","2016-03-03 04:01:57");
INSERT INTO bitacoras VALUES("461","ver ubicacion de camion","13","127.0.0.1","2016-03-03 04:02:01");
INSERT INTO bitacoras VALUES("462","Asignar Camion","13","127.0.0.1","2016-03-05 00:26:52");
INSERT INTO bitacoras VALUES("463","Terminar Asignacion de Camion","13","127.0.0.1","2016-03-05 00:27:10");
INSERT INTO bitacoras VALUES("464","Terminar Asignacion de Camion","13","127.0.0.1","2016-03-05 00:27:13");
INSERT INTO bitacoras VALUES("465","Bloqueo de cliente","13","127.0.0.1","2016-03-06 09:09:05");
INSERT INTO bitacoras VALUES("466","Desbloqueo de Cliente","13","127.0.0.1","2016-03-06 09:09:09");
INSERT INTO bitacoras VALUES("467","Registro Nuevo Producto","13","127.0.0.1","2016-03-14 19:55:16");
INSERT INTO bitacoras VALUES("468","Registro Nuevo Producto","13","127.0.0.1","2016-03-14 19:56:13");
INSERT INTO bitacoras VALUES("469","Registro Nuevo Producto","13","127.0.0.1","2016-03-14 19:56:35");
INSERT INTO bitacoras VALUES("470","Registro Nuevo Producto","13","127.0.0.1","2016-03-14 19:56:41");
INSERT INTO bitacoras VALUES("471","Bloqueo de cliente","13","127.0.0.1","2016-03-28 15:52:09");
INSERT INTO bitacoras VALUES("472","Desbloqueo de Cliente","13","127.0.0.1","2016-03-28 15:52:19");
INSERT INTO bitacoras VALUES("473","Bloqueo de cliente","13","127.0.0.1","2016-03-29 03:57:17");
INSERT INTO bitacoras VALUES("474","Bloqueo de cliente","13","127.0.0.1","2016-03-29 03:57:21");
INSERT INTO bitacoras VALUES("475","Desbloqueo de Cliente","13","127.0.0.1","2016-03-29 03:58:01");
INSERT INTO bitacoras VALUES("476","Desbloqueo de Cliente","13","127.0.0.1","2016-03-29 03:58:03");
INSERT INTO bitacoras VALUES("477","Inhabilitar Usuario","13","127.0.0.1","2016-03-29 05:45:39");
INSERT INTO bitacoras VALUES("478","Habilitar usuario","13","127.0.0.1","2016-03-29 05:45:43");
INSERT INTO bitacoras VALUES("479","Inhabilitar Usuario","13","127.0.0.1","2016-03-29 05:45:51");
INSERT INTO bitacoras VALUES("480","Asignar Permiso","13","127.0.0.1","2016-03-29 05:46:07");
INSERT INTO bitacoras VALUES("481","Asignar Permiso","13","127.0.0.1","2016-03-29 05:46:08");
INSERT INTO bitacoras VALUES("482","Asignar Permiso","13","127.0.0.1","2016-03-29 05:46:10");
INSERT INTO bitacoras VALUES("483","Asignar Permiso","13","127.0.0.1","2016-03-29 05:46:11");
INSERT INTO bitacoras VALUES("484","Habilitar usuario","13","127.0.0.1","2016-03-30 00:26:54");
INSERT INTO bitacoras VALUES("485","Inhabilitar Usuario","13","127.0.0.1","2016-03-30 00:26:57");
INSERT INTO bitacoras VALUES("486","Habilitar usuario","13","127.0.0.1","2016-03-30 00:26:59");
INSERT INTO bitacoras VALUES("487","Inhabilitar Usuario","13","127.0.0.1","2016-03-30 00:27:03");
INSERT INTO bitacoras VALUES("488","Genero Copias de Seguridad","13","127.0.0.1","2016-03-30 00:27:54");
INSERT INTO bitacoras VALUES("489","Cancelar Reserva","13","127.0.0.1","2016-06-04 12:50:33");
INSERT INTO bitacoras VALUES("490","Actualizar Datos de Producto","13","127.0.0.1","2016-06-08 14:59:53");
INSERT INTO bitacoras VALUES("491","Crear una Reserva","13","127.0.0.1","2016-06-13 16:45:09");
INSERT INTO bitacoras VALUES("492","Confirmar Reserva","13","127.0.0.1","2016-06-13 16:45:21");
INSERT INTO bitacoras VALUES("493","Camion Asignado a una Reserva","13","127.0.0.1","2016-06-13 16:45:34");
INSERT INTO bitacoras VALUES("494","Habilitar usuario","13","127.0.0.1","2016-06-13 16:48:42");
INSERT INTO bitacoras VALUES("495","Crear una Reserva","13","127.0.0.1","2016-06-24 17:56:00");
INSERT INTO bitacoras VALUES("496","Confirmar Reserva","13","127.0.0.1","2016-06-24 17:58:59");
INSERT INTO bitacoras VALUES("497","Crear Venta","13","127.0.0.1","2016-06-24 18:01:23");
INSERT INTO bitacoras VALUES("498","Crear Venta","13","127.0.0.1","2016-06-24 18:02:44");
INSERT INTO bitacoras VALUES("499","Cancelar Venta","13","127.0.0.1","2016-06-24 18:04:07");
INSERT INTO bitacoras VALUES("500","Crear Venta","13","127.0.0.1","2016-06-24 18:04:15");
INSERT INTO bitacoras VALUES("501","Registro de Una Nueva Venta","13","127.0.0.1","2016-06-24 18:04:45");
INSERT INTO bitacoras VALUES("502","Registro de Una Nueva Venta","13","127.0.0.1","2016-06-24 18:04:55");
INSERT INTO bitacoras VALUES("503","confirmar Venta","13","127.0.0.1","2016-06-24 18:05:46");
INSERT INTO bitacoras VALUES("504","Crear Venta","13","127.0.0.1","2016-06-24 18:07:45");
INSERT INTO bitacoras VALUES("505","Registro de Una Nueva Venta","13","127.0.0.1","2016-06-24 18:07:55");
INSERT INTO bitacoras VALUES("506","confirmar Venta","13","127.0.0.1","2016-06-24 18:08:27");
INSERT INTO bitacoras VALUES("507","Crear Venta","13","127.0.0.1","2016-06-24 18:09:19");
INSERT INTO bitacoras VALUES("508","Crear Venta","13","127.0.0.1","2016-06-24 18:10:36");
INSERT INTO bitacoras VALUES("509","Registro de Una Nueva Venta","13","127.0.0.1","2016-06-24 18:11:25");
INSERT INTO bitacoras VALUES("510","confirmar Venta","13","127.0.0.1","2016-06-24 18:12:01");
INSERT INTO bitacoras VALUES("511","Asignar Permiso","13","127.0.0.1","2016-06-27 15:06:21");
INSERT INTO bitacoras VALUES("512","Quitar Permiso","13","127.0.0.1","2016-06-27 15:06:34");





CREATE TABLE `camion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO camion VALUES("1","962-PIX","VEHICULO MODELO 2013","2014-07-04");
INSERT INTO camion VALUES("2","xpp-456","CAMION ROJO CON VERDE MODELO 2001","2014-10-02");
INSERT INTO camion VALUES("3","kpk - 2121","VEHICULO BLANCO CON LINEAS ROJAS","2014-10-05");
INSERT INTO camion VALUES("4","963-PIX","CAMION VERDE CON COLOR AMARILLO","2014-12-04");
INSERT INTO camion VALUES("5","784-PIX","VEHICULO COLOR ROJO CON LINEAS VERDES","2015-02-04");





CREATE TABLE `camion_reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `camion_id` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

INSERT INTO camion_reserva VALUES("1","1","2","2014-07-07");
INSERT INTO camion_reserva VALUES("2","1","3","2014-07-07");
INSERT INTO camion_reserva VALUES("3","1","4","2014-07-29");
INSERT INTO camion_reserva VALUES("4","1","7","2014-08-12");
INSERT INTO camion_reserva VALUES("5","1","8","2014-08-12");
INSERT INTO camion_reserva VALUES("6","1","12","2014-08-15");
INSERT INTO camion_reserva VALUES("7","1","14","2014-08-18");
INSERT INTO camion_reserva VALUES("8","1","16","2014-08-19");
INSERT INTO camion_reserva VALUES("9","1","17","2014-08-21");
INSERT INTO camion_reserva VALUES("10","1","18","2014-08-25");
INSERT INTO camion_reserva VALUES("11","1","19","2014-08-25");
INSERT INTO camion_reserva VALUES("12","2","20","2014-10-02");
INSERT INTO camion_reserva VALUES("13","2","21","2014-10-02");
INSERT INTO camion_reserva VALUES("14","2","23","2014-10-04");
INSERT INTO camion_reserva VALUES("15","2","24","2014-10-04");
INSERT INTO camion_reserva VALUES("16","2","22","2014-10-13");
INSERT INTO camion_reserva VALUES("17","2","25","2014-10-13");
INSERT INTO camion_reserva VALUES("18","2","26","2014-10-13");
INSERT INTO camion_reserva VALUES("19","2","27","2014-11-04");
INSERT INTO camion_reserva VALUES("20","2","28","2014-11-10");
INSERT INTO camion_reserva VALUES("21","1","29","2014-11-11");
INSERT INTO camion_reserva VALUES("22","2","30","2014-11-12");
INSERT INTO camion_reserva VALUES("23","1","31","2014-11-12");
INSERT INTO camion_reserva VALUES("24","2","32","2014-11-17");
INSERT INTO camion_reserva VALUES("25","1","33","2014-11-17");
INSERT INTO camion_reserva VALUES("26","2","34","2014-11-19");
INSERT INTO camion_reserva VALUES("27","2","36","2014-12-06");
INSERT INTO camion_reserva VALUES("28","2","37","2014-12-08");
INSERT INTO camion_reserva VALUES("29","2","38","2014-12-14");
INSERT INTO camion_reserva VALUES("30","2","41","2015-03-02");
INSERT INTO camion_reserva VALUES("31","2","44","2015-03-02");
INSERT INTO camion_reserva VALUES("32","2","46","2015-04-06");
INSERT INTO camion_reserva VALUES("33","2","47","2015-04-06");
INSERT INTO camion_reserva VALUES("34","2","48","2015-04-06");
INSERT INTO camion_reserva VALUES("35","2","49","2015-04-06");
INSERT INTO camion_reserva VALUES("36","2","50","2015-04-06");
INSERT INTO camion_reserva VALUES("37","2","55","2015-04-21");
INSERT INTO camion_reserva VALUES("38","2","52","2015-04-21");
INSERT INTO camion_reserva VALUES("39","2","53","2015-04-21");
INSERT INTO camion_reserva VALUES("40","2","56","2015-04-29");
INSERT INTO camion_reserva VALUES("41","2","57","2015-05-06");
INSERT INTO camion_reserva VALUES("42","2","58","2015-05-06");
INSERT INTO camion_reserva VALUES("43","2","59","2015-05-06");
INSERT INTO camion_reserva VALUES("44","2","61","2015-05-07");
INSERT INTO camion_reserva VALUES("45","2","60","2015-05-07");
INSERT INTO camion_reserva VALUES("46","2","62","2015-05-14");
INSERT INTO camion_reserva VALUES("47","2","63","2015-05-14");
INSERT INTO camion_reserva VALUES("48","2","64","2015-05-14");
INSERT INTO camion_reserva VALUES("49","2","65","2015-05-28");
INSERT INTO camion_reserva VALUES("50","2","66","2015-05-28");
INSERT INTO camion_reserva VALUES("51","2","67","2015-05-28");
INSERT INTO camion_reserva VALUES("52","2","68","2015-05-28");
INSERT INTO camion_reserva VALUES("53","2","72","2015-05-29");
INSERT INTO camion_reserva VALUES("54","2","74","2015-05-29");
INSERT INTO camion_reserva VALUES("55","2","75","2015-05-29");
INSERT INTO camion_reserva VALUES("56","2","76","2015-06-05");
INSERT INTO camion_reserva VALUES("57","2","77","2015-06-05");
INSERT INTO camion_reserva VALUES("58","2","78","2015-06-05");
INSERT INTO camion_reserva VALUES("59","2","79","2015-06-05");
INSERT INTO camion_reserva VALUES("60","2","81","2015-10-25");
INSERT INTO camion_reserva VALUES("61","2","82","2015-10-25");
INSERT INTO camion_reserva VALUES("62","5","85","2016-06-13");





CREATE TABLE `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fono` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `usuario` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO cliente VALUES("1","6614489","MIRIAM","MENDOZA","MAMANI","AV UNIVERSITARIA NRO 234","78965478","1987-02-12","mirian@gmail.com","Tienda","1","-19.57906344253369","-65.76444767573241","6","1");
INSERT INTO cliente VALUES("2","4789541","GONZALO","MENDOZA","MAMANI","13 DE MAYO NRO 220","78945625","1980-02-14","gonchi@hotmail.com","Agencia","1","-19.567711203399487","-65.7593836651123","10","1");
INSERT INTO cliente VALUES("3","45678956","ROXANA","SANCHEZ","ALARCON","BOLIVAR NRO 100","78956325","1988-08-20","algo@algo.com","Tienda","1","-19.587801998896552","-65.75077913859252","4","0");
INSERT INTO cliente VALUES("4","6601242","JORGE","LOPEZ","CORS","PORVENIR NRO 30","72415487","1987-12-12","rafael@rafael.com","Normal","1","-19.576192604540797","-65.7617440090454","6","1");
INSERT INTO cliente VALUES("5","6548784","ANA","PANIAGUA","MARTINEZ","W ALBA NRO 10","71896582","1970-08-10","anita@hotmail.com","Agencia","1","-19.582833866822327","-65.75816057780162","6","0");
INSERT INTO cliente VALUES("6","5556789","HILDA","MENDOZA","CAZASOLA","GABRIEL RENE MORENO S/N","76889541","1965-01-12","emilda@gmail.com","Tienda","1","-19.578467040259255","-65.76254867174998","6","0");
INSERT INTO cliente VALUES("7","4058962","JUAN","VELA","GONZALES","SUCRE NRO 185","72418769","1974-04-01","juan@yahoo.com","Agencia","1","-19.58495579904372","-65.75190784075318","4","0");
INSERT INTO cliente VALUES("8","3658749","YERKO","PARRADO","FERNANDEZ","BOLIVAR NRO 1234","69657481","1980-06-18","yer12@gmail.com","Agencia","1","-19.5877009194053","-65.7512941227235","4","0");
INSERT INTO cliente VALUES("9","1425487","CHRISTIAN","CARVAJAL","LLANOS","COLOMBIA NRO 1548","71845874","1975-11-20","christiancitoq@gmail.com","Agencia","1","-19.566644678578253","-65.76762877562419","9","0");
INSERT INTO cliente VALUES("10","6460501","FELIPE","POVEDA","LIZON","ARGENTINA NRO 458","72463528","1973-05-12","povedafep@gmail.com","Normal","1","-19.571314307257225","-65.76537253000794","9","0");
INSERT INTO cliente VALUES("11","3014785","LUCIA","QUEZADA","ESPINOZA","ECUADOR NRO 784","6985748","1980-04-12","luciluci@hotmail.com","Tienda","1","-19.568023800488653","-65.76877357103882","9","0");
INSERT INTO cliente VALUES("12","6352418","DIEGO","BENITEZ","ALTIVENA","J MANRIQUE SN","77478596","1988-09-02","benitezsa@hotmail.com","Agencia","1","-19.570581404498718","-65.76618792154846","9","1");
INSERT INTO cliente VALUES("19","12345678","JUAN","MACHACA","VARGAS","CLL 13 DE MAYO NRO 1024","76889541","1989-01-11","jose@gmail.com","Tienda","1","-19.572561022285083","-65.75511090615163","7","0");
INSERT INTO cliente VALUES("20","9999999","EMILIO","ARRIETA","VEGA","MURILLO SN","71837878","1989-01-02","agenciadecerveza@gmail.com","Tienda","1","-19.56232211821146","-65.76935292818604","9","1");
INSERT INTO cliente VALUES("21","22345678","JUAN","LOPEZ","MAMANI","AV MURILLO NRO 100","71878787","1988-08-20","j@gmail.com","Agencia","1","-19.57045077509792","-65.76707624056701","4","1");





CREATE TABLE `detalle_bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bitacora` int(11) NOT NULL,
  `dato_antiguo` varchar(500) NOT NULL,
  `dato_nuevo` varchar(500) NOT NULL,
  `name_tabla` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=latin1;

INSERT INTO detalle_bitacora VALUES("3","77","(\'12345678\' ,\'JUAN\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'7\')","","cliente");
INSERT INTO detalle_bitacora VALUES("4","78","(\'45678956\' ,\'ROXANA\' ,\'SANCHEZ\' ,\'ALARCON\' ,\'BOLIVAR NRO 100\' ,\'78956325\' ,\'1988-08-20\' ,\'Tienda\' ,\'algo@algo.com\' ,\'-19.587801998896552\' ,\'-65.75077913859252\' ,\'4\')","(\'45678956\' ,\'ROXANA\' ,\'SANCHEZ\' ,\'ALARCON\' ,\'BOLIVAR NRO 100\' ,\'78956325\' ,\'1988-08-20\' ,\'Tienda\' ,\'algo@algo.com\' ,\'-19.587801998896552\' ,\'-65.75077913859252\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("5","79","(\'12345678\' ,\'JUANA\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","(\'12345678\' ,\'JUANA\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("6","80","(\'12345678\' ,\'JUANA\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","(\'12345678\' ,\'JUAN\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("7","81","(\'9\' ,\'no estaba en su domicilio\' ,\' 2015-02-04\' ,)","","cliente");
INSERT INTO detalle_bitacora VALUES("8","82","(\'2\' ,\'se le espero pero no estuvo en su domicilio\' ,\' 2015-02-04\' ,)","","obs_cliente");
INSERT INTO detalle_bitacora VALUES("9","83","(\'7845455\' ,\'GUIDO\' ,\'MENDOZA\' ,\'CHUCUMANI\' ,\'CLL. OROSCO S/N\' ,\'6226874\' ,\'1987-01-05\' ,\'guido@gmail.com\' ,)","","empleados");
INSERT INTO detalle_bitacora VALUES("10","85","(\'7845455\' ,\'GUIDO\' ,\'MENDOZA\' ,\'CHUCUMANI\' ,\'CLL. OROSCO S/N\' ,\'6226874\' ,\'guido@gmail.com\' ,\'1987-01-05\' ,)","(\'7845455\' ,\'GUIDA\' ,\'MENDOZA\' ,\'CHUCUMANI\' ,\'CLL. OROSCO S/N\' ,\'6226874\' ,\'guido@gmail.com\' ,\'1987-01-05\' ,)","cliente");
INSERT INTO detalle_bitacora VALUES("11","86","(\'784-PIX\' ,\'VEHICULO COLOR ROJO CON LINEAS VERDES\' ,\' 2015-02-04\' ,)","","camion");
INSERT INTO detalle_bitacora VALUES("12","88","(\'kpk - 2121\' ,\'aslkdfjdalsk fjlkdsjflskdj\' ,\'2014-10-05\' ,)","(\'kpk - 2121\' ,\'VEHICULO BLANCO CON LINEAS ROJAS\' ,\'2014-10-05\' ,)","camion");
INSERT INTO detalle_bitacora VALUES("13","89","(\'5\' ,\'5\' ,\'2015-02-03 23:15:20\' ,)","","empleado_camion");
INSERT INTO detalle_bitacora VALUES("14","90","(\'cuarto litro\' ,\'2015-02-04 14:02:11\' ,)","","tipo");
INSERT INTO detalle_bitacora VALUES("15","91","(\'BOTELLA DE VIDRIO 1 LITRO\' ,\'2014-07-03\' ,)","(\'BOTELLA DE VIDRIO 1 LITROS\' ,\'2014-07-03\' )","tipo");
INSERT INTO detalle_bitacora VALUES("16","95","(\'GASEOSA\' ,\'SODA\' ,\'GASEOSA\' ,\'5\' ,\'10\' ,\'6\' ,\'Penguins.jpg\' ,\'1\' ,\'0\' ,\'2015-02-04 18:56:01\' ,)","","producto");
INSERT INTO detalle_bitacora VALUES("17","96","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'\' ,\'\' ,\'\' ,\'Potosina.jpg\' ,\'0\' ,\'\' ,)","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'13\' ,\'16\' ,\'14\' ,\'Potosina.jpg\' ,\'1\' ,\'0\' ,\'CERVEZA BLANCA TIPO PILSENER\' ,)","producto");
INSERT INTO detalle_bitacora VALUES("18","97","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'13\' ,\'16\' ,\'14\' ,\'Potosina.jpg\' ,\'1\' ,\'\' ,)","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'13\' ,\'16\' ,\'14\' ,\'Potosina.jpg\' ,\'1\' ,\'0\' ,\'CERVEZA BLANCA TIPO PILSENER\' ,)","producto");
INSERT INTO detalle_bitacora VALUES("19","98","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'13\' ,\'16\' ,\'14\' ,\'Potosina.jpg\' ,\'1\' ,\'0\' ,)","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'13\' ,\'16\' ,\'14\' ,\'Potosina.jpg\' ,\'1\' ,\'0\' ,\'CERVEZA BLANCA TIPO PILSENER\' ,)","producto");
INSERT INTO detalle_bitacora VALUES("20","99","(\'CERVEZA\' ,\'CERVEZA EN LATITA\' ,\'2014-07-06\' ,\'6\' ,\'7\' ,\'5\' ,\'potosina_lata.jpg\' ,\'2\' ,\'1\' ,)","(\'CERVEZA\' ,\'CERVEZA EN LATITA\' ,\'2014-07-06\' ,\'6\' ,\'7\' ,\'5\' ,\'potosina_lata.jpg\' ,\'CERVEZA EN LATA 350 CC.\' ,\'1\' ,\'CERVEZA BLANCA TIPO PILSENER\' ,)","producto");
INSERT INTO detalle_bitacora VALUES("21","100","(\'4832\' ,\'5000\' ,\'1\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("22","101","(\'nataly\' ,\'0\' ,\'2015-02-04 21:13:11\' ,\'0\' ,\'nataly@gmail.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("23","102","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'\' ,)","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("24","105","(\'nataly\' ,\'0\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("25","106","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("26","107","(\'nataly\' ,\'0\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("27","108","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("28","109","(\'nataly\' ,\'0\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("29","110","(\'nataly\' ,\'1\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","(\'nataly\' ,\'0\' ,\'2015-02-04\' ,\'0\' ,\'nataly@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("30","112","(\'juana\' ,\'0\' ,\'2014-06-24\' ,\'1\' ,\'juan4a@gmail.com\' ,)","(\'juana\' ,\'0\' ,\'2014-06-24\' ,\'0\' ,\'juan4a@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("31","113","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'0\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("32","114","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'0\' ,\'nataly45@gmail.com\' ,)","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("33","115","(\'14\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("34","116","(\'14\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("35","117","(\'14\' ,\'3\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("36","118","(\'19\' ,\'\' ,\'\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("37","121","(\'14\' ,\'4\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("38","122","(\'14\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("39","123","(\'14\' ,\'6\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("40","127","(\'16\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("41","128","(\'16\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("42","129","(\'16\' ,\'3\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("43","130","(\'25\' ,\'16\' ,\'3\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("44","131","(\'24\' ,\'16\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("45","132","(\'23\' ,\'16\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("46","133","(\'8\' ,\'16\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("47","134","(\'rosmery\' ,\'0\' ,\'2015-02-04 22:07:04\' ,\'0\' ,\'rosmery@gmail.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("48","135","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("49","137","(\'2015-03-02 16:40:37\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("50","139","(\'2\' ,\'41\' ,\' 2015-03-02\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("51","140","(\'2\' ,\'44\' ,\' 2015-03-02\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("52","145","(\' 2015-03-18\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("53","146","(\' 2015-03-18\' ,\'7\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("54","148","(\' 2015-03-18\' ,\'12\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("55","149","(\'2015-04-06 15:58:41\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("56","151","(\'2015-04-06 15:58:58\' ,\'2\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("57","153","(\'2015-04-06 15:59:11\' ,\'12\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("58","155","(\'2015-04-06 15:59:28\' ,\'1\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("59","157","(\'2\' ,\'46\' ,\' 2015-04-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("60","158","(\'2\' ,\'47\' ,\' 2015-04-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("61","159","(\'2\' ,\'48\' ,\' 2015-04-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("62","160","(\'2\' ,\'49\' ,\' 2015-04-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("63","161","(\'2015-04-06 16:04:24\' ,\'8\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("64","163","(\'2\' ,\'50\' ,\' 2015-04-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("65","164","(\'1425487\' ,\'CHRISTIAN\' ,\'CARVAJAL\' ,\'LLANOS\' ,\'COLOMBIA NRO 1548\' ,\'71845874\' ,\'1975-11-20\' ,\'Agencia\' ,\'christiancito@gmail.com\' ,\'-19.560866337231676\' ,\'-65.76917053797303\' ,\'9\')","(\'1425487\' ,\'CHRISTIAN\' ,\'CARVAJAL\' ,\'LLANOS\' ,\'COLOMBIA NRO 1548\' ,\'71845874\' ,\'1975-11-20\' ,\'Agencia\' ,\'christiancitoq@gmail.com\' ,\'-19.560866337231676\' ,\'-65.76917053797303\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("66","165","(\'sergio\' ,\'0\' ,\'2015-04-15 11:12:11\' ,\'0\' ,\'sergio.b.carvajal@facebook.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("67","166","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'0\' ,\'sergio.b.carvajal@facebook.com\' ,)","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("68","167","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'0\' ,\'sergio.b.carvajal@facebook.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("69","168","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'0\' ,\'sergio.b.carvajal@facebook.com\' ,)","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("70","169","(\'1425487\' ,\'CHRISTIAN\' ,\'CARVAJAL\' ,\'LLANOS\' ,\'COLOMBIA NRO 1548\' ,\'71845874\' ,\'1975-11-20\' ,\'Agencia\' ,\'christiancitoq@gmail.com\' ,\'-19.560866337231676\' ,\'-65.76917053797303\' ,\'4\')","(\'1425487\' ,\'CHRISTIAN\' ,\'CARVAJAL\' ,\'LLANOS\' ,\'COLOMBIA NRO 1548\' ,\'71845874\' ,\'1975-11-20\' ,\'Agencia\' ,\'christiancitoq@gmail.com\' ,\'-19.560866337231676\' ,\'-65.76917053797303\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("71","170","(\'2015-04-15 15:38:41\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("72","171","(\'2015-04-15 15:40:18\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("73","173","(\' 2015-04-16\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("74","174","(\' 2015-04-16\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("75","177","(\'agencia\' ,\'0\' ,\'2015-04-21 08:23:03\' ,\'0\' ,\'agenciapotosina@gmail.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("76","178","(\'26\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("77","179","(\'agencia\' ,\'0\' ,\'2015-04-21\' ,\'0\' ,\'agenciapotosina@gmail.com\' ,)","(\'agencia\' ,\'1\' ,\'2015-04-21\' ,\'0\' ,\'agenciapotosina@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("78","180","(\'9999999\' ,\'EMILIO\' ,\'ARRIETA\' ,\'VEGA\' ,\'MURILLO SN\' ,\'71837878\' ,\'1989-01-02\' ,\'Agencia\' ,\'agenciadecerveza@gmail.com\' ,\'-19.56232211821146\' ,\'-65.76935292818604\' ,\'9\')","","cliente");
INSERT INTO detalle_bitacora VALUES("79","181","(\'17\' ,\'26\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("80","184","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'0\' ,\'sergio.b.carvajal@facebook.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("81","185","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'0\' ,\'sergio.b.carvajal@facebook.com\' ,)","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("82","186","(\'25\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("83","187","(\'25\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("84","188","(\'25\' ,\'3\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("85","189","(\'25\' ,\'4\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("86","190","(\'25\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("87","191","(\'25\' ,\'6\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("88","192","(\'25\' ,\'7\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("89","193","(\'sergio\' ,\'0\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","(\'sergio\' ,\'1\' ,\'2015-04-15\' ,\'1\' ,\'sergio.b.carvajal@facebook.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("90","194","(\'18\' ,\'25\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("91","195","(\'19\' ,\'25\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("92","196","(\'20\' ,\'25\' ,\'3\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("93","197","(\'21\' ,\'25\' ,\'4\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("94","198","(\'22\' ,\'25\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("95","199","(\'23\' ,\'25\' ,\'6\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("96","200","(\'24\' ,\'25\' ,\'7\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("97","201","(\'9999999\' ,\'EMILIO\' ,\'ARRIETA\' ,\'VEGA\' ,\'MURILLO SN\' ,\'71837878\' ,\'1989-01-02\' ,\'Agencia\' ,\'agenciadecerveza@gmail.com\' ,\'-19.56232211821146\' ,\'-65.76935292818604\' ,\'9\')","(\'9999999\' ,\'EMILIO\' ,\'ARRIETA\' ,\'VEGA\' ,\'MURILLO SN\' ,\'71837878\' ,\'1989-01-02\' ,\'Tienda\' ,\'agenciadecerveza@gmail.com\' ,\'-19.56232211821146\' ,\'-65.76935292818604\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("98","202","(\'2015-04-21 09:20:17\' ,\'20\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("99","204","(\'6612868\' ,\'Roger\' ,\'Mendez\' ,\'Roca\' ,\'Araujo sn\' ,\'76176338\' ,\'Roger.Mendez.R@gmail.com\' ,\'1987-12-12\' ,)","(\'6612868\' ,\'Julian\' ,\'Garcia\' ,\'Paz\' ,\'Araujo sn\' ,\'76176338\' ,\'Roger.Mendez.R@gmail.com\' ,\'1987-12-12\' ,)","empleados");
INSERT INTO detalle_bitacora VALUES("100","205","(\'1111111\' ,\'Maria\' ,\'Maria\' ,\'Maria\' ,\'Bolivar s/n\' ,\'1111111\' ,\'mario@mario.com\' ,\'1985-12-12\' ,)","(\'1111111\' ,\'Maria\' ,\'Perez\' ,\'Flores\' ,\'Bolivar s/n\' ,\'1111111\' ,\'mario@mario.com\' ,\'1985-12-12\' ,)","empleados");
INSERT INTO detalle_bitacora VALUES("101","206","(\'roger\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'\' ,)","(\'roger\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("102","207","(\'roger\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'\' ,)","(\'roger\' ,\'1\' ,\'2014-06-22\' ,\'0\' ,\'\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("103","208","(\'14\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("104","209","(\' 2015-04-21\' ,\'9\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("105","213","(\' 2015-04-21\' ,\'11\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("106","217","(\' 2015-04-21\' ,\'8\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("107","222","(\' 2015-04-21\' ,\'7\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("108","227","(\' 2015-04-21\' ,\'2\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("109","230","(\' 2015-04-21\' ,\'12\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("110","234","(\' 2015-04-21\' ,\'4\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("111","238","(\' 2015-04-21\' ,\'5\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("112","241","(\' 2015-04-21\' ,\'6\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("113","245","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","","cliente");
INSERT INTO detalle_bitacora VALUES("114","246","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("115","247","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57197723211545\' ,\'-65.75565003016362\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("116","248","(\'12345678\' ,\'JUAN\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.5711374\' ,\'-65.7502556\' ,\'4\')","(\'12345678\' ,\'JUAN\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.572561022285083\' ,\'-65.75511090615163\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("117","249","(\' 2015-04-21\' ,\'21\' ,\'25\')","","venta");
INSERT INTO detalle_bitacora VALUES("118","252","(\'22345678\' ,\'0\' ,\'2015-04-21\' ,\'0\' ,\'j@gmail.com\' ,)","(\'22345678\' ,\'1\' ,\'2015-04-21\' ,\'0\' ,\'j@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("119","255","(\'2\' ,\'55\' ,\' 2015-04-21\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("120","256","(\'2015-04-21 11:15:31\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("121","258","(\'2015-04-21 11:15:42\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("122","260","(\'2\' ,\'52\' ,\' 2015-04-21\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("123","261","(\'2\' ,\'53\' ,\' 2015-04-21\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("124","267","(\'2015-04-21\' ,\'11:20:00\' ,\'2\' ,)","","horario");
INSERT INTO detalle_bitacora VALUES("125","268","(\'6\' ,\'11:20:06\' ,)","","horario");
INSERT INTO detalle_bitacora VALUES("126","272","(\'6614489\' ,\'1\' ,\'2015-01-18\' ,\'0\' ,\'mirian@gmail.com\' ,)","(\'6614489\' ,\'1\' ,\'2015-01-18\' ,\'1\' ,\'mirian@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("127","273","(\'6614489\' ,\'1\' ,\'2015-01-18\' ,\'1\' ,\'mirian@gmail.com\' ,)","(\'6614489\' ,\'1\' ,\'2015-01-18\' ,\'0\' ,\'mirian@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("128","275","58","","reserva");
INSERT INTO detalle_bitacora VALUES("129","276","(\'2\' ,\'56\' ,\' 2015-04-29\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("130","277","(\'5556789\' ,\'HILDA\' ,\'MENDOZA\' ,\'MAMANI\' ,\'GABRIEL RENE MORENO S/N\' ,\'76889541\' ,\'1965-01-12\' ,\'Tienda\' ,\'emilda@gmail.com\' ,\'-19.578467040259255\' ,\'-65.76254867174998\' ,\'6\')","(\'5556789\' ,\'HILDA\' ,\'MENDOZA\' ,\'CAZASOLA\' ,\'GABRIEL RENE MORENO S/N\' ,\'76889541\' ,\'1965-01-12\' ,\'Tienda\' ,\'emilda@gmail.com\' ,\'-19.578467040259255\' ,\'-65.76254867174998\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("131","278","(\'1425487\' ,\'CHRISTIAN\' ,\'CARVAJAL\' ,\'LLANOS\' ,\'COLOMBIA NRO 1548\' ,\'71845874\' ,\'1975-11-20\' ,\'Agencia\' ,\'christiancitoq@gmail.com\' ,\'-19.560866337231676\' ,\'-65.76917053797303\' ,\'4\')","(\'1425487\' ,\'CHRISTIAN\' ,\'CARVAJAL\' ,\'LLANOS\' ,\'COLOMBIA NRO 1548\' ,\'71845874\' ,\'1975-11-20\' ,\'Agencia\' ,\'christiancitoq@gmail.com\' ,\'-19.566644678578253\' ,\'-65.76762877562419\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("132","279","(\'3014785\' ,\'LUCIA\' ,\'QUEZADA\' ,\'ESPINOZA\' ,\'ECUADOR NRO 784\' ,\'6985748\' ,\'1980-04-12\' ,\'Tienda\' ,\'luciluci@hotmail.com\' ,\'-19.568023800488653\' ,\'-65.76877357103882\' ,\'9\')","(\'3014785\' ,\'LUCIA\' ,\'QUEZADA\' ,\'ESPINOZA\' ,\'ECUADOR NRO 784\' ,\'6985748\' ,\'1980-04-12\' ,\'Tienda\' ,\'luciluci@hotmail.com\' ,\'-19.568023800488653\' ,\'-65.76877357103882\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("133","280","(\'3014785\' ,\'LUCIA\' ,\'QUEZADA\' ,\'ESPINOZA\' ,\'ECUADOR NRO 784\' ,\'6985748\' ,\'1980-04-12\' ,\'Tienda\' ,\'luciluci@hotmail.com\' ,\'-19.568023800488653\' ,\'-65.76877357103882\' ,\'9\')","(\'3014785\' ,\'LUCIA\' ,\'QUEZADA\' ,\'ESPINOZA\' ,\'ECUADOR NRO 784\' ,\'6985748\' ,\'1980-04-12\' ,\'Tienda\' ,\'luciluci@hotmail.com\' ,\'-19.568023800488653\' ,\'-65.76877357103882\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("134","281","(\'3658749\' ,\'YERKO\' ,\'PARRADO\' ,\'FERNANDEZ\' ,\'BOLIVAR NRO 1234\' ,\'69657481\' ,\'1980-06-18\' ,\'Agencia\' ,\'yer12@gmail.com\' ,\'-19.587796157010388\' ,\'-65.75783015825806\' ,\'4\')","(\'3658749\' ,\'YERKO\' ,\'PARRADO\' ,\'FERNANDEZ\' ,\'BOLIVAR NRO 1234\' ,\'69657481\' ,\'1980-06-18\' ,\'Agencia\' ,\'yer12@gmail.com\' ,\'-19.587796157010388\' ,\'-65.75783015825806\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("135","282","(\'3658749\' ,\'YERKO\' ,\'PARRADO\' ,\'FERNANDEZ\' ,\'BOLIVAR NRO 1234\' ,\'69657481\' ,\'1980-06-18\' ,\'Agencia\' ,\'yer12@gmail.com\' ,\'-19.587796157010388\' ,\'-65.75783015825806\' ,\'4\')","(\'3658749\' ,\'YERKO\' ,\'PARRADO\' ,\'FERNANDEZ\' ,\'BOLIVAR NRO 1234\' ,\'69657481\' ,\'1980-06-18\' ,\'Agencia\' ,\'yer12@gmail.com\' ,\'-19.5877009194053\' ,\'-65.7512941227235\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("136","283","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'GUADALQUIVIR NRO 20\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.571148296985886\' ,\'-65.75934074976806\' ,\'7\')","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'8\')","cliente");
INSERT INTO detalle_bitacora VALUES("137","284","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'8\')","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'8\')","cliente");
INSERT INTO detalle_bitacora VALUES("138","285","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'8\')","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'7\')","cliente");
INSERT INTO detalle_bitacora VALUES("139","286","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'7\')","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'5\')","cliente");
INSERT INTO detalle_bitacora VALUES("140","287","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'5\')","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("141","288","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57197723211545\' ,\'-65.75565003016362\' ,\'4\')","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57197723211545\' ,\'-65.75565003016362\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("142","289","(\'reynaldo\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("143","292","59","","reserva");
INSERT INTO detalle_bitacora VALUES("144","293","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57197723211545\' ,\'-65.75565003016362\' ,\'9\')","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57197723211545\' ,\'-65.75565003016362\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("145","294","(\'3014785\' ,\'LUCIA\' ,\'QUEZADA\' ,\'ESPINOZA\' ,\'ECUADOR NRO 784\' ,\'6985748\' ,\'1980-04-12\' ,\'Tienda\' ,\'luciluci@hotmail.com\' ,\'-19.568023800488653\' ,\'-65.76877357103882\' ,\'4\')","(\'3014785\' ,\'LUCIA\' ,\'QUEZADA\' ,\'ESPINOZA\' ,\'ECUADOR NRO 784\' ,\'6985748\' ,\'1980-04-12\' ,\'Tienda\' ,\'luciluci@hotmail.com\' ,\'-19.568023800488653\' ,\'-65.76877357103882\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("146","295","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'9\')","(\'4789541\' ,\'GONZALO\' ,\'MENDOZA\' ,\'MAMANI\' ,\'13 DE MAYO NRO 220\' ,\'78945625\' ,\'1980-02-14\' ,\'Agencia\' ,\'gonchi@hotmail.com\' ,\'-19.567711203399487\' ,\'-65.7593836651123\' ,\'10\')","cliente");
INSERT INTO detalle_bitacora VALUES("147","296","(\'5556789\' ,\'HILDA\' ,\'MENDOZA\' ,\'CAZASOLA\' ,\'GABRIEL RENE MORENO S/N\' ,\'76889541\' ,\'1965-01-12\' ,\'Tienda\' ,\'emilda@gmail.com\' ,\'-19.578467040259255\' ,\'-65.76254867174998\' ,\'4\')","(\'5556789\' ,\'HILDA\' ,\'MENDOZA\' ,\'CAZASOLA\' ,\'GABRIEL RENE MORENO S/N\' ,\'76889541\' ,\'1965-01-12\' ,\'Tienda\' ,\'emilda@gmail.com\' ,\'-19.578467040259255\' ,\'-65.76254867174998\' ,\'6\')","cliente");
INSERT INTO detalle_bitacora VALUES("148","297","(\'9999999\' ,\'EMILIO\' ,\'ARRIETA\' ,\'VEGA\' ,\'MURILLO SN\' ,\'71837878\' ,\'1989-01-02\' ,\'Tienda\' ,\'agenciadecerveza@gmail.com\' ,\'-19.56232211821146\' ,\'-65.76935292818604\' ,\'4\')","(\'9999999\' ,\'EMILIO\' ,\'ARRIETA\' ,\'VEGA\' ,\'MURILLO SN\' ,\'71837878\' ,\'1989-01-02\' ,\'Tienda\' ,\'agenciadecerveza@gmail.com\' ,\'-19.56232211821146\' ,\'-65.76935292818604\' ,\'9\')","cliente");
INSERT INTO detalle_bitacora VALUES("149","298","(\'12345678\' ,\'JUAN\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL PANDO S/N\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.572561022285083\' ,\'-65.75511090615163\' ,\'4\')","(\'12345678\' ,\'JUAN\' ,\'MACHACA\' ,\'VARGAS\' ,\'CLL 13 DE MAYO NRO 1024\' ,\'76889541\' ,\'1989-01-11\' ,\'Tienda\' ,\'jose@gmail.com\' ,\'-19.572561022285083\' ,\'-65.75511090615163\' ,\'7\')","cliente");
INSERT INTO detalle_bitacora VALUES("150","299","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57197723211545\' ,\'-65.75565003016362\' ,\'9\')","(\'22345678\' ,\'JUAN\' ,\'LOPEZ\' ,\'MAMANI\' ,\'AV MURILLO NRO 100\' ,\'71878787\' ,\'1988-08-20\' ,\'Agencia\' ,\'j@gmail.com\' ,\'-19.57045077509792\' ,\'-65.76707624056701\' ,\'4\')","cliente");
INSERT INTO detalle_bitacora VALUES("151","300","(\'2015-05-06 08:56:39\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("152","301","60","","reserva");
INSERT INTO detalle_bitacora VALUES("153","302","(\'2\' ,\'57\' ,\' 2015-05-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("154","303","(\'2\' ,\'58\' ,\' 2015-05-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("155","304","(\'2\' ,\'59\' ,\' 2015-05-06\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("156","306","61","","reserva");
INSERT INTO detalle_bitacora VALUES("157","307","(\'2\' ,\'61\' ,\' 2015-05-07\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("158","308","(\'2\' ,\'60\' ,\' 2015-05-07\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("159","309","(\'2015-05-07\' ,\'02:25:01\' ,\'2\' ,)","","horario");
INSERT INTO detalle_bitacora VALUES("160","310","(\'2528\' ,\'5500\' ,\'1\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("161","311","(\'2015-05-14 17:47:32\' ,\'7\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("162","312","62","","reserva");
INSERT INTO detalle_bitacora VALUES("163","313","(\'2015-05-14 17:48:12\' ,\'8\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("164","314","63","","reserva");
INSERT INTO detalle_bitacora VALUES("165","315","(\'2015-05-14 17:48:25\' ,\'10\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("166","316","64","","reserva");
INSERT INTO detalle_bitacora VALUES("167","317","(\'2\' ,\'62\' ,\' 2015-05-14\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("168","318","(\'2\' ,\'63\' ,\' 2015-05-14\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("169","319","(\'2\' ,\'64\' ,\' 2015-05-14\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("170","320","(\'JorgeLuis\' ,\'0\' ,\'2015-05-27 18:59:06\' ,\'0\' ,\'jorgeluis@gmail.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("171","321","(\'JorgeLuis\' ,\'0\' ,\'2015-05-27\' ,\'0\' ,\'jorgeluis@gmail.com\' ,)","(\'JorgeLuis\' ,\'1\' ,\'2015-05-27\' ,\'0\' ,\'jorgeluis@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("172","322","(\'30\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("173","323","(\'2015-05-28 11:03:40\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("174","324","65","","reserva");
INSERT INTO detalle_bitacora VALUES("175","325","(\'2015-05-28 11:03:56\' ,\'6\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("176","326","66","","reserva");
INSERT INTO detalle_bitacora VALUES("177","327","(\'2015-05-28 11:04:09\' ,\'10\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("178","328","67","","reserva");
INSERT INTO detalle_bitacora VALUES("179","329","(\'2\' ,\'65\' ,\' 2015-05-28\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("180","330","(\'2\' ,\'66\' ,\' 2015-05-28\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("181","331","(\'2\' ,\'67\' ,\' 2015-05-28\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("182","332","(\'CarlosLopez\' ,\'0\' ,\'2015-05-28 10:59:02\' ,\'0\' ,\'carlos@gmail.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("183","333","(\'CarlosLopez\' ,\'0\' ,\'2015-05-28\' ,\'0\' ,\'carlos@gmail.com\' ,)","(\'CarlosLopez\' ,\'1\' ,\'2015-05-28\' ,\'0\' ,\'carlos@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("184","334","(\'31\' ,\'3\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("185","335","(\'31\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("186","337","(\'2015-05-28 12:39:59\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("187","338","68","","reserva");
INSERT INTO detalle_bitacora VALUES("188","339","(\'2\' ,\'68\' ,\' 2015-05-28\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("189","341","(\'2015-05-28\' ,\'03:08:02\' ,\'2\' ,)","","horario");
INSERT INTO detalle_bitacora VALUES("190","342","(\'8\' ,\'03:08:41\' ,)","","horario");
INSERT INTO detalle_bitacora VALUES("191","352","69","","reserva");
INSERT INTO detalle_bitacora VALUES("192","353","(\'AntonioVega\' ,\'0\' ,\'2015-05-29 08:11:40\' ,\'0\' ,\'anto@gmail.com\' ,)","","usuario");
INSERT INTO detalle_bitacora VALUES("193","354","(\'AntonioVega\' ,\'0\' ,\'2015-05-29\' ,\'0\' ,\'anto@gmail.com\' ,)","(\'AntonioVega\' ,\'0\' ,\'2015-05-29\' ,\'1\' ,\'anto@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("194","355","(\'32\' ,\'6\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("195","356","(\'32\' ,\'5\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("196","357","(\'AntonioVega\' ,\'0\' ,\'2015-05-29\' ,\'1\' ,\'anto@gmail.com\' ,)","(\'AntonioVega\' ,\'1\' ,\'2015-05-29\' ,\'1\' ,\'anto@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("197","358","(\'AntonioVega\' ,\'1\' ,\'2015-05-29\' ,\'1\' ,\'anto@gmail.com\' ,)","(\'AntonioVega\' ,\'1\' ,\'2015-05-29\' ,\'0\' ,\'anto@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("198","359","(\' 2015-05-29\' ,\'9\' ,\'32\')","","venta");
INSERT INTO detalle_bitacora VALUES("199","361","(\'2015-05-29 11:52:46\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("200","362","(\'2015-05-29 11:52:52\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("201","364","(\'2015-05-29 22:38:17\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("202","365","72","","reserva");
INSERT INTO detalle_bitacora VALUES("203","366","(\'2015-05-29 22:38:27\' ,\'8\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("204","368","(\'2015-05-29 22:38:36\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("205","369","74","","reserva");
INSERT INTO detalle_bitacora VALUES("206","370","(\'2015-05-29 22:38:49\' ,\'6\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("207","371","75","","reserva");
INSERT INTO detalle_bitacora VALUES("208","372","(\'2\' ,\'72\' ,\' 2015-05-29\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("209","373","(\'2\' ,\'74\' ,\' 2015-05-29\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("210","374","(\'2\' ,\'75\' ,\' 2015-05-29\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("211","375","(\'2015-06-05 21:54:52\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("212","376","76","","reserva");
INSERT INTO detalle_bitacora VALUES("213","377","(\'2015-06-05 21:55:12\' ,\'8\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("214","378","77","","reserva");
INSERT INTO detalle_bitacora VALUES("215","379","(\'2\' ,\'76\' ,\' 2015-06-05\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("216","380","(\'2\' ,\'77\' ,\' 2015-06-05\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("217","381","(\'2015-06-05 21:57:24\' ,\'7\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("218","382","78","","reserva");
INSERT INTO detalle_bitacora VALUES("219","383","(\'2\' ,\'78\' ,\' 2015-06-05\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("220","384","(\'2015-06-05 21:58:44\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("221","385","79","","reserva");
INSERT INTO detalle_bitacora VALUES("222","386","(\'2\' ,\'79\' ,\' 2015-06-05\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("223","387","(\' 2015-06-08\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("224","390","(\'50000\' ,\'50000\' ,\'4\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("225","392","(\' 2015-06-08\' ,\'11\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("226","398","(\' 2015-06-08\' ,\'7\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("227","403","(\'Botellin 350 \' ,\'2015-06-12 01:14:29\')","","tipo");
INSERT INTO detalle_bitacora VALUES("228","404","(\'BOTELLA DE VIDRIO 1 LITROS\' ,\'2015-06-12 01:22:33\')","","tipo");
INSERT INTO detalle_bitacora VALUES("229","405","(\'BOTELLA DE VIDRIO 1 LITROS\' ,\'2014-07-03\' ,)","(\'BOTELLA DE VIDRIO 1 LITROS\' ,\'2014-07-03\' )","tipo");
INSERT INTO detalle_bitacora VALUES("230","406","(\'cuarto litro\' ,\'2015-02-04\' ,)","(\'cuarto litro\' ,\'2015-02-04\' )","tipo");
INSERT INTO detalle_bitacora VALUES("231","407","(\'CERVEZA EN LATA 350 CC.\' ,\'2014-07-06\' ,)","(\'CERVEZA EN LATA 350 CC.\' ,\'2014-07-06\' )","tipo");
INSERT INTO detalle_bitacora VALUES("232","408","(\'cuarto litro\' ,\'2015-02-04\' ,)","(\'cuarto litro\' ,\'2015-02-04\' )","tipo");
INSERT INTO detalle_bitacora VALUES("233","409","(\' 2015-06-12\' ,\'11\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("234","411","(\'Cerveza\' ,\'lkjsdf lkasdjflkajsd flkjsadklfjlakdsjflkasdj fklasdj\' ,\'2014-07-07\' ,\'10\' ,\'10\' ,\'10\' ,\'Potosina.jpg\' ,\'2\' ,\'0\' ,)","(\'Cerveza\' ,\'lkjsdf lkasdjflkajsd flkjsadklfjlakdsjflkasdj fklasdj\' ,\'2014-07-07\' ,\'10\' ,\'10\' ,\'10\' ,\'Potosina.jpg\' ,\'4\' ,\'0\' ,\'botellin de medio litro\' ,)","producto");
INSERT INTO detalle_bitacora VALUES("235","416","(\'BOTELLA DE VIDRIO 1 LITROS\' ,\'2014-07-03\' ,)","(\'BOTELLA DE VIDRIO 1 LITROS\' ,\'2014-07-03\' )","tipo");
INSERT INTO detalle_bitacora VALUES("236","417","(\' 2015-06-12\' ,\'8\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("237","419","(\'2015-10-25 03:45:16\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("238","420","(\'2015-10-25 03:45:49\' ,\'11\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("239","421","81","","reserva");
INSERT INTO detalle_bitacora VALUES("240","422","(\'2015-10-25 03:46:35\' ,\'7\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("241","423","82","","reserva");
INSERT INTO detalle_bitacora VALUES("242","424","(\'2\' ,\'81\' ,\' 2015-10-25\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("243","425","(\'2\' ,\'82\' ,\' 2015-10-25\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("244","427","(\'13\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("245","428","(\'31\' ,\'13\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("246","429","(\'13\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("247","430","(\'32\' ,\'13\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("248","431","(\'3119\' ,\'6500\' ,\'1\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("249","432","(\'juana\' ,\'0\' ,\'2014-06-24\' ,\'1\' ,\'juan4a@gmail.com\' ,)","(\'juana\' ,\'1\' ,\'2014-06-24\' ,\'1\' ,\'juan4a@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("250","433","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("251","434","(\'admin\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("252","435","(\'manuvas\' ,\'1\' ,\'2014-06-22\' ,\'0\' ,\'manuvas@gmail.com\' ,)","(\'manuvas\' ,\'0\' ,\'2014-06-22\' ,\'0\' ,\'manuvas@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("253","437","(\'cerveza personal\' ,\'mmmmmmmmmmmmmmmmmmmmmm nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn jjjjjjjjjjjjjjjjjjjjjjjjjjj kkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkk ;;;;;;;;;;;;;;;;; llllllllllllllll\' ,\'2016-02-25 00:29:17\' ,\'2\' ,\'1\' ,\'2\' ,\'descarga_(1).png\' ,\'1\' ,\'0\' ,\'cerveza\' ,)","","producto");
INSERT INTO detalle_bitacora VALUES("254","438","(\' 2016-02-25\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("255","442","(\'hollll aoco como estan en el mundo mas \' ,\'2016-02-25 00:35:47\')","","tipo");
INSERT INTO detalle_bitacora VALUES("256","444","(\' 2016-02-25\' ,\'11\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("257","455","(\'2016-03-03 03:38:27\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("258","456","(\' 2016-03-03\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("259","459","(\'2016-03-03 03:59:07\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("260","462","(\'2\' ,\'3\' ,\'2016-03-05 00:26:52\' ,)","","empleado_camion");
INSERT INTO detalle_bitacora VALUES("261","467","(\'comosea\' ,\'no importa\' ,\'2016-03-14 19:23:36\' ,\'10\' ,\'12\' ,\'11\' ,\'logo-cocacola.png\' ,\'6\' ,\'1\' ,\'loquesea\' ,)","","producto");
INSERT INTO detalle_bitacora VALUES("262","468","(\'comosea\' ,\'no importa\' ,\'2016-03-14 19:24:33\' ,\'10\' ,\'12\' ,\'11\' ,\'logo-cocacola.png\' ,\'6\' ,\'1\' ,\'loquesea\' ,)","","producto");
INSERT INTO detalle_bitacora VALUES("263","469","(\'comosea\' ,\'no importa\' ,\'2016-03-14 19:24:55\' ,\'10\' ,\'12\' ,\'11\' ,\'logo-cocacola.png\' ,\'6\' ,\'1\' ,\'loquesea\' ,)","","producto");
INSERT INTO detalle_bitacora VALUES("264","470","(\'comosea\' ,\'no importa\' ,\'2016-03-14 19:25:01\' ,\'10\' ,\'12\' ,\'11\' ,\'logo-cocacola.png\' ,\'6\' ,\'1\' ,\'loquesea\' ,)","","producto");
INSERT INTO detalle_bitacora VALUES("265","477","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("266","478","(\'admin\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("267","479","(\'juana\' ,\'1\' ,\'2014-06-24\' ,\'1\' ,\'juan4a@gmail.com\' ,)","(\'juana\' ,\'0\' ,\'2014-06-24\' ,\'1\' ,\'juan4a@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("268","480","(\'16\' ,\'2\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("269","481","(\'16\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("270","482","(\'16\' ,\'4\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("271","483","(\'16\' ,\'6\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("272","484","(\'manuvas\' ,\'0\' ,\'2014-06-22\' ,\'0\' ,\'manuvas@gmail.com\' ,)","(\'manuvas\' ,\'1\' ,\'2014-06-22\' ,\'0\' ,\'manuvas@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("273","485","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("274","486","(\'admin\' ,\'0\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","(\'admin\' ,\'1\' ,\'2014-06-22\' ,\'1\' ,\'nataly45@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("275","487","(\'manuvas\' ,\'1\' ,\'2014-06-22\' ,\'0\' ,\'manuvas@gmail.com\' ,)","(\'manuvas\' ,\'0\' ,\'2014-06-22\' ,\'0\' ,\'manuvas@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("276","490","(\'CERVEZA\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'\' ,\'\' ,\'\' ,\'Potosina.jpg\' ,\'1\' ,\'\' ,)","(\'POWERDE\' ,\'UNO DE NUESTROS MEJORES PRODUCTOS\' ,\'2014-07-03\' ,\'13\' ,\'16\' ,\'14\' ,\'13.jpg\' ,\'BOTELLA DE VIDRIO 1 LITROS\' ,\'0\' ,\'CERVEZA BLANCA TIPO PILSENER\' ,)","producto");
INSERT INTO detalle_bitacora VALUES("277","491","(\'2016-06-13 16:45:09\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("278","493","(\'5\' ,\'85\' ,\' 2016-06-13\' ,)","","camion_reserva");
INSERT INTO detalle_bitacora VALUES("279","494","(\'7845455\' ,\'0\' ,\'2016-02-23\' ,\'0\' ,\'guido@gmail.com\' ,)","(\'7845455\' ,\'1\' ,\'2016-02-23\' ,\'0\' ,\'guido@gmail.com\' ,)","usuario");
INSERT INTO detalle_bitacora VALUES("280","495","(\'2016-06-24 17:56:00\' ,\'9\' ,)","","almacen");
INSERT INTO detalle_bitacora VALUES("281","497","(\' 2016-06-24\' ,\'9\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("282","498","(\' 2016-06-24\' ,\'8\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("283","500","(\' 2016-06-24\' ,\'7\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("284","504","(\' 2016-06-24\' ,\'11\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("285","507","(\' 2016-06-24\' ,\'6\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("286","508","(\' 2016-06-24\' ,\'1\' ,\'13\')","","venta");
INSERT INTO detalle_bitacora VALUES("287","511","(\'13\' ,\'1\' ,)","","usuario_permisos");
INSERT INTO detalle_bitacora VALUES("288","512","(\'35\' ,\'13\' ,\'1\' ,)","","usuario_permisos");





CREATE TABLE `detalle_botellas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ventas_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `botellas_sanas` int(11) NOT NULL,
  `botellas_rotas` int(11) NOT NULL,
  `total_botellas` int(11) NOT NULL,
  `importe` float NOT NULL,
  `precio_b_t` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO detalle_botellas VALUES("1","38","1","10","10","20","15","0");
INSERT INTO detalle_botellas VALUES("4","41","1","8","2","10","4","0");
INSERT INTO detalle_botellas VALUES("5","41","3","7","3","10","15","0");
INSERT INTO detalle_botellas VALUES("6","41","4","4","1","5","1","0");
INSERT INTO detalle_botellas VALUES("7","42","1","7","3","10","6","2");
INSERT INTO detalle_botellas VALUES("8","43","1","8","2","10","6","3");
INSERT INTO detalle_botellas VALUES("9","43","3","9","1","10","0","0");
INSERT INTO detalle_botellas VALUES("10","43","4","-3","5","2","15","3");
INSERT INTO detalle_botellas VALUES("11","44","1","-9","10","1","15","0");
INSERT INTO detalle_botellas VALUES("12","45","4","1","2","3","3","0");
INSERT INTO detalle_botellas VALUES("13","46","1","19","1","20","1.5","0");
INSERT INTO detalle_botellas VALUES("14","51","1","2","2","4","3","");





CREATE TABLE `detalle_reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

INSERT INTO detalle_reserva VALUES("5","2","10","50","5");
INSERT INTO detalle_reserva VALUES("6","1","20","320","6");
INSERT INTO detalle_reserva VALUES("7","1","10","140","7");
INSERT INTO detalle_reserva VALUES("8","1","15","240","8");
INSERT INTO detalle_reserva VALUES("17","1","1","14","18");
INSERT INTO detalle_reserva VALUES("19","1","12","192","20");
INSERT INTO detalle_reserva VALUES("20","2","5","35","20");
INSERT INTO detalle_reserva VALUES("21","3","5","50","21");
INSERT INTO detalle_reserva VALUES("22","1","6","96","21");
INSERT INTO detalle_reserva VALUES("23","2","10","70","21");
INSERT INTO detalle_reserva VALUES("24","1","5","80","22");
INSERT INTO detalle_reserva VALUES("25","1","12","156","23");
INSERT INTO detalle_reserva VALUES("26","3","12","120","23");
INSERT INTO detalle_reserva VALUES("28","1","10","140","25");
INSERT INTO detalle_reserva VALUES("29","2","10","50","25");
INSERT INTO detalle_reserva VALUES("30","1","5","80","26");
INSERT INTO detalle_reserva VALUES("31","3","5","50","26");
INSERT INTO detalle_reserva VALUES("37","1","5","70","32");
INSERT INTO detalle_reserva VALUES("38","1","5","80","33");
INSERT INTO detalle_reserva VALUES("39","1","5","70","34");
INSERT INTO detalle_reserva VALUES("40","1","15","210","36");
INSERT INTO detalle_reserva VALUES("41","1","10","140","37");
INSERT INTO detalle_reserva VALUES("43","1","10","140","38");
INSERT INTO detalle_reserva VALUES("48","1","10","160","41");
INSERT INTO detalle_reserva VALUES("49","1","2","32","42");
INSERT INTO detalle_reserva VALUES("50","1","5","70","44");
INSERT INTO detalle_reserva VALUES("51","1","500","7000","46");
INSERT INTO detalle_reserva VALUES("52","2","100","500","47");
INSERT INTO detalle_reserva VALUES("53","1","120","1680","48");
INSERT INTO detalle_reserva VALUES("54","1","20","320","49");
INSERT INTO detalle_reserva VALUES("55","2","20","100","50");
INSERT INTO detalle_reserva VALUES("56","1","10","140","52");
INSERT INTO detalle_reserva VALUES("57","1","12","192","53");
INSERT INTO detalle_reserva VALUES("58","1","12","192","54");
INSERT INTO detalle_reserva VALUES("59","1","100","1400","55");
INSERT INTO detalle_reserva VALUES("60","3","20","200","55");
INSERT INTO detalle_reserva VALUES("61","1","100","1400","56");
INSERT INTO detalle_reserva VALUES("62","1","10","160","57");
INSERT INTO detalle_reserva VALUES("63","1","15","240","58");
INSERT INTO detalle_reserva VALUES("64","3","15","150","58");
INSERT INTO detalle_reserva VALUES("65","1","10","160","59");
INSERT INTO detalle_reserva VALUES("66","1","50","700","60");
INSERT INTO detalle_reserva VALUES("67","2","50","350","61");
INSERT INTO detalle_reserva VALUES("68","1","20","280","62");
INSERT INTO detalle_reserva VALUES("69","2","100","500","62");
INSERT INTO detalle_reserva VALUES("70","1","100","1400","63");
INSERT INTO detalle_reserva VALUES("71","2","10","60","64");
INSERT INTO detalle_reserva VALUES("72","1","40","560","65");
INSERT INTO detalle_reserva VALUES("73","3","20","200","65");
INSERT INTO detalle_reserva VALUES("74","1","100","1600","66");
INSERT INTO detalle_reserva VALUES("75","1","24","312","67");
INSERT INTO detalle_reserva VALUES("76","1","20","320","68");
INSERT INTO detalle_reserva VALUES("79","1","20","320","69");
INSERT INTO detalle_reserva VALUES("81","1","20","280","72");
INSERT INTO detalle_reserva VALUES("83","2","20","140","74");
INSERT INTO detalle_reserva VALUES("84","2","30","210","75");
INSERT INTO detalle_reserva VALUES("85","1","10","140","76");
INSERT INTO detalle_reserva VALUES("86","2","10","50","77");
INSERT INTO detalle_reserva VALUES("87","1","5","70","78");
INSERT INTO detalle_reserva VALUES("88","2","10","70","79");
INSERT INTO detalle_reserva VALUES("89","2","4","20","85");
INSERT INTO detalle_reserva VALUES("90","1","2","28","86");





CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ventas_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

INSERT INTO detalle_venta VALUES("2","1","2","100","500");
INSERT INTO detalle_venta VALUES("3","5","2","10","50");
INSERT INTO detalle_venta VALUES("4","6","1","20","320");
INSERT INTO detalle_venta VALUES("5","7","1","15","240");
INSERT INTO detalle_venta VALUES("6","8","1","10","140");
INSERT INTO detalle_venta VALUES("7","9","1","1","14");
INSERT INTO detalle_venta VALUES("8","10","1","12","192");
INSERT INTO detalle_venta VALUES("9","10","2","5","35");
INSERT INTO detalle_venta VALUES("10","11","3","5","50");
INSERT INTO detalle_venta VALUES("11","11","1","6","96");
INSERT INTO detalle_venta VALUES("12","11","2","10","70");
INSERT INTO detalle_venta VALUES("13","12","1","12","156");
INSERT INTO detalle_venta VALUES("14","12","3","12","120");
INSERT INTO detalle_venta VALUES("15","13","1","5","80");
INSERT INTO detalle_venta VALUES("16","13","3","5","50");
INSERT INTO detalle_venta VALUES("17","14","1","5","80");
INSERT INTO detalle_venta VALUES("18","15","1","10","140");
INSERT INTO detalle_venta VALUES("19","15","2","10","50");
INSERT INTO detalle_venta VALUES("20","16","1","10","160");
INSERT INTO detalle_venta VALUES("21","22","1","20","280");
INSERT INTO detalle_venta VALUES("22","23","1","12","192");
INSERT INTO detalle_venta VALUES("23","24","1","1000","14000");
INSERT INTO detalle_venta VALUES("24","24","3","1000","10000");
INSERT INTO detalle_venta VALUES("25","25","1","120","1920");
INSERT INTO detalle_venta VALUES("26","25","2","30","210");
INSERT INTO detalle_venta VALUES("27","26","1","20","280");
INSERT INTO detalle_venta VALUES("28","26","2","10","50");
INSERT INTO detalle_venta VALUES("29","26","3","10","100");
INSERT INTO detalle_venta VALUES("30","27","1","20","280");
INSERT INTO detalle_venta VALUES("31","27","2","10","50");
INSERT INTO detalle_venta VALUES("32","27","3","50","500");
INSERT INTO detalle_venta VALUES("33","28","1","10","140");
INSERT INTO detalle_venta VALUES("34","29","1","20","280");
INSERT INTO detalle_venta VALUES("35","29","2","20","100");
INSERT INTO detalle_venta VALUES("36","30","1","20","260");
INSERT INTO detalle_venta VALUES("37","30","3","100","1000");
INSERT INTO detalle_venta VALUES("38","31","1","100","1400");
INSERT INTO detalle_venta VALUES("39","31","2","20","100");
INSERT INTO detalle_venta VALUES("40","32","1","500","8000");
INSERT INTO detalle_venta VALUES("41","32","2","20","140");
INSERT INTO detalle_venta VALUES("42","33","1","10","140");
INSERT INTO detalle_venta VALUES("43","34","2","50","350");
INSERT INTO detalle_venta VALUES("44","35","1","50","700");
INSERT INTO detalle_venta VALUES("45","36","1","20","280");
INSERT INTO detalle_venta VALUES("46","36","2","100","500");
INSERT INTO detalle_venta VALUES("47","37","1","100","1600");
INSERT INTO detalle_venta VALUES("48","38","1","20","280");
INSERT INTO detalle_venta VALUES("49","39","1","20","320");
INSERT INTO detalle_venta VALUES("53","41","1","10","160");
INSERT INTO detalle_venta VALUES("54","41","3","10","100");
INSERT INTO detalle_venta VALUES("55","41","4","5","50");
INSERT INTO detalle_venta VALUES("56","42","1","10","140");
INSERT INTO detalle_venta VALUES("57","43","1","10","160");
INSERT INTO detalle_venta VALUES("58","43","3","10","100");
INSERT INTO detalle_venta VALUES("59","43","4","2","20");
INSERT INTO detalle_venta VALUES("60","44","1","1","14");
INSERT INTO detalle_venta VALUES("61","45","4","3","30");
INSERT INTO detalle_venta VALUES("62","46","1","20","280");
INSERT INTO detalle_venta VALUES("63","47","2","4","20");
INSERT INTO detalle_venta VALUES("64","50","1","2","28");
INSERT INTO detalle_venta VALUES("65","50","2","6","30");
INSERT INTO detalle_venta VALUES("66","51","1","4","64");
INSERT INTO detalle_venta VALUES("67","53","1","5","80");





CREATE TABLE `empleado_camion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `camion_id` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `usuario` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO empleado_camion VALUES("4","5","5","2015-02-04","1");





CREATE TABLE `empleados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fono` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO empleados VALUES("1","5554789","GUNNAR GERMAN","VARGAS","MARTINEZ","CALLE HOYOS #50","78965478","Gunar@gmail.com","1987-01-01");
INSERT INTO empleados VALUES("2","1111111","Maria","Perez","Flores","Bolivar s/n","1111111","mario@mario.com","1985-12-12");
INSERT INTO empleados VALUES("3","6612868","Julian","Garcia","Paz","Araujo sn","76176338","Roger.Mendez.R@gmail.com","1987-12-12");
INSERT INTO empleados VALUES("4","87946123","IRMA","ISLA","CAMPOS","CLL. HOYOS S/N","74414856","Irma@gmail.com","1987-03-12");
INSERT INTO empleados VALUES("5","7845455","GUIDA","MENDOZA","CHUCUMANI","CLL. OROSCO S/N","6226874","guido@gmail.com","1987-01-05");





CREATE TABLE `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `salida` time NOT NULL DEFAULT '00:00:00',
  `llegada` time NOT NULL DEFAULT '00:00:00',
  `total_horas` time NOT NULL DEFAULT '00:00:00',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `camion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO horario VALUES("1","2014-08-25","09:12:26","09:14:02","00:01:36","1","1");
INSERT INTO horario VALUES("2","2014-10-02","04:12:02","04:15:10","00:03:08","1","2");
INSERT INTO horario VALUES("3","2014-10-04","09:23:47","09:23:49","00:00:02","1","2");
INSERT INTO horario VALUES("4","2014-10-13","04:15:31","04:18:07","00:02:36","1","2");
INSERT INTO horario VALUES("5","2014-11-19","11:36:21","11:36:31","00:00:10","1","2");
INSERT INTO horario VALUES("6","2015-04-21","11:20:00","11:20:06","00:00:06","1","2");
INSERT INTO horario VALUES("7","2015-05-07","02:25:01","00:00:00","00:00:00","0","2");
INSERT INTO horario VALUES("8","2015-05-28","03:08:02","03:08:41","00:00:39","1","2");





CREATE TABLE `obs_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO obs_cliente VALUES("1","no se encuentra en su direccion","2014-12-04","5");
INSERT INTO obs_cliente VALUES("2","no estaba en su domicilio","2015-02-04","9");
INSERT INTO obs_cliente VALUES("3","se le espero pero no estuvo en su domicilio","2015-02-04","2");





CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO permisos VALUES("1","GESTIONAR CLIENTES");
INSERT INTO permisos VALUES("2","GESTIONAR EMPLEADO");
INSERT INTO permisos VALUES("3","GESTIONAR CAMIONES");
INSERT INTO permisos VALUES("4","GESTIONAR PRODUCTOS");
INSERT INTO permisos VALUES("5","GESTIONAR RESERVAS");
INSERT INTO permisos VALUES("6","GESTIONAR VENTAS");
INSERT INTO permisos VALUES("7","GESTIONAR USUARIOS");





CREATE TABLE `posiciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` varchar(50) NOT NULL,
  `longitud` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `camion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

INSERT INTO posiciones VALUES("1","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("2","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("3","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("4","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("5","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("6","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("7","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("8","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("9","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("10","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("11","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("12","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("13","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("14","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("15","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("16","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("17","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("18","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("19","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("20","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("21","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("22","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("23","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("24","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("25","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("26","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("27","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("28","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("29","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("30","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("31","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("32","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("33","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("34","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("35","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("36","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("37","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("38","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("39","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("40","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("41","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("42","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("43","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("44","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("45","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("46","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("47","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("48","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("49","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("50","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("51","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("52","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("53","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("54","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("55","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("56","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("57","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("58","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("59","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("60","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("61","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("62","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("63","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("64","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("65","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("66","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("67","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("68","-19.576640299999998","-65.7673118","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("69","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("70","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("71","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("72","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("73","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("74","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("75","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("76","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("77","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("78","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("79","-19.574610399999997","-65.7715432","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("80","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("81","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("82","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("83","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("84","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("85","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("86","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("87","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("88","-17.383333","-66.166667","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("89","-19.5746071","-65.77154469999999","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("90","-19.5746215","-65.7715731","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("91","-19.5746215","-65.7715731","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("92","-19.5746215","-65.7715731","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("93","-19.5746215","-65.7715731","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("94","-19.5746221","-65.77156719999999","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("95","-19.5746221","-65.77156719999999","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("96","-19.5746622","-65.7715618","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("97","-19.5746622","-65.7715618","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("98","-19.574650600000002","-65.77156459999999","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("99","-19.5746474","-65.7715671","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("100","-19.5746477","-65.7715669","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("101","-19.5775314","-65.7720221","2014-11-19","00:20:14","2");
INSERT INTO posiciones VALUES("102","-16.5","-68.14999999999999","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("103","-16.5","-68.14999999999999","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("104","-16.5","-68.14999999999999","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("105","-19.5791064","-65.7655746","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("106","-19.58014","-65.7646129","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("107","-16.5","-68.14999999999999","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("108","-16.5","-68.14999999999999","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("109","-19.58014","-65.7646129","2014-12-08","00:20:14","2");
INSERT INTO posiciones VALUES("110","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("111","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("112","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("113","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("114","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("115","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("116","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("117","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("118","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("119","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("120","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("121","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("122","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("123","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("124","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("125","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("126","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("127","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("128","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("129","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("130","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("131","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("132","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("133","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("134","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("135","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("136","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("137","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("138","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("139","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("140","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("141","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("142","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("143","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("144","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("145","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("146","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("147","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("148","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("149","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("150","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("151","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("152","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("153","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("154","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("155","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("156","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("157","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("158","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("159","-19.572280499999998","-65.7550063","2014-12-14","00:20:14","2");
INSERT INTO posiciones VALUES("160","-19.574914863333106","-65.77167327515781","2015-03-02","00:20:15","2");
INSERT INTO posiciones VALUES("161","-19.574914863333106","-65.77167327515781","2015-03-02","00:20:15","2");
INSERT INTO posiciones VALUES("162","-19.572280499999998","-65.7550063","2015-03-02","00:20:15","2");
INSERT INTO posiciones VALUES("163","-19.574914863333106","-65.77167327515781","2015-03-02","00:20:15","2");
INSERT INTO posiciones VALUES("164","-19.574914863333106","-65.77167327515781","2015-03-02","00:20:15","2");
INSERT INTO posiciones VALUES("165","-19.574914863333106","-65.77167327515781","2015-03-02","00:20:15","2");
INSERT INTO posiciones VALUES("166","-19.5739394","-65.76498760000001","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("167","-19.5739394","-65.76498760000001","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("168","-19.573912900000003","-65.7649583","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("169","-19.573912900000003","-65.7649583","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("170","-19.573874999999997","-65.764941","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("171","-19.573874999999997","-65.764941","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("172","-19.573850399999998","-65.7648529","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("173","-19.573850399999998","-65.7648529","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("174","-19.5739093","-65.7649759","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("175","-19.5739093","-65.7649759","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("176","-19.5739111","-65.764979","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("177","-19.5739111","-65.764979","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("178","-19.5739066","-65.76496689999999","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("179","-19.5739066","-65.76496689999999","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("180","-19.5739066","-65.76496689999999","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("181","-19.5739079","-65.7649622","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("182","-19.5739079","-65.7649622","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("183","-19.573993899999998","-65.7649727","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("184","-19.573993899999998","-65.7649727","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("185","-19.5739193","-65.76501019999999","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("186","-19.5739163","-65.7650266","2015-04-06","00:20:15","2");
INSERT INTO posiciones VALUES("187","-19.557519199999998","-65.76316969999999","2015-04-21","00:20:15","2");
INSERT INTO posiciones VALUES("188","-19.557519199999998","-65.76316969999999","2015-04-21","00:20:15","2");
INSERT INTO posiciones VALUES("189","-19.557519199999998","-65.76316969999999","2015-04-21","00:20:15","2");
INSERT INTO posiciones VALUES("190","-19.557519199999998","-65.76316969999999","2015-04-21","00:20:15","2");
INSERT INTO posiciones VALUES("191","-19.557519199999998","-65.76316969999999","2015-04-21","00:20:15","2");
INSERT INTO posiciones VALUES("192","-19.5574852","-65.7631962","2015-05-06","00:20:15","2");
INSERT INTO posiciones VALUES("193","-19.5574852","-65.7631962","2015-05-06","00:20:15","2");
INSERT INTO posiciones VALUES("194","-19.5575299","-65.7632343","2015-05-06","00:20:15","2");
INSERT INTO posiciones VALUES("195","-19.5575299","-65.7632343","2015-05-06","00:20:15","2");
INSERT INTO posiciones VALUES("196","-19.5738509","-65.7650305","2015-05-14","00:20:15","2");
INSERT INTO posiciones VALUES("197","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("198","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("199","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("200","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("201","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("202","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("203","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("204","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("205","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("206","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("207","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("208","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("209","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("210","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("211","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("212","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("213","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("214","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("215","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("216","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("217","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("218","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("219","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("220","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("221","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("222","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("223","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("224","-19.5738591","-65.7648316","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("225","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("226","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("227","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("228","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("229","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("230","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("231","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("232","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("233","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("234","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("235","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("236","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("237","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("238","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("239","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("240","-19.5739363","-65.7648427","2015-05-28","00:20:15","2");
INSERT INTO posiciones VALUES("241","-19.5738672","-65.76491109999999","2015-05-29","00:20:15","2");
INSERT INTO posiciones VALUES("242","-19.5738672","-65.76491109999999","2015-05-29","00:20:15","2");
INSERT INTO posiciones VALUES("243","-19.5738672","-65.76491109999999","2015-05-29","00:20:15","2");
INSERT INTO posiciones VALUES("244","-19.5818037","-65.75748709999999","2015-06-05","00:20:15","2");
INSERT INTO posiciones VALUES("245","-19.5818037","-65.75748709999999","2015-06-05","00:20:15","2");
INSERT INTO posiciones VALUES("246","-19.5818037","-65.75748709999999","2015-06-05","00:20:15","2");
INSERT INTO posiciones VALUES("247","-19.5818037","-65.75748709999999","2015-06-05","00:20:15","2");
INSERT INTO posiciones VALUES("248","-19.5818037","-65.75748709999999","2015-06-05","00:20:15","2");
INSERT INTO posiciones VALUES("249","-19.5818037","-65.75748709999999","2015-06-05","00:20:15","2");
INSERT INTO posiciones VALUES("250","-19.572280499999998","-65.7550063","2015-06-06","00:20:15","2");
INSERT INTO posiciones VALUES("251","-19.572280499999998","-65.7550063","2015-10-25","00:20:15","2");
INSERT INTO posiciones VALUES("252","-19.572280499999998","-65.7550063","2015-10-25","00:20:15","2");
INSERT INTO posiciones VALUES("253","-19.572280499999998","-65.7550063","2015-10-25","00:20:15","2");
INSERT INTO posiciones VALUES("254","-19.572280499999998","-65.7550063","2015-10-25","00:20:15","2");
INSERT INTO posiciones VALUES("255","-19.572280499999998","-65.7550063","2015-10-25","00:20:15","2");
INSERT INTO posiciones VALUES("256","37.09024","-95.712891","2016-06-13","00:20:16","5");





CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_registro` date NOT NULL,
  `precio_normal` float NOT NULL,
  `precio_tienda` float NOT NULL,
  `precio_agencia` float NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `retornable` tinyint(1) NOT NULL,
  `contenido` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO productos VALUES("1","POWERDE","UNO DE NUESTROS MEJORES PRODUCTOS","2014-07-03","13","16","14","13.jpg","0","0","CERVEZA BLANCA TIPO PILSENER");
INSERT INTO productos VALUES("2","CERVEZA","CERVEZA EN LATITA","2014-07-06","6","7","5","potosina_lata.jpg","1","1","CERVEZA BLANCA TIPO PILSENER");
INSERT INTO productos VALUES("3","Cerveza","lkjsdf lkasdjflkajsd flkjsadklfjlakdsjflkasdj fklasdj","2014-07-07","10","10","10","Potosina.jpg","4","0","botellin de medio litro");
INSERT INTO productos VALUES("4","GASEOSA","GASEOSA","2015-02-04","5","10","6","Penguins.jpg","1","0","SODA");
INSERT INTO productos VALUES("5","cerveza personal","mmmmmmmmmmmmmmmmmmmmmm nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn jjjjjjjjjjjjjjjjjjjjjjjjjjj kkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkk ;;;;;;;;;;;;;;;;; llllllllllllllll","2016-02-25","2","1","2","descarga_(1).png","1","0","cerveza");
INSERT INTO productos VALUES("6","comosea","no importa","2016-03-14","10","12","11","logo-cocacola.png","6","1","loquesea");
INSERT INTO productos VALUES("7","comosea","no importa","2016-03-14","10","12","11","logo-cocacola.png","6","1","loquesea");
INSERT INTO productos VALUES("8","comosea","no importa","2016-03-14","10","12","11","logo-cocacola.png","6","1","loquesea");
INSERT INTO productos VALUES("9","comosea","no importa","2016-03-14","10","12","11","logo-cocacola.png","6","1","loquesea");





CREATE TABLE `reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_registro` date NOT NULL,
  `monto_total` float NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `confirmacion` tinyint(1) NOT NULL DEFAULT '0',
  `asignado` tinyint(1) NOT NULL DEFAULT '0',
  `hora_entrega` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

INSERT INTO reserva VALUES("5","2014-08-02","50","2","1","1","0","00:00:00");
INSERT INTO reserva VALUES("6","2014-08-02","320","1","1","1","0","00:00:00");
INSERT INTO reserva VALUES("7","2014-08-12","140","2","1","1","1","00:00:00");
INSERT INTO reserva VALUES("8","2014-08-12","240","1","1","1","1","00:00:00");
INSERT INTO reserva VALUES("18","2014-08-25","14","2","1","1","1","00:00:00");
INSERT INTO reserva VALUES("20","2014-10-02","227","1","1","1","1","04:10:00");
INSERT INTO reserva VALUES("21","2014-10-02","216","1","1","1","1","04:14:00");
INSERT INTO reserva VALUES("22","2014-10-02","80","3","1","1","1","04:17:00");
INSERT INTO reserva VALUES("23","2014-10-04","276","4","1","1","1","09:23:00");
INSERT INTO reserva VALUES("25","2014-10-13","190","2","1","1","1","04:17:00");
INSERT INTO reserva VALUES("26","2014-10-13","130","1","1","1","1","04:15:00");
INSERT INTO reserva VALUES("32","2014-11-17","70","2","1","0","1","00:00:00");
INSERT INTO reserva VALUES("33","2014-11-17","80","3","1","0","1","00:00:00");
INSERT INTO reserva VALUES("34","2014-11-19","70","2","1","0","1","00:00:00");
INSERT INTO reserva VALUES("35","2014-12-03","0","2","0","0","0","00:00:00");
INSERT INTO reserva VALUES("36","2014-12-06","210","2","1","0","1","00:00:00");
INSERT INTO reserva VALUES("37","2014-12-08","140","5","1","0","1","00:00:00");
INSERT INTO reserva VALUES("38","2014-12-14","140","2","1","0","1","00:00:00");
INSERT INTO reserva VALUES("41","2015-01-18","160","1","1","0","1","00:00:00");
INSERT INTO reserva VALUES("42","2015-01-19","32","1","0","0","0","00:00:00");
INSERT INTO reserva VALUES("43","2015-03-02","0","1","0","0","0","00:00:00");
INSERT INTO reserva VALUES("44","2015-03-02","70","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("45","2015-03-12","0","1","0","0","0","00:00:00");
INSERT INTO reserva VALUES("46","2015-04-06","7000","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("47","2015-04-06","500","2","1","0","1","00:00:00");
INSERT INTO reserva VALUES("48","2015-04-06","1680","12","1","0","1","00:00:00");
INSERT INTO reserva VALUES("49","2015-04-06","320","1","1","0","1","00:00:00");
INSERT INTO reserva VALUES("50","2015-04-06","100","8","1","0","1","00:00:00");
INSERT INTO reserva VALUES("51","2015-04-15","0","9","0","0","0","00:00:00");
INSERT INTO reserva VALUES("52","2015-04-15","140","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("53","2015-04-21","192","1","1","0","1","00:00:00");
INSERT INTO reserva VALUES("54","2015-04-21","192","20","1","1","0","09:24:00");
INSERT INTO reserva VALUES("55","2015-04-21","1600","21","1","0","1","00:00:00");
INSERT INTO reserva VALUES("56","2015-04-21","1400","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("57","2015-04-21","160","11","1","0","1","00:00:00");
INSERT INTO reserva VALUES("58","2015-04-29","390","1","1","0","1","00:00:00");
INSERT INTO reserva VALUES("59","2015-05-05","160","1","1","0","1","00:00:00");
INSERT INTO reserva VALUES("60","2015-05-06","700","9","1","1","1","02:25:00");
INSERT INTO reserva VALUES("61","2015-05-07","350","1","1","1","1","02:25:00");
INSERT INTO reserva VALUES("62","2015-05-14","780","7","1","1","1","05:52:00");
INSERT INTO reserva VALUES("63","2015-05-14","1400","8","1","0","1","00:00:00");
INSERT INTO reserva VALUES("64","2015-05-14","60","10","1","0","1","00:00:00");
INSERT INTO reserva VALUES("65","2015-05-28","760","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("66","2015-05-28","1600","6","1","1","1","11:16:00");
INSERT INTO reserva VALUES("67","2015-05-28","312","10","1","0","1","00:00:00");
INSERT INTO reserva VALUES("68","2015-05-28","320","11","1","0","1","00:00:00");
INSERT INTO reserva VALUES("69","2015-05-29","320","1","1","1","0","12:05:00");
INSERT INTO reserva VALUES("70","2015-05-29","0","9","0","0","0","00:00:00");
INSERT INTO reserva VALUES("72","2015-05-29","280","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("74","2015-05-29","140","11","1","0","1","00:00:00");
INSERT INTO reserva VALUES("75","2015-05-29","210","6","1","0","1","00:00:00");
INSERT INTO reserva VALUES("76","2015-06-05","140","9","1","0","1","00:00:00");
INSERT INTO reserva VALUES("77","2015-06-05","50","8","1","0","1","00:00:00");
INSERT INTO reserva VALUES("78","2015-06-05","70","7","1","0","1","00:00:00");
INSERT INTO reserva VALUES("79","2015-06-05","70","11","1","0","1","00:00:00");
INSERT INTO reserva VALUES("80","2015-10-25","0","11","0","0","0","00:00:00");
INSERT INTO reserva VALUES("81","2015-10-25","0","11","1","0","1","00:00:00");
INSERT INTO reserva VALUES("82","2015-10-25","0","7","1","0","1","00:00:00");
INSERT INTO reserva VALUES("83","2016-03-03","0","9","0","0","0","00:00:00");
INSERT INTO reserva VALUES("84","2016-03-03","0","9","0","0","0","00:00:00");
INSERT INTO reserva VALUES("85","2016-06-13","20","9","1","1","1","04:49:00");
INSERT INTO reserva VALUES("86","2016-06-24","28","9","1","0","0","");





CREATE TABLE `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `fecha` date NOT NULL,
  `precio` float NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tipo VALUES("1","BOTELLA DE VIDRIO 1 LITROS","2014-07-03","2.5");
INSERT INTO tipo VALUES("2","CERVEZA EN LATA 350 CC.","2014-07-06","0");
INSERT INTO tipo VALUES("3","cuarto litro","2015-02-04","1.5");
INSERT INTO tipo VALUES("4","Botellin 350 ","2015-06-12","0");
INSERT INTO tipo VALUES("5","BOTELLA DE VIDRIO 1 LITROS","2015-06-12","3");
INSERT INTO tipo VALUES("6","hollll aoco como estan en el mundo mas ","2016-02-25","1");





CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_reg` date NOT NULL,
  `super_user` varchar(5) NOT NULL,
  `camion` tinyint(1) NOT NULL DEFAULT '0',
  `cliente` tinyint(1) DEFAULT '0',
  `empleado_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("13","admin","21232f297a57a5a743894a0e4a801fc3","nataly45@gmail.com","1","2014-06-22","1","0","0","0","0");
INSERT INTO usuario VALUES("14","manuvas","b911af807c2df88d671bd7004c54c1c2","manuvas@gmail.com","0","2014-06-22","0","0","0","0","0");
INSERT INTO usuario VALUES("15","juana","9b4aaf9b8bbe6677bd119c356433a318","juan4a@gmail.com","0","2014-06-24","1","0","0","0","0");
INSERT INTO usuario VALUES("16","fabiola","e72925c5d1da0b8d82e1878bc777a2c9","fbi@hotmail.com","1","2014-07-07","0","0","0","0","0");
INSERT INTO usuario VALUES("17","ventas","530b350d414da3378a15b3149b322908","ventas@gmail.com","1","2014-11-12","0","0","0","0","0");
INSERT INTO usuario VALUES("19","MariaPerez","10940a3df2cb63376cece262b7673dbc","mario@mario.com","1","2014-12-06","0","1","0","2","0");
INSERT INTO usuario VALUES("20","5554789","8fb055086f5a6c2770af2939ec650b8e","Gunar@gmail.com","1","2014-12-06","0","1","0","1","0");
INSERT INTO usuario VALUES("21","87946123","844759f9ee695b5e66795a35b9275606","Irma@gmail.com","0","2015-01-18","0","1","0","4","0");
INSERT INTO usuario VALUES("22","Maria6614489","c8a6cc30ccfd4d677c5e7ca5a6f47adf","mirian@gmail.com","1","2015-01-18","0","0","1","0","1");
INSERT INTO usuario VALUES("23","nataly","dc5f3b8db86bb00bc94d919b0bb3e18e","nataly@gmail.com","0","2015-02-04","0","0","0","0","0");
INSERT INTO usuario VALUES("24","rosmery","354fa047fdac289b8a91b06adc0680ea","rosmery@gmail.com","0","2015-02-04","0","0","0","0","0");
INSERT INTO usuario VALUES("25","sergio","3bffa4ebdf4874e506c2b12405796aa5","sergio.b.carvajal@facebook.com","1","2015-04-15","1","0","0","0","0");
INSERT INTO usuario VALUES("26","agencia","9f808afd75f056c85f609cdc6fe50091","agenciapotosina@gmail.com","1","2015-04-21","0","0","0","0","0");
INSERT INTO usuario VALUES("27","6601242","c9ebedd28660414f72e764e8e2900a2d","rafael@rafael.com","0","2015-04-21","0","0","1","0","4");
INSERT INTO usuario VALUES("28","9999999","283f42764da6dba2522412916b031080","agenciadecerveza@gmail.com","0","2015-04-21","0","0","1","0","20");
INSERT INTO usuario VALUES("29","22345678","08e0750210f66396eb83957973705aad","j@gmail.com","1","2015-04-21","0","0","1","0","21");
INSERT INTO usuario VALUES("30","JorgeLuis","3a170d0d80ff7927834d61a4a38b870b","jorgeluis@gmail.com","1","2015-05-27","0","0","0","0","0");
INSERT INTO usuario VALUES("31","CarlosLopez","cc09515651c373097092030823ed81f5","carlos@gmail.com","1","2015-05-28","0","0","0","0","0");
INSERT INTO usuario VALUES("32","AntonioVega","ba0e5588998ebfd78592edaf7798bd75","anto@gmail.com","1","2015-05-29","0","0","0","0","0");
INSERT INTO usuario VALUES("33","7845455","d2077df398c58e7a98e25d448568f6d1","guido@gmail.com","1","2016-02-23","0","1","0","5","0");
INSERT INTO usuario VALUES("34","4789541","b09a9bc418909cb815ca53b2edad31d5","gonchi@hotmail.com","0","2016-02-25","0","0","1","0","2");
INSERT INTO usuario VALUES("35","6352418","805f2150c5945e57ff031d5c012425ba","benitezsa@hotmail.com","0","2016-02-25","0","0","1","0","12");





CREATE TABLE `usuario_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO usuario_permisos VALUES("4","15","6");
INSERT INTO usuario_permisos VALUES("5","15","1");
INSERT INTO usuario_permisos VALUES("6","15","2");
INSERT INTO usuario_permisos VALUES("7","15","3");
INSERT INTO usuario_permisos VALUES("13","17","5");
INSERT INTO usuario_permisos VALUES("14","17","6");
INSERT INTO usuario_permisos VALUES("15","17","7");
INSERT INTO usuario_permisos VALUES("16","20","1");
INSERT INTO usuario_permisos VALUES("25","14","2");
INSERT INTO usuario_permisos VALUES("26","30","1");
INSERT INTO usuario_permisos VALUES("27","31","3");
INSERT INTO usuario_permisos VALUES("28","31","5");
INSERT INTO usuario_permisos VALUES("29","32","6");
INSERT INTO usuario_permisos VALUES("30","32","5");
INSERT INTO usuario_permisos VALUES("31","16","2");
INSERT INTO usuario_permisos VALUES("32","16","1");
INSERT INTO usuario_permisos VALUES("33","16","4");
INSERT INTO usuario_permisos VALUES("34","16","6");





CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `monto_total` float NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

INSERT INTO ventas VALUES("1","2014-07-07","500","2","13","1");
INSERT INTO ventas VALUES("4","2014-07-08","0","1","0","1");
INSERT INTO ventas VALUES("5","2014-08-02","50","2","13","1");
INSERT INTO ventas VALUES("6","2014-08-02","320","1","13","1");
INSERT INTO ventas VALUES("7","2014-08-12","240","1","13","1");
INSERT INTO ventas VALUES("8","2014-08-12","140","2","13","1");
INSERT INTO ventas VALUES("9","2014-08-25","14","2","13","1");
INSERT INTO ventas VALUES("10","2014-10-02","227","1","13","1");
INSERT INTO ventas VALUES("11","2014-10-02","216","1","13","1");
INSERT INTO ventas VALUES("12","2014-10-04","276","4","13","1");
INSERT INTO ventas VALUES("13","2014-10-13","130","1","13","1");
INSERT INTO ventas VALUES("14","2014-10-13","80","3","13","1");
INSERT INTO ventas VALUES("15","2014-10-13","190","2","13","1");
INSERT INTO ventas VALUES("16","2014-11-22","160","3","13","1");
INSERT INTO ventas VALUES("17","2014-12-03","0","5","13","0");
INSERT INTO ventas VALUES("18","2015-03-18","0","9","13","0");
INSERT INTO ventas VALUES("19","2015-03-18","0","7","13","0");
INSERT INTO ventas VALUES("20","2015-03-18","0","12","13","0");
INSERT INTO ventas VALUES("21","2015-04-16","0","9","13","0");
INSERT INTO ventas VALUES("22","2015-04-16","280","9","13","1");
INSERT INTO ventas VALUES("23","2015-04-21","192","20","25","1");
INSERT INTO ventas VALUES("24","2015-04-21","24000","9","25","1");
INSERT INTO ventas VALUES("25","2015-04-21","2130","11","25","1");
INSERT INTO ventas VALUES("26","2015-04-21","430","8","25","1");
INSERT INTO ventas VALUES("27","2015-04-21","830","7","25","1");
INSERT INTO ventas VALUES("28","2015-04-21","140","2","25","1");
INSERT INTO ventas VALUES("29","2015-04-21","380","12","25","1");
INSERT INTO ventas VALUES("30","2015-04-21","1260","4","25","1");
INSERT INTO ventas VALUES("31","2015-04-21","1500","5","25","1");
INSERT INTO ventas VALUES("32","2015-04-21","8140","6","25","1");
INSERT INTO ventas VALUES("33","2015-04-21","140","21","25","1");
INSERT INTO ventas VALUES("34","2015-05-07","350","1","13","1");
INSERT INTO ventas VALUES("35","2015-05-07","700","9","13","1");
INSERT INTO ventas VALUES("36","2015-05-14","780","7","25","1");
INSERT INTO ventas VALUES("37","2015-05-28","1600","6","19","1");
INSERT INTO ventas VALUES("38","2015-05-29","295","9","32","1");
INSERT INTO ventas VALUES("39","2015-05-29","320","1","32","1");
INSERT INTO ventas VALUES("41","2015-06-08","330","11","13","1");
INSERT INTO ventas VALUES("42","2015-06-08","146","7","13","1");
INSERT INTO ventas VALUES("43","2015-06-12","301","11","13","1");
INSERT INTO ventas VALUES("44","2016-02-25","29","9","13","1");
INSERT INTO ventas VALUES("45","2016-02-25","33","11","13","1");
INSERT INTO ventas VALUES("46","2016-03-03","281.5","9","13","1");
INSERT INTO ventas VALUES("47","2016-06-13","20","9","33","1");
INSERT INTO ventas VALUES("48","2016-06-24","0","9","13","0");
INSERT INTO ventas VALUES("50","2016-06-24","58","7","13","1");
INSERT INTO ventas VALUES("51","2016-06-24","67","11","13","1");
INSERT INTO ventas VALUES("52","2016-06-24","0","6","13","0");
INSERT INTO ventas VALUES("53","2016-06-24","80","1","13","1");





CREATE TABLE `zonas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO zonas VALUES("1","ZONA SAN ROQUE");
INSERT INTO zonas VALUES("2","ZONA SAN GERARDO");
INSERT INTO zonas VALUES("3","ZONA SAN JUAN");
INSERT INTO zonas VALUES("4","ZONA CENTRAL");
INSERT INTO zonas VALUES("5","ZONA LAS BANDERAS");
INSERT INTO zonas VALUES("6","ZONA SAN CLEMENTE");
INSERT INTO zonas VALUES("7","ZONA DELICIAS");
INSERT INTO zonas VALUES("8","ZONA NUEVA TERMINAL");
INSERT INTO zonas VALUES("9","ZONA SATELITE");
INSERT INTO zonas VALUES("10","ZONA LOS PINOS");
INSERT INTO zonas VALUES("11","central");



