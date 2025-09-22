<?php

namespace MgermApiClasses\Interfaces;

interface PatientNecessaryNotificationDataInterface
{

    public function getID(): ?int;
    public function getPhone(): ?string;
}
