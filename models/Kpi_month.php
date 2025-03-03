<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%K5_month}}".
 *
 * @property int $id
 * @property string $month
 */
class Kpi_month extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%K5_month}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'month'], 'required'],
            [['id'], 'integer'],
            [['month'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'month' => 'Month',
        ];
    }

    /**
     * {@inheritdoc}
     * @return Kpi_monthQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Kpi_monthQuery(get_called_class());
    }
}
