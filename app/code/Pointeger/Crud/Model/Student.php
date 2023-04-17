<?php

declare(strict_types=1);

namespace Pointeger\Crud\Model;

use Magento\Framework\Model\AbstractModel;


class Student extends AbstractModel
{
    public function setStudentName($student_name)
    {
        return $this->setData('name', $student_name);
    }

    public function setRollNumber($student_rollnumber)
    {
        return $this->setData('roll_no', $student_rollnumber);
    }

    public function setCustomerId($customer_id)
    {
        return $this->setData('customer_id', $customer_id);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\Student::class);
    }
}
