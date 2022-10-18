<?php

class Richestpeoples extends Controller
{
    //properties
    private $richestModel;

    // Dit is de constructor van de controller
    public function __construct()
    {
        $this->richestModel = $this->model('richest');
    }

    public function index()
    {
        $records = $this->richestModel->getRichest();

        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>" . htmlentities($items->Name, ENT_QUOTES, 'ISO-88591-1') . "</td>
                        <td>" . htmlentities($items->Company, ENT_QUOTES, 'ISO-88591-1') . "</td>
                        <td>" . htmlentities($items->Age, ENT_QUOTES, 'ISO-88591-1') . "</td>
                        <td>" . number_format($items->Nettoworth, 0, ',', '.') . "</td>
                        <td><a href='" . URLROOT . "/delete/$items->id'>delete</td> 
                      </tr>";
        }

        $data = [
            'title' => "Overzicht Richest People",
            'rows' => $rows
        ];
        $this->view('/index', $data);
    }

    public function delete($id)
    {

        $this->richestModel->deleteRichest();

        $data = [
            'deleteStatus' => "Het record met id = $id is verwijderd"
        ];
        $this->view("/delete", $data);
        header("Refresh:2; url=" . URLROOT . "/homepages/index");
    }
}
