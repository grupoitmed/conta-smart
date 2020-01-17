# Host: www.conta-smart.com  (Version 5.6.35)
# Date: 2020-01-17 17:12:55
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "agentes_retencion"
#

DROP TABLE IF EXISTS `agentes_retencion`;
CREATE TABLE `agentes_retencion` (
  `id_agentes_retencion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id_agentes_retencion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "clientes"
#

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) NOT NULL DEFAULT '',
  `nrc` varchar(255) NOT NULL DEFAULT '',
  `nit` char(50) DEFAULT NULL,
  `giro` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT '0',
  `idempresa` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

#
# Structure for table "compras"
#

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `fechacompra` date NOT NULL,
  `documento` varchar(20) NOT NULL,
  `gravex` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT '0',
  `monto` double NOT NULL,
  `fovial` double NOT NULL,
  `coatrans` double NOT NULL,
  `creditof` double NOT NULL,
  `percepcion` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) DEFAULT '0',
  `idempresa` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_tributaria` date DEFAULT NULL,
  `cesc` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`idcompra`)
) ENGINE=MyISAM AUTO_INCREMENT=589 DEFAULT CHARSET=utf8;

#
# Structure for table "deducciones"
#

DROP TABLE IF EXISTS `deducciones`;
CREATE TABLE `deducciones` (
  `id_deduccion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_deduccion` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_documento` date DEFAULT '0000-00-00',
  `fecha_aplicar` date DEFAULT '0000-00-00',
  `monto` decimal(10,2) DEFAULT '0.00',
  `estado` varchar(1) DEFAULT '0',
  `id_tipo_retenedor` int(11) DEFAULT '0',
  `agente_retenedor` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT '0000-00-00',
  `idempresa` int(11) DEFAULT '0',
  `retencion` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id_deduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "detalle_facturas"
#

DROP TABLE IF EXISTS `detalle_facturas`;
CREATE TABLE `detalle_facturas` (
  `iddf` int(11) NOT NULL AUTO_INCREMENT,
  `idFactura` int(11) DEFAULT NULL,
  `id_serv` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `subtotal` float(10,3) DEFAULT NULL,
  PRIMARY KEY (`iddf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "empresas"
#

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `Idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `razonsocial` text,
  `nrc` varchar(255) DEFAULT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `giro` varchar(255) DEFAULT NULL,
  `direccion` text,
  `pais` varchar(255) DEFAULT NULL,
  `ncontacto` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaPago` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `monto` double DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `pago_cuenta` decimal(10,4) DEFAULT '0.0175',
  PRIMARY KEY (`Idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='datos generales de la empresa';

#
# Structure for table "empresas_documentos"
#

DROP TABLE IF EXISTS `empresas_documentos`;
CREATE TABLE `empresas_documentos` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `archivo` text NOT NULL,
  `archivo_original` text NOT NULL,
  `ruta` text NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  `idempresa` int(11) NOT NULL DEFAULT '0',
  `idtipo_documento` int(11) NOT NULL DEFAULT '0',
  `usuario` varchar(55) NOT NULL DEFAULT '',
  `descripcion` text,
  `estado` tinyint(3) NOT NULL DEFAULT '0',
  `año_documento` year(4) DEFAULT NULL,
  `mes_documento` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocumento`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Structure for table "facturas"
#

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `facNum` varchar(50) NOT NULL DEFAULT '',
  `tipo_fac` int(11) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `direccion` text,
  `municipio` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `nrc` varchar(255) DEFAULT NULL,
  `giro` text,
  `reali` int(11) DEFAULT '0',
  `monto` double DEFAULT NULL COMMENT 'Venta total',
  `ventas_no_sujetas` double DEFAULT NULL,
  `ventas_excentas` double DEFAULT NULL,
  `credito_fiscal` double DEFAULT NULL,
  `retencion` double DEFAULT NULL,
  `percepcion` double DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idusuario` int(11) DEFAULT NULL,
  `idempresa` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  PRIMARY KEY (`idFactura`)
) ENGINE=MyISAM AUTO_INCREMENT=385 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "proveedores"
#

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(255) NOT NULL,
  `nrc` varchar(255) NOT NULL DEFAULT '',
  `nit` char(50) DEFAULT NULL,
  `giro` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT '0',
  `idempresa` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` char(50) DEFAULT NULL,
  `menu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Structure for table "servicios"
#

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id_serv` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) DEFAULT NULL,
  `idplan` int(11) DEFAULT NULL,
  `examen` varchar(255) DEFAULT NULL,
  `costo` float(10,3) DEFAULT NULL,
  `idempresa` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_serv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

#
# Structure for table "tipo_retenedor"
#

DROP TABLE IF EXISTS `tipo_retenedor`;
CREATE TABLE `tipo_retenedor` (
  `idtipo_retenedor` int(11) NOT NULL AUTO_INCREMENT,
  `retenedor` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT '0',
  `factor` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`idtipo_retenedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "tipos_documentos"
#

DROP TABLE IF EXISTS `tipos_documentos`;
CREATE TABLE `tipos_documentos` (
  `idtipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(25) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtipo_documento`),
  UNIQUE KEY `idtipos_documentos_UNIQUE` (`idtipo_documento`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  `fecha_ulti_ingreso` date DEFAULT '0000-00-00',
  `idempresa` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;
