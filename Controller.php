<?php

Controller
{
  public function myGalleryAction () {
        $projectDir = $this->getProjectDir();
        $imgDir = $projectDir. '/src/Riata/ExampleBundle/Controller';
        // setting
        $setting = array(
            'directory' => $imgDir.'/compressed', // directory file compressed output
            'file_type' => array( // file format allowed
                'image/jpeg',
                'image/png',
                'image/gif'
            )
        );
        // create object
        $ImgCompressor = new ImgCompressor($setting);
        $my_img = $imgDir.'/original/world.png';
        $my_compressed_img = $imgDir. '/compressed/'.md5($my_img).".png";
        if (file_exists($my_img)) {
            $my_img = $ImgCompressor->run($my_img, 'jpg', 5);
        }
        
        return $this->render('RiataExampleBundle:Exercice:my-gallery.html.twig');
    }

    public function getProjectDir () {
        $rootDir = $this->get('kernel')->getRootDir();
        $app_string = substr($rootDir, -4);
        $projectDir = str_replace($app_string, "", $rootDir);
        return $projectDir;
    }
}
