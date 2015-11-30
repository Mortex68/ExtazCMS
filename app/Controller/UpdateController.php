<?php
/**
 * Extaz-CMS - UpdateController.php
 * Coded by TristanCode
 * Created: 10/30/15 at 8:52 PM
 */

class UpdateController extends AppController {
    public function admin_index() {
        if ($this->Auth->user('role') > 1) {
            $this->set('datas', $this->Update->find('all', ['order' => ['Update.id' => 'DESC']]));

            if($this->request->is('post')) {
                $updater = $this->Auth->user('username');
                $ip = $_SERVER['REMOTE_ADDR'];

                if ($this->version != $this->last_version) {
                    $new_file = 'ExtazCMS.zip';

                    $file = "http://extaz-cms.fr/cms/updates/ExtazCMS_$this->next_version/file.zip";
                    $sql  = file_get_contents("http://extaz-cms.fr/cms/updates/ExtazCMS_$this->next_version/sql.txt");

                    $db = ConnectionManager::getDataSource('default');
                    $db->rawQuery($sql);

                    if (!copy($file, $new_file)) {
                        $this->Session->setFlash('Un problème est survenu !', 'toastr_error');
                    } else {
                        $zip = new ZipArchive;
                        $res = $zip->open($new_file);

                        if ($res === TRUE) {
                            $zip->extractTo('../');
                            $zip->close();
                            unlink($new_file);

                            $this->Update->create;
                            $this->Update->saveField('updater', $updater);
                            $this->Update->saveField('ip', $ip);
                            $this->Update->saveField('name', file_get_contents("http://extaz-cms.fr/cms/updates/ExtazCMS_$this->next_version/name.txt"));
                            $this->Update->saveField('version', $this->next_version);
                            $this->Update->saveField('type', file_get_contents("http://extaz-cms.fr/cms/updates/ExtazCMS_$this->next_version/type.txt"));
                            $this->Update->clear();

                            $this->Session->setFlash('Mise à jour effectué avec succès !', 'toastr_success');
                        } else {
                            $this->Session->setFlash('Un problème est survenu !', 'toastr_error');
                        }
                    }
                }
            }
        } else {
            throw new NotFoundException();
        }
    }
}