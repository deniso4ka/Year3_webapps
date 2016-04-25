<?php

// ------------
require_once __DIR__ . '/../app/configDataBase.php';
require_once __DIR__ . '/../app/setup.php';



$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

use Itb\Utility\UtilityClass;

//-----------------------------Display info for not logged in visitors---------------------------------------------
$app->get('/', UtilityClass::controller('Itb\Controller', 'main/home'));
$app->get('/home', UtilityClass::controller('Itb\Controller', 'main/home'));
$app->get('/groups', UtilityClass::controller('Itb\Controller', 'group/groups'));
$app->get('/projects', UtilityClass::controller('Itb\Controller', 'project/projects'));
$app->get('/members', UtilityClass::controller('Itb\Controller', 'member/members'));
$app->get('/pastWork', UtilityClass::controller('Itb\Controller', 'main/pastWork'));
$app->get('/publications', UtilityClass::controller('Itb\Controller', 'publication/publications'));

//-----------------------------Call specific member or project---------------------------------------------
$app->get('/detailMem/{id}', UtilityClass::controller('Itb\Controller', 'main/detailMem'));
$app->get('/detailStud/{id}', UtilityClass::controller('Itb\Controller', 'main/detailStud'));

$app->get('/detailProject/{id}', UtilityClass::controller('Itb\Controller', 'main/detailProject'));

//-----------------------------Login actions---------------------------------------------
$app->post('/processForm', UtilityClass::controller('Itb\Controller', 'user/login'));
$app->get('/loginSuccessAdmin', UtilityClass::controller('Itb\Controller', 'user/loginSuccessAdmin'));
$app->get('/loginSuccessStud', UtilityClass::controller('Itb\Controller', 'user/loginSuccessStudent'));
$app->get('/loginSuccessSuper', UtilityClass::controller('Itb\Controller', 'user/loginSuccessSupervisor'));

//-----------------------------Student profile change---------------------------------------------
$app->get('/studentInfoChange', UtilityClass::controller('Itb\Controller', 'student/studentInfoChange'));
$app->get('/studentPicChange', UtilityClass::controller('Itb\Controller', 'student/studentPicChange'));
$app->post('/changeStudentDetails', UtilityClass::controller('Itb\Controller', 'student/changeStudentDetails'));
$app->post('/changePicture', UtilityClass::controller('Itb\Controller', 'student/changePicture'));

//-----------------------------Member (supervisor) actions---------------------------------------------
$app->get('/memberProjectPicChange', UtilityClass::controller('Itb\Controller', 'member/memberProjectPicChange'));
$app->get('/memberPicChange', UtilityClass::controller('Itb\Controller', 'member/memberPicChange'));
$app->get('/memberInfoChange', UtilityClass::controller('Itb\Controller', 'member/memberInfoChange'));
$app->get('/memberProjectCrud', UtilityClass::controller('Itb\Controller', 'member/memberProjectCrud'));
$app->post('/changeMemberDetails', UtilityClass::controller('Itb\Controller', 'member/changeMemberDetails'));
$app->post('/changeMemberPicture', UtilityClass::controller('Itb\Controller', 'member/changeMemberPicture'));
$app->get('/memberProjectPicChange', UtilityClass::controller('Itb\Controller', 'member/memberProjectPicChange'));
$app->post('/changeMemberProjectPicture', UtilityClass::controller('Itb\Controller', 'member/changeMemberProjectPicture'));
$app->get('/memberPublicationDelete', UtilityClass::controller('Itb\Controller', 'member/memberPublicationDelete'));
$app->get('/memberDeletePublic/{id}', UtilityClass::controller('Itb\Controller', 'member/memberDeletePublic'));
$app->get('/memberEditPublication', UtilityClass::controller('Itb\Controller', 'member/memberEditPublication'));
$app->get('/memberEditPublic/{id}', UtilityClass::controller('Itb\Controller', 'member/memberEditPublic'));
$app->get('/memberCreatePublic', UtilityClass::controller('Itb\Controller', 'member/memberCreatePublic'));
$app->post('/changePublicationDetails', UtilityClass::controller('Itb\Controller', 'member/changePublicationDetails'));
$app->get('/memberCreatePublication', UtilityClass::controller('Itb\Controller', 'publication/memberCreatePublication'));
$app->post('/createPublication', UtilityClass::controller('Itb\Controller', 'publication/createPublication'));
$app->get('/memberProjectDelete', UtilityClass::controller('Itb\Controller', 'project/memberProjectDelete'));
$app->get('/memberProjectEdit', UtilityClass::controller('Itb\Controller', 'project/memberProjectEdit'));
$app->get('/memberProjectCreate', UtilityClass::controller('Itb\Controller', 'project/memberProjectCreate'));
$app->post('/createProject', UtilityClass::controller('Itb\Controller', 'project/createProject'));
$app->get('/memberEditProject/{id}', UtilityClass::controller('Itb\Controller', 'project/memberEditProject'));
$app->post('/changeProjectDetails', UtilityClass::controller('Itb\Controller', 'project/changeProjectDetails'));
$app->get('/memberProjectDelete', UtilityClass::controller('Itb\Controller', 'project/memberProjectDelete'));
$app->get('/memberDeleteProject/{id}', UtilityClass::controller('Itb\Controller', 'project/memberDeleteProject'));

