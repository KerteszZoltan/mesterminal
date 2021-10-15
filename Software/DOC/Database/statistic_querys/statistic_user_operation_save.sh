#!/bin/bash

#mysql user
user_name='admin'
password='Admin_12345.'
database_name='mesterminal'

mysql -u"$user_name" -p"$password" -D"$database_name" -e "select user.name, operation.name, user_operation.time from user 
INNER JOIN user_operation on user.ID=user_operation.user_ID 
INNER JOIN operation on user_operation.operation_ID=operation.ID 
WHERE user_operation.month LIKE '%/09'
INTO OUTFILE '/var/www/html/adatkezelo/DOC/statistic.csv'
FIELDS TERMINATED BY '|'
ENCLOSED BY ';'
LINES TERMINATED BY '\n';"
