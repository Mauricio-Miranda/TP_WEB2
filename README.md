# TPE WEB2 - Tres Arroyos - 2023

##### *Integrantes del grupo:*

- Rodrigo Menendez - rodrigom.menendezz@gmail.com
- Julieta Tabuyo - l.julietatabuyo@gmail.com 
- Mauricio Miranda - mauriciotresa@gmail.com

### Tematica: **Video Juegos**

![](https://media.istockphoto.com/id/1334436084/es/foto/vista-de-arriba-hacia-abajo-de-coloridos-accesorios-de-juego-iluminados-sobre-la-mesa.jpg?s=612x612&w=0&k=20&c=fcCloH-zF7rFZzUYq6-jFpbEuq5DiipnHX5ZZWHRThE=)


Es un sistema donde se muestran diferentes tipos de **video juegos** clasificados por empresa **desarrolladora**, donde los usuarios pueden consultar las distintas opciones disponibles, ya sea por genero, precio, fecha de lanzamiento o ver informacion sobre la desarrolladora.

Los usuarios van a tener acceso de acuerdo a categorias, un **administrador** podra editar el contenido (agregar - borrar - actualizar - consultar) mientras que los **usuarios comunes** pueden consultar y filtrar bsquedas.
### Diagrama entidad relacion (MER)
![](imagentp.png)

Este diagrama presenta una relacion de 1 a N, donde a los juegos le corresponde **una desarrolladora**. O sea, una desarrolladora puede tener varios juegos, pero no viceversa. Existe una tercera tabla llamada **usuarios**, la cual va a ser la encargada de manejar la sesiones de los usuarios. 

#### Estructura de tabla para la tabla `desarrolladores` 
#### Creamos la tabla:
```SQL
CREATE TABLE `desarrolladores` (
  `id_desarrollador` int(11) NOT NULL,
  `desarrollador` varchar(100) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `año` varchar(20) NOT NULL,
  `enlace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
### Insertamos datos de prueba a la tabla desarroladores:
```SQL
INSERT INTO `desarrolladores` (`id_desarrollador`, `desarrollador`, `pais`, `año`, `enlace`) VALUES
(1, 'konami', 'Japon', '2009', 'www.konami.com'),
(2, 'capcom', 'Japon', '1990', 'www.capcom.com');
```

### Creamos la tabla `juegos`
```SQL
CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `año` varchar(20) NOT NULL,
  `material` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `desarrollador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Creamos la tabla `usuarios`
```SQL
CREATE TABLE `usuarios` (
  `mail` varchar(50) NOT NULL,
  `clave` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

```
### Clave primaria de **usuarios**: 

```SQL
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`);
COMMIT;
```

### Insertamos datos de prueba en la tabla juegos:
```SQL
INSERT INTO `juegos` (`id`, `nombre`, `genero`, `precio`, `año`, `material`, `descripcion`, `imagen`, `desarrollador`) VALUES
(1, 'pes', 'deporte', 20000, '2006', 'fisico', 'futibolll', '', 1);
```
### Modificamos las **claves** de las tablas:
```SQL
ALTER TABLE `desarrolladores`
MODIFY `id_desarrollador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
```
```SQL
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
```
### Vinculamos con la clave foránea
```SQL
ALTER TABLE `juegos`
ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`desarrollador`) REFERENCES`desarrolladores` (`id_desarrollador`);
COMMIT;
```
