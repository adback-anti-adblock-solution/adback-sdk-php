<?php

namespace Dekalee\AdbackAnalytics\Driver;

/**
 * Class PdoScriptCache
 */
class PdoScriptCache extends SqlScriptCache implements ScriptCacheInterface
{
    protected $connection;

    /**
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
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
        $request = $this->connection->prepare('SELECT our_value FROM adback_cache_table WHERE our_key = :key LIMIT 1');
        $request->execute([
            'key' => $key,
        ]);

        $data = $request->fetch();
        $request->closeCursor();
        if (is_array($data) && array_key_exists('our_value', $data)) {
            return $data['our_value'];
        }

        return null;
    }

    /**
     * @param string $key
     * @param string $value
     */
    protected function set($key, $value)
    {
        $this->clear($key);
        $request = $this->connection->prepare("INSERT INTO adback_cache_table (our_key, our_value) VALUES (:key, :value)");
        $request->execute([
            'key' => $key,
            'value' => $value,
        ]);
    }

    /**
     * @param string $key
     */
    protected function clear($key)
    {
        $request = $this->connection->prepare("DELETE FROM adback_cache_table WHERE our_key = :key");
        $request->execute([
            'key' => $key,
        ]);
    }
}
