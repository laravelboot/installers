<?php

namespace LaravelBoot\Installer\Composer\Installers;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

/**
 * Class Installer.
 */
class Installer extends LibraryInstaller
{
    /**
     * Get install path for Composer Installer.
     *
     * @param \Composer\Package\PackageInterface $package
     *
     * @return string
     */
    public function getInstallPath(PackageInterface $package)
    {
        list($vendor, $name) = explode('/', $package->getPrettyName());

        return 'modules/' . $name;
    }

    /**
     * Confirm supported Package Types.
     *
     * @param $packageType
     *
     * @return bool
     */
    public function supports($packageType)
    {
        return $packageType === 'laravelboot-module';
    }
}
