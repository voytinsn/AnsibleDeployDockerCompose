## Пример деплоя докеризированного веб приложение (nginx, php, mysql) с использованием docker-compose.yml на удалённый сервер

### Описание приложения
"Веб приложение" представляет собой один .php файл и нужно только чтобы продемонстрировать следующее:
- php-скрипт выполняется;
- создана БД и таблица в ней (штатными средствами Docker-образа mysql);
- происходит подключение к БД, запись и чтение;
- пароль для доступа к БД берется из переменной окружения;

### Подготовка
Подразумевается, что на удаленном сервере:
- уже установлен Docker;
- docker не настроен для работы с ограниченными правами и требует root прав;
- уже настроен доступ по ssh;
- разрешено подключаться по shh с использованием пароля;
- пользователь под которым подключается Ansible может использовать sudo;

### Запуск примера
Клонирование репозитория
```
git clone https://github.com/voytinsn/AnsibleDeployDockerCompose
```

```
cd AnsibleDeployDockerCompose
```

```
copy .env.example .env
```

Запуск плейбука
```
ansible-playbook ./ansible/playbook.yml -i "<имя удаленного сервера>," -u "<имя пользователя на удаленном сервере>" -kK
```