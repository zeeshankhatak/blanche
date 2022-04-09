<?php

namespace RebelCode\Spotlight\Instagram\Config;

/**
 * A config entry implementation that uses WordPress Options for storage.
 *
 * @since 0.1
 * @see   ConfigService
 */
class WpOption implements ConfigEntry
{
    /**
     * @since 0.1
     *
     * @var string
     */
    protected $key;

    /**
     * @since 0.1
     *
     * @var mixed
     */
    protected $default;

    /**
     * @var bool
     */
    protected $autoload;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param string $key The option key.
     * @param mixed $default The default value for this option.
     * @param bool $autoload Whether to autoload the option or not.
     */
    public function __construct(string $key, $default = null, bool $autoload = false)
    {
        $this->key = $key;
        $this->default = $default;
        $this->autoload = $autoload;
    }

    /**
     * Retrieves the key of the option.
     *
     * @since 0.1
     *
     * @return string
     */
    public function getKey() : string
    {
        return $this->key;
    }

    /**
     * Retrieves the default value of the option.
     *
     * @since 0.1
     *
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function getValue()
    {
        return get_option($this->key, $this->default);
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function setValue($value)
    {
        return update_option($this->key, $value, $this->autoload);
    }
}
