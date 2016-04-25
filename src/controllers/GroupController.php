<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 23/03/2016
 * Time: 15:39
 */

namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\Group;

/**
 * class for the group
 * Class GroupController
 * @package Itb\Controller
 */
class GroupController
{
    /**
     * displaying information about group
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function groupsAction(Request $request, Application $app)
    {
        $groups = Group::getAll();

        $argsArray = [
            'groups' => $groups,
        ];

        $templateName = 'groups';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
