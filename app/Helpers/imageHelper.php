<?php

/**
 * Upload image
 */
function uploadImage($image, $folder = null)
{
   $destination = public_path() . '/uploads/' . $folder;
    $filename = checkFileExist($destination, $image);
    if (!$image->move($destination, $filename)) {
        return "Error in uploading file ";
    }
    return $folder = $filename;
}


/**
 * Delete image from folder
 */
function deleteImage($folder, $image)
{
    $destination = public_path() . '/uploads/' . $folder;
    $filename = $destination . '/' . $image;
    if (file_exists($filename)) {
        \File::delete($filename);
        
    }
}


/**
 * Check file exist
 */
function checkFileExist($destination, $image)
{
    $file = $image->getClientOriginalName();
    $fileData = pathinfo($file);
    $fileOrgName = $fileData['filename'];
    $filename = preg_replace('/\s+/', '_', $fileOrgName . '_' . time() . '.' . $image->getClientOriginalExtension());
    if (!\File::exists($destination)) {
        \File::makeDirectory($destination, 0777, true, true);
    }
    $i = 1;
   
    while (\File::exists($destination . '/' . $filename)) {
        $fileNameWithoutExtenssion = basename(time() . '.' . $image->getClientOriginalName(), '.' . $image->getClientOriginalExtension());
        $filename = $fileNameWithoutExtenssion . $i . '.' . $image->getClientOriginalExtension();
        $i++;
    }
    return $filename;
}

/**
 * Get image property
 */
function getImageProperties($name, $folder)
{
    $returnData = [];
    $destination = public_path() . '/uploads/' . $folder . '/' . $name;
    if (\File::exists($destination)) {
        $data = getImageSize($destination);
        if (!empty($data)) {
            $returnData['width'] = $data[0];
            $returnData['height'] = $data[1];
        }
    }
    return $returnData;
}





    /*
     * get image url and set image path
     */

    function getUploadedImage($image, $folder = null, $type = null) {
        $src = url('public/images/default_images/default-user.jpg');
        $fileName = public_path().'/uploads/'.$folder.'/'.$image;
        if (!empty($image) && file_exists($fileName)) {
            $src = url('public/uploads/'.$folder.'/'.$image);
        }
        return $src;
    }


