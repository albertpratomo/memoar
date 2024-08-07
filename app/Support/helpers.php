<?php

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Support\Collection;

if (! function_exists('array_keys_convert_case')) {
    /**
     * Converts the keys of an array to the specified case.
     *
     * @throws \Exception
     */
    function array_keys_convert_case(array $array, string $case): array
    {
        $cases = ['camel', 'kebab', 'snake', 'studly'];

        throw_if(
            ! in_array($case, $cases),
            Exception::class,
            "Case \"$case\" not supported",
        );

        $converted = [];

        foreach ($array as $key => $value) {
            $converted[Str::{$case}($key)] = is_array($value)
                ? array_keys_convert_case($value, $case)
                : $value;
        }

        return $converted;
    }
}

if (! function_exists('resource')) {
    /**
     * Returns the corresponding JsonResource of a Model/Collection.
     */
    function resource(
        null|Collection|Model|MissingValue $resource,
        ?string $type = null
    ): array|null|AnonymousResourceCollection|JsonResource|MissingValue {
        if ((! $resource) || ($resource instanceof MissingValue)) {
            return $resource;
        } elseif (empty($resource)) {
            return [];
        }

        if ($resource instanceof Collection) {
            if ($resource->isEmpty()) {
                return [];
            }

            $item = $resource->first();
            $isPlural = true;
        } else {
            $item = $resource;
            $isPlural = false;
        }

        // Guess the resource type if not given.
        if (is_null($type)) {
            if ($item instanceof Model) {
                $type = class_basename(get_class($item));
            }
        }

        $resourceClass = "App\Http\Resources\\{$type}Resource";

        if (! class_exists($resourceClass)) {
            throw new \Exception('The resource class for '.$resourceClass.' is not found.');
        }

        $resource = $isPlural
            ? $resourceClass::collection($resource)
            : new $resourceClass($resource);

        return $resource->resolve();
    }
}
