<?php

// Index
$this->add('/', 'Controller\Home');

//Login
$this->add('/login', 'Controller\Authenticator@login');

//Intern Startseite
$this->add('/intern', 'Controller\Intern', ['Login']);

//Logout
$this->add('/logout', 'Controller\Authenticator@logout');

//Alle Mitarbeiter
$this->add('/allMitarbeiter', 'Controller\Mitarbeiter@printAllMitarbeiter', ['Login']);

//Einen Mitarbeiter
$this->add('/oneMitarbeiter', 'Controller\Mitarbeiter@printOneMitarbeiter', ['Login']);
$this->add('/oneMitarbeiter/:id', 'Controller\Mitarbeiter@printOneMitarbeiter', ['Login']);

//neuen Mitarbeiter anlegen
$this->add('/newMitarbeiter', 'Controller\Mitarbeiter@printNewMitarbeiter', ['Login']);