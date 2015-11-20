<?php
/**
 * Extaz-CMS - UpdateController.php
 * Coded by TristanCode
 * Created: 10/30/15 at 8:52 PM
 */

class UpdateController extends AppController {
    public function admin_index() {
        if ($this->Auth->user('role') > 1) {

                if ($this->version != $this->last_version) {
                    $new_file = 'ExtazCMS_tmp.zip';
                    $file = "http://extaz-cms.fr/cms/updates/files/ExtazCMS%20$this->version-$this->last_version.zip";
                   // $sql  = file_get_contents("http://extaz-cms.fr/cms/updates/sql/ExtazCMS%20$this->version-$this->last_version.sql");

                   // $db = ConnectionManager::getDataSource('default');
                   // $db->rawQuery($sql);

                    if (!copy($file, $new_file)) {
                        $this->Session->setFlash('Un problème est survenu !', 'error');
                        //return $this->redirect(['controller' => 'update', 'action' => 'index', 'admin' => true]);
                    } else {
                        $zip = new ZipArchive;
                        $res = $zip->open($new_file);

                        if ($res === TRUE) {
                            $zip->extractTo('../');
                            $zip->close();
                            unlink($new_file);

                            $this->Session->setFlash('Mise à jour effectué avec succès !', 'success');
                            //return $this->redirect(['controller' => 'update', 'action' => 'index', 'admin' => true]);
                        } else {
                            $this->Session->setFlash('Un problème est survenu !', 'error');
                            //return $this->redirect(['controller' => 'update', 'action' => 'index', 'admin' => true]);
                        }
                    }
                }
            } else {
                throw new NotFoundException();
        }
    }
}