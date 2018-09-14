<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // Роли (создание и сохранение)
        $admin  = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $auth->add($admin);

        $moder  = $auth->createRole('moder');
        $moder->description = 'Модератор';
        $auth->add($moder);

        $user   = $auth->createRole('user');
        $user->description = 'Пользователь';
        $auth->add($user);

        $unconf = $auth->createRole('unconf');
        $unconf->description = 'Неподтвержденный email';
        $auth->add($unconf);

        $guest  = $auth->createRole('guest');
        $guest->description = 'Гость';
        $auth->add($guest);

        // Связи Ролей (сохранение)
        $auth->addChild($admin, $moder);
        $auth->addChild($moder, $user);
        $auth->addChild($unconf, $user);

        // Разрешения без правил (создание)
        $signup = $auth->createPermission('signup');
        $signup->description = 'Регистрироваться';
        $signin = $auth->createPermission('signin');
        $signin->description = 'Логиниться';
        $requestPasswordRecovery = $auth->createPermission('requestPasswordRecovery');
        $requestPasswordRecovery->description = 'Отправлять ссылку для восстановления пароля';
        $requestEmailConfirmation = $auth->createPermission('requestEmailConfirmation');
        $requestEmailConfirmation->description = 'Отправлять ссылку на подтверждение email';
        $signout = $auth->createPermission('signout');
        $signout->description = 'Разлогиниться';
        $changePassword = $auth->createPermission('changePassword');
        $changePassword->description = 'Изменить пароль';
        $haveAccessAP = $auth->createPermission('haveAccessAP');
        $haveAccessAP->description = '';
        $createPublication = $auth->createPermission('createPublication');
        $createPublication->description = 'Создать публикацию';
        $updatePublication = $auth->createPermission('updatePublication');
        $updatePublication->description = 'Редактировать публикацию';
        $deletePublication = $auth->createPermission('deletePublication');
        $deletePublication->description = 'Удалить публикацию';
        $createPortfolio = $auth->createPermission('createPortfolio');
        $createPortfolio->description = 'Создать портфолио';
        $updatePortfolio = $auth->createPermission('updatePortfolio');
        $updatePortfolio->description = 'Редактировать портфолио';
        $deletePortfolio = $auth->createPermission('deletePortfolio');
        $deletePortfolio->description = 'Удалить портфолио';
        $createFile = $auth->createPermission('createFile');
        $createFile->description = 'Добавить файл';
        $deleteFile = $auth->createPermission('deleteFile');
        $deleteFile->description = 'Удалить файл';
        $createComment = $auth->createPermission('createComment');
        $createComment->description = 'Добавить комментарий';
        $updateComment = $auth->createPermission('updateComment');
        $updateComment->description = 'Удалить комментарий';
        $deleteComment = $auth->createPermission('deleteComment');
        $deleteComment->description = 'Редактировать комментарий';

        // Правила (создание, сохранение)
        $ownComment = new \common\rbac\OwnComment;
        $auth->add($ownComment);
        $ownPublication = new \common\rbac\OwnPublication;
        $auth->add($ownPublication);
        $ownPortfolio = new \common\rbac\OwnPortfolio;
        $auth->add($ownPortfolio);
        $ownFile = new \common\rbac\OwnFile;
        $auth->add($ownFile);

        // Разрешения с Правилами (создание)
        $createOwnComment = $auth->createPermission('createOwnComment');
        $createOwnComment->description = 'Добавлять свои комментарии';
        $createOwnComment->ruleName = $ownComment->name;
        $updateOwnComment = $auth->createPermission('updateOwnComment');
        $updateOwnComment->description = 'Редактировать свои комментарии';
        $updateOwnComment->ruleName = $ownComment->name;
        $deleteOwnComment = $auth->createPermission('deleteOwnComment');
        $deleteOwnComment->description = 'Удалять свои комментарии';
        $deleteOwnComment->ruleName = $ownComment->name;
        $createOwnPublication = $auth->createPermission('createOwnPublication');
        $createOwnPublication->description = 'Создать свою публикацию';
        $createOwnPublication->ruleName = $ownPublication->name;
        $updateOwnPublication = $auth->createPermission('updateOwnPublication');
        $updateOwnPublication->description = 'Редактировать свою публикацию';
        $updateOwnPublication->ruleName = $ownPublication->name;
        $deleteOwnPublication = $auth->createPermission('deleteOwnPublication');
        $deleteOwnPublication->description = 'Удалить свою публикацию';
        $deleteOwnPublication->ruleName = $ownPublication->name;
        $createOwnPortfolio = $auth->createPermission('createOwnPortfolio');
        $createOwnPortfolio->description = 'Создать своё портфолио';
        $createOwnPortfolio->ruleName = $ownPortfolio->name;
        $updateOwnPortfolio = $auth->createPermission('updateOwnPortfolio');
        $updateOwnPortfolio->description = 'Редактировать своё портфолио';
        $updateOwnPortfolio->ruleName = $ownPortfolio->name;
        $deleteOwnPortfolio = $auth->createPermission('deleteOwnPortfolio');
        $deleteOwnPortfolio->description = 'Удалить своё портфолио';
        $deleteOwnPortfolio->ruleName = $ownPortfolio->name;
        $createOwnFile = $auth->createPermission('createOwnFile');
        $createOwnFile->description = 'Добавить свой файл';
        $createOwnFile->ruleName = $ownFile->name;
        $deleteOwnFile = $auth->createPermission('deleteOwnFile');
        $deleteOwnFile->description = 'Удалить свой файл';
        $deleteOwnFile->ruleName = $ownFile->name;

        // Сохранение Разрешений
        $auth->add($signup);
        $auth->add($signin);
        $auth->add($requestPasswordRecovery);
        $auth->add($requestEmailConfirmation);
        $auth->add($signout);
        $auth->add($changePassword);
        $auth->add($haveAccessAP);
        $auth->add($createPublication);
        $auth->add($updatePublication);
        $auth->add($deletePublication);
        $auth->add($createPortfolio);
        $auth->add($updatePortfolio);
        $auth->add($deletePortfolio);
        $auth->add($createFile);
        $auth->add($deleteFile);
        $auth->add($createComment);
        $auth->add($updateComment);
        $auth->add($deleteComment);
        $auth->add($createOwnComment);
        $auth->add($updateOwnComment);
        $auth->add($deleteOwnComment);
        $auth->add($createOwnPublication);
        $auth->add($updateOwnPublication);
        $auth->add($deleteOwnPublication);
        $auth->add($createOwnPortfolio);
        $auth->add($updateOwnPortfolio);
        $auth->add($deleteOwnPortfolio);
        $auth->add($createOwnFile);
        $auth->add($deleteOwnFile);

        // Связи Разрешений
        $auth->addChild($createOwnComment, $createComment);
        $auth->addChild($updateOwnComment, $updateComment);
        $auth->addChild($deleteOwnComment, $deleteComment);
        $auth->addChild($createOwnPublication, $createPublication);
        $auth->addChild($updateOwnPublication, $updatePublication);
        $auth->addChild($deleteOwnPublication, $deletePublication);
        $auth->addChild($createOwnPortfolio, $createPortfolio);
        $auth->addChild($updateOwnPortfolio, $updatePortfolio);
        $auth->addChild($deleteOwnPortfolio, $deletePortfolio);
        $auth->addChild($createOwnFile, $createFile);
        $auth->addChild($deleteOwnFile, $deleteFile);

        // Назначение Ролям Разрешений
        $auth->addChild($guest, $signup);
        $auth->addChild($guest, $signin);
        $auth->addChild($guest, $requestPasswordRecovery);
        $auth->addChild($unconf, $requestEmailConfirmation);
        $auth->addChild($user, $signout);
        $auth->addChild($user, $changePassword);
        $auth->addChild($user, $createOwnComment);
        $auth->addChild($user, $updateOwnComment);
        $auth->addChild($user, $deleteOwnComment);
        $auth->addChild($moder, $haveAccessAP);
        $auth->addChild($moder, $createOwnPublication);
        $auth->addChild($moder, $updateOwnPublication);
        $auth->addChild($moder, $deleteOwnPublication);
        $auth->addChild($moder, $createOwnPortfolio);
        $auth->addChild($moder, $updateOwnPortfolio);
        $auth->addChild($moder, $deleteOwnPortfolio);
        $auth->addChild($moder, $createOwnFile);
        $auth->addChild($moder, $deleteOwnFile);
        $auth->addChild($admin, $createPublication);
        $auth->addChild($admin, $updatePublication);
        $auth->addChild($admin, $deletePublication);
        $auth->addChild($admin, $createPortfolio);
        $auth->addChild($admin, $updatePortfolio);
        $auth->addChild($admin, $deletePortfolio);
        $auth->addChild($admin, $createFile);
        $auth->addChild($admin, $deleteFile);
        $auth->addChild($admin, $createComment);
        $auth->addChild($admin, $updateComment);
        $auth->addChild($admin, $deleteComment);
    }

    public function actionAdmin()
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole('admin');
        $auth->assign($role, 1);
    }

    public function actionTest()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAllAssignments();
        $role = $auth->getRole('admin');
        $role = $auth->getRole('moder');
        // $role = $auth->getRole('user');
        // $role = $auth->getRole('unconf');
        // $role = $auth->getRole('guest');
        $auth->assign($role, 1);

        $pub = new \common\models\Pub;
        var_dump($auth->checkAccess(1, 'deletePublication', ['pub' => $pub]));
        // var_dump($auth->checkAccess(1, 'deleteOwnPublication', ['pub' => $pub]));
    }
}
