# symbnb
php bin/console doctrine:schema:update --dump-sql
php bin/console doctrine:schema:update --force

php bin/console doctrine:fixtures:load

git reset --hard origin/master