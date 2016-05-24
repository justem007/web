<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Tests
 * @package     Tests_Functional
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

session_start();
defined('MTF_BOOT_FILE') || define('MTF_BOOT_FILE', __FILE__);
defined('MTF_BP') || define('MTF_BP', str_replace('\\', '/', (__DIR__)));
require_once __DIR__ . '/vendor/autoload.php';
restore_error_handler();
// testando os testes do magento 1.9.2.4
// essa é a ultima versão do magento 1.0
// esperamos que haja suporte até que tudo migre para a versão 2
// estou confiante que será a melhor de todos os tempos
// ilike magento two
// a melhor plataforma do mundo ecommerce que ja se ouviu falar open-source
// pois cresceu com os feedbacks dos clientes e programadores mais experientes
// vamos fazer do magento 2 a melhor plataforma ecommerce do mundo
// não tenha dúvida disso que nós vamos construir um belo software
// estou muito afim de trabalhar com o magento 2 pois tem todas as psrs
// php-fig para implementar tudo que há de justo no mundo php
// vamos fazer uma web mais segura, estável e melhor para os usuários
// queremos fazer história com essa plataforma de ecommerce
// vamos organir essa crise e partir pra dentro od trabalho
// pois so esta começando a guerra web, onde os mais rápidos e inteligentes vão sobreviver
// vamos ver até onde isso irá
// vamos lutar por um plataforma segura e confiável
// vamos fazer com que nosso trabalho seja honrado e prestigiado
// pensamos muito até chegar aqui
// lemos muito até chegar aqui
// andamos muito até chegar aqui