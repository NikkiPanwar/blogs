create table country(cid int PRIMARY KEY AUTO_INCREMENT,cname varchar(50))

create table state(sid int PRIMARY KEY AUTO_INCREMENT,cid int,sname varchar(50),FOREIGN key(cid)REFERENCES 
country(cid))

create table city(ctid int PRIMARY KEY AUTO_INCREMENT,sid int,ctname varchar(50),FOREIGN key(sid)REFERENCES 
state(sid))

create table area(aid int PRIMARY KEY AUTO_INCREMENT,ctid int,aname varchar(50),FOREIGN key(ctid)REFERENCES 
city(ctid))