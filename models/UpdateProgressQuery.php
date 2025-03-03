 <?php
namespace app\models;

/**
 * This is the ActiveQuery class for [[UpdateProgress]].
 *
 * @see UpdateProgress
 */
class UpdateProgressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UpdateProgress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UpdateProgress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}