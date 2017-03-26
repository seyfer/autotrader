<?php


namespace AppBundle\Menu;


use Knp\Menu\MenuFactory;

class Builder
{
    public function mainMenu(MenuFactory $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Home', ['route' => 'homepage']);
        $menu->addChild('Offer', ['route' => 'offer']);
        $menu->addChild('Manage Cars', ['route' => 'car_index']);

        return $menu;
    }

}