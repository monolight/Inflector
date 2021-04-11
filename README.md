# Inflector

Monolight Library - Inflector

![Github Workflow Status](https://github.com/monolight/Inflector/actions/workflows/php.yml/badge.svg)

## Example

```php
use ML\Inflector\Urlizer;

$url = Urlizer::urlize('Hello world'); // Returns 'hello-world'

$url = Urlizer::urlize('Hello world', '_'); // Returns 'hello_world'
```