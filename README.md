# bitQobo (closedSB)
Qobo's codebase.

## Installation
We'll assume you already have a webserver (preferably Apache) and a MySQL or MariaDB instance running. If this somehow gets leaked and you're reading this without being part of Bittoco, we will not offer help regarding troubles setting it up.

1. Run ``composer update`` in the terminal. This is required for dependencies to work.
2. (Placeholder regarding DB user configuration, and likely BunnyCDN-related stuff) Currently, you'll need to copy ``/config/config.example.php`` file to ``/config/config.php`` and fill out the required DB parameters. This might change later on however
3. (Placeholder regarding DB importing, this should be done with a migration-esque system?)
4. Compile the SCSS using the ``compile-scss.sh`` script available in the ``tools`` folder.

### Apache virtual host
Replace ``LOCATION`` with where your copy of bitQobo is located.

```
<VirtualHost *>
    ServerName localhost
    DocumentRoot "LOCATION/public"

    Alias /dynamic "LOCATION/dynamic"

    <Directory "LOCATION">
        Options Indexes FollowSymLinks
        Require all granted
        AllowOverride All
    </Directory>
</VirtualHost>
```

### Docker image
bitQobo comes with a simple Docker image running MariaDB and NGINX. You can set it up really easily

1. Edit MariaDB environment variables in ``docker-compose.yml`` and change the DB host in ``config/config.php`` to ``mariadb``
2. Run ``docker compose up --build``
3. Import the SQL file using Adminer (hosted on http://localhost:6060 by default)
4. Go to http://localhost:8080
5. Uncomment ``expires 1y;`` and ``add_header Cache-Control "max-age=31536000";`` in ``docker/nginx/default.conf`` to setup the NGINX cache and add a Cache-Control header for dynamic content

If you have any issues setting the Docker images up for a dev instance contact @rgbagain in the Qobo development GC. I'd be happy to help.

## Regarding OpenSB
bitQobo is not compatible with OpenSB databases, and vice versa.
