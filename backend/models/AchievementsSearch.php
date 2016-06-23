<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Achievements;

/**
 * AchievementsSearch represents the model behind the search form about `common\models\Achievements`.
 */
class AchievementsSearch extends Achievements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nomber1', 'nomber2', 'nomber3', 'nomber4'], 'integer'],
            [['title', 'title1', 'title2', 'title3', 'title4', 'image1', 'name1', 'description1', 'image2', 'name2', 'description2', 'image3', 'name3', 'description3', 'status'], 'safe'],
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
        $query = Achievements::find();

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
            'id' => $this->id,
            'nomber1' => $this->nomber1,
            'nomber2' => $this->nomber2,
            'nomber3' => $this->nomber3,
            'nomber4' => $this->nomber4,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title1', $this->title1])
            ->andFilterWhere(['like', 'title2', $this->title2])
            ->andFilterWhere(['like', 'title3', $this->title3])
            ->andFilterWhere(['like', 'title4', $this->title4])
            ->andFilterWhere(['like', 'image1', $this->image1])
            ->andFilterWhere(['like', 'name1', $this->name1])
            ->andFilterWhere(['like', 'description1', $this->description1])
            ->andFilterWhere(['like', 'image2', $this->image2])
            ->andFilterWhere(['like', 'name2', $this->name2])
            ->andFilterWhere(['like', 'description2', $this->description2])
            ->andFilterWhere(['like', 'image3', $this->image3])
            ->andFilterWhere(['like', 'name3', $this->name3])
            ->andFilterWhere(['like', 'description3', $this->description3])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
