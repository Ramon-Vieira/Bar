<?php

namespace app\components\filters;

use Yii;
use yii\base\ActionFilter;
use yii\helpers\Url;

class AuthFilter extends ActionFilter {
	public static $permsR = ['index','view'];

	public $actions;

	public function beforeAction ( $action )
	{
		if (!is_null($this->actions)) {
			if (array_key_exists($action->id, $this->actions)) {
				if (!\Yii::$app->user->can($this->actions[$action->id])) {
					throw new \yii\web\ForbiddenHttpException('Você não tem permissão para acessar esta página');
					return false;
				}
			}
		}


		$controlador = strtolower($action->controller->id);
		$terminacao = (in_array(strtolower($action->id),self::$permsR))?'R':'RW';

		$permissao = $controlador.$terminacao;

		// Yii::trace(\Yii::$app->user->identity->type);
		// Yii::trace($permissao);

		if (!\Yii::$app->user->can($permissao)) {
			throw new \yii\web\ForbiddenHttpException('Você não tem permissão para acessar esta página');
			return false;
		}

		return parent::beforeAction($action);
	}
}
