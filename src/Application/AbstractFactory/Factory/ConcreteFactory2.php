<?php

namespace Application\AbstractFactory\Factory;

use Application\AbstractFactory\AbstractProductFactory;

class ConcreteFactory2 extends AbstractProductFactory
{
    /**
     *{@inheritdoc}
     */
    public function canCreate($productClass)
    {
        $list = [
            'Application\AbstractFactory\ProductA\ProductA2',
            'Application\AbstractFactory\ProductB\ProductB2'
        ];
        return in_array($productClass, $list);
    }
}