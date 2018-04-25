# itemz

itemz portal will save the items in mysql database. its capable to list and
search the available itemz.

# how to run

## 1. run mysql

itemz portal running wiht mysql database(run mysql with docker).

```
docker run -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 --name mysql -d mysql
```

## 2. setup mysql

create database (`itemz`) and table(`item`)

```
create database itemz;

create table item (
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(20),
    title VARCHAR(20),
    description VARCHAR(100),
    image blob, name VARCHAR(60),
    phone VARCHAR(20),
    email VARCHAR(20),
    PRIMARY KEY(id)
);
```

## 3. build itemz

itemz app is dockerized. we can simply run it with docker

```
docker build --tag erangaeb/itemz:0.1 .
```

## 4. run itemz

in here `${PWD}:/var/www/html` maps current working directory as a volumen to  
`/var/www/html` directory. also taking mysql database host as a env variable

```
docker run -p 81:80 \
 -e DB_HOST=10.4.1.26 \
 -v ${PWD}:/var/www/html \
 erangaeb/itemz:0.1
```
