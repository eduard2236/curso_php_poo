CREATE DATABASE tienda;
USE tienda;

CREATE TABLE usuarios(
    id          INT(255) AUTO_INCREMENT NOT NULL,
    nombre      VARCHAR(45) NOT NULL,
    apellidos   VARCHAR(45) ,
    email       VARCHAR(45) NOT NULL,
    password    VARCHAR(45) NOT NULL,
    rol         VARCHAR(20),
    imagen      VARCHAR(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias(
    id      int(255) auto_increment not null,
    nombre  varchar(45) not null,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos(
    id          int(255) auto_increment not null,
    usuarios_id int(255) not null,
    pais        varchar(45) not null,
    estado      varchar(45) not null,
    direccion   varchar(255) not null,
    coste       float(100,2) not null,
    situacion   varchar(20) ,
    fecha       date,
    hora        time,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedidos_usuarios FOREIGN KEY(usuarios_id) REFERENCES usuarios(id) ON DELETE NO ACTION
)ENGINE=InnoDb;

CREATE TABLE productos(
    id              int(255) auto_increment not null,
    categorias_id   int(255) not null,
    nombre          varchar(45) not null,
    descripcion     varchar(45),
    precio          float(100,2) not null,
    stock           int(20) not null,
    oferta          float(20),
    fecha           date not null,
    imagen          varchar(255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_productos_categorias  FOREIGN KEY(categorias_id) REFERENCES categorias(id) ON DELETE NO ACTION
)ENGINE=InnoDb;

CREATE TABLE pedidos_productos(
    id              int(255) auto_increment not null,
    pedidos_id      int(255) not null,
    productos_id    int(255) not null,
    unidades        varchar(45),
    CONSTRAINT  pk_pedidos_productos PRIMARY KEY(id),
    CONSTRAINT  fk_pedidos_productos_pedidos FOREIGN KEY(pedidos_id) REFERENCES pedidos(id) ON DELETE NO ACTION,
    CONSTRAINT  fk_pedidos_productos_productos FOREIGN KEY(productos_id) REFERENCES productos(id) ON DELETE NO ACTION
)ENGINE=InnoDb;