<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 8/19/18
 * Time: 7:57 PM
 */

namespace Maaaxim\UsingPhotoGpsCommand\Command;

use Maaaxim\Photo\Photo;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * php cli/run.php photo:set-gps image_uploaded_from_ios.jpg 31.505043 34.470928
 * 
 * Class GetPhotoGpsCommand
 * @package Maaaxim\UsingPhotoGpsCommand\Command
 */
class SetPhotoGpsCommand extends Command
{
    /**
     * Configure
     */
    public function configure()
    {
        $this->setName('photo:set-gps')
            ->setDescription("Get gps")
            ->addArgument('path', InputArgument::REQUIRED . 'Image path')
            ->addArgument('lat', InputArgument::REQUIRED . 'Latitude')
            ->addArgument('lon', InputArgument::REQUIRED . 'Longitude');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Maaaxim\Photo\Exception\UnsupportedExtensionException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $photo = new Photo($input->getArgument('path'));
        $photo->setGps(
            $input->getArgument('lat'),
            $input->getArgument('lon')
        );
        $output->writeln("GPS set");
    }
}