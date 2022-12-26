<?php
declare(strict_types=1);

namespace Pointeger\Crud\Plugin;

use Magento\Checkout\Controller\Cart\Add;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class AddToCartPlugin
 * @package Pointeger\Crud\Plugin
 */
class AddToCartPlugin
{
    /**
     * @var ManagerInterface
     */
    protected $messagemanger;

    /**
     * AddToCartPlugin constructor.
     * @param ManagerInterface $messagemanger
     */
    public function __construct(ManagerInterface $messagemanger)
    {
        $this->messagemanger = $messagemanger;
    }

    /**
     * @param Add $subject
     * @param $result
     * @return mixed
     */
    public function afterExecute(Add $subject, $result)
    {
        $this->messagemanger->addSuccessMessage('hello ');
        return $result;
    }
}
