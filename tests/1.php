<?php

use MgermApiClasses\Classes\Cabinet;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Complex\PatientsReferrals;
use MgermApiClasses\Executor;

require '../vendor/autoload.php';
/*$Patient = new Patient();
$Patient->setLastName('Иванов')->setFirstName('Иван')->setSecondName('Иванович');
print_r(Executor::prepareResponseArray($Patient));
*/
$cabinet = PatientsReferrals::createDummy();
print_r(Executor::prepareResponseArray($cabinet));
