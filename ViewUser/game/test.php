<?php
require_once '../../Controller/lieuxController.php';

$nom = htmlspecialchars($_GET["nom"]);
$imageName = '/ViewUser/game/Scences/' . $nom . '.png';


$controller = new LieuxController();
$result = $controller->showLieux($imageName);
$objectsCSS = $controller->showPos(htmlspecialchars($_GET["nom"]));
$objetsPage1 = [['photo', 'calendrier'], ['cadeau','ticket'], ['lunnettes', 'sac', 'ordi', 'ecouteurs']];
$objetsPage2 = [['shampooing', 'masque'], ['lisseur'], ['mirroir', 'robe', 'palette', 'ral']];
$objetsPage3 =[['oeufs', 'farine', 'vanille','toque'], ['poele','oeufC','verreB'], ['lait', 'bolC', 'cerales', 'cuillere']];
$objetsPage4 =[['chips', 'salade', 'boisson','jus'], ['oeuf1','oeuf2'], ['chien', 'balle']];
$objetsPage5 =[['machine', 'pot', 'bac_aiguille', 'bac_chaise'], ['horloge', 'ciel'], ['clé_voiture']];
$objetsPage6 =[['gourde', 'chien', 'tracePattes'], ['champignon1', 'champignon2', 'champignon3'], ['telephone', 'boucleOreille']];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <title>Affichage de l'image en fond</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
        }

        .ecran {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 1200px;
            height: 800px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: 2px solid #ccc;
            z-index: 1;
        }

        .background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .clickable-zone {
            color: transparent;
            position: absolute;
            cursor: pointer;
            padding: 10px;
            z-index: 2;
        }


        
        <?php foreach ($objectsCSS as $objet) {
            preg_match('/top:\s*([\d.]+)px;/', $objet['css'], $topMatches);
            preg_match('/left:\s*([\d.]+)px;/', $objet['css'], $leftMatches);
            
            $top = isset($topMatches[1]) ? $topMatches[1] : '0px';
            $left = isset($leftMatches[1]) ? $leftMatches[1] : '0px';
            echo ".objet{$objet['id_objet']} { top: {$top}px; left: {$left}px; }\n";
        } ?>

        <?php foreach ($objetsPage2 as $index => $group) {
            foreach ($group as $objet) {
                preg_match('/top:\s*([\d.]+)px;/', $objet['css'], $topMatches);
                preg_match('/left:\s*([\d.]+)px;/', $objet['css'], $leftMatches);
            
                $top = isset($topMatches[1]) ? $topMatches[1] : '0px';
                $left = isset($leftMatches[1]) ? $leftMatches[1] : '0px';
                echo ".objet{$objet['id_objet']} { top: {$top}px; left: {$left}px; }\n";
            }
        } ?>

        <?php foreach ($objetsPage3 as $index => $group) {
            foreach ($group as $objet) {
                preg_match('/top:\s*([\d.]+)px;/', $objet['css'], $topMatches);
                preg_match('/left:\s*([\d.]+)px;/', $objet['css'], $leftMatches);
            
                $top = isset($topMatches[1]) ? $topMatches[1] : '0px';
                $left = isset($leftMatches[1]) ? $leftMatches[1] : '0px';
                echo ".objet{$objet['id_objet']} { top: {$top}px; left: {$left}px; }\n";
            }
        } ?>
    </style>
</head>
<body>

<?php
if (!empty($result)) {
    $image = $result[0]['image'];
}
?>


