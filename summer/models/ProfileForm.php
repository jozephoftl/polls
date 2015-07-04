<?php
namespace app\models;

use Yii;
use yii\base\Model;

class ProfileForm extends Model
{
    public $email;
    public $password;

    protected $user;

    public function init()
    {
        parent::init();

        $this->user = User::findOne(Yii::$app->user->identity->id);
        $this->email = $this->user->email;
    }

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'trim'],
            ['password', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль'
        ];
    }

    public function updateProfile()
    {
        if ($this->validate()) {
            $this->user->email = $this->email;
            
            if ($this->password !== '' && $this->password !== null) {
                $this->user->setPassword($this->password);
            }

            $this->user->generateAuthKey();

            return $this->user->save();
        } else {
            return false;
        }
    }
}
