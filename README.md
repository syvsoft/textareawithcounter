Text area with symbol counter
=============================
Text area with symbol counter

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist syvsoft/textareawithcounter "*"
```

or add

```
"syvsoft/textareawithcounter": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \syvsoft\widgets\TextareaWithCounter::widget(); ?>```