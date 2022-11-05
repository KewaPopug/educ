### Установка и настройка Apache
#### Шаг 1 — Установка Apache
Apache доступен в репозиториях программного обеспечения Ubuntu по умолчанию, его можно установить с помощью стандартных инструментов управления пакетами.

Установим пакет apache2:
```bash
sudo apt install apache2
```
После подтверждения установки apt выполнит установку Apache и всех требуемых зависимостей.
#### Шаг 2 — Настройка брандмауэра

Во время установки Apache регистрируется в UFW, предоставляя несколько профилей приложений, которые можно использовать для включения или отключения доступа к Apache через брандмауэр.

Выведите список профилей приложений ufw, введя следующую команду:

```bash
sudo ufw app list
```

Вы увидите список профилей приложений:

```bash
Available applications:
  Apache
  Apache Full
  Apache Secure
  OpenSSH
```

Как показал вывод, есть три профиля, доступных для Apache:

Apache: этот профиль открывает только порт 80 (нормальный веб-трафик без шифрования)
Apache Full: этот профиль открывает порт 80 (нормальный веб-трафик без шифрования) и порт 443 (трафик с шифрованием TLS/SSL)
Apache Secure: этот профиль открывает только порт 443 (трафик с шифрованием TLS/SSL)
Рекомендуется применять самый ограничивающий профиль, который будет разрешать заданный трафик.

```bash
sudo ufw allow 'Apache'
```

#### Шаг 3 — Проверка веб-сервера

Если вы используете Ubuntu 20.04 и выше, в конце процесса установки Apache запускается автоматически. Веб-сервер уже должен быть запущен и работать.

Используйте команду инициализации systemd, чтобы проверить работу службы:

```bash
sudo systemctl status apache2
```
```bash
● apache2.service - The Apache HTTP Server
     Loaded: loaded (/lib/systemd/system/apache2.service; enabled; vendor preset: enabled)
     Active: active (running) since Thu 2020-04-23 22:36:30 UTC; 20h ago
       Docs: https://httpd.apache.org/docs/2.4/
   Main PID: 29435 (apache2)
      Tasks: 55 (limit: 1137)
     Memory: 8.0M
     CGroup: /system.slice/apache2.service
             ├─29435 /usr/sbin/apache2 -k start
             ├─29437 /usr/sbin/apache2 -k start
             └─29438 /usr/sbin/apache2 -k start
```

Вывод подтвердил, что служба успешно запущена. Если же у вас параметр ```Active``` имеет значение ```inactive```, вам потребуется включить Apache следующей командой:

```bash
sudo systemctl start apache2
```

#### Шаг 4 - настройка кофигруции Apache

Создайте следующую директорию для educ:

```bash
sudo mkdir /var/www/educ
```

Создайте новый файл в /etc/apache2/sites-available/your_domain.conf:

```bash
sudo nano /etc/apache2/sites-available/educ.conf
```

Введите следующий блок конфигурации:

```bash
<VirtualHost *:80>
 	ServerName educ
 	DocumentRoot /var/www/educ/public
 	<Directory /var/www/educ/public>
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted
            
            ## Apache 2.2
            # Order allow,deny
            # Allow from all
	</Directory>
</VirtualHost>
```

Сохраните файл и закройте его после завершения.

Активируем файл с помощью инструмента a2ensite:

```bash
sudo a2ensite educ.conf
```

#### Шаг 5 - Настройка хоста

Переходим к файлу `/etc/hosts` и вписываем следующий блок:

```
127.0.0.1   educ
```


### Установка Composer

Если Composer еще не установлен это можно сделать по инструкции на
[getcomposer.org](https://getcomposer.org/download/), или одним из нижеперечисленных способов. На Linux или Mac
используйте следующую команду:

```bash
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

На Windows, скачайте и запустите [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe).

В случае возникновения проблем читайте
[раздел "Troubleshooting" в документации Composer](https://getcomposer.org/doc/articles/troubleshooting.md).
Если вы только начинаете использовать Composer, рекомендуем прочитать как минимум
[раздел "Basic usage"](https://getcomposer.org/doc/01-basic-usage.md).

В данном руководстве предполагается, что Composer установлен [глобально](https://getcomposer.org/doc/00-intro.md#globally).
То есть он доступен через команду `composer`. Если вы используете `composer.phar` из локальной директории,
изменяйте команды соответственно.

Если у вас уже установлен Composer, обновите его при помощи `composer self-update`.

### Конфигурация Laravel

Для исправного функционирования фреймворка нужно создать, а так же заполнить, файл переменной среды `.env`:

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

