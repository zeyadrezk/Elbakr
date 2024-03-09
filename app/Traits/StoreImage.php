<?php

    namespace App\Traits;


    trait  StoreImage
    {
            public function StoreMltiImage($request, $path, $requestName)
            {
                $imagePaths = [];

                if ($request->hasFile($requestName)) {
                    $files = is_array($request->file($requestName)) ? $request->file($requestName) : [$request->file($requestName)];

                    foreach ($files as $file) {
                        if ($file->isValid()) {
                            $uniqueName = uniqid(); // Generate a unique identifier for each file
                            $fileName = $uniqueName . '_' . $file->getClientOriginalName();
                            $file->move(public_path('pictures/' . $path), $fileName);
                            $fullpath = '/pictures/' . $path . '/' . $fileName;
                            $imagePaths[] = $fullpath;
                        }
                    }

                    return $imagePaths;
                }

                return null;
            }



            public function StoreImage($request    ,        $path  ,         $requestName )
            {

                if ($request->hasFile($requestName)) {
                    $file = $request->file($requestName);
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('pictures/' . $path), $fileName);
                    $fullpath = '/pictures/' . $path .'/'. $fileName ;
                    return $fullpath;
                }
                return null ;

            }

    }


