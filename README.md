# bitQobo
Proprietary Qobo rewrite

## Installation
We'll assume you already have a webserver, preferably Apache. If this somehow gets leaked and you're reading this without being a contributor, we will not offer help regarding troubles setting it up.

1. Run ``composer update`` in the terminal. This is required for dependencies to work.
2. (Placeholder regarding DB user configuration, and likely BunnyCDN-related stuff)
3. (Placeholder regarding DB importing, this should be done with a migration-esque system?)
4. (Placeholder regarding compiling SCSS)

### Apache virtual host
Replace ``LOCATION`` with where your copy of bitQobo is located.

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