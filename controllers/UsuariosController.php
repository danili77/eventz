<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariosController implementa las acciones CRUD para el modelo de usuario.
 */
class UsuariosController extends Controller
{
    /**
     * Devuelve un listado con los comportamientos del componente.
     * @return mixed
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lista todos los usuarios registrados en la aplicación
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra los datos de un usuario.
     * @param int $id El id del usuario.
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo usuario.
     * Si la creación se ha realizado con exito, el navegador redireccionará a
     * la vista del usuario creado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->user->isGuest) {
                Yii::$app->session->setFlash(
                    'exito',
                    'Usuario creado correctamente.'
                );
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica los datos de un usuario.
     * Si la modificación se ha realizado con exito, el navegador redireccionará
     * a la vista del usuario modificado.
     * @param int $id El id del usuario que se quiere modificar.
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Elimina un usuario existente.
     * Si se ha borrado con exito, el navegador se redireccionara a la pagina
     * indice de los usuarios.
     * @param int $id El id del usuario que se quiere eliminar.
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra un usuario buscando por su clave primaria(id).
     * Si el usuario no se encuentra,se lanzara una excepción 404 HTTP.
     * @param int $id El id del usuario que se quiere buscar.
     * @return Usuario El usuario cargado.
     * @throws NotFoundHttpException Si el usuario no se ha encontrado.
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
