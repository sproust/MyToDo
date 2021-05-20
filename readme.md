# MyToDo
## Instalation

1. Clone this repository

```bash
git clone https://github.com/sproust/MyToDo.git
```

2. Make dirctories "temp/" and "log" (writable)
 
3. Download libraries via composer

```bash
composer install
```

4. Create database 


```bash
bin/console migrations:migrate
```