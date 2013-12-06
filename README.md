Kohana AWS
=============

Kohana wrapper module for the Amazon AWS PHP SDK.

1. [Installation](#installation)
1. [Usage](#usage)

## Installation

#### Install the module

```
git submodule add git@github.com:dexamped/kohana-aws.git modules/kohana-aws
git submodule update --init --recursive
```

#### Load dependencies

We have to install vendor's dependencies by running `composer install`

```
composer install --working-dir=modules/kohana-aws/vendor/aws-sdk-php/
```

#### Configuration

Edit `application/bootstrap.php` and add the module:

```
Kohana::modules(array(
    ...
    'aws' => 'modules/kohana-aws',
    ...
));
```

Copy the `modules/kohana-aws/config/aws.php` to `APPPATH/config/aws.php` and setup your config.

## Usage

```php
<?php

class Controller_Amazon extends Controller {

	public function action_index()
	{
		// List some S3 buckets
		$s3 = Amazon::instance()->get('s3');

		// Execute an S3 method
		$result = $s3->listBuckets();

		// Do something with it here
	}
}
?>
```

#### Full AWS SDK Usage

http://docs.aws.amazon.com/aws-sdk-php/latest/
