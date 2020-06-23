# Add InlineIndex to your nova resources

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ncus/inline-index.svg?style=flat-square)](https://packagist.org/packages/ncus/inline-index)
[![Total Downloads](https://img.shields.io/packagist/dt/ncus/inline-index.svg?style=flat-square)](https://packagist.org/packages/ncus/inline-index)

This package allows you to update a text field or number field of a resource in the index view (inline edit).

## Install
```bash
composer require ncus/inline-index
```

## Usage

```php
use Ncus\InlineIndex\InlineIndex;

InlineIndex::make('name')
          ->options([
              'event' => 'blur',
              'type' => 'text',
          ])->rules('required');
```
Note: event default keyup.enter, type default text.
