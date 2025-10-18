Deploy:

1. git clone https://github.com/arnautdev/melioraweb-task.git
2. cd melioraweb-task
3. composer install
4. cp .env.example .env
5. ./vendor/bin/sail up -d
6. make connect
7. php artisan migrate --seed
8. php artisan test --filter Api
9. open http://localhost in browser
10. u: admin@melioraweb.com p: password
11. Short video in file: Screen Recording 2022-03-22 at 12.21.22.mov
