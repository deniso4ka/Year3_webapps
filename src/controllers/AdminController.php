<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03/04/2016
 * Time: 16:37
 */

namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\Admin;
use Itb\Model\Member;
use Itb\Model\Student;
use Itb\Model\User;

/**
 * class for administrator
 * Class AdminController
 * @package Itb\Controller
 */
class AdminController
{

    /**
     * redirecting administrator to profile change page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminInfoChangeAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $localId = $user['id'];
        $admin = Admin::getOneById($localId);



        $argsArray = array(
            'id' => $user['id'],
           'admin' => $admin

        );


        $templateName = 'adminProfileChange';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * changing administrator details
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function changeAdminDetailsAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];

        $adminRow = Admin::getOneById($id);
        $adminImage = $adminRow->getImage();

        $paramsPost = $request->request->all();
        $name = $paramsPost['name'];

        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array('jpeg', 'jpg', 'png');

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 5000000) {
            $errors[] = 'File must be not bigger then 5 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
        }



        if ($file_name) {
            $adminImage = $file_name;
        }

        $admin = new Admin();
        $admin->setId($id);
        $admin->setName($name);
        $admin->setImage($adminImage);

        $updateSuccess = Admin::update($admin);


        $adminRow = Admin::getOneById($id);
        $image = $adminRow->getImage();


        $argsArray = array(

            'rank' => $user['rank'],
            'id' => $user['id'],
            'adminImage' => $image
        );


        $templateName = 'homeAdmin';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * administrator redirecting to create member page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminMemberCreateAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');

        $argsArray = [
            'message' =>'please create member',
            'id' => $user['id'],
        ];

        $templateName = 'adminMemberCreate';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * storing member details
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function createMemberAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $localId = $user['id'];


        $paramsPost = $request->request->all();
        $name = $paramsPost['name'];
        $projectId = $paramsPost['projectId'];
        $status = $paramsPost['status'];


        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $projectId = filter_var($projectId, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_STRING);


        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array('jpeg', 'jpg', 'png');

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 5000000) {
            $errors[] = 'File must be not bigger then 5 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
        }

        $image =  'default.jpg';

        $member = new Member();

        $member->setName($name);
        $member->setProjectId($projectId);
        $member->setStatus($status);

        if ($file_name) {
            $image = $file_name;
        }
        $member->setImage($image);

        $updateSuccess = Member::insert($member);

        $argsArray = array(
            'message' => 'The member has been created successfully'

        );


        $templateName = 'adminMemberCreate';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to member details change page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminMemberEditAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];

        $members = Member::getAll();

        $argsArray = [
            'message' =>'please edit member',
            'id' => $user['id'],
            'members'=> $members,
            'edit'=>'edit'
        ];




        $templateName = 'adminMemberEdit';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     *reading picked member id and store id to session
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function adminEditMemberAction(Request $request, Application $app, $id)
    {
        $user = $app['session']->get('user');
        $rank = $user['rank'];
        $userId =$user['id'];

        $app['session']->set('user', array('id'=>$userId, 'rank'=>$rank, 'memberPickedId' =>$id));

        $memberRow = Member::getOneById($id);

        $argsArray = array(
            'id' => $user['id'],
            'memberRow' => $memberRow,
            'edit' => 'edit',
            'message' => 'Please fill new details'
        );

        $templateName = 'adminMemberEditWithInputFields';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * reading from session picking id and updating the member details
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function changeMemberDetailsAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $memberId = $user['memberPickedId'];
        $paramsPost = $request->request->all();
        $name = $paramsPost['name'];
        $projectId = $paramsPost['projectId'];
        $status = $paramsPost['status'];

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $projectId = filter_var($projectId, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_STRING);

        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array('jpeg', 'jpg');

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG .";
        }
        if ($file_size > 5000000) {
            $errors[] = 'File must be not bigger then 5 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
        }

        $memberRow = Member::getOneById($memberId);
        $memberRowImage = $memberRow->getImage();
        $image =  $memberRowImage;

        $member = new Member();
        $member->setId($memberId);
        $member->setName($name);
        $member->setProjectId($projectId);
        $member->setStatus($status);

        if ($file_name) {
            $image = $file_name;
        }
        $member->setImage($image);

        $updateSuccess = Member::update($member);

        $memberRow = Member::getOneById($memberId);

        $argsArray = array(
            'id' => $user['id'],
            'memberRow' => $memberRow,
            'edit' => 'edit',
            'message' => 'Thanks Members Details Has Been Changed'
        );

        $templateName = 'adminMemberEditWithInputFields';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to delete member page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminMemberDeleteAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];

        $members = Member::getAll();

        $argsArray = [
            'message' =>'please delete member',
            'id' => $user['id'],
            'members'=> $members,
            'delete'=>'delete'
        ];


        $templateName = 'adminMemberDelete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * passing id of the member picked and deleteing it
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function adminDeleteMemberAction(Request $request, Application $app, $id)
    {
        $user = $app['session']->get('user');
        $rank = $user['rank'];
        $userId =$user['id'];

        $app['session']->set('user', array('id'=>$userId, 'rank'=>$rank, 'memberPickedId' =>$id));

        $deleteSuccessfully = Member::delete($id);

        $members = Member::getAll();

        $argsArray = array(
            'id' => $user['id'],
            'members' => $members,
            'delete' => 'delete',
            'message' => ''
        );

        $templateName = 'adminMemberDelete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to create the student page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminStudentCreateAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');

        $argsArray = [
            'message' =>'please create a student',
            'id' => $user['id'],
        ];

        $templateName = 'adminStudentCreate';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * creating the student by reading data from text fields
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function createStudentAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $localId = $user['id'];

        $paramsPost = $request->request->all();
        $name = $paramsPost['name'];
        $projectId = $paramsPost['projectId'];
        $memberId = $paramsPost['memberId'];
        $status = $paramsPost['status'];

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $projectId = filter_var($projectId, FILTER_SANITIZE_STRING);
        $memberId = filter_var($memberId, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_STRING);

        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array('jpeg', 'jpg', 'png');

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 5000000) {
            $errors[] = 'File must be not bigger then 5 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
        }
        $image =  'default.jpg';

        $student = new Student();
        $student->setName($name);
        $student->setProjectId($projectId);
        $student->setMemberId($memberId);
        $student->setStatus($status);

        if ($file_name) {
            $image = $file_name;
        }
        $student->setImage($image);

        $updateSuccess = Student::insert($student);

        $argsArray = array(
            'message' => 'The student has been created successfully'
        );

        $templateName = 'adminStudentCreate';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to student edit page
     * @param Request $request
     * @param Application $app
     * @return mixed
     *
     */
    public function adminStudentEditAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];
        $students = Student::getAll();

        $argsArray = [
            'message' =>'please edit student',
            'id' => $user['id'],
            'students'=> $students,
            'edit'=>'edit'
        ];
        $templateName = 'adminStudentEdit';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * displaying the students details for editing
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function adminEditStudentAction(Request $request, Application $app, $id)
    {
        $user = $app['session']->get('user');
        $rank = $user['rank'];
        $userId =$user['id'];
        $app['session']->set('user', array('id'=>$userId, 'rank'=>$rank, 'studentPickedId' =>$id));
        $studentRow = Student::getOneById($id);

        $argsArray = array(
            'id' => $user['id'],
            'studentRow' => $studentRow,
            'edit' => 'edit',
            'message' => 'Please fill new details'
        );

        $templateName = 'adminStudentEditWithInputFields';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * changing student details by reading details from student fields
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function changeStudentDetailsAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $studentId = $user['studentPickedId'];

        $paramsPost = $request->request->all();
        $name = $paramsPost['name'];
        $projectId = $paramsPost['projectId'];
        $memberId = $paramsPost['memberId'];
        $status = $paramsPost['status'];

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $projectId = filter_var($projectId, FILTER_SANITIZE_STRING);
        $memberId = filter_var($memberId, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_STRING);

        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array('jpeg', 'jpg');

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG .";
        }
        if ($file_size > 5000000) {
            $errors[] = 'File must be not bigger then 5 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
        }

        $studentRow = Student::getOneById($studentId);
        $studentRowImage = $studentRow->getImage();

        $image =  $studentRowImage;

        $student = new Student();
        $student->setId($studentId);
        $student->setName($name);
        $student->setProjectId($projectId);
        $student->setMemberId($memberId);
        $student->setStatus($status);

        if ($file_name) {
            $image = $file_name;
        }
        $student->setImage($image);

        $updateSuccess = Student::update($student);
        $studentRow = Student::getOneById($studentId);

        $argsArray = array(
            'id' => $user['id'],
            'studentRow' => $studentRow,
            'edit' => 'edit',
            'message' => 'Thanks Student Details Has Been Changed'
        );

        $templateName = 'adminStudentEditWithInputFields';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to student delete page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminStudentDeleteAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];

        $students = Student::getAll();

        $argsArray = [
            'message' =>'please delete student',
            'id' => $user['id'],
            'students'=> $students,
            'delete'=>'delete'
        ];

        $templateName = 'adminStudentDelete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * deleting the student for specific id
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function adminDeleteStudentAction(Request $request, Application $app, $id)
    {
        $user = $app['session']->get('user');
        $rank = $user['rank'];
        $userId =$user['id'];

        $app['session']->set('user', array('id'=>$userId, 'rank'=>$rank, 'studentPickedId' =>$id));

        $deleteSuccessfully = Student::delete($id);

        $students = Student::getAll();

        $argsArray = array(
            'id' => $user['id'],
            'students' => $students,
            'delete' => 'delete',
            'message' => ''
        );

        $templateName = 'adminStudentDelete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to create the user page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminLoginCreateAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');

        $argsArray = [
            'message' =>'please create login',
            'id' => $user['id'],
        ];

        $templateName = 'adminLoginCreate';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * creating user
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function createLoginAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $localId = $user['id'];

        $paramsPost = $request->request->all();
        $rank = $paramsPost['rank'];
        $studentId = $paramsPost['studentId'];
        $memberId = $paramsPost['memberId'];
        $password = $paramsPost['password'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

        $rank = filter_var($rank, FILTER_SANITIZE_STRING);
        $studentId = filter_var($studentId, FILTER_SANITIZE_STRING);
        $memberId = filter_var($memberId, FILTER_SANITIZE_STRING);

        $login = new User();
        $login->setRank($rank);
        $login->setStudentId($studentId);
        $login->setMemberId($memberId);
        $login->setPassword($passwordHashed);

        $createSuccessfully = Student::insert($login);

        $argsArray = array(
            'message' => 'The login has been created successfully'
        );

        $templateName = 'adminLoginCreate';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * redirecting to user edit page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminLoginEditAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];

        $logins = User::getAll();

        $argsArray = [
            'message' =>'please edit login details',
            'id' => $user['id'],
            'logins'=> $logins,
            'edit'=>'edit'
        ];

        $templateName = 'adminLoginEdit';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * edit user with specific id
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function adminEditLoginAction(Request $request, Application $app, $id)
    {
        $user = $app['session']->get('user');
        $rank = $user['rank'];
        $userId =$user['id'];

        $app['session']->set('user', array('id'=>$userId, 'rank'=>$rank, 'loginPickedId' =>$id));

        $loginRow = User::getOneById($id);

        $argsArray = array(
            'id' => $user['id'],
            'loginRow' => $loginRow,
            'edit' => 'edit',
            'message' => 'Please fill new details'
        );

        $templateName = 'adminLoginEditWithInputFields';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * change login details
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function changeLoginDetailsAdminAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['loginPickedId'];

        $paramsPost = $request->request->all();
        $rank = $paramsPost['rank'];
        $studentId = $paramsPost['studentId'];
        $memberId = $paramsPost['memberId'];
        $password = $paramsPost['password'];

        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $rank = filter_var($rank, FILTER_SANITIZE_STRING);
        $studentId = filter_var($studentId, FILTER_SANITIZE_STRING);
        $memberId = filter_var($memberId, FILTER_SANITIZE_STRING);

        $login = new User();
        $login->setId($id);
        $login->setRank($rank);
        $login->setStudentId($studentId);
        $login->setMemberId($memberId);
        $login->setPassword($passwordHashed);

        $createSuccessfully = User::update($login);

        $loginRow = User::getOneById($id);

        $argsArray = array(
            'id' => $user['id'],
            'loginRow' => $loginRow,
            'edit' => 'edit',
            'message' => 'Thanks Login Details Has Been Changed'
        );

        $templateName = 'adminLoginEditWithInputFields';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * display all users for deleting
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminLoginDeleteAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];

        $logins = User::getAll();

        $argsArray = [
            'message' =>'please delete login row',
            'id' => $user['id'],
            'logins'=> $logins,
            'delete'=>'delete'
        ];

        $templateName = 'adminLoginDelete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * deleting specific user
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function adminDeleteLoginAction(Request $request, Application $app, $id)
    {
        $user = $app['session']->get('user');
        $rank = $user['rank'];
        $userId =$user['id'];

        $app['session']->set('user', array('id'=>$userId, 'rank'=>$rank, 'loginPickedId' =>$id));

        $deleteSuccessfully = User::delete($id);

        $logins = User::getAll();

        $argsArray = array(
            'id' => $user['id'],
            'logins' => $logins,
            'delete' => 'delete',
            'message' => ''
        );

        $templateName = 'adminLoginDelete';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
