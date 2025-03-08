<?php
  
function imageUpload(?array $file, string $uploadDir = 'uploads/', mixed $object = null): ?string 
{

     if ($object->image !== null && (empty($file) || $file['error'] === UPLOAD_ERR_NO_FILE)) {
          return $object->image;
     }

     if (empty($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
          return null;
     }

     if ($file['error'] !== UPLOAD_ERR_OK) {
          throw new \Exception("Erreur lors du téléchargement de l'image.");
     }

     $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
     $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

     if (!in_array($fileExtension, $allowedExtensions)) {
          throw new \Exception("Extension non autorisée. Extensions valides : " . implode(', ', $allowedExtensions));
     }

     if (!is_dir($uploadDir)) {
          mkdir($uploadDir, 0755, true);
     }

     $uniqueName = uniqid('img_', true) . '.' . $fileExtension;
     $destination = rtrim($uploadDir, '/') . '/' . $uniqueName;

     if (!move_uploaded_file($file['tmp_name'], $destination)) {
          throw new \Exception("Échec du déplacement du fichier téléchargé.");
     }

     if (isset($object->image)) {
          removeFile($object->image);
     }

     return '/'.$destination;
}

function removeFile(?string $path)
{
     if ($path !== null) {
          $directory = substr($path, 1);
          if (file_exists($directory)) {
               unlink($directory);
          }
     }
}

