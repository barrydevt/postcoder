<?php
namespace Barrydevt\Postcoder\Facades;

use Barrydevt\Postcoder\AddressLookup as AddressLookupService;
use Illuminate\Support\Facades\Facade;

class AddressLookup extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AddressLookupService::class;
    }
}
