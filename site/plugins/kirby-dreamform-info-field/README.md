# Kirby Dreamform Info Field

This plugin adds a simple info field to the [Kirby Dreamform](https://plugins.andkindness.com/dreamform) plugin. It can be used to display additional information (and links) to your visitors.

![Screenshot](https://raw.githubusercontent.com/moinframe/kirby-dreamform-info-field/main/screenshot.jpg)

## Installation

### Download

Download and copy this repository to `/site/plugins/kirby-dreamform-info-field`.

### Git submodule

```
git submodule add https://github.com/moinframe/kirby-dreamform-info-field.git site/plugins/kirby-dreamform-info-field
```

### Composer

```
composer require moinframe/kirby-dreamform-info-field
```

## Usage

The info field will be automatically added to the form builder. If you have defined custom form fields, you first need to add it to the config.

```php

// site/config/config.php

return [
  'tobimori.dreamform' => [
    'fields' => [
      'available' => ['text', 'textarea', 'info' /* other fields here */ ],
    ],
  ],
];

```

## License

MIT

However, you need a valid [Dreamform](https://plugins.andkindness.com/dreamform) license to use this plugin.
