Dropzone Extension for Yii 2
==============================

This extension provides the [Dropzone](http://www.dropzonejs.com/) integration for the Yii2 framework.


Installation
------------

This extension requires [Dropzone](https://github.com/enyo/dropzone)

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist devgroup/yii2-dropzone "*"
```

or add

```
"devgroup/yii2-dropzone": "*"
```

<<<<<<< HEAD
to the require section of your composer.json.
=======
to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by to create Ajax upload area :

```php
echo \andru\dropzone\DropZone::widget();
```
>>>>>>> 2efa8e8783dc87824f154f250106f4d02b43a186


General Usage
-------------

```php
<<<<<<< HEAD
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
=======
echo \andru\dropzone\DropZone::widget([
       'options' => [
           'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);
>>>>>>> 2efa8e8783dc87824f154f250106f4d02b43a186
```

you can also register `devgroup\dropzone\UploadAction` and `devgroup\dropzone\RemoveAction` actions in your controller
