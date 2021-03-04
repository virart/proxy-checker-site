<?php

namespace app\jobs;

/**
 * Class CheckProxyJob.
 */
class CheckProxyJob extends \yii\base\BaseObject implements \yii\queue\RetryableJobInterface
{
    public $prop1;

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
    }

    /**
     * @inheritdoc
     */
    public function getTtr()
    {
        return 60;
    }

    /**
     * @inheritdoc
     */
    public function canRetry($attempt, $error)
    {
        return $attempt < 3;
    }
}
