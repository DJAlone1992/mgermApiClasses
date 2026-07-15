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

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $me->setNotificationType(ExternalNotificationTypes::Referral)->seObject(Referral::createDummy($imitateReal));
        return $me;
    }
    /**
     ** Тип предустановленного уведомления
     * @var int
     */
    private $notificationType;
    /**
     ** Объект
     * @var Referral|Record|Patient
     */
    private $object;

    /**
     * @param \MgermApiClasses\Classes\Referral|\MgermApiClasses\Classes\Record|\MgermApiClasses\Classes\Patient $object
     * @return static
     */
    public function seObject($object)
    {
        $this->object = $object;
        return $this;
    }
    /**
     * @return \MgermApiClasses\Classes\Referral|\MgermApiClasses\Classes\Record|\MgermApiClasses\Classes\Patient
     */
    public function geObject()
    {
        return $this->object;
    }
    /**
     * @return static
     */
    public function setNotificationType(int $notificationType)
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
