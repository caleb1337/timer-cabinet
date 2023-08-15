<?php
/** @var View $this */
/**  $dataProvider from User Model */
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Claim;
use yii\grid\ActionColumn;
use yii\helpers\Url;

?>
    <h1>Справочник заявок</h1>


<?php
echo Html::a('Создать заявку', ['add'], ['class' => 'btn btn-success']);
?>
<?php Pjax::begin() ?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
        'claim_id',
        ['attribute' => 'org_name' ,'content' => function($data){
            return $data->organization->organization_name;
        }],
        ['attribute' => 'resp_manager' ,'content' => function($data){
            return $data->manager->getFullName();
        }],
        'description',
        'date_of_creation',
        ['class' => ActionColumn::class,
            'urlCreator' => function($action,Claim $model,$key,$index,$column){
            return Url::toRoute([$action, 'claim_id' => $model->claim_id]);
            }],
    ],

]);
?>
<?php Pjax::end() ?>

<?php



//print_r('<pre>' . $model . '</pre>') ;
//print_r('********************');
//print_r('DATA PROVIDER START');
//echo '<pre>';
//var_dump($dataProvider);
//echo '</pre>';

?>