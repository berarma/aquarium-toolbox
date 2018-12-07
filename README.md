# aquarium-toolbox

[![Build Status](https://travis-ci.com/berarma/aquarium-toolbox.svg?branch=master)](https://travis-ci.com/berarma/aquarium-toolbox)
[![codecov](https://codecov.io/gh/berarma/aquarium-toolbox/branch/master/graph/badge.svg)](https://codecov.io/gh/berarma/aquarium-toolbox)

This library can do typical calculations used in planted aquariums, like
fertilizer dosings.

It's based on the excelent ideas and data of the late Carlo Flores'
[yet-another-nutrient-calculator](https://github.com/flores/yet-another-nutrient-calculator).

The goals for this project are simplicity, reusability and reliablity.

## Requirements

  + PHP 5.4+

## How to use it

You can install this library using [composer](http://getcomposer.org).

```
# composer.phar require berarma/aquarium-toolbox
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
