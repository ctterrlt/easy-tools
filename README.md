# Easy Tools (`ctterrlt/easy-tools`)

[![PHP Version](https://img.shields.io/badge/php-%5E8.4-blue.svg)](https://php.net/)
[![License: GPL-3.0](https://img.shields.io/badge/License-GPL--3.0-blue.svg)](LICENSE)

A lightweight, modern collection of utility functions and classes designed to streamline common PHP development tasks. Built for PHP 8.4+ with strict typing and high performance.

*Note: This library is currently in active development. Additional features, including advanced logging, exception handling (`try/catch`), and array utilities, are planned for upcoming releases.*

---

## 📋 Requirements

* **PHP:** `^8.4` or higher

---

## 📦 Installation

Install the package via Composer:

```bash
composer require ctterrlt/easy-tools
```

---

## 🚀 Quick Start

The library follows PSR-4 autoloading standards under the `Chry\EasyTools\` namespace.

```php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Chry\EasyTools\Tools;

// Generate a random float between 10.5 and 50.0
$randomValue = Tools::random_float(10.5, 50.0);

// Format a float to exactly 2 decimal places as a string
echo Tools::format_float($randomValue, 2);
```

---

## 🛠️ Available Methods

### `Tools` Class

The `Chry\EasyTools\Tools` class provides a suite of static utility methods for common mathematical and array operations.

#### `random_float`

Generates a random float number within a Closed-Open interval `[min, max)`, rounded to a specified number of decimal places. Leverages PHP 8.3+ `Random\Randomizer`.

```php
public static function random_float(float $min, float $max, int $n = 6): float
```

* **`$min`**: The minimum boundary value.
* **`$max`**: The maximum boundary value.
* **`$n`**: Maximum number of decimal places (Default: `6`). Uses `PHP_ROUND_HALF_UP`.

#### `generate_prices`

Generates an array of random prices (floats with 2 decimal places) and appends them to an existing array by reference.

```php
public static function generate_prices(array &$vector_prices, int $count_generate, float $min, float $max): void
```

* **`&$vector_prices`**: Target array passed by reference to store generated prices.
* **`$count_generate`**: Number of price items to generate.
* **`$min`**: Minimum price value.
* **`$max`**: Maximum price value.

#### `average`

Calculates the arithmetic mean of an array of numbers.

```php
public static function average(array $array): ?float
```

* **Returns:** The average as a `float`, or `null` if the array is empty.

#### `average_from_min`

Calculates the average of array elements strictly greater than a minimum threshold.

```php
public static function average_from_min(array $array, float $min): ?float
```

* **`$min`**: Minimum threshold value (`> $min`).
* **Returns:** The average as a `float`, or `null` if no elements meet the condition.

#### `format_float`

Formats a decimal number to always display `$n` decimal places (e.g., `1.2` -> `"1.20"`).

```php
public static function format_float(float $value, int $n): string
```

* **Returns:** A formatted `string` for display purposes.

---

## 🛣️ Roadmap

Upcoming features in development:

* Array filtering and conditional element removal wrappers.
* Logging and error-handling tools (`try/catch` wrappers).
* Print/output utility helpers.

---

## 📄 License

This project is licensed under the [GNU General Public License v3.0 (GPL-3.0)](LICENSE).

---

## ✍️ Author

* **Tursi Christian** ([@ctterrlt](https://github.com/ctterrlt)) — [tursi.christian9@gmail.com](mailto:tursi.christian9@gmail.com)