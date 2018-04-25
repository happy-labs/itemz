# itemz

itemz portal will save the items in mysql database. its capable to list and
search the available itemz.

# how to run

itemz portal running wiht mysql database(run mysql with docker). first need to
create database and tables.

## 1. run mysql

```
docker run -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 --name mysql -d mysql
```

## 2. setup mysql

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

```
docker build --tag erangaeb/itemz:0.1 .
```

## 4. run itemz

```
docker run -p 81:80 \
 -e DB_HOST=10.4.1.26 \
 -v ${PWD}:/var/www/html \
 erangaeb/itemz:0.1
```
