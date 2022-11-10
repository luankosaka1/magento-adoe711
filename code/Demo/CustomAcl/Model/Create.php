<?php
/**
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2022 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Demo\CustomAcl\Model;

use Demo\CustomAcl\Api\CreateInterface;

class Create implements CreateInterface
{
    public function create(): string
    {
        return 'created';
    }
}
