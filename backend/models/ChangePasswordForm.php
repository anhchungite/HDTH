<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\User;
class ChangePasswordForm extends Model {

    public $password;
    public $new_password;
    public $confirm_password;

    public function rules(){
        return [
            [['password', 'new_password', 'confirm_password'], 'required'],
            ['password', 'validatePassword'],
            [['password', 'new_password', 'confirm_password'], 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'Current Password'),
        ];
    }
    public function validatePassword(){
        /* @var $user User */
        $user = Yii::$app->user->identity;
        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError('password', Yii::t('error', 'Incorrect old password.'));
        }
    }
    /**
     * Change password.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function change(){
        if ($this->validate()) {
            /* @var $user User */
            $user = Yii::$app->user->identity;
            $user->setPassword($this->new_password);
            $user->generateAuthKey();
            if ($user->save()) {
                return true;
            }
        }
        return false;
    }
}