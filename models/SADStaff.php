<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%K6SAD_staff}}".
 *
 * @property int $id
 * @property string $staff_name
 */
class SADStaff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%K6SAD_staff}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','staff_name'], 'required'],
            [['staff_name'], 'string', 'max' => 100],
            [['id'], 'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_name' => 'Staff Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SADStaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SADStaffQuery(get_called_class());
    }
}
