#!/bin/bash

function ctlHelp {
    data-reset.sh word
    data-reset.sh database
    data-reset.sh all
}
# Clean Database
function database {
    mysql -uhomestead -psecret homestead < rebuild_database.sql
    echo "Re-build database"
    echo "###############################"
    echo
    # Create tables
    php artisan migrate
    # Insert Data
    php artisan db:seed
}

function word {
    rm -f public/*.docx
}

case $1 in
	word)
		word
	;;
	all)
		database&
		word
	;;
	database)
		database
	;;
	help|*)
		ctlHelp
	;;
esac
