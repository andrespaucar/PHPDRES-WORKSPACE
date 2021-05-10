<?php

namespace App\Core\Commands\App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class ModelCommand extends Command{
    protected static $defaultName = 'app:model';
    protected $filesystem ;

    function __construct(){
        parent::__construct();
        $this->filesystem = new Filesystem();
    }

    protected function configure(){ 
        $this //->setName(self::$defaultName)
        ->setDescription('Create Model command - User | Admin/User')
        ->addArgument('namemodel',
            InputArgument::REQUIRED,
            'The name Model is required');
    }

    protected function execute(InputInterface $input,OutputInterface $output){
        // $filesystem = new Filesystem();
        $name = $input->getArgument('namemodel');
        if($this->filesystem->exists('app/models/'.$name.'.php')){
            $output->write('<comment>Model Exists</comment>');
            return Command::SUCCESS;
        }

        // CREATE 
        // Si pasamos el name asi api/AuthController || api\AuthController
        // Debemos capturar el ultimo name en este caso seria 'AuthController'
        $newname = explode("/",$name);
        
        $data = "";
        if(count($newname) > 1){
            $data = $this->fullcontrollerPath($newname);
        }else{
            $data = $this->fullcontroller($name);
        }
        $this->filesystem->dumpFile('app/models/'.$name.'.php',$data);
        $output->write("<info>Model '".$name.".php' Created Success✅</info>");
        return Command::SUCCESS;
    }

    private function fullcontroller($name){
        $texto = <<<END
        <?php
        namespace App\Models;
        use Illuminate\Database\Eloquent\Model;\n
        class $name extends Model{\n
        }
        END;
        return $texto;
    }
    private function fullcontrollerPath($arrData){
        $namec = array_pop($arrData);
        $namespaceadd = implode("\\",$arrData);
        $texto = <<<END
        <?php
        namespace App\Models\\$namespaceadd;
        use Illuminate\Database\Eloquent\Model;\n
        class $namec extends Model{\n   
        }
        END;
        return $texto;
    }
}