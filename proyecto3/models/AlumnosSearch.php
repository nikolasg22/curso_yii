<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alumnos;

/**
 * AlumnosSearch represents the model behind the search form about `app\models\Alumnos`.
 */
class AlumnosSearch extends Alumnos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno', 'clase'], 'integer'],
            [['nombre', 'apellidos'], 'safe'],
            [['nota_final'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Alumnos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_alumno' => $this->id_alumno,
            'clase' => $this->clase,
            'nota_final' => $this->nota_final,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos]);

        return $dataProvider;
    }
}
