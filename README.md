# Roketin Immune
[![Issues](https://img.shields.io/github/issues/roketin/immune.svg?style=flat-square)](https://github.com/roketin/immune/issues) [![Forks](https://img.shields.io/github/forks/roketin/immune.svg?style=flat-square)](https://github.com/roketin/immune/network/members)  [![Stars](https://img.shields.io/github/stars/roketin/immune.svg?style=flat-square)](https://github.com/roketin/immune/stargazers) 

### package to report exceptions for lumen framework by Roketin

## 1. Installation

Open your command console and type just like install another package in laravel.

    composer require roketin/immune

After installation done then you 

    php artisan immune-key:generate

Copy key to .env file on your project and make configuration like this

    APP_URL=http://yourwebsite.com
    IMMUNE_API=http://immune.roketin.com
    IMMUNE_KEY=YOUR_KEY
  then you go to file `app.php` on directory `bootstrap/app.php` you should copy this on register section

    $app->register(Roketin\Immune\ReportExceptionsServiceProvider::class);
    

## 2. Usage

On your handler `app\Exceptions\Handler.php` 

 

    use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

Change to

    use Roketin\Immune\Exceptions\ReportHandler as ExceptionHandler;


### Happy Develop!
