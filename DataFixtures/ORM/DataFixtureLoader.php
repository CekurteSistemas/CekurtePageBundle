<?php

namespace Cekurte\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cekurte\PageBundle\Entity\Page;
use Cekurte\PageBundle\Entity\PageWidget;
use Cekurte\PageBundle\Entity\PageWidgetType;
use Cekurte\PageBundle\Entity\PageWidgetField;

class DataFixtureLoader implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pageAbout = new Page();

        $pageAbout
            ->setTitle('About')
            ->setAbstract('')
            ->setDescription('About our business.')
        ;

        $manager->persist($pageAbout);

        $pageContact = new Page();

        $pageContact
            ->setTitle('Contact')
            ->setAbstract('')
            ->setDescription('The contact page example.')
        ;

        $type = new PageWidgetType();
        //$type->setWidget()

        $widget = new PageWidget();
        $widget->setPage($pageContact);
        //$widget->setWidgetType();

        $pageContact->addWidget($widget);

        $manager->persist($pageContact);

        $manager->flush();
    }
}
