<?php
/**
 * Tudu Library
 *
 * LICENSE
 *
 *
 * @category   Model
 * @package    Model_Auth
 * @copyright  Copyright (c) 2009-2010 Shanghai Best Oray Information S&T CO., Ltd.
 * @link       http://www.oray.com/
 * @version    $Id: Exception.php 1894 2012-05-31 08:02:57Z cutecube $
 */

/**
 * @see Model_Tudu_Extension_Handler_Abstract
 */
require_once 'Model/Tudu/Extension/Handler/Abstract.php';

/**
 * 业务模型抛出异常基类
 *
 * @category   Model
 * @package    Model_Auth
 * @copyright  Copyright (c) 2009-2010 Shanghai Best Oray Information S&T CO., Ltd.
 */
class Model_Tudu_Extension_Handler_Meeting extends Model_Tudu_Extension_Handler_Abstract
{
    /**
     *
     * @param Model_Tudu_Tudu $tudu
     */
    public function action(Model_Tudu_Tudu &$tudu)
    {
        $meeting = $tudu->getExtension('Model_Tudu_Extension_Meeting');

        /* @var $daoMeeting Dao_Td_Tudu_Meeting */
        $daoMeeting = Tudu_Dao_Manager::getDao('Dao_Td_Tudu_Meeting', Tudu_Dao_Manager::DB_TS);

        $params = $meeting->getAttributes();

        if ($daoMeeting->existsMeeting($tudu->tuduId)) {
            $daoMeeting->updateMeeting($tudu->tuduId, $params);
        } else {
            $params['tuduid'] = $tudu->tuduId;
            $daoMeeting->createMeeting($params);
        }
    }
}