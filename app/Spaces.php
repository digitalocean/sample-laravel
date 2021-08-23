<?php

use Aws\S3\S3Client;
use Illuminate\Http\Request;

/**
 * # Spaces
 * 
 * Classe para fazer upload de arquivos para o Spaces da DigitalOcean
 * 
 * config\filesystems.php:57
 * 
 * https://laravel.com/docs/8.x/filesystem
 */
class Spaces
{
 static function getClient() {
    return new S3Client([
      'version' => 'latest',
      'region'  => 'us-east-1',
      'endpoint' => 'https://gasway-cdn.fra1.digitaloceanspaces.com/',
      'credentials' => [
        'key'    => getenv('SPACES_KEY'),
        'secret' => getenv('SPACES_SECRET'),
      ],
    ]);
  }

  /**
   * @param request ~
   * @param figura Nome do arquivo
   * @param bucket Pasta de destino
   */
  public static function upload(Request $request, string $figura, string $bucket)
  {
    $client = Spaces::getClient();

    $path = $request->file($figura)->path();

    $client->putObject([
      'Key' => $figura,
      'Bucket'=> $bucket,
      'SourceFile' => $path,
      // metadados
      'Metadata' => [
        'x-amz-meta-my-key' => 'your-value'
      ],
    ]);
  }
}
