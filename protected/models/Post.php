<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property string $id
 * @property string $user_id
 * @property string $create_date
 * @property string $city_id
 * @property string $category_id
 * @property string $target_id
 * @property string $header
 * @property string $text
 * @property integer $active
 * @property integer $abused
 * @property integer $age
 * @property string $activationCode
 * @property string $editCode
 * 
 * The followings are the available model relations:
 * @property City $city
 * @property User $user
 * @property Category $category
 * @property Target $target
 */
class Post extends CActiveRecord
{
        public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}
        
        public function beforeSave()
        {
             $this->generateActivationLink();
             $this->generateEditLink();
            return parent::beforeSave();
        }

        public function generateActivationLink()
        {
            if($this->isNewRecord)
            {
                $this->activationCode = Utilites::activation_link();
            }
        }
        
        public function generateEditLink()
        {
            if($this->isNewRecord)
            {
                $this->editCode = Utilites::activation_link();
            }
        }
        
        public function afterSave()
        {
            parent::afterSave();
            if($this->isNewRecord)
            {

                Mailer::sendActivationLink($this);
            }
        }

        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, city_id, category_id, target_id, header, text, active, abused, age', 'required','message'=>'Поле {attribute} должно быть заполенено'),
			array('active, abused, age', 'numerical', 'integerOnly'=>true),
			array('user_id, city_id, category_id, target_id', 'length', 'max'=>10),
			array('header', 'length', 'max'=>80, 'message'=>'Поле {attribute} слишком длинное (максимум 80 символов)', 'tooLong'=>'Поле {attribute} слишком длинное (максимум 80 символов)'),
			array('text', 'length', 'max'=>2000, 'message'=>'Поле {attribute} слишком длинное (максимум 2000 символов)', 'tooLong'=>'Поле {attribute} слишком длинное (максимум 2000 символов)'),
			// авторизованным пользователям код можно не вводить
			//array('verifyCode','captcha','allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, create_date, city_id, category_id, target_id, header, text, active, abused, age', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'target' => array(self::BELONGS_TO, 'Target', 'target_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'Ваша почта',
			'create_date' => 'Дата создания',
			'city_id' => 'Город',
			'category_id' => 'Цель',
			'target_id' => 'Кто кого ищет',
			'header' => 'Заголовок',
			'text' => 'Ваше сообщение',
			'active' => 'Активно',
			'abused' => 'Есть жалобы',
			'age' => 'Ваш возраст',
			'verifyCode' => 'Введите символы с картинки',
			'header' => 'Заголовок',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('target_id',$this->target_id,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('abused',$this->abused);
		$criteria->compare('age',$this->age);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function activate()
        {
            $this->active = 1;
            $this->save();
            $this->activationCode = NULL;
            $this->save();
        }
        
        public function filterCity($city = 0)
        {
            if($city != 0)
            {
                $this->getDbCriteria()->addCondition('city_id = '.$city);
            }
            return $this;
        }
        public function filterCategory($category = 0)
        {
            if($category != 0)
            {
                $this->getDbCriteria()->addCondition('category_id = '.$category);
            }
            return $this;
        }
        public function filterTarget($target = 0)
        {
            if($target != 0)
            {
                $this->getDbCriteria()->addCondition('target_id = '.$target);
            }
            return $this;
        }
        
        public function pagination($offset = 0, $limit = 50)
        {
             $this->getDbCriteria()->mergeWith(array(
            'offset'=>$offset,
            'limit'=>$limit,));
            return $this;
        }
        
        public function filterAge($minAge = 18, $maxAge = 99)
        {
            if ($minAge < 18) 
            {
            $minAge = 18;
            }
            if ($maxAge > 99) 
            {
                $maxAge = 99;
            }
            $this->getDbCriteria()->addBetweenCondition('age',$minAge,$maxAge);
            return $this;
        }
        
        public function orderByDate()
        {
            $this->getDbCriteria()->order = 'create_date DESC';
            return $this;
        }
        
        public static function getNextMessages($city,$category,$target,$minAge,$maxAge,$offset,$limit)
        {
            $allPosts = Post::model()->filterCity($city)->filterCategory($category)->filterTarget($target)->filterAge($minAge,$maxAge)->activated()->pagination($offset,$limit)->orderByDate()->findAll();
						return $allPosts;
        }
				
        public static function getDataProvider($city,$category,$target,$minAge,$maxAge,$pagesSize)
        {
           
            return new CActiveDataProvider('Post', array(
                    'criteria'=> Post::model()->filterCity($city)->
                                                filterCategory($category)->
                                                filterTarget($target)->
                                                activated()->
                                                filterAge($minAge,$maxAge)->
                                                orderByDate()->getDBCriteria(),
                    'pagination'=>array(
                        'pageSize'=>$pagesSize,
                    ),
            ));
        }
        
    public function scopes()
    {
        return array(
            'activated'=>array(
                'condition'=>'active=1',
            ),
        );
    }
}
