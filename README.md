# Cep 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/a2insights/laracep.svg?style=flat-square)](https://packagist.org/packages/a2insights/laracep)
[![Total Downloads](https://img.shields.io/packagist/dt/a2insights/laracep.svg?style=flat-square)](https://packagist.org/packages/a2insights/laracep)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

Laravel Cep requires [PHP](https://php.net) 7.3-8.0. This particular version supports Laravel 5-8.

| Cep   |  L^5.5             | L6                 | L7                 | L8                 |
|-------|--------------------|--------------------|--------------------|--------------------|
| 0.0.1 |:heavy_check_mark:  | :x:                | :x:                | :x:                |
| 0.0.2 |:heavy_check_mark:  |:heavy_check_mark:  | :x:                | :x:                |
| 0.0.3 |:heavy_check_mark:  |:heavy_check_mark:  | :heavy_check_mark: | :x:                |
| 0.1.0 |:heavy_check_mark:  |:heavy_check_mark:  | :heavy_check_mark: | :x:                |
| 0.2.0 |:heavy_check_mark:  |:heavy_check_mark:  | :heavy_check_mark: | :heavy_check_mark: |

To get the latest version, simply require the project using [Composer](https://getcomposer.org):

## Installation

You can install the package via composer:

```bash
composer require a2insights/laracep
```

## Usage

```php
$adress = Cep::get($cep);
```
output:

```php
Cep\Address {
  +cep: "66911030"
  +estado: "Pará"
  +municipio: "Belém"
  +bairro: "Maracajá (Mosqueiro)"
  +logradouro: "Rua Veiga Cabral"
}
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email atila.danvi@outlook.com instead of using the issue tracker.

## Credits

- [Atila Silva](https://github.com/Atiladanvi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
