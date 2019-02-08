<?php

namespace app\models;

use app\models\tables\Users;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $email;
    public static $user;

/*     private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ]; */

   /*  public static $users; */




/*     public function setUsers() {
          self::$users = Users::find()->all();
        
    }

    public function getUsers() {           
          return self::$users;          
    } */

    public static function setUser($propertyName = null, $propertyValue =  null)
    {
        if (!isset(self::$user) && $propertyName != null && $propertyValue != null) {
            self::$user = Users::findOne([$propertyName=>$propertyValue]);
            return;
        }

    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        static::setUser('id', $id);
        return isset(static::$user) ? new static(static::$user) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
            static::setUser('accessToken', $token); 
            if (static::$user['accessToken'] === $token) {
                return new static(static::$user);
            }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
   
             /* $user = Users::findOne(['username'=>$username]);   */ 
            static::setUser('username', $username);   
            if (strcasecmp(static::$user['username'], $username) === 0) {
                return new static(static::$user);
            }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
