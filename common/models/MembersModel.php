<?php
namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * 用户基础模型
 * @property integer $uid
 * @property string $username
 * @property string $password
 * @property integer $groupId
 * @property string $email
 * @property string $mobile
 * @property string $qq
 * @property float $account
 * @property integer $datetime
 * @property integer $login_time
 */
class MembersModel extends Model implements IdentityInterface
{
    public $auth_key;

    private $user;

    public $tn;

    public $captcha;

    /**
     * 用户表
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%members}}';
    }

    /**
     * 用户表规则
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'captcha'], 'required', 'message'=>'{attribute}不能为空'],
            [['username', 'password', 'email', 'captcha'], 'string'],
            [['username', 'password', 'email', 'captcha'], 'trim'],
            [['username'], 'string', 'length'=>[4, 20], 'message'=>'用户名长度为4~20个字符'],
            [['password'], 'string', 'length'=>[6, 20], 'message'=>'密码长度为6~20个字符'],
            [['username'], 'unique', 'message'=>'用户名已经被占用'],
            ['email', 'email', 'message'=>'请输入有效的邮箱地址'],
            ['captcha', 'captcha', 'message'=>'验证码错误']
        ];
    }

    /**
     * 设置场景控制
     * @author pawn
     * @return array
     * @date 2017年11月27日16:40:32
     */
    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            'login' => ['username', 'password'],
        ]);
    }

    /**
     * 加密密码
     * @author pawn
     * @param bool $insert
     * @return bool
     * @date 2017年11月27日19:17:35
     */
    public function beforeSave($insert)
    {
        $this->setPassword($this->password);
        $this->login_time = time();
        return parent::beforeSave($insert);
    }

    /**
     * 用户表标签
     * @author pawn
     * @return array
     * @date 2017年5月28日23:19:23
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'email' => '邮箱',
            'captcha' => '验证码'
        ];
    }

    /**
     * 登录
     * @author pawn
     * @return bool
     * @date 2017年5月28日18:12:35
     */
    public function login()
    {
        //获取用户信息
        $user = $this->getUser();
        if ($user && $this->validatePassword($user->password)) {
            return Yii::$app->user->login(new static($user), 3600 * 24 * 30);
        }
        $this->addError('password', '用户名或者密码错误,请检查');
        return false;
    }

    /**
     * 校验密码
     * @author pawn
     * @param $password
     * @return bool
     * @date 2017年5月28日18:44:49
     */
    public function validatePassword($password)
    {
        if (Yii::$app->security->validatePassword($this->password, $password)) {
            return true;
        }
        $this->addError('password', '用户名或密码错误,请重新输入');
        return false;
    }

    /**
     * 获取用户信息
     * @author pawn
     * @return Members|null
     * @date 2017年5月28日18:35:17
     */
    public function getUser()
    {
        if ($this->user===null) {
            return self::findByUsername($this->username);
        }
        return $this->user;
    }

    /**
     * 获取用户的信息
     * @inheritdoc
     */
    public static function findIdentity($uid)
    {
        return static::find()->select(['uid', 'username', 'group_id'])->where(['uid'=>$uid])->one();
    }

    /**
     * 根据用户名查询用户信息
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * 获取用户ID
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * 设置密码
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * 未使用 仅为实现接口
     * @inheritdoc
     */
    public function getAuthKey()
    {
    }

    /**
     * 未使用 仅为实现接口
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
    }

    /**
     * 未使用 仅为实现接口
     * @author pawn
     * @param mixed $token
     * @param null $type
     * @return null
     * @date 2017年5月28日23:13:50
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
}