//-----------------------------Admin (administrator) actions---------------------------------------------
$app->get('/adminInfoChange', UtilityClass::controller('Itb\Controller', 'admin/adminInfoChange'));
$app->post('/changeAdminDetails', UtilityClass::controller('Itb\Controller', 'admin/changeAdminDetails'));
$app->get('/adminProjectCreate', UtilityClass::controller('Itb\Controller', 'project/adminProjectCreate'));
$app->post('/createProjectAdmin', UtilityClass::controller('Itb\Controller', 'project/createProjectAdmin'));
$app->get('/adminProjectEdit', UtilityClass::controller('Itb\Controller', 'project/adminProjectEdit'));
$app->get('/adminEditProject/{id}', UtilityClass::controller('Itb\Controller', 'project/adminEditProject'));
$app->post('/changeProjectDetailsAdmin', UtilityClass::controller('Itb\Controller', 'project/changeProjectDetailsAdmin'));
$app->get('/adminProjectDelete', UtilityClass::controller('Itb\Controller', 'project/adminProjectDelete'));
$app->get('/adminDeleteProject/{id}', UtilityClass::controller('Itb\Controller', 'project/adminDeleteProject'));
$app->get('/adminMemberCreate', UtilityClass::controller('Itb\Controller', 'admin/adminMemberCreate'));
$app->post('/createMemberAdmin', UtilityClass::controller('Itb\Controller', 'admin/createMemberAdmin'));
$app->get('/adminMemberEdit', UtilityClass::controller('Itb\Controller', 'admin/adminMemberEdit'));
$app->get('/adminEditMember/{id}', UtilityClass::controller('Itb\Controller', 'admin/adminEditMember'));
$app->post('/changeMemberDetailsAdmin', UtilityClass::controller('Itb\Controller', 'admin/changeMemberDetailsAdmin'));
$app->get('/adminMemberDelete', UtilityClass::controller('Itb\Controller', 'admin/adminMemberDelete'));
$app->get('/adminDeleteMember/{id}', UtilityClass::controller('Itb\Controller', 'admin/adminDeleteMember'));
$app->get('/adminStudentCreate', UtilityClass::controller('Itb\Controller', 'admin/adminStudentCreate'));
$app->post('/createStudentAdmin', UtilityClass::controller('Itb\Controller', 'admin/createStudentAdmin'));
$app->get('/adminStudentEdit', UtilityClass::controller('Itb\Controller', 'admin/adminStudentEdit'));
$app->get('/adminEditStudent/{id}', UtilityClass::controller('Itb\Controller', 'admin/adminEditStudent'));
$app->post('/changeStudentDetailsAdmin', UtilityClass::controller('Itb\Controller', 'admin/changeStudentDetailsAdmin'));
$app->get('/adminStudentDelete', UtilityClass::controller('Itb\Controller', 'admin/adminStudentDelete'));
$app->get('/adminDeleteStudent/{id}', UtilityClass::controller('Itb\Controller', 'admin/adminDeleteStudent'));
$app->get('/adminPublicationCreate', UtilityClass::controller('Itb\Controller', 'publication/adminPublicationCreate'));
$app->post('/adminCreatePublication', UtilityClass::controller('Itb\Controller', 'publication/adminCreatePublication'));
$app->get('/adminPublicationEdit', UtilityClass::controller('Itb\Controller', 'publication/adminPublicationEdit'));
$app->get('/adminEditPublic/{id}', UtilityClass::controller('Itb\Controller', 'publication/adminEditPublic'));
$app->post('/adminChangePublicationDetails', UtilityClass::controller('Itb\Controller', 'publication/adminChangePublicationDetails'));
$app->get('/adminPublicationDelete', UtilityClass::controller('Itb\Controller', 'publication/adminPublicationDelete'));
$app->get('/adminDeletePublic/{id}', UtilityClass::controller('Itb\Controller', 'publication/adminDeletePublic'));
$app->get('/adminLoginCreate', UtilityClass::controller('Itb\Controller', 'admin/adminLoginCreate'));
$app->post('/createLoginAdmin', UtilityClass::controller('Itb\Controller', 'admin/createLoginAdmin'));
$app->get('/adminLoginEdit', UtilityClass::controller('Itb\Controller', 'admin/adminLoginEdit'));
$app->get('/adminEditLogin/{id}', UtilityClass::controller('Itb\Controller', 'admin/adminEditLogin'));
$app->post('/changeLoginDetailsAdmin', UtilityClass::controller('Itb\Controller', 'admin/changeLoginDetailsAdmin'));
$app->get('/adminLoginDelete', UtilityClass::controller('Itb\Controller', 'admin/adminLoginDelete'));
$app->get('/adminDeleteLogin/{id}', UtilityClass::controller('Itb\Controller', 'admin/adminDeleteLogin'));
$app->get('/adminDeleteLogin', UtilityClass::controller('Itb\Controller', 'admin/adminDeleteLogin'));
//-----------------------------logout actions---------------------------------------------
$app->get('/logout', UtilityClass::controller('Itb\Controller', 'user/logout'));



// 404 - Page not found
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = 'The requested page not be found.';
            return \Itb\Controller\MainController::error404($app, $message);

        default:
            $message = 'We are sorry,something went wrong.';
            return \Itb\Controller\MainController::error404($app, $message);
    }
});

// run Silex front controller
// ------------
$app->run();
