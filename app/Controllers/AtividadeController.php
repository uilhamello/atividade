<?php
/**
 * Created by PhpStorm.
 * User: uilha
 * Date: 26/04/18
 * Time: 17:52
 */

class AtividadeController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Atividade;
    }

    public function index()
    {
        $result = $this->model->all();

        $table = 'asd';
        if($result){
            $table = '';
            foreach ($result as $key => $value) {
                $array_keys = array_keys($value);
                $table .= '<tr>';
                foreach ($array_keys as $key=>$val){
                    $table .= '<td>'.$value[$val].'</td>';
                }
                $table .= '<td><a href=\'{{URL_BASE}}/?module=atividade_update&id='.($value['id']).'\'>Editar</td>';
                $table .= '<td><a href=\'{{URL_BASE}}/?module=atividade_delete&id='.($value['id']).'\'>Deletar</td>';
                $table .= '</tr>';
            }
        }
        View::data(['table_content'=>$table]);
    }

    public function create()
    {

    }

    public function store()
    {
        $this->model->insert($_POST);
        $this->index();
        redirect_route('atividade');
    }

    public function update()
    {

    }

    public function alter()
    {

    }

    public function delete()
    {
        $this->model->delete($_GET['id']);
        redirect_route('atividade');
    }
}