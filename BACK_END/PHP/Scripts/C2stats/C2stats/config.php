<?php
/*
*  CONFIGURATION
*/

//chemin vers les archives (là où sont stockées les dossiers /annee/mois/ avec leur fichiers txt journaliers)
$C2STATS['chemin']="txt/archives/";

//chemin vers le fichier jquery.js (depuis le dossier "/C2stats")
$CONFIG['jquery']="./jquery.js";

// afficher les nouveaux user_agent trouvés dans les résultats (0/1)
$C2STATS['afficher_nouveaux_ua']=1;

// vous envoyer un mail chaque fin de mois pour analyser les nouveaux user_agent trouvés (0/1)
$C2STATS['envoyer_mail']=1;

//renseignez votre email pour recevoir les nouveaux UA chaque mois
$C2STATS['mail']='votre@mail.ext';

//contribuer à l'évolution de C2stats, envoi aussi un mail à Steve TENZA pour qu'il ajoute les nouveaux UA détectés, pour les autres utilisateurs (0/1)
$C2STATS['contribuer']=0;

//mail de Steve:
$C2STATS['mail_steve']='mail@c2script.com';