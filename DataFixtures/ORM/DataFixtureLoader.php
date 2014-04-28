<?php

namespace Cekurte\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cekurte\PageBundle\Entity\Page;
use Cekurte\PageBundle\Entity\PageWidget;
use Cekurte\PageBundle\Entity\PageWidgetType;
use Cekurte\PageBundle\Entity\PageWidgetField;
use Cekurte\PageBundle\Entity\PageWidgetCustomField;

class DataFixtureLoader implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pageWidgetTypeContact      = new PageWidgetType('Contact');
        $pageWidgetTypeGoogleMap    = new PageWidgetType('Google Map');

        $manager->persist($pageWidgetTypeContact);
        $manager->persist($pageWidgetTypeGoogleMap);

        $pageAbout      = new Page();
        $pageContact    = new Page();

        $pageAbout
            ->setTitle('About')
            ->setAbstract('')
            ->setDescription('About our business.')
        ;

        $pageContact
            ->setTitle('Contact')
            ->setAbstract('')
            ->setDescription('The contact page example.')
        ;

        $manager->persist($pageAbout);
        $manager->persist($pageContact);

        $pageWidget      = new PageWidget($pageContact, $pageWidgetTypeContact);
        $pageWidgetField = new PageWidgetField($pageWidgetTypeContact, 'Form Fields');

        $manager->persist($pageWidget);
        $manager->persist($pageWidgetField);

        $customFields = array('Name', 'Email', 'Subject', 'Message');

        foreach ($customFields as $value) {
            $widgetCustom = new PageWidgetCustomField($pageWidget, $pageWidgetField, $value);
            $manager->persist($widgetCustom);
        }

        $manager->flush();
    }
}
