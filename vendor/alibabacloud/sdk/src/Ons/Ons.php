<?php

namespace AlibabaCloud\Ons;

use AlibabaCloud\VersionResolverTrait;

/**
 * Resolve version based on the method name.
 *
 * @method V20170918\OnsApiResolver v20170918()
 * @method V20190214\OnsApiResolver v20190214()
 */
class Ons
{
    use VersionResolverTrait;
}
