clone https://github.com/Krazarus/laratest.git

cd laratest

$ composer update

$ php artisan migrate

$ php artisan db:seed

$ php artisan key:generate

create cron task:
$ crontab -e
add: * * * * * php /path/to/artisan schedule:run » /dev/null 2>&1


cron tasks are presented as custom artisan commands:

$ php artisan parsensave - parse proxies and store it in db

$ php artisan checknsave - check all proxies and store results

