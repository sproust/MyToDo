MyToDo
======
Instalation
-----------
1. Clone this repository
	git clone https://github.com/sproust/MyToDo.git

2. Make dirctories "temp/" and "log" (writable) 
3. Download libraries via composer
	composer install
4. Create database 
	bin/console orm:shema-tool:create
or 
	bin/console migrations:execute --up 