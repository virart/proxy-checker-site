<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * @property string $text_list
 * @property UploadedFile $file_list
 */

class ProxyList extends Model
{
    public $text_list;
    public $file_list;
    public $v4 = [];
    public $v6 = [];
    public $uncorrect = [];
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_list', 'file_list'], 'safe'],
            [['file_list'], 'file', 'skipOnEmpty' => true, 'maxSize' => 1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'text_list' => 'Список ip адресов (ip:port)',
            'file_list' => 'Список в файле (макс 1мб)'
        ];
    }

    public function parseFile()
    {
        if ($this->validate()) {
            $handle = fopen($this->file_list->tempName, 'r');
            while (($ip = fgets($handle, 50)) !== false) {
                $parsedIp = Proxy::parseIp($ip);
                if(Proxy::checkIp4($parsedIp['ip'])) {
                    $this->v4[] = $parsedIp;
                } elseif (Proxy::checkIp6($parsedIp['ip'])) {
                    $this->v6[] = $parsedIp;
                } else {
                    $this->uncorrect[] = $ip;
                }
            }
            fclose($handle);
            return true;
        } else {
            return false;
        }
    }
    
    public function parseList()
    {
        $list = explode("\n",$this->text_list);

        foreach ($list as $ip) {
            $parsedIp = Proxy::parseIp($ip);
            if(Proxy::checkIp4($parsedIp['ip'])) {
                $this->v4[] = $parsedIp;
            } elseif (Proxy::checkIp6($parsedIp['ip'])) {
                $this->v6[] = $parsedIp;
            } else {
                $this->uncorrect[] = $ip;
            }
        }
    }
}
