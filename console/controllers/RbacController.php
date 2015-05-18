<?php
namespace console\controllers;

use common\components\rbac\UserProfileOwnerRule;
use common\models\User;
use Yii;
use yii\console\Controller;
use common\components\rbac\UserRoleRule;

class RbacController extends Controller
{
    public function actionInit()
    {

        $auth = Yii::$app->authManager;

        $auth->removeAll(); //удаляем старые данные

        //Добавляем роли
        $user = $auth->createRole('user');
        $admin = $auth->createRole('admin');

        $dashboard = $auth->createPermission('dashboad');
        $updateOwnProfile = $auth->createPermission('updateOwnProfile');

        $auth->add($dashboard);

        //Включаем наш обработчик
        $rule = new UserRoleRule();
        $userProfileOwnerRule = new UserProfileOwnerRule();

        $auth->add($rule);
        $auth->add($userProfileOwnerRule);
        $user->ruleName = $rule->name;
        $admin->ruleName = $rule->name;
        $updateOwnProfile->ruleName = $userProfileOwnerRule->name;
        $auth->add($user);
        $auth->add($admin);
        $auth->add($updateOwnProfile);
        $auth->addChild($user, $updateOwnProfile);

        //Добавляем потомков
        $auth->addChild($admin, $user);
        $auth->addChild($admin, $dashboard);
    }
}