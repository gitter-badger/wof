<?php

namespace common\models\mongo;

use yii\mongodb\ActiveRecord;

class Match extends ActiveRecord {

    public static function collectionName()
    {
        return 'matches';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return ['_id', 'title'];
    }


}