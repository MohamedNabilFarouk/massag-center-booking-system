#!/bin/bash
cd /app && composer update && composer dump-autoload &&
#php artisan key:generate && php artisan storage:link &&
#php artisan optimize &&
#php artisan vendor:publish --tag=panichd-public &&
chmod 777 -R storage bootstrap/cache
#cp tickets/master.blade.php vendor/panichd/panichd/src/Views
#cp tickets/admin.php vendor/panichd/panichd/src/Translations/en
