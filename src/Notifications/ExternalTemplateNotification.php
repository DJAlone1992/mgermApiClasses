<?php

namespace MgermApiClasses\Notifications;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Patient;
use MgermApiClasses\Classes\Record;
use MgermApiClasses\Classes\Referral;
use MgermApiClasses\Enum\ExternalNotificationTypes;

class ExternalTemplatedNotification extends BaseClass
{
    public const dummyArray = [
        'notificationType' => ExternalNotificationTypes::Referral,
        'object' => Referral::dummyArray,
    ];

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setNotificationType(ExternalNotificationTypes::Referral)->setObject(Referral::createDummy($imitateReal));
        return $me;
    }
    /**
     ** Тип предустановленного уведомления
     * @var int
     */
    private int $notificationType;
    /**
     ** Объект
     * @var Referral|Record|Patient
     */
    private Referral|Record|Patient $object;

    public function setObject(Referral|Record|Patient $object): static
    {
        $this->object = $object;
        return $this;
    }
    public function getObject(): Referral|Record|Patient
    {
        return $this->object;
    }
    public function setNotificationType(int $notificationType): static
    {
        if (!in_array($notificationType, [ExternalNotificationTypes::Referral, ExternalNotificationTypes::Analysis, ExternalNotificationTypes::AfterVisit])) {
            throw new \Exception("Invalid notification type");
        }
        $this->notificationType = $notificationType;
        return $this;
    }
    public function getNotificationType(): int
    {
        return $this->notificationType;
    }
}
