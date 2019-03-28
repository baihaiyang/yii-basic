<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Book;
use app\models\AddBookForm;
use app\models\UpdateBookForm;
use yii\data\ActiveDataProvider;

class BookController extends Controller
{
    public function actionIndex()
    {
        // $query = Book::find();

        // $pagination = new Pagination([
        //     'defaultPageSize' => 3,
        //     'totalCount' => $query->count(),
        // ]);

        // $books = $query->orderBy('id')
        //     ->offset($pagination->offset)
        //     ->limit($pagination->limit)
        //     ->all();
            

        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionAdd(){
        $model = new AddBookForm;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $book = new Book();
            $book->name = $model->name;
            $book->author = $model->author;
            $book->time = $model->time;
            $book->save();
            return $this->redirect('index.php');
        }else{
            return $this->render('addBook', ['model' => $model]);
        }
    }
    public function actionUpdate($id){
        $book = Book::findOne($id);
        $model = new UpdateBookForm;
        if($model->load(Yii::$app->request->post())){
            $book->name = $model->name;
            $book->author = $model->author;
            $book->time = $model->time;
            $book->save();
            return $this->redirect('index.php');
        }else{
            $model->name = $book->name;
            $model->author = $book->author;
            $model->time = $book->time;
            return $this->render('updateBook',['model' => $model]);
        };
    }
    public function actionDelete($id){
        $book = Book::findOne($id);
        $book->delete();
        return $this->redirect('index.php');
    }
}