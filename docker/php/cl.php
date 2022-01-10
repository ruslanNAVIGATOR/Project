<?php
class Cars {
    public $color, $mark, $model, $hp;

    public function set_color($color){
        $this->color =$color;
        return $this;
    }
    public function set_mark($mark){
        $this->mark =$mark;
        return $this;

    }
    public function set_model($model){
        $this->model = $model;
        return $this;
    }
    public function set_hp($hp){
        $this->hp = $hp;
        return $this;
    }
    public function get_color(){
        return $this->color;
    }
    public function get_mark(){
        return $this->mark;
    }
    public function get_model(){
        return $this->model;

    }
    public function get_hp(){
        return $this->hp;
    }
    public function get_info(){
        $properties =["mark", "model", "color", "hp"];
        $res =[];
        foreach ($properties as $prop){
            $res[] = $this->{"get_" . $prop}();
        }
        return implode(", ", $res) . "\n";
    }
}

$fordTransit = new Cars();
$fordTransit->set_color("White");
$fordTransit->set_mark("Ford");
$fordTransit->set_model("Transit");
$fordTransit->set_hp(100);
echo $fordTransit->get_info();