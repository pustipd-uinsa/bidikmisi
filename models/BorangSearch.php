<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Borang;

/**
 * BorangSearch represents the model behind the search form of `app\models\Borang`.
 */
class BorangSearch extends Borang
{
    /**
     * @inheritdoc
     */
    public $search ;
    public $dataShown;
    public function rules()
    {
        return [
            [['search','dataShown'] ,'safe']

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
        $query = Borang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->dataShown,
            ],
        ]);



        $this->load($params);
        
        if ($this->search !==null) {
            $query->andFilterWhere(['or',['like', 'kode',$this->search],['like', 'nama_ayah',$this->search] ]);
            $query->orWhere( ['like', 'nama_ibu', $this->search ]);
        }



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

      

        return $dataProvider;
    }
}