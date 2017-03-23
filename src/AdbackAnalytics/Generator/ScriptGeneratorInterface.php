<?php

namespace Dekalee\AdbackAnalytics\Generator;

/**
 * Interface ScriptGeneratorInterface
 */
interface ScriptGeneratorInterface
{
    /**
     * @param int $id
     *
     * @return string
     */
    public function generate($id);
}
