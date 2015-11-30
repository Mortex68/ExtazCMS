<?php
/**
 * Extaz-CMS - admin_index.php
 * Coded by TristanCode
 * Created: 10/30/15 at 8:58 PM
 */
    $this->assign('title', 'Mettre à jour');
?>
<script>
    $(document).ready(function(){
        $('#data-table').dataTable({
            "lengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "Tout"]],
            "order": [],
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;: ",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    });
</script>
<div class="wrapper wrapper-content">
    <div class="animated fadeInRightBig">
        <div class="row">
            <div class="col-md-6">
                <?php
                    if($version == $last_version) {
                        echo "<div class='alert alert-info'>Votre CMS est à jour! Version : {$version}<br></div>";
                    } else {
                        echo "<div class='alert alert-danger'>Votre CMS n'est plus à jour! Mettez le à jour {$last_version}<br><br>";
                        echo $this->Form->create('Update', ['inputDefaults' => ['error' => false]]);
                        echo '<button class="btn btn-w-m btn-danger btn-sm" type="submit"><i class="fa fa-wrench"></i> Mettre à jour</button>';
                        echo $this->Form->end();
                    }
                ?>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"><h5>Changelog</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php echo file_get_contents(ROOT . "/app/Config/changelog.html"); ?>
                     </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Mises à jour récents</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered table-hover dataTables-example dataTable dtr-inline" id="data-table">
                            <thead>
                            <tr>
                                <th><b>Utilisateur qui mis à jour</b></th>
                                <th><b>IP</b></th>
                                <th><b>Nom de la Mise à jour</b></th>
                                <th><b>Version</b></th>
                                <th><b>Type</b></th>
                                <th><b>Date</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($datas as $maj){ ?>
                                <tr>
                                    <td><?php echo $maj['Update']['updater']; ?></td>
                                    <td><?php echo $maj['Update']['ip']; ?></td>
                                    <td>ExtazCMS - <?php echo $maj['Update']['name']; ?></td>
                                    <td><?php echo $maj['Update']['version']; ?></td>
                                    <td><?php echo $maj['Update']['type']; ?></td>
                                    <td><?php echo $this->Time->format('d/m/Y à H:i', $maj['Update']['created']); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
