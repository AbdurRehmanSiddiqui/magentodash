<?php

namespace Pointeger\Order\Observer;

use Magento\Customer\Model\SessionFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;


/**
 * Class CustomerOrder
 * @package Pointeger\Order\Observer
 */
class CustomerOrder implements ObserverInterface
{
    /**
     * @var TransportBuilder
     */
    protected $transportBuilder;
    /**
     * @var
     */
    protected $sessionFactory;
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * CustomerOrder constructor.
     * @param TransportBuilder $transportBuilder
     */
    public function __construct(
        TransportBuilder $transportBuilder,
        SessionFactory $sessionFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->transportBuilder = $transportBuilder;
        $this->sessionFactory = $sessionFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        if ($observer->getData('order')->getData('payment')->getData('method') == 'cashondelivery') {
            $session = $this->sessionFactory->create();
            if ($session->isLoggedIn()) {
                $customerID = $session->getCustomerId();
                $collection = $this->collectionFactory->create();
                $this->sales_order_table = "main_table";
                $collection->getSelect()->join(
                    ['payment' => 'sales_order_payment'],
                    $this->sales_order_table . '.entity_id = payment.parent_id',
                    [
                        'payment_method' => 'payment.method'
                    ]
                )
                    ->where('payment' . '.method = ?', 'cashondelivery')
                    ->where($this->sales_order_table . '.customer_id = ?', $customerID);
                $message = 'total COD orders ' . $collection->getSize();
            } else {
                $message = 'This is a guest customer';
            }

            $customerEmail = $observer->getData('order')->getData('customer_email');
            try {
                $sender = [
                    'name' => 'merchant',
                    'email' => 'abdurrehman@pointeger.com',
                ];

                $transport = $this->transportBuilder->setTemplateIdentifier('email_order_template')
                    ->setTemplateOptions(
                        [
                            'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                            'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                        ]
                    )
                    ->setTemplateVars(
                        [
                            'customer_email' => $customerEmail,
                            'message' => $message,
                        ]
                    )
                    ->setFrom($sender)
                    ->addTo(
                        $customerEmail
                    )
                    ->getTransport();
                $transport->sendMessage();
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }
    }
}

