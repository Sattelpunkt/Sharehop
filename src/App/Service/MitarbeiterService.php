<?php

namespace App\Service;

use App\Entity\MitarbeiterEntity;
use App\Repository\FirmaRepository;
use App\Repository\MitarbeiterRepository;
use Core\BaseService;
use Core\H;

class MitarbeiterService extends BaseService
{
    public function printAllMitarbeiter(): void
    {
        $this->response->setContentTemplate(get_class($this), 'Mitarbeiter/all');
        $this->response->__set('interneMitarbeiter', MitarbeiterRepository::getAllInterneMitarbeiter());
        $this->response->__set('externeMitarbeiter', MitarbeiterRepository::getAllExterneMitarbeiter());
        $this->response->render();
    }

    public function printOneMitarbeiterFormular(): void
    {
        $this->response->setContentTemplate(get_class($this), 'Mitarbeiter/oneFormular');
        $this->response->render();
    }

    public function printOneMitarbeiterTemplate(int $id): void
    {
        $this->response->__set('Mitarbeiter', [MitarbeiterRepository::getOneMitarbeiter($id)]);
        $this->response->setContentTemplate(get_class($this), 'Mitarbeiter/one');
        $this->response->render();
    }

    public function printNewMitarbeiterTemplate(): void
    {
        $this->response->__set('firmen', FirmaRepository::getAll());
        $this->response->setContentTemplate(get_class($this), 'Mitarbeiter/new');
        $this->response->render();
    }

    public function newMitarbeiter(array $mitarbeiter): int
    {
        $mitarbeiter = MitarbeiterRepository::getMitarbeiterEntityFromMitarbeiterArrayTemplate($mitarbeiter);
        return MitarbeiterRepository::newMitarbeiter($mitarbeiter);
    }

}
