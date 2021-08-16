/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.19-MariaDB : Database - appcatalogoweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`appcatalogoweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `appcatalogoweb`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `desc` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

insert  into `categoria`(`id`,`desc`) values (1,'Videojuegos'),(2,'Juguetes'),(3,'Coleccionables'),(4,'Figuras de Acción'),(5,'Vestuario');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `rut` varchar(30) NOT NULL,
  `alias` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `nombre` varchar(160) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`rut`,`alias`,`pass`,`nombre`,`correo`,`telefono`) values (3,'12.258.236-5','Lalo23','123','Lalo García Perez','lalo@gmail.com','+569253325'),(4,'15.263.598-0','cguzman','123','Carlos Guzmán Rojas','c.guzmr@gmail.com','+569561254'),(6,'20.169.158-0','cabaggethief','123','Diego Abraham','c.guzmr@gmail.com','+56915248451'),(7,'20.589.215-5','carlosvendedor3','123','Carlos video','video@gmail.com','+56923515414');

/*Table structure for table `detalleventa` */

DROP TABLE IF EXISTS `detalleventa`;

CREATE TABLE `detalleventa` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `idproducto` int(7) NOT NULL,
  `idventa` int(7) NOT NULL,
  `cantidad` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idventa` (`idventa`),
  KEY `idproducto` (`idproducto`),
  CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalleventa` */

insert  into `detalleventa`(`id`,`idproducto`,`idventa`,`cantidad`) values (6,19,5,50),(9,21,7,3),(10,10,7,1),(11,23,8,2),(12,16,8,1888),(14,25,10,2);

/*Table structure for table `estadosolicitud` */

DROP TABLE IF EXISTS `estadosolicitud`;

CREATE TABLE `estadosolicitud` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `desc` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estadosolicitud` */

insert  into `estadosolicitud`(`id`,`desc`) values (1,'Rechazada'),(2,'En Revisión'),(3,'Aprobada');

/*Table structure for table `estadoventa` */

DROP TABLE IF EXISTS `estadoventa`;

CREATE TABLE `estadoventa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `desc` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estadoventa` */

insert  into `estadoventa`(`id`,`desc`) values (1,'Realizada'),(2,'Rechazada'),(3,'En proceso');

/*Table structure for table `metodopago` */

DROP TABLE IF EXISTS `metodopago`;

CREATE TABLE `metodopago` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `desc` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `metodopago` */

insert  into `metodopago`(`id`,`desc`) values (1,'Transferencia'),(2,'Efectivo');

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `precio` int(5) NOT NULL,
  `desc` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `idtienda` int(3) NOT NULL,
  `idcategoria` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcategoria` (`idcategoria`),
  KEY `idtienda` (`idtienda`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idtienda`) REFERENCES `tiendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto` */

insert  into `producto`(`id`,`nombre`,`precio`,`desc`,`foto`,`idtienda`,`idcategoria`) values (10,'Gundam x76',30000,'Gundam coleccionable','gundamx76.jpg',3,4),(16,'Gundam original',30000,'Gundam de la serie original','gundam_1.jpg',3,2),(19,'Figura Megumin',15990,'una figura de megumin','megumin.jpg',10,4),(21,'Iphone 7',17000,'telefono apple','iphone7.png',3,1),(23,'aaa',1500,'aaa','tanquesito.jpg',3,1),(25,'Bajo electrico',399000,'un bajo electrico','bajoelectirco.jpg',12,3);

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rol` */

insert  into `rol`(`id`,`desc`) values (1,'Administrador'),(2,'Vendedor');

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `link` varchar(600) NOT NULL,
  `idestado` int(1) NOT NULL,
  `idcliente` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idestado` (`idestado`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estadosolicitud` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `solicitud` */

insert  into `solicitud`(`id`,`motivo`,`fecha`,`link`,`idestado`,`idcliente`) values (12,'test','2021-07-13','https://facebook.com',3,3),(13,'SER PARTE ','2021-07-15','https://facebook.com',1,6),(14,'ser parte','2021-07-20','https://facebook.com',1,7);

/*Table structure for table `tiendas` */

DROP TABLE IF EXISTS `tiendas`;

CREATE TABLE `tiendas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `idusu` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idusu` (`idusu`),
  CONSTRAINT `tiendas_ibfk_1` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tiendas` */

insert  into `tiendas`(`id`,`nombre`,`foto`,`idusu`) values (3,'PlanetaGamer','PlanetaGamer.jpg',8),(10,'Tienda del Diego','diegotienda.png',9),(12,'La tienda de felipe','tiendafelipe.jpeg',13);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `idrol` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idrol` (`idrol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`alias`,`pass`,`nombre`,`telefono`,`correo`,`idrol`) values (1,'cguzmanr','123','Carlos Guzman Rojas','+56952154515','cguzmanr@gmail.com',1),(5,'carlosguz12','carlos2001','Carlos Guzmán Rojo','+56915248451','c.guzmr@gmail.com',1),(8,'carlosvendedor','123','Alonso Rojas Guzmán','+56925148596','a.rojasg@gmail.com',2),(9,'carlosvendedor2','123','Alonso2 Rojas2 Guzmán2','+56921212112','a2_rojasg@gmail.com',2),(11,'carlosvendedor3videoeditado','12345678','carlos video admin editado','+56923515414555','videoadmeditado@gmail.com',1),(13,'feliperojas','1234567','Felipe Rojas Parra','+56922558145','f_34rojas@gmail.com',2);

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idestado` int(1) NOT NULL,
  `idmetodo` int(1) NOT NULL,
  `idtienda` int(6) NOT NULL,
  `idcliente` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idtienda` (`idtienda`),
  KEY `idestado` (`idestado`),
  KEY `idmetodo` (`idmetodo`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idtienda`) REFERENCES `tiendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idestado`) REFERENCES `estadoventa` (`id`),
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`idmetodo`) REFERENCES `metodopago` (`id`),
  CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ventas` */

insert  into `ventas`(`id`,`fecha`,`idestado`,`idmetodo`,`idtienda`,`idcliente`) values (5,'2021-07-14',1,1,10,6),(7,'2021-07-15',3,2,3,6),(8,'2021-07-15',3,1,3,6),(10,'2021-07-20',3,1,12,7);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
