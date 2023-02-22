<?php

namespace App\Controller;

use App\Service\MitarbeiterService;
use Core\H;
use Core\Router;
use Core\Session;

class MitarbeiterController
{

    public function printAllMitarbeiterAction(array $params = [], array $cleanUserData = []): void
    {
        $s = new MitarbeiterService();
        $s->printAllMitarbeiter();
    }

    public function printOneMitarbeiterAction(array $params = [], array $cleanUserData = []): void
    {
        $s = new MitarbeiterService();
        if (empty($cleanUserData['post']['id']) && !isset($params['id'])) {
            $s->printOneMitarbeiterFormular();
        } elseif (!empty($cleanUserData['post']['id'])) {
            $s->printOneMitarbeiterTemplate($cleanUserData['post']['id']);
        } elseif(isset($params['id'])){
            $s->printOneMitarbeiterTemplate($params['id']);
        }
    }

    public function printNewMitarbeiterAction(array $params = [], array $cleanUserData = []): void
    {
        $s = new MitarbeiterService();
        if (empty($cleanUserData['post'])) {
            $s->printNewMitarbeiterTemplate();
        } else {
            Session::addMSG('success','Mitarbeiter erfolgreich angelegt');
            Router::go('oneMitarbeiter/' . $s->newMitarbeiter($cleanUserData['post']));
        }
    }
}
