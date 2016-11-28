
@extends('layouts.master')

@section('title')
Dashboard
@stop

@section('userBarMenu')
    <li><a href="/usuario"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
@stop

@section('menu')
    <li class="active"><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Contactanos</a></li>
@stop

@section('content')
<?php
        echo ('<h1>Banco Nacional</h1>');
        for($i = 1; $i < 2; $i++){
            $file = file_get_contents('https://www.bnventadebienes.com/properties/index?MustBeNegotiable=False&MustBeDiscounted=False&MustBeHighlighted=False&MustBeNovelty=False&MustBeInTheCoast=False&MustBeForDevelopers=False&pageNumber='.$i);
            libxml_use_internal_errors(true);
            $doc = new DOMDocument();
            $doc->loadHTML($file);
            libxml_clear_errors();            

            $xpath = new DOMXPath($doc);
            
            $classname = 'site-secondary-color4';        
            $results = $xpath->query("//span[@class='" . $classname . "']");
            
            $classname = 'img-responsive';
            $imgs = $xpath->query("//img[@class='" . $classname . "']");
            
            $classname = 'col-md-12 col-property-location';
            $locs = $xpath->query("//div[@class='" . $classname . "']");
            
            $classname = 'detail-button';
            $btns = $xpath->query("//a[contains(@class,'" . $classname . "')]");
            /*if ($results->length > 0) {
                echo $review = $results->item(0)->nodeValue;
            }*/            
            for($j = 0; $j < $results->length; $j++){
                echo ('<div class="container col-md-6"><div class="row">');
                echo('<div class="col-md-8">');
                echo ('<img src="'.$imgs[$j+1]->getAttribute('src').'">');
                echo ('</div>');
                echo('<div class="conainter col-md-4">');
                $price = $results[$j]->nodeValue;
                echo ('<p>'.$locs[$j]->getElementsByTagName('h4')->item(0)->nodeValue.'</p>');
                echo ('<p>'.$locs[$j]->getElementsByTagName('h4')->item(1)->nodeValue.'</p>');
                echo ('<p>Precio: '.$price.'</p>');
                echo ('<a href="https://www.bnventadebienes.com'.$btns[$j]->getAttribute('href').'" target="_blank">Ver detalles en la página</a>');
                echo ('</div></div></div>');
            }
            
            echo ('<h1>Banco Popular</h1>');
            for($i = 1; $i < 3; $i++){
                $file = file_get_contents('http://ventadebienes-bp.com/buscardor/page/'.$i.'/?property-id&location=any&canton=any&type=any&min-price=any&max-price=any&min-area&max-area');
                libxml_use_internal_errors(true);
                $doc = new DOMDocument();
                $doc->loadHTML($file);
                libxml_clear_errors();            

                $classname = 'price';        
                $xpath = new DOMXPath($doc);
                $results = $xpath->query("//h5[@class='" . $classname . "']");

                $classname = 'wp-post-image';
                $imgs = $xpath->query("//img[contains(@class,'" . $classname . "')]");
                
                $classname = 'more-details';
                $btns = $xpath->query("//a[@class='" . $classname . "']");
                /*if ($results->length > 0) {
                    echo $review = $results->item(0)->nodeValue;
                }*/

                for($j = 0; $j < $results->length; $j++){
                    echo ('<div class="container col-md-6"><div class="row">');
                    echo('<div class="col-md-8">');
                    $src = $imgs[$j]->getAttribute('src');
                    if(strpos($src,"sinfoto.jpg")){
                        $src = 'http://ventadebienes-bp.com/'.$src;
                    }
                    echo ('<img src="'.$src.'" width="244" height="163">');
                    echo ('</div>');
                    echo('<div class="conainter col-md-4">');
                    $price = $results[$j]->nodeValue;
                    echo ('<p>Precio: '.$price.'</p>');
                    echo ('<a href="'.$btns[$j]->getAttribute('href').'" target="_blank">Ver detalles en la página</a>');
                    echo ('</div></div></div>');
                };
            }
        }
?>
@stop