# EyeTracking BD

## more files you can view and have yet no tab on site :
http://127.0.0.1:8000/
http://127.0.0.1:8000/board/create/1 //add a board on a comic  
http://127.0.0.1:8000/pages/edit // create areas on a board  
http://127.0.0.1:8000/pages/mapping //testing sound on areas'board  
## Installation :  

### run in the terminal all thoses lines one by one :

general installation :
```shell
git clone git@github.com:echayotte/Projet_EyeTracking.git
git checkout dev
composer install
  # to avoid further problems
  # composer update

npm install
  #npm audit fix
  #npm audit
  #npm install --save-dev laravel-mix@4.0.14
npm audit //should be good now
```
database creation :
```
Then create a DB in your phpMyAdmin
```
environment creation :
```shell
cp .env.example .env
  # change info in .env [DB_DATABASE=changeHere, DB_USERNAME=changeHere, DB_PASSWORD=changeHere]
```
laravel's site generation :
```shell
php artisan key:generate
php artisan migrate  --seed
php artisan storage:link
```
launch the server ( # and watching files )
```shell
php artisan serve
  # npm run watch
```

## Problem with npm run dev : 
If you have the problem below : 
  ✖ Error: pngquant failed to build, make sure that libpng-dev is installed

You need to follow this steps : 
- <code> sudo apt-get install libpng-dev </code>
- <code> npm install </code>
It might worked now ! If not try this : 

- <code> sudo add-apt-repository "deb http://mirrors.kernel.org/ubuntu/ xenial main"</code>
- <code> sudo apt-get update</code>
- <code> sudo apt-get install libpng12-dev</code>
- <code> npm install</code>
- <code> npm run dev </code>

## Problem with npm run watch : 
If your npm run dev works, but any npm run watch won't work , try this : https://github.com/BrowserSync/browser-sync/issues/224 

## Database problem :

If you can't acces your database, even if your .env and everything is right, maybe laravel doesn't load your .env.
If so, try <code> php artisan config:cache </code> 

## To try file uploading : 
- make sure you have the latest DB and your .env is set up correctly. 
- run <code> php artisan storage:link </code>  
- if your terminal says it already exists, delete the storage folder in ./public (/!\ not ./storage) and run the command again.

## License
@TDB
