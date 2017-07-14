<?php

namespace LaravelBoot\Installer\Composer;

use Composer\Composer;
//use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
//use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use LaravelBoot\Installer\Composer\Installers\Installer;

/**
 * Class Plugin.
 */
class Plugin implements PluginInterface
{
    /**
     * @var \Composer\Composer
     */
    protected $composer;

    /**
     * @var \Composer\IO\IOInterface
     */
    protected $io;

    /**
     * Add installer to Composer Installation Manager.
     *
     * @param \Composer\Composer       $composer
     * @param \Composer\IO\IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
        $installer = new Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
