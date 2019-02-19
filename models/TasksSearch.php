<?php

namespace app\models;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Tasks;

/**
 * TasksSearch represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TasksSearch extends Tasks
{

    public $created;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        
        return [
            [['id', 'responsible_id', 'status_id'], 'integer'],
            [['name', 'description', 'date', 'updated_at'], 'safe'],
            [['created'],'safe'],

        ];
    }

    public function prepareDataQuery($query) {
       
          if ((!empty($this->created)) && ($this->created[0] !== 'null')) {
              $query=$query->cache(720); //кэширование запросов фильтрации данных по месяцам
        foreach ($this->created as $monthnumber) {    
            $query->orFilterWhere(["MONTH(FROM_UNIXTIME(`created_at`))" => $monthnumber]);
        }
       
    }
 
    return $query;
    }

    /**
     * {@inheritdoc}
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

         $query = Tasks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'responsible_id' => $this->responsible_id,
            'date' => $this->date,
            'status_id' => $this->status_id,
        ]);
        
    

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);
    
        $this->prepareDataQuery($query);
              

        return $dataProvider;
    }
}
