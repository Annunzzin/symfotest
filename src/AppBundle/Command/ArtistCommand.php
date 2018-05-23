<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 22/05/18
 * Time: 15:11
 */

namespace AppBundle\Command;


use AppBundle\InMemory\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class ArtistCommand extends ContainerAwareCommand
{




    protected function configure()
    {
        $this
            ->setName('query:artist')
            ->setDescription('Affichage d\'un artiste')
            ->addArgument('id',InputArgument::OPTIONAL,'Artiste à donner')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $io = new SymfonyStyle($input,$output);

        $io->title('Affichage de votre artiste');

        $argument = $input->getArgument('id');

        //$helper = $this->getHelper('question');

        while($argument == ""){
/*            $question = new Question('Please enter the id of the artist');*/
            $argument = $io->ask('Please enter the id of the artist');
                //$helper->ask($input,$output,$question);
        }

        $artistRepository = $this->getContainer()->get('AppBundle\Repository\ArtistRepository');

        $artist = $artistRepository->find($argument);

        $io->title('Votre artiste '.$artist->getName());




        $output->writeln('id :  '.$artist->getId());
        $output->writeln('type :  '.$artist->getType());
        $output->writeln('genre :  '.$artist->getGenre());


    }
}