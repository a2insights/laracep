# Laravel Cep Repository

[![Latest Version on Packagist](https://img.shields.io/packagist/v/atiladanvi/cep-repository.svg?style=flat-square)](https://packagist.org/packages/atiladanvi/cep-repository)
[![Total Downloads](https://img.shields.io/packagist/dt/atiladanvi/cep-repository.svg?style=flat-square)](https://packagist.org/packages/atiladanvi/cep-repository)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

Laravel Cep Repository requires [PHP](https://php.net) 7.2-7.4. This particular version supports Laravel 6-7.

| Cep Repository |  L5.8        | L6                 | L7                 |
|----------|--------------------|--------------------|--------------------|
| 0.0.1      |:heavy_check_mark:  | :x:                | :x:                |
| 0.0.2      |:heavy_check_mark:  |:heavy_check_mark:  | :x:                |
| 0.0.3      |:heavy_check_mark:  |:heavy_check_mark:  | :heavy_check_mark: |
| 0.1.0      |:heavy_check_mark:  |:heavy_check_mark:  | :heavy_check_mark: |

To get the latest version, simply require the project using [Composer](https://getcomposer.org):

## Installation

You can install the package via composer:

```bash
composer require atiladanvi/cep-repository
```

## Usage

```php
$adress = CepRepository::get($cep);
```
output:

```php
Atiladanvi\CepRepository\Address {
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
