<?php
namespace app\models;
use Yii;
use yii\base\Model;
class AddBookForm extends Model {
    public $name;
    public $author;
    public $time;
    public function rules(){
        return [
            [['name', 'author', 'time'], 'required']
        ];
    }
}
?>