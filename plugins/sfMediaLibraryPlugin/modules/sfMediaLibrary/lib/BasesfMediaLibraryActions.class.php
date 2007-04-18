<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 1949 2006-09-05 14:40:20Z fabien $
 */
class BasesfMediaLibraryActions extends sfActions
{
  public function executeIndex()
  {
    $currentDir = $this->dot2slash($this->getRequestParameter('dir'));
    $this->currentDir = $this->getRequestParameter('dir');
    $this->current_dir_slash = $currentDir . '/';
    $this->webAbsCurrentDir = '/'.sfConfig::get('sf_upload_dir_name').'/assets'.$currentDir;
    $this->absCurrentDir = sfConfig::get('sf_upload_dir').'/assets/'.$currentDir;

    $this->forward404Unless(is_dir($this->absCurrentDir));

    $dirs  = sfFinder::type('dir')->maxdepth(0)->prune('.*')->discard('.*')->relative()->in($this->absCurrentDir);
    $files = sfFinder::type('file')->maxdepth(0)->prune('.*')->discard('.*')->relative()->in($this->absCurrentDir);

    sort($dirs);
    sort($files);

    $this->dirs = $dirs;

    // compute some stats for each file
    $infos = array();
    foreach ($files as $file)
    {
      $info = array();

      $info['ext']  = substr($file, strpos($file, '.') - strlen($file) + 1);
      if ($this->getRequestParameter('images_only') && !$this->isImage($info['ext']))
      {
        continue;
      }
      $stats = stat($this->absCurrentDir.'/'.$file);
      $info['size'] = $stats['size'];
      $info['icon'] = $this->isImage($info['ext']) ? $this->webAbsCurrentDir.'/'.$file : (is_readable(sfConfig::get('sf_web_dir').'/sfMediaLibraryPlugin/images/'.$info['ext'].'.png') ? '/sfMediaLibraryPlugin/images/'.$info['ext'].'.png' : '/sfMediaLibraryPlugin/images/unknown.png');
      $infos[$file] = $info;
    }
    $this->files = $infos;

    // parent dir
    $tmp = explode(' ', $this->currentDir);
    array_pop($tmp);
    $this->parentDir = implode(' ', $tmp);
  }

  protected function isImage($ext)
  {
    return in_array($ext, array('png', 'jpg', 'gif'));
  }

  public function executeChoice()
  {
    $this->executeIndex();
  }

  public function executeRename()
  {
    $current_path = $this->dot2slash($this->getRequestParameter('current_path'));
    $this->current_path = $this->getRequestParameter('current_path');
    $type = $this->getRequestParameter('type');
    $this->count = $this->getRequestParameter('count');

    $this->abs_current_path = sfConfig::get('sf_upload_dir').'/assets/'.$current_path;
    $this->web_abs_current_path = '/'.sfConfig::get('sf_upload_dir_name').'/assets/'.$current_path;

    $name = $this->getRequestParameter('name');
    $new_name = $this->getRequestParameter('new_name');
    if ($type === 'folder')
    {
      $new_name = $this->sanitizeDir($new_name);
      $this->forward404Unless(is_dir($this->abs_current_path.'/'.$name));
    }
    else
    {
      $new_name = $this->sanitizeFile($new_name);
      $this->forward404Unless(is_file($this->abs_current_path.'/'.$name));
    }

    @rename($this->abs_current_path.'/'.$name, $this->abs_current_path.'/'.$new_name);

    $this->info = array();
    if (is_dir($this->abs_current_path.'/'.$new_name) and ($type === 'folder'))
    {
      $this->name = $new_name;
    }
    else if (is_file($this->abs_current_path.'/'.$new_name) and ($type === 'file'))
    {
      $this->name = $new_name;
      $this->getInfo($new_name);
    }
    else
    {
      $this->name = $name;
      $this->getInfo($name);
    }
    $this->type = $type;
  }

  protected function getInfo($filename)
  {
    $this->info['ext']  = substr($filename, strpos($filename, '.') - strlen($filename) + 1);
    $stats = stat($this->abs_current_path.'/'.$filename);
    $this->info['size'] = $stats['size'];
    $this->info['icon'] = $this->isImage($this->info['ext']) ? $this->web_abs_current_path.'/'.$filename : (is_readable(sfConfig::get('sf_web_dir').'/sfMediaLibraryPlugin/images/'.$this->info['ext'].'.png') ? '/sfMediaLibraryPlugin/images/'.$this->info['ext'].'.png' : '/sfMediaLibraryPlugin/images/unknown.png');
  }

  public function executeUpload()
  {
    $currentDir = $this->dot2slash($this->getRequestParameter('current_dir'));
    $webAbsCurrentDir = '/'.sfConfig::get('sf_upload_dir_name').'/assets/'.$currentDir;
    $absCurrentDir = sfConfig::get('sf_upload_dir').'/assets/'.$currentDir;

    $this->forward404Unless(is_dir($absCurrentDir));

    $fileName = $this->sanitizeFile($this->getRequest()->getFileName('file'));

    $this->getRequest()->moveFile('file', $absCurrentDir.'/'.$fileName);

    $this->redirect('sfMediaLibrary/index?dir='.$this->getRequestParameter('current_dir'));
  }

  public function executeDelete()
  {
    $currentDir = $this->dot2slash($this->getRequestParameter('current_path'));
    $currentFile = $this->getRequestParameter('name');
    $absCurrentFile = sfConfig::get('sf_upload_dir').'/assets/'.$currentDir.'/'.$currentFile;

    $this->forward404Unless(is_readable($absCurrentFile));

    unlink($absCurrentFile);

    $this->redirect('sfMediaLibrary/index?dir='.$this->getRequestParameter('current_path'));
  }

  public function executeMkdir()
  {
    $currentDir = $this->dot2slash($this->getRequestParameter('current_dir'));
    $dirName = $this->sanitizeDir($this->getRequestParameter('name'));
    $absCurrentDir = sfConfig::get('sf_upload_dir').'/assets/'.(empty($currentDir) ? '' : $currentDir.'/').$dirName;

    $old = umask(0000);
    @mkdir($absCurrentDir, 0777);
    umask($old);

    $this->redirect('sfMediaLibrary/index?dir='.$this->getRequestParameter('current_dir'));
  }

  public function executeRmdir()
  {
    $currentDir = $this->dot2slash('.'.$this->getRequestParameter('current_path'));
    $absCurrentDir = sfConfig::get('sf_upload_dir').'/assets/'.$currentDir.'/'.$this->getRequestParameter('name');

    $this->forward404Unless(is_dir($absCurrentDir));

    rmdir($absCurrentDir);

    $this->redirect('sfMediaLibrary/index?dir='.$this->getRequestParameter('current_path'));
  }
  
  protected function dot2slash($txt)
  {
    return preg_replace('#[\+\s]+#', '/', $txt);
  }

  protected function slash2dot($txt)
  {
    return preg_replace('#/+#', '+', $txt);
  }

  protected function sanitizeDir($dir)
  {
    return preg_replace('/[^a-z0-9_-]/i', '_', $dir);
  }

  protected function sanitizeFile($file)
  {
    return preg_replace('/[^a-z0-9_\.-]/i', '_', $file);
  }
}
