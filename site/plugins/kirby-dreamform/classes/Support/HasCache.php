<?php

namespace tobimori\DreamForm\Support;

use Kirby\Cache\Cache;

/**
 * Base class for adding simplified cache methods
 * to performers & fields
 */
trait HasCache
{
	abstract private static function cacheInstance(): Cache;

	/**
	 * Get/set a value for the performer cache
	 */
	protected static function cache(string|array $key, callable $callback, int $minutes = 10): mixed
	{
		if (!($cache = static::cacheInstance())) {
			return $callback();
		}

		$key = is_array($key) ? implode('_', $key) : $key;
		$key = static::type() . '.' . $key;
		$value = $cache->get($key);
		if ($value === null) {
			try {
				$value = $callback();
				$cache->set($key, $value, $minutes);
			} catch (\Throwable $e) {
				$cache->remove($key);
				return null;
			}
		}

		return $value;
	}

	/**
	 * Set a value for the performer cache
	 */
	protected static function setCache(string $key, mixed $value, int $minutes = 10): bool
	{
		if (!($cache = static::cacheInstance())) {
			return false;
		}

		$key = static::type() . '.' . $key;
		return $cache->set($key, $value, $minutes);
	}

	/**
	 * Get a value from the performer cache
	 */
	protected static function getCache(string $key): mixed
	{
		if (!($cache = static::cacheInstance())) {
			return null;
		}

		$key = static::type() . '.' . $key;
		return $cache->get($key);
	}
}
