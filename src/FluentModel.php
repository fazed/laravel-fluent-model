<?php

namespace Koetje\FluentModel;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Koetje\FluentModel\Exceptions\JsonEncodingException;

class FluentModel implements ArrayAccess, Arrayable, JsonSerializable, Jsonable
{
    use Concerns\HasAttributes,
        Concerns\HidesAttributes,
        Concerns\GuardsAttributes;

    /**
     * Create a new fluent model instance.
     *
     * @param  array $attributes
     * @param  bool  $useMutators
     */
    public function __construct(array $attributes = [], $useMutators = true)
    {
        static::unguard();

        $this->syncOriginal();

        $this->fill($attributes, $useMutators);
    }

    /**
     * Statically create a new fluent model instance.
     * 
     * @param  array $attributes
     * @param  bool  $useMutators
     */
    public static function make(array $attributes = [], $useMutators = true)
    {
        return new self($attributes, $useMutators);
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @param  array $attributes
     * @param  bool  $useMutators
     * @return $this
     */
    public function fill(array $attributes, $useMutators = true)
    {
        $totallyGuarded = $this->totallyGuarded();

        foreach ($this->fillableFromArray($attributes) as $key => $value) {
            // The developers may choose to place some attributes in the "fillable" array
            // which means only those attributes may be set through mass assignment to
            // the model, and all others will just get ignored for security reasons.
            if ($this->isFillable($key)) {
                $this->setAttribute($key, $value, $useMutators);
            }
        }

        return $this;
    }

    /**
     * Fill the model with an array of attributes. Force mass assignment.
     *
     * @param  array $attributes
     * @param  bool  $useMutators
     * @return $this
     */
    public function forceFill(array $attributes, $useMutators = true)
    {
        return static::unguarded(function () use ($attributes, $useMutators) {
            return $this->fill($attributes, $useMutators);
        });
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge($this->attributesToArray());
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int $options
     * @return string
     * @throws JsonEncodingException
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->getAttribute($this->getKeyName());
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Get the value for a given offset.
     *
     * @param  mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Set the value for a given offset.
     *
     * @param  mixed $offset
     * @param  mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }

    /**
     * Determine if an attribute or relation exists on the model.
     *
     * @param  string $key
     * @return bool
     */
    public function __isset($key)
    {
        return null !== $this->getAttribute($key);
    }

    /**
     * Unset an attribute on the model.
     *
     * @param  string $key
     * @return void
     */
    public function __unset($key)
    {
        unset($this->attributes[$key]);
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
