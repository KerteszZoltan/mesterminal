#!/bin/bash

backupFolder=/adat/ment

#mysql user
user_name='admin'
password='Admin_12345.'
database_name='mesterminal'

#mysql -u "$user_name" --password="$password" --database="$database_name"

mysqldump -u"$user_name" -p"$password" "$database_name" > mesterminal-$(date +%Y-%m-%d).sql
find /var/www/html -type f -name "*-$(date +%Y-%m-%d).sql"