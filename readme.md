# MyToDo

## ToDo

- User management (deleteting users, setting state (active, inactive))
- Notification system

## Requirements

- Docker
- Docker Compose
- unix core (Makefile, sh, etc.)

## Installation

1. Clone this repository

```bash
git clone https://github.com/sproust/MyToDo.git
```

2. Make dirctories "temp/" and "log" (writable)
 
3. Start up development environment

```bash
make up
```

- [App](http://localhost/)
- [phpMyAdmin](http://localhost:10000/)

4. Init project

```bash
make init
```