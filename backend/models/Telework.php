<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "telework".
 *
 * @property integer $id
 * @property string $LastName
 * @property string $FirstName
 * @property string $username
 * @property string $reason
 * @property string $start_date
 * @property string $end_date
 * @property integer $approved
 * @property integer $rejected
 */
class Telework extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'telework';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'LastName', 'username', 'start_date', 'end_date'], 'required'],
            [['id', 'approved', 'rejected'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['LastName', 'FirstName', 'username', 'reason'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'LastName' => 'Last Name',
            'FirstName' => 'First Name',
            'username' => 'Username',
            'reason' => 'Reason',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
        ];
    }
}
