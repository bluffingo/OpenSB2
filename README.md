# bitQobo (closedSB)
Qobo's codebase.

## Installation
We'll assume you already have a webserver (preferably Apache) and a MySQL or MariaDB instance running. If this somehow gets leaked and you're reading this without being part of Bittoco, we will not offer help regarding troubles setting it up.

1. Run ``composer update`` in the terminal. This is required for dependencies to work.
2. (Placeholder regarding DB user configuration, and likely BunnyCDN-related stuff) Currently, you'll need to copy ``/config/config.example.php`` file to ``/config/config.php`` and fill out the required DB parameters. This might change later on however
3. (Placeholder regarding DB importing, this should be done with a migration-esque system?)
4. Compile the SCSS using the ``compile-scss.sh`` script available in the ``tools`` folder.

### Apache virtual host
Replace ``LOCATION`` with where your copy of bitQobo is located. (THIS IS OUTDATED)

```
<VirtualHost *> 
    ServerName localhost
    DocumentRoot "LOCATION/site"

    Alias /dynamic "LOCATION/dynamic"

    <Directory "LOCATION">
        Options Indexes FollowSymLinks
        Require all granted
        AllowOverride All
    </Directory>
</VirtualHost>
```

### NGINX Configuration
PLACEHOLDER

## Regarding OpenSB
bitQobo is not compatible with OpenSB databases, and vice versa.