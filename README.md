Dropzone Extension for Yii 2
==============================

This extension provides the [Dropzone](http://www.dropzonejs.com/) integration for the Yii2 framework.


Installation
------------

This extension requires [Dropzone](https://github.com/enyo/dropzone)

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist andru/yii2-dropzone "*"
```

or add

```
"andru/yii2-dropzone": "*"
```


to the require section of your composer.json.
=======
to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by to create Ajax upload area :

```php
echo \andru\dropzone\DropZone::widget();
```



General Usage
-------------

```php

use andru\dropzone\DropZone;

DropZone::widget(
    [
        'name' => 'file', // input name or 'model' and 'attribute'
        'url' => '', // upload url
        'storedFiles' => [], // stores files
        'eventHandlers' => [], // dropzone event handlers
        'sortable' => true, // sortable flag
        'sortableOptions' => [], // sortable options
        'htmlOptions' => [], // container html options
        'options' => [], // dropzone js options
    ]
)

echo \andru\dropzone\DropZone::widget([
       'options' => [
           'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);



you can also register `andru\dropzone\UploadAction` and `andru\dropzone\RemoveAction` actions in your controller
