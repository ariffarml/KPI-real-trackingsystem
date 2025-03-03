<?php

namespace app\models\Kpi_Insert;

/**
 * This is the ActiveQuery class for [[\app\models\AddActivity]].
 *
 * @see \app\models\AddActivity
 */
class AddActivityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\AddActivity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\AddActivity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
