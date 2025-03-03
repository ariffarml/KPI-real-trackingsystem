<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AddSubActivity]].
 *
 * @see AddSubActivity
 */
class AddSubactivityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AddSubActivity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AddSubActivity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
