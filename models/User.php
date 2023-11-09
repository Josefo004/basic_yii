<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
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
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
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
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
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

// namespace app\models;

// use Yii;
// use yii\base\NotSupportedException;
// use yii\behaviors\TimestampBehavior;
// use yii\db\ActiveRecord;
// use yii\web\IdentityInterface;

// class User extends ActiveRecord implements \yii\web\IdentityInterface {

//     const STATUS_DELETED = 0;
//     const STATUS_INACTIVE = 9;
//     const STATUS_ACTIVE = 10;

//     public static function tableName() {
//         return '{{%user}}';
//     }

//     public function behaviors() {
//         // return [
//         //     TimestampBehavior::className(),
//         // ];
//     }

//     public function rules() {
//         return [
//             ['status', 'default', 'value' => self::STATUS_INACTIVE],
//             ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
//         ];
//     }

//     public static function findIdentity($id) {
//         return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
//     }

//     public static function findIdentityByAccessToken($token, $type = null) {
//         throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
//     }

//     public static function findByUsername($username) {
//         return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
//     }

//     public static function findByPasswordResetToken($token) {
//         if (!static::isPasswordResetTokenValid($token)) {
//             return null;
//         }

//         return static::findOne([
//                     'password_reset_token' => $token,
//                     'status' => self::STATUS_ACTIVE,
//         ]);
//     }

//     public static function findByVerificationToken($token) {
//         return static::findOne([
//                     'verification_token' => $token,
//                     'status' => self::STATUS_INACTIVE
//         ]);
//     }

//     public static function isPasswordResetTokenValid($token) {
//         if (empty($token)) {
//             return false;
//         }

//         $timestamp = (int) substr($token, strrpos($token, '_') + 1);
//         $expire = Yii::$app->params['user.passwordResetTokenExpire'];
//         return $timestamp + $expire >= time();
//     }

//     public function getId() {
//         return $this->getPrimaryKey();
//     }

//     public function getAuthKey() {
//         return $this->auth_key;
//     }

//     public function validateAuthKey($authKey) {
//         return $this->getAuthKey() === $authKey;
//     }

//     public function validatePassword($password) {
//         return Yii::$app->security->validatePassword($password, $this->password_hash);
//     }

//     public function setPassword($password) {
//         $this->password_hash = Yii::$app->security->generatePasswordHash($password);
//     }

//     public function generateAuthKey() {
//         $this->auth_key = Yii::$app->security->generateRandomString();
//     }

//     public function generatePasswordResetToken() {
//         $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
//     }

//     public function generateEmailVerificationToken() {
//         $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
//     }

//     public function removePasswordResetToken() {
//         $this->password_reset_token = null;
//     }

// }