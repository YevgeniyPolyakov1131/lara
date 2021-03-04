<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public static function createImage($request, $annonce_id)
    {

        $tableauImages = []; 
        $linkBase = "";

        $extension = $request->file("img_base")->getClientOriginalExtension();

        $pathTo = 'public/images/'.Auth::id().'/' . $annonce_id;
        
        $nameFile = "/img_base.".$extension;
        $pathFrom = 'storage/images/'.Auth::id().'/' . $annonce_id;

        if( $request->file("img_base") )
        {
            Storage::putFileAs($pathTo , $request->file("img_base"),"img_base.".$extension);
            $linkBase = $pathFrom . $nameFile;
            $tableauImages["img_base"] = $linkBase;

            $img = \Intervention\Image\Facades\Image::make($pathFrom . $nameFile)->
                                                      resize(200, 200, function($constraint)
                                                        {
                                                            $constraint->aspectRatio();
                                                        });
            $img->save($pathFrom . "/prw.".$extension);
        }else{
            $tableauImages["img_base"] = 'storage/images/imageVide750x600.jpg';
            $linkBase = "storage/images/imageVide750x600.jpg";
        }

        for($i=1; $i<=5; $i++)
        {
            if($request->file("img_".$i))
            {
                Storage::putFileAs($pathTo , $request->file("img_".$i),"img_".$i.".".$extension);
                $tableauImages["img_".$i] = $pathFrom;
            }else
            {
                if($i<4)
                {
                    $tableauImages["img_".$i] = 'storage/images/imageVide750x600.jpg';
                }
            }

        }        

        $image = Image::create(["preview" => $pathFrom . "/prw.".$extension, "description" => json_encode($tableauImages)]);
        
        return $image->id;

    }
}
