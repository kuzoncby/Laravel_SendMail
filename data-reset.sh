#!/bin/bash
# Clean Database
mysql -uhomestead -psecret homestead < rebuild_database.sql
echo "Re-build database"
echo "###############################"
echo
# Create tables
php artisan migrate
# Insert Data
php artisan db:seed
