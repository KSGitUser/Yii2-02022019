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
    public $created_at;
    public $updated_at;


    


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user =  Users::findOne(['id'=>$id]);
        return isset($user) ? new static($user) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
             $user =  Users::findOne(['accessToken'=>$token]); 
            if ($user['accessToken'] === $token) {
                return new static($user);
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
   
        $user =  Users::findOne(['username'=>$username]);
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
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
