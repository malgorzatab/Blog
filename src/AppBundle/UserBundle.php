<?php
/**
 * Created by PhpStorm.
 * User: Gosia
 * Date: 2017-11-13
 * Time: 20:26
 */

namespace AppBundle;


use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}