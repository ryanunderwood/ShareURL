create table urls (
  id int not null,
  code varchar(50) not null,
  url text not null,
  added not null default current_timestamp,
  primary key(id)
);
create table blocked (
  id int not null,
  url text not null,
  primary key(id)
);