# Task Flow
## Para rodar o projeto
Em uma aba do terminal com o diretório aberto digite os seguintes comandos para baixar as depedencias.
```
composer install
npm install
```
Após isso, duplique o .env.example e renomeie para .env, então rode os comandos abaixo.
```
php artisan key:generate
php aritsan migrate
```
Para rodar o projeto digite.
```
php artisan serve
npm run dev
```
*É necessário ter o composer e o php instalados*

