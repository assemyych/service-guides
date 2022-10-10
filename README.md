## Установка и настройка проекта

1. Настраиваем .env файл

```bash
$ cp .env.example .env
```

2. Поднимаем контейнеры в фоне через docker-compose:

```bash
$ docker-compose up -d --build
```

3. добавляем в /etc/hosts 127.0.0.1 service-guides.lcl (вы можете изменить его в docker/default.conf)
4. перейдите к http://service-guides.lcl/api/documentation
