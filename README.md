## Postcoder Laravel Wrapper

Allows simple postcode lookups on https://postcoder.com

###Install

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

Inject the class into the constructor of the clasee you wish to use it:

```
public function (\Barrydevt\Postcoder\Client $postcoderClient) 
{
    $this->postcoderClient = $postcoderClient;
}
```

in, and then call like so:

```
$result = $this->postcoderClient
             ->setCountryCode('GB')
             ->searchFor('NR14 7PZ')
             ->get();
```