<div 
    x-data="{
        currentPage: '<?php echo $nom; ?>',
        objetsPage1: [['photo', 'calendrier'], ['cadeau','ticket'], ['lunnettes', 'sac', 'ordi', 'ecouteurs']], 
        objetsPage2: [['shampooing', 'masque'], ['lisseur'], ['mirroir', 'robe', 'palette', 'ral']],
        objetsPage3: [['oeufs', 'farine', 'vanille','toque'], ['poele','oeufC','verreB'], ['lait', 'bolC', 'cerales', 'cuillere']],
        objetsPage4: [['chips', 'salade', 'boisson','jus'], ['oeuf1','oeuf2'], ['chien', 'balle']],
        objetsPage5: [['machine', 'pot', 'bac_aiguille', 'bac_chaise'], ['horloge', 'ciel'], ['clé_voiture']],
        objetsPage6 :[['gourde', 'chien', 'tracePattes'], ['champignon1', 'champignon2', 'champignon3'], ['telephone', 'boucleOreille']],
        tousObjets: [['photo', 'calendrier'], ['ticket'], ['shampooing', 'masque'], ['lisseur', 'brosse'],
        ['oeufs', 'farine', 'vanille','toque','bolC'], ['poele','oeufsC','verreB'], ['chips', 'salade', 'boisson','jus'], 
        ['oeuf1','oeuf2','oeuf3'], ['chien', 'balle', 'ballon'], ['machine', 'pot', 'bac_aiguille', 'bac_chaise'], ['horloge', 'ciel'], ['sac', 'clé_voiture'], 
        ['gourde', 'chien', 'tracePattes'], ['champignon1', 'champignon2', 'champignon3'], ['telephone', 'boucleOreille']],
        
        deleteObject(objetName) {
            let tousObjets = this.tousObjets;
            let pageObjects = this.getObjectsForPage();
            
            for (let i = 0; i < pageObjects.length; i++) {
                const index = pageObjects[i].indexOf(objetName);
                if (index > -1) {
                    pageObjects[i].splice(index, 1);
                    console.log('Objet supprimé du tableau:', objetName);
                    break;
                }
            }
            for (let i = 0; i < tousObjets.length; i++) {
                for (let n = 0; n < tousObjets[i].length; n++) {
                    if (tousObjets[i][n] === objetName)[]
                        tousObjets[i][n].splice(index, 1);
                        console.log('Objet supprimé du tableau tous les objets :', objetName);
                        break;
                }
            }

            console.log(tousObjets[i]);
            console.log(i);

            this.checkAndMoveToNextPage(pageObjects, tousObjets[i], i);
            
        },
        
        getObjectsForPage() {
            if (this.currentPage === 'chambre') return this.objetsPage1;
            else if (this.currentPage === 'sdb') return this.objetsPage2;
            else if (this.currentPage === 'cuisine') return this.objetsPage3;
            else if (this.currentPage === 'jardin') return this.objetsPage4;
            else if (this.currentPage === 'atelier') return this.objetsPage5;
            else if (this.currentPage === 'foret') return this.objetsPage6;
            return [];
        },
        
    
        checkAndMoveToNextPage(pageObjects, tousObjets, index) {
            const allEmpty = pageObjects.every(group => group.length === 0);
            const empty = tousObjets.every(group => group.length === 0);

            if(empty){
                console.log(tousObjets);
                 window.location.href = 'route.php?page=fait&idTache=${index + 1}';

            }

            if (allEmpty) {
                if (this.currentPage === 'foret') {
                    this.moveToFinalPage();  
                } else {
                    this.moveToNextPage();  
                }
            }
        },
        
        moveToNextPage() {
            if (this.currentPage === 'chambre') this.currentPage = 'sdb';
            else if (this.currentPage === 'sdb') this.currentPage = 'cuisine';
            else if (this.currentPage === 'cuisine') this.currentPage = 'jardin';
            else if (this.currentPage === 'jardin') this.currentPage = 'atelier';
            else if (this.currentPage === 'atelier') this.currentPage = 'foret';
            else if (this.currentPage === 'foret') this.currentPage = 'final';
            this.updateUrl();
            location.reload();
            },

            moveToFinalPage() {
                this.currentPage = 'final';
                this.updateUrl();
                location.reload();
            },

            // Fonction pour mettre à jour l'URL sans recharger la page
            updateUrl() {
                history.pushState(null, '', '?nom=' + this.currentPage);
            },
        
        isObjectVisible(objetName) {
            let pageObjects = this.getObjectsForPage();
            return pageObjects.some(group => group.includes(objetName));
        }
    }"
>
    <div class="ecran">

        <template x-if="currentPage !== 'final'">
            <img 
                x-bind:src="'/ViewUser/game/Scences/' + currentPage + '.png'" 
                alt="Image de fond" 
                class="background-image">
        </template>

        <template x-if="currentPage === 'final'">
            
            <video id="finalVideo" width="100%" autoplay muted>
                <source src="/ViewUser/game/Scences/final.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </template>
    
        <?php 
        foreach ($objetsPage2 as $group) :
            foreach ($group as $objet) : ?>
                <div 
                    x-show="isObjectVisible('<?php echo $objet; ?>')"
                    class="clickable-zone <?php echo 'page2-' . $objet; ?>"
                    @click="deleteObject('<?php echo $objet; ?>')">
                    <p><?php echo htmlspecialchars($objet); ?></p>
                </div>
            <?php endforeach;
        endforeach;
        ?>
        
        <?php foreach ($objetsPage3 as $group) :
            foreach ($group as $objet) : ?>
                <div 
                    x-show="isObjectVisible('<?php echo $objet; ?>')"
                    class="clickable-zone <?php echo 'page3-' . $objet; ?>"
                    @click="deleteObject('<?php echo $objet; ?>')">
                    <p><?php echo htmlspecialchars($objet); ?></p>
                </div>
            <?php endforeach;
        endforeach; ?>

        <?php foreach ($objetsPage4 as $group) :
            foreach ($group as $objet) : ?>
                <div 
                    x-show="isObjectVisible('<?php echo $objet; ?>')"
                    class="clickable-zone <?php echo 'page4-' . $objet; ?>"
                    @click="deleteObject('<?php echo $objet; ?>')">
                    <p><?php echo htmlspecialchars($objet); ?></p>
                </div>
            <?php endforeach;
        endforeach; ?>

        <?php foreach ($objetsPage5 as $group) :
            foreach ($group as $objet) : ?>
                <div 
                    x-show="isObjectVisible('<?php echo $objet; ?>')"
                    class="clickable-zone <?php echo 'page5-' . $objet; ?>"
                    @click="deleteObject('<?php echo $objet; ?>')">
                    <p><?php echo htmlspecialchars($objet); ?></p>
                </div>
            <?php endforeach;
        endforeach; ?>

        <?php foreach ($objetsPage6 as $group) :
            foreach ($group as $objet) : ?>
                <div 
                    x-show="isObjectVisible('<?php echo $objet; ?>')"
                    class="clickable-zone <?php echo 'page6-' . $objet; ?>"
                    @click="deleteObject('<?php echo $objet; ?>')">
                    <p><?php echo htmlspecialchars($objet); ?></p>
                </div>
            <?php endforeach;
        endforeach; ?>

        <?php foreach ($objectsCSS as $objet) : ?>
            <div 
                x-show="isObjectVisible('<?php echo $objet['name_objet']; ?>')"
                class="clickable-zone objet<?php echo $objet['id_objet']; ?>"
                @click="deleteObject('<?php echo $objet['name_objet']; ?>')">
                <p><?php echo htmlspecialchars($objet['name_objet']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

