load data local infile '/var/www/http/projects/cpsc471project/registrardata/data.csv' into table rc2 fields terminated by ','
lines terminated by '\r\n'
(sid,course);