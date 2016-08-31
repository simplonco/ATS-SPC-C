<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii;
use yii\base\Model;
use common\models\User;
use backend\models\UserEdit;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**use
 * Signup form
 */
class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $file;
    public $user_photo;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

          ['first_name', 'trim'],
          ['first_name', 'required'],
          //  ['first_name',  'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
          ['first_name', 'string', 'min' => 2, 'max' => 255],


          ['last_name', 'trim'],
          ['last_name', 'required'],
          //  ['first_name',  'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
          ['last_name', 'string', 'min' => 2, 'max' => 255],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['user_photo', 'trim'],
            ['user_photo', 'required'],

[['file'], 'file'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
      {
          return [
              'first_name' => 'Prénom',
              'last_name' => 'Company Name',
              'username' => 'Nom d utilisateur',
              'password' => 'Mot de passe',

          ];
      }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
       $user->first_name = $this->first_name;
       $user->last_name = $this->last_name;
        $user->username = $this->username;
        $user->user_photo = $this->user_photo;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
