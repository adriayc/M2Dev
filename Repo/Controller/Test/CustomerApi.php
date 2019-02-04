<?php

namespace M2Dev\Repo\Controller\Test;

use Magento\Framework\App\Action\Context;

class CustomerApi extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $customerRepository;
    /**
     * @var \Magento\Customer\Api\Data\CustomerInterfaceFactory
     */
    private $customerFactory;

    public function __construct(
        Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Api\Data\CustomerInterfaceFactory $customerFactory
    )
    {
        parent::__construct($context);
        $this->customerRepository = $customerRepository;
        $this->customerFactory = $customerFactory;
    }

    // http://m23cevmw.local/repo/test/customerapi
    public function execute()
    {
        //Los repositorios por lo general deben ir dentro de un try-catch
        try {
            $customer = $this->customerRepository->getById(2);
//            $customer = $this->customerRepository->getById(999);    //retorna un error de excepcion (no existe el usuario con ese id)
            var_dump($customer->getFirstname());
            var_dump($customer->getLastname());
            var_dump($customer->getEmail());
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }

        //NEW CUSTOMER
        /** @var \Magento\Customer\Api\Data\CustomerInterface $newCustomer */
        $newCustomer = $this->customerFactory->create();
        $newCustomer->setEmail('adriano@gmail.com')
            ->setFirstname('Adriano')
            ->setLastname('Ayala');

        try {
            $savedCustomer = $this->customerRepository->save($newCustomer);
            var_dump($savedCustomer->getId());
            var_dump($savedCustomer->getEmail());
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }

        //DELETE
        try {
            //No se puede eliminar clientes desde el frontend
            $isDeleted = $this->customerRepository->deleteById(2);  //Devuelve un booleano (true si existe con ese id)
            var_dump($isDeleted);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}