<?php

namespace Dekalee\AdbackAnalytics\Driver;

/**
 * Class MysqliScriptCache
 */
class MysqliScriptCache extends SqlScriptCache implements ScriptCacheInterface
{
    protected $connection;

    /**
     * @param mixed $connection Mysqli Connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    protected function get($key)
    {
        $value = null;
        $request = $this->connection->prepare('SELECT our_value FROM adback_cache_table WHERE our_key = ? LIMIT 1');
        $request->bind_param('s', $key);

        $request->execute();
        $request->bind_result($value);
        $request->fetch();
        $request->free_result();

        return $value;
    }

    /**
     * @param string $key
     * @param string $value
     */
    protected function set($key, $value)
    {
        $this->clear($key);
        $request = $this->connection->prepare("INSERT INTO adback_cache_table (our_key, our_value) VALUES (?, ?)");
        $request->bind_param('ss', $key, $value);
        $request->execute();
    }

    /**
     * @param string $key
     */
    protected function clear($key)
    {
        $request = $this->connection->prepare("DELETE FROM adback_cache_table WHERE our_key = ?");
        $request->bind_param('s', $key);
        $request->execute();
    }
}
