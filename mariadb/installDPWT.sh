# insert db 
mysql -uroot -pTempPasswordThatWillChangeItselfInTheNearFuture -e "CREATE DATABASE dpwt;"
mysql -uroot -pTempPasswordThatWillChangeItselfInTheNearFuture dpwt < /tmp/dpwt.sql

# generate password
export _MYSQL_FUNNY_PASSWORD=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9/*#' | fold -w 16 | head -n 1)
printf "==========================================\n YOUR MYSQL PASSWORD IS: $_MYSQL_FUNNY_PASSWORD\n==========================================\n"


# set the password as mysql root password
mysql -u root -pTempPasswordThatWillChangeItselfInTheNearFuture -Bse "SET PASSWORD FOR 'root'@'%' = PASSWORD('$_MYSQL_FUNNY_PASSWORD'); FLUSH PRIVILEGES;"
