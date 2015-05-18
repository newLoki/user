<?php

namespace SprykerFeature\Zed\User\Communication;

use Generated\Zed\Ide\AutoCompletion;
use Generated\Zed\Ide\FactoryAutoCompletion\UserCommunication;
use SprykerEngine\Zed\Kernel\Communication\AbstractDependencyContainer;
use SprykerFeature\Zed\Auth\Business\AuthFacade;
use SprykerFeature\Zed\User\Business\UserFacade;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method UserCommunication getFactory()
 */
class UserDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return AuthFacade
     */
    public function getFacade()
    {
        return $this->getLocator()->user()->facade();
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getUserGrid(Request $request)
    {
        $queryContainer = $this->getQueryContainer();
        $users = $queryContainer->queryUsersAndGroup();

        return $this->getFactory()->createGridUserGrid(
            $users,
            $request
        );
    }

    /**
     * @return \SprykerFeature\Zed\User\Persistence\UserQueryContainer
     */
    public function getQueryContainer()
    {
        return $this->getLocator()->user()->queryContainer();
    }

    /**
     * @return UserFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->user()->facade();
    }
}
