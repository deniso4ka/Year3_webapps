<?php
namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\User;
use Itb\Model\Admin;
use Itb\Model\Member;
use Itb\Model\Student;
use Itb\Model\Main;
use Itb\Model\Project;

/**
 * user
 * class for user
 * Class UserController
 * @package Itb\Controller
 */
class UserController
{
    /**
     * log in, chacke the id, password and rank to redirect to appropriate  page
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction(Request $request, Application $app)
    {
        $paramsPost = $request->request->all();

        $id = $paramsPost['id'];
        $password = $paramsPost['password'];
        $userId = filter_var($id, FILTER_SANITIZE_STRING);
        $userPassword = filter_var($password, FILTER_SANITIZE_STRING);

        $login = User::getOneById($userId);
        $rank = $login->getRank();
        $pass = $login->getPassword();

        if (('admin' === $rank) && password_verify($userPassword, $pass)) {
            $row = Admin::getOneById(1);
            $name = $row->getName();

            $app['session']->set('user', array('rank' => $rank, 'id' => $id, 'name' => $name ));
            return $app->redirect('/loginSuccessAdmin');
        }

        if ('supervisor' === $rank) {
            $id = $login->getMemberId();
            $member = Member::getOneById($id);
            $name = $member->getName();

            if (password_verify($userPassword, $pass)) {
                $app['session']->set('user', array('rank' => $rank, 'id' => $id, 'member' => $member, 'name' => $name ));
                return $app->redirect('/loginSuccessSuper');
            }
        }

        if ('student' === $rank) {
            $id = $login->getStudentId();
            $student = Student::getOneById($id);
            $name = $student->getName();

            if (password_verify($userPassword, $pass)) {
                $app['session']->set('user', array('rank' => $rank, 'id' => $id, 'name' => $name ));
                return $app->redirect('/loginSuccessStud');
            }
        }

        $templateName = 'loginError';

        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter'
            );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * log in as administrator
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginSuccessAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');


        $adminRow = Admin::getOneById(1);
        $adminImage = $adminRow->getImage();

        $argsArray = array(
            'name' =>$user['name'],
            'rank' => $user['rank'],
             'id' => $user['id'],
             'adminImage' => $adminImage
       );

        $templateName = 'homeAdmin';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * log in as supervisor
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginSuccessSupervisorAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];
        $member = Member::getOneById($id);
        $projectId = $member->getProjectId();
        $projectRow = Project::getOneById($projectId);
        $projectName = $projectRow->getName();
        $studentRows = Student::searchIdByColumn('projectId', $projectId);

        $argsArray = array(
            'name' =>$user['name'],
            'rank' => $user['rank'],
            'id' => $user['id'],
            'member' => $member,
            'projectName' => $projectName,
            'studentRows' => $studentRows
        );

        $templateName = 'homeMember';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * log in as student
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginSuccessStudentAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id=$user['id'];

        $studentRow = Student::getOneById($id);
        $projectId = $studentRow->getProjectId();
        $memberId = $studentRow->getMemberId();
        $projectRow = Project::getOneById($projectId);
        $projectName = $projectRow->getName();
        $memberRows = Member::getOneById($memberId);
        $memberName =  $memberRows->getName();

        $argsArray = array(
            'name' =>$user['name'],
            'rank' => $user['rank'],
            'id' => $user['id'],
            'student' => $studentRow,
            'projectName' => $projectName,
           'memberName'  => $memberName,
           'projectName'  => $projectName,
        );

        $templateName = 'homeStudent';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * log out
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function logoutAction(Request $request, Application $app)
    {
        if (null !== $app['session']->get('user')) {
            $app['session']->set('user', null);
        }

        $argsArray = [];

        $templateName = 'home';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
