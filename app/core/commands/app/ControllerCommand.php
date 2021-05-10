<?php

namespace App\Core\Commands\App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class ControllerCommand extends Command{
    protected static $defaultName = 'app:controller';
    protected $filesystem ;

    function __construct(){
        parent::__construct();
        $this->filesystem = new Filesystem();
    }

    protected function configure(){ 
        $this //->setName(self::$defaultName)
        ->setDescription('Create Controller command - api/AuthController || HomeController')
        ->addArgument('namecontroller',
            InputArgument::REQUIRED,
            'The name Controller is required')
        ->addOption('resources','r',InputOption::VALUE_NONE,'resource controller');
    }

    protected function execute(InputInterface $input,OutputInterface $output){

        $option = $input->getOption('resources');
        $name = $input->getArgument('namecontroller');
        if($this->filesystem->exists('app/controllers/'.$name.'.php')){
            $output->write('<comment>Controller Exists</comment>');
            return Command::SUCCESS;
        }

        // CREATE 
        // Si pasamos el name asi api/AuthController || api\AuthController
        // Debemos capturar el ultimo name en este caso seria 'AuthController'
        $newname = explode('/',$name);
        $data = "";
        if(count($newname) > 1){
            $data = ($option)? $this->fullcontrollerPath($newname) : $this->basiccontrollerPath($newname);
        }else{
            $data = ($option)? $this->fullcontroller($name) : $this->basiccontroller($name);
        }
        $this->filesystem->dumpFile('app/controllers/'.$name.'.php',$data);
        $output->write("<info>Controller '".$name.".php' Created Success✅</info>");
        return Command::SUCCESS;
    }

    private function basiccontroller($name){
        $texto = <<<END
        <?php
        namespace App\Controllers;\n
        use App\Core\Controller;
        use Symfony\Component\HttpFoundation\Request;
        use Symfony\Component\HttpFoundation\Response;\n
        class $name extends Controller{\n
        }
        END;
        return $texto;
    }
    private function fullcontroller($name){
        $texto = <<<END
        <?php
        namespace App\Controllers;\n
        use App\Core\Controller;
        use Symfony\Component\HttpFoundation\Request;
        use Symfony\Component\HttpFoundation\Response;\n
        class $name extends Controller{\n
            public function index(){
            }\n
            public function show(){
            }\n
            public function store(){
            }\n
            public function update(){
            }\n
            public function delete(){
            }
        }
        END;
        return $texto;
    }
    private function fullcontrollerPath($arrData){
        $namec = array_pop($arrData);
        $namespaceadd = implode("\\",$arrData);
        $texto = <<<END
        <?php
        namespace App\Controllers\\$namespaceadd;\n
        use App\Core\Controller;
        use Symfony\Component\HttpFoundation\Request;
        use Symfony\Component\HttpFoundation\Response;\n
        class $namec extends Controller{\n
            public function index(){
            }\n
            public function show(){
            }\n
            public function store(){
            }\n
            public function update(){
            }\n
            public function delete(){
            }
        }
        END;
        return $texto;
    }

    private function basiccontrollerPath($arrData){
        $namec = array_pop($arrData);
        $namespaceadd = implode("\\",$arrData);
        $texto = <<<END
        <?php
        namespace App\Controllers\\$namespaceadd;\n
        use App\Core\Controller;
        use Symfony\Component\HttpFoundation\Request;
        use Symfony\Component\HttpFoundation\Response;\n
        class $namec extends Controller{\n
        }
        END;
        return $texto;
    }
}