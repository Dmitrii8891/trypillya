<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Portfolio;

/**
 * PortfolioSearch represents the model behind the search form about `common\models\Portfolio`.
 */
class PortfolioSearch extends Portfolio
{
    /**
     * @inheritdoc
     */
    
    public $name;
    
    public function rules()
    {
        return [
            [['id', 'user_id', 'rating', 'coordinate_id'], 'integer'],
            [['name'], 'safe'],
            [['title', 'image1', 'object', 'location', 'area', 'client', 'task', 'year', 'project_manadger', 'team', 'text1', 'video', 'text2', 'image2', 'description', 'map', 'status'], 'safe'],
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
        $query = Portfolio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
        'attributes' => [
            'id',
            'name' => [
                'asc' => ['username' => SORT_ASC],
                'desc' => ['username' => SORT_DESC],
                'label' => 'username',
                'default' => SORT_ASC
            ]
        ]
    ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['user']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image1', $this->image1])
            ->andFilterWhere(['like', 'object', $this->object])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'client', $this->client])
            ->andFilterWhere(['like', 'task', $this->task])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'project_manadger', $this->project_manadger])
            ->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'text1', $this->text1])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'text2', $this->text2])
            ->andFilterWhere(['like', 'image2', $this->image2])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'map', $this->map])
            ->andFilterWhere(['like', 'status', $this->status]);
        
        $query->joinWith(['user' => function ($q) {
            $q->where('user.username LIKE "%' . $this->name . '%"');
            }]);

        return $dataProvider;
    }
}
