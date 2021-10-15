#!/bin/bash
#Initial 
date=$(date +%Y-%m-%d)
date_month="$(date +%m)"
#mysql user
user_name='admin'
password='Admin_12345.'
database_name='mesterminal'
#Save the statistic table
mysql  -u"$user_name" -p"$password" -D"$database_name" -e "select user.name, operation.name as operation_name, user_operation.time from user 
INNER JOIN user_operation on user.ID=user_operation.user_ID 
INNER JOIN operation on user_operation.operation_ID=operation.ID 
WHERE user_operation.month LIKE '%/09';" | sed 's/\t/","/g;s/^/"/;s/$/"/;s/\n//g' > statistic_user_operation_time-$date.csv

echo "Sikeres mentes";