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
 * php cli/run.php photo:get-gps image_uploaded_from_ios.jpg
 *
 * Class GetPhotoGpsCommand
 * @package Maaaxim\UsingPhotoGpsCommand\Command
 */
class GetPhotoGpsCommand extends Command
{
    /**
     * Configure
     */
    public function configure()
    {
        $this->setName('photo:get-gps')
            ->setDescription("Get gps")
            ->addArgument('path', InputArgument::REQUIRED . 'Image path');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Maaaxim\Photo\Exception\UnsupportedExtensionException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('path');
        $photo = new Photo($path);
        $gps = $photo->getGps();
        $output->writeln($gps->latitude);
        $output->writeln($gps->longitude);
    }
}