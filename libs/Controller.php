<?php
class Controller
{
    private $model;
    private $view;

    public function __construct ()
    {       
        $this->model = new Model();
        $this->view = new View(TEMPLATE);   

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
           $result =  $this->model->sendRequest($_POST['search']);
            $this->getArray($result['data']);
        }
        else
        {
            $this->pageDefault();   
        }

        $this->view->templateRender();          
    }   

    private function pageSendMail ()
    {
        $result = $this->model->sendEmail();

        $this->getArray($result['data']);
    }   

    private function pageDefault ()
    {   
        $this->getArray();
    }

    private function getArray ($data = null)
    {
        $mArray = $this->model->getArray();
        if (empty($data))
        {
            $rArray = $mArray;
        }
        else
        {
            $rArray = array_merge($mArray, $data);
        }
        $this->view->addToReplace($rArray);
    }
}

