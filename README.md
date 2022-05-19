## Postcoder Laravel Wrapper

Allows simple postcode lookups on https://postcoder.com

### Install

```
composer install barrydevt/postcoder
```

Add your API key to conifg:

`config/services.php`:

```
'postcoder' => [
    'api_key'    => env('POSTCODER_API_KEY'),
],
```

Then in `.env` put the key:

```
POSTCODER_API_KEY=PCW45-12345-12345-1234X
```
(This is the sandbox key)

## Useage

```
use Barrydevt\Postcoder\Facades\AddressLookup;

$possibleAddresses = AddressLookup::searchFor($this->postcode)->get();

```

