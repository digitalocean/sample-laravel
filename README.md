# Getting Started #

These steps will get this sample application running for you using DigitalOcean.

**Note: Following these steps will result in charges for the use of DigitalOcean services**

## Requirements

* You need a DigitalOcean account. If you don't already have one, you can sign up at https://cloud.digitalocean.com/registrations/new
    
## Forking the Sample App Source Code

To use all the features of App Platform, you need to be running against your own copy of this application. To make a copy, click the Fork button above and follow the on-screen instructions. In this case, you'll be forking this repo as a starting point for your own app (see [Github documentation](https://docs.github.com/en/github/getting-started-with-github/fork-a-repo) to learn more about forking repos.

After forking the repo, you should now be viewing this README in your own github org (e.g. `https://github.com/<your-org>/sample-laravel`)

**Note:** You can skip forking this repo and select the "Laravel" sample from the app creation page, however do notice that certain features will be disabled.

## Deploying the App ##

1. Visit https://cloud.digitalocean.com/apps (if you're not logged in, you may see an error message. Visit https://cloud.digitalocean.com/login directly and authenticate, then try again)
1. Click "Launch App" or "Create App"
1. Choose GitHub and authenticate with your GitHub credentials.
1. Under Repository, choose this repository (e.g. `<your-org>/sample-laravel`)
1. On the next two screens, leave all the defaults unchanged.
1. Click "Launch App"
1. You should see a "Building..." progress indicator. And you can click "Deployments"→"Details" to see more details of the build.
1. It can currently take 5-6 minutes to build this app, so please be patient. Live build logs are coming soon to provide much more feedback during deployments.
1. Once the build completes successfully, click the "Live App" link in the header and you should see your running application in a new tab

## Making Changes to Your App ##

As long as you left the default Autodeploy option enabled when you first launched this app, you can now make code changes and see them automatically reflected in your live application. During these automatic deployments, your application will never pause or stop serving request because the App Platform offers zero-downtime deployments.

**NOTE** This sample repository contains an `.env` file with a pre-generated application key. Committing `.env` files with secrets to the same repository that holds the application's source code is _not_ good practice, however, this is done to ensure that _this_ sample repository works out of the box.

To deploy a Laravel application to App Platform, you will need to set your application key. Generate a key by running the following command on your local machine:

```
❯ php artisan --no-ansi key:generate --show
base64:UdAH2B63rlotjrkSSsj3Hppy4gbfr+OeHvtSdF9r9q8=
```

Copy the `base64:...` output to your clipboard. This is your application key. When deploying your application to App Platform, configure the `APP_KEY` environment variable to use the key you generated.

### Nginx

By default, Apache will be used as the webserver. If you would like to use Nginx instead, create a file named `nginx.conf` at the root of the repo with:

```nginx
location / {
    try_files $uri @php;
}

location @php {
    rewrite ^(.*)$ /index.php$1 last;
}
```

and set your app's run command to: `heroku-php-nginx -C nginx.conf public/`

## Learn More ##

You can learn more about the App Platform and how to manage and update your application at https://www.digitalocean.com/docs/app-platform.


## Deleting the App #

When you no longer need this sample application running live, you can delete it by following these steps:
1. Visit the Apps control panel at https://cloud.digitalocean.com/apps
1. Navigate to the sample-laravel app
1. Choose "Settings"->"Destroy"

This will delete the app and destroy any underlying DigitalOcean resources

**Note: If you don't delete your app, charges for the use of DigitalOcean services will continue to accrue.**

