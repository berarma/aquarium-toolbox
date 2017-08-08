# AquariumToolbox

This library can do typical calculations used in planted aquariums, like
fertilizer dosing, many others will be added.

It's based on the excelent ideas and data of the late Carlo Flores'
[yet-another-nutrient-calculator](https://github.com/flores/yet-another-nutrient-calculator).

Simplicity, reusability and reliablity are key goals for this project, thus
it's OOP code with test cases and documentation.

## Requirements

  + PHP 5.4+

## How to use it

You can add this library to your PHP project using Composer:

```
# composer.phar require berarma/AquariumToolbox
```

## Documentation

To generate documentation you need to have ApiGen installed or install Composer
dependencies with command:

```
# composer.phar install
```

Run ApiGen:

```
# vendor/bin/apigen generate
```

Open _docs/index.html_ in your browser.

## License

This software is licensed under the GPL v2 license. This is a library, you're
just required to share your modifications/fixes/improvements to it. You aren't
required to relicense your own projects because you're using and/or
redistributing this software with them.

## Disclaimer

There's no warranty of any kind, you're the sole responsible for the use or
misuse of this software.
