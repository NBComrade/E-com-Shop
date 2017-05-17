<?php

namespace app\modules\admin\models;

use app\models\OrderItems;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property integer $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $created_at
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qty', 'sum', 'status', 'name', 'email', 'phone', 'address', 'created_at'], 'required'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qty' => 'Qty',
            'sum' => 'Sum',
            'status' => 'Status',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'created_at' => 'Created At',
        ];
    }
    public function getOrderItems(){
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
}
