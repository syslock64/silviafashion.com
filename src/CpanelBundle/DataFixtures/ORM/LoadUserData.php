<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 10/08/2017
 * Time: 02:04
 */

namespace CpanelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use CpanelBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setFirstName('Yuri Cristian');
        $userAdmin->setLastName('Cauna Robles');
        $userAdmin->setUsername('admin');
        $userAdmin->setRoles(['ROLE_SUPER_ADMIN']);
        $userAdmin->setEmail('syslock64@gmail.com');

        $encoder = $this->container->get('security.password_encoder');
        $userAdmin->setPassword($encoder->encodePassword($userAdmin, 'admin123'));

        $manager->persist($userAdmin);
        $manager->flush();
    }
}