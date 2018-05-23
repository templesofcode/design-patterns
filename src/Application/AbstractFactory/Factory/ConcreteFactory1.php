<?php

namespace Application\AbstractFactory\Factory;

use Application\AbstractFactory\AbstractProductFactory;

class ConcreteFactory1 extends AbstractProductFactory
{
    /**
     *{@inheritdoc}
     */
    public function canCreate($productClass)
    {
        $list = [
            'Application\AbstractFactory\ProductA\ProductA1',
            'Application\AbstractFactory\ProductB\ProductB1'
        ];
        return in_array($productClass, $list);
    }
}