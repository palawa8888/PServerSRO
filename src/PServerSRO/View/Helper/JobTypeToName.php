<?php


namespace PServerSRO\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class JobTypeToName extends AbstractHelper
{
    /**
     * @var string[]
     */
    protected $jobTypeMapping = [
        1 => 'Trader',
        2 => 'Thief',
        3 => 'Hunter'
    ];

    /**
     * @param int $jobType
     * @return string
     */
    public function __invoke($jobType = 0)
    {
        $result = '';

        if (isset($this->jobTypeMapping[$jobType])) {
            $result = $this->jobTypeMapping[$jobType];
        }

        return $result;
    }

}