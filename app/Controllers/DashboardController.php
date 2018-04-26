<?php

class DashboardController extends Controller{


	public function index()
	{
        $resp=null;
        $hr = date(" H ");
        if($hr >= 12 && $hr<18) {
            $resp = "Boa tarde!";
        }
        else if ($hr >= 0 && $hr <12 ){
            $resp = "Bom dia!";
        }
        else {
            $resp = "Boa noite!";
        }
        view::data(['message' => $resp]);


	}
}