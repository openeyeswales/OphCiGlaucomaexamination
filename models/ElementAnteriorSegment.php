<?php
/**
 * OpenEyes
 *
 * (C) University of Cardiff, 2012
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) University of Cardiff, 2012
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<?php
/**
 * This is the model class for table "element_anterior_segment".
 *
 * The followings are the available columns in table 'element_anterior_segment':
 * @property string $id
 * @property string $event_id
 * @property string $description_left
 * @property string $description_right
 * @property string $image_string_left
 * @property string $image_string_right
 */
class ElementAnteriorSegment extends EyeDrawBase {
    
    /**
     * 
     */
    function __construct($scenario = 'insert') {
        parent::__construct($scenario);
        $this->setDoodleInfo(array('PI', 'CorticalCataract', 'PostSubcapCataract',
            'PCIOL', 'ACIOL', 'Bleb', 'RK', 'Fuchs', 'LasikFlap', 'CornealScar',
            'NuclearCataract'));
    }

    /**
     * Returns the static model of the specified AR class.
     * @return ElementHPC the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'et_ophciglaucomaexamination_ant_seg';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, event_id, cct_left, cct_right, description_left, description_right, image_string_left, image_string_right', 'safe'),
            array('cct_left, cct_right', 'numerical', 'min' => 400, 'max' => 800),
            array('id, event_id, cct_left, cct_right, description_left, description_right, image_string_left, image_string_right', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'event_id' => 'Event',
            'description_left' => 'Description (left)',
            'description_right' => 'Description (right)',
            'cct_left' => 'CCT (left)',
            'cct_right' => 'CCT (right)',
            'image_string_left' => 'EyeDraw (left)',
            'image_string_right' => 'EyeDraw (right)'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('event_id', $this->event_id, true);
        $criteria->compare('description_left', $this->description_left, true);
        $criteria->compare('description_right', $this->description_right, true);
        $criteria->compare('cct_left', $this->cct_left, true);
        $criteria->compare('cct_right', $this->cct_right, true);
        $criteria->compare('image_string_left', $this->image_string_left, true);
        $criteria->compare('image_string_right', $this->image_string_right, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
}
