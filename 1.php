<?php

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Base\IdNameClass;
use MgermApiClasses\Classes\Cabinet;
use MgermApiClasses\Classes\Contact;
use MgermApiClasses\Classes\Department;
use MgermApiClasses\Classes\Doctor;
use MgermApiClasses\Classes\Guid;
use MgermApiClasses\Classes\Hospital;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Classes\Person;
use MgermApiClasses\Classes\PriceList;
use MgermApiClasses\Classes\Record;
use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Classes\Schedule\Cell;
use MgermApiClasses\Classes\Service;
use MgermApiClasses\Classes\Specialty;
use MgermApiClasses\Complex\PatientsRecords;
use MgermApiClasses\Complex\PatientsReferrals;
use MgermApiClasses\Complex\ScheduledDepartment;
use MgermApiClasses\Complex\ScheduledDoctor;
use MgermApiClasses\Executor;


require_once 'vendor/autoload.php';
$dummy = ScheduledDepartment::createDummy(true);
print_r(json_encode(Executor::prepareResponseArray($dummy), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
