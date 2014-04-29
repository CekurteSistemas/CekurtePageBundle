<?php

namespace Cekurte\PageBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cekurte\PageBundle\Entity\Page;
use Cekurte\PageBundle\Entity\PageWidget;
use Cekurte\PageBundle\Entity\PageWidgetType;
use Cekurte\PageBundle\Entity\PageWidgetField;
use Cekurte\PageBundle\Entity\PageWidgetCustomField;

class DataFixtureLoader implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    private function trans($message)
    {
        return $this->container->get('cekurte_page.translator')->trans($message);
    }

    /**
     * Load Page Contact
     *
     * @param ObjectManager $manager
     *
     * @return DataFixtureLoader
     */
    public function loadPageContact(ObjectManager $manager)
    {
        $pageContact            = new Page();
        $pageWidgetTypeContact  = new PageWidgetType($this->trans('Contact'));

        $pageContact
            ->setTitle($this->trans('Contact'))
            ->setAbstract('')
            ->setDescription($this->trans('The contact page'))
        ;

        $manager->persist($pageContact);
        $manager->persist($pageWidgetTypeContact);

        $pageWidget      = new PageWidget($pageContact, $pageWidgetTypeContact);
        $pageWidgetField = new PageWidgetField($pageWidgetTypeContact, 'Form Fields');

        $manager->persist($pageWidget);
        $manager->persist($pageWidgetField);

        $customFields = array(
            $this->trans('Name'),
            $this->trans('Email'),
            $this->trans('Subject'),
            $this->trans('Message'),
            $this->trans('Submit'),
        );

        foreach ($customFields as $value) {
            $widgetCustom = new PageWidgetCustomField($pageWidget, $pageWidgetField, $value);
            $manager->persist($widgetCustom);
        }

        return $this;
    }

    /**
     * Load Page About
     *
     * @param ObjectManager $manager
     *
     * @return DataFixtureLoader
     */
    public function loadPageAbout(ObjectManager $manager)
    {
        $pageAbout                  = new Page();
        $pageWidgetTypeGoogleMap    = new PageWidgetType($this->trans('Google Map'));

        $pageAbout
            ->setTitle($this->trans('About'))
            ->setAbstract('')
            ->setDescription($this->trans('About our business'))
        ;

        $manager->persist($pageAbout);
        $manager->persist($pageWidgetTypeGoogleMap);

        $pageWidget = new PageWidget($pageAbout, $pageWidgetTypeGoogleMap);
        $manager->persist($pageWidget);

        $pageWidgetField = new PageWidgetField($pageWidgetTypeGoogleMap, 'Latitude');
        $manager->persist($pageWidgetField);

        $pageWidgetField = new PageWidgetField($pageWidgetTypeGoogleMap, 'Longitude');
        $manager->persist($pageWidgetField);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this
            ->loadPageContact($manager)
            ->loadPageAbout($manager)
        ;

        $manager->flush();
    }
}
