<?php

namespace Dekalee\AdbackAnalytics\Facade;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ScriptUrlFacade
 */
class ScriptUrlFacade
{
    /**
     * @Serializer\Type("string")
     */
    public $analyticsDomain;

    /**
     * @Serializer\Type("string")
     */
    public $analyticsScript;

    /**
     * @Serializer\Type("string")
     */
    public $messageDomain;

    /**
     * @Serializer\Type("string")
     */
    public $messageScript;
}
