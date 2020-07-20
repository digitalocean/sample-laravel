This is a sample Laravel application for App Platform.

**NOTE** This sample repository contains an `.env` file with a pre-generated application key. Committing `.env` files with secrets to the same repository that holds the application's source code is _not_ good practice, however, this is done to ensure that _this_ sample repository works out of the box.

To deploy a Laravel application to App Platform, you will need to set your application key. Generate a key by running the following command on your local machine:

```
❯ php artisan --no-ansi key:generate --show
base64:UdAH2B63rlotjrkSSsj3Hppy4gbfr+OeHvtSdF9r9q8=
```

Copy the `base64:...` output to your clipboard. This is your application key. When deploying your application to App Platform, configure the `APP_ENV` environment variable to use the key you generated.

### Nginx

By default, Apache will be used as the webserver. If you would like to use Nginx instead, create a file named `Procfile` at the root of your repo with:

```procfile
web: heroku-php-nginx -C nginx.conf public/
```

and create a file named `nginx.conf` also at the root of the repo with:

```nginx
location / {
    try_files $uri @php;
}

location @php {
    rewrite ^(.*)$ /index.php$1 last;
}
```
