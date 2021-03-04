<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proxy".
 *
 * @property int $id
 * @property resource|null $ip_v4
 * @property resource|null $ip_v6
 * @property int|null $port
 * @property string|null $updated_at
 * @property string|null $real_ip
 * @property int|null $latency
 * @property int|null $status
 * @property string|null $type
 * @property string|null $country_code
 * @property string|null $city_name
 */
class Proxy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proxy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['port', 'latency', 'status'], 'integer'],
            [['updated_at'], 'safe'],
            [['ip_v4'], 'string', 'max' => 4],
            [['ip_v6'], 'string', 'max' => 16],
            [['real_ip'], 'string', 'max' => 32],
            [['type'], 'string', 'max' => 12],
            [['country_code'], 'string', 'max' => 2],
            [['city_name'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip_v4' => 'Ip V4',
            'ip_v6' => 'Ip V6',
            'port' => 'Port',
            'updated_at' => 'Updated At',
            'real_ip' => 'Real Ip',
            'latency' => 'Latency',
            'status' => 'Status',
            'type' => 'Type',
            'country_code' => 'Country Code',
            'city_name' => 'City Name',
        ];
    }

    public static function parseIp($ip) {
        $splited = preg_split('/(?<!:):(?!:)/m', trim($ip));
        return [
            'ip' => $splited[0],
            'port' => isset($splited[1]) ? $splited[1]: ''
        ];
    }

    public static function checkIp4($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    public static function checkIp6($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
}
