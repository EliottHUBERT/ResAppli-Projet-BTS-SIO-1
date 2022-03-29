===========================# ResAppli #==========================

Ce projet est un de mes projet éffectuer en BTS SIO 1.
Il consiste à créé une solution technique permettant de gérer les réservation.

Voici le sujet du TP :


  PRIXY a sollicité la société EllaSIO pour faire évoluer son système d’information et notamment pour la conception et le développement d’une application de gestion     des réservations de la salle « Beryl ». Après une première rencontre avec la maîtrise d’ouvrage, EllaSIO a rédigé un cahier des charges fonctionnel et technique.

  CONTEXTE ET OBJECTIF

  Afin de diversifier son offre de services, PRIXY souhaite proposer à ses clients une nouvelle prestation : la mise à disposition de la salle « Beryl ».

  Cette salle nouvellement équipée, est actuellement dédiée aux formations théoriques ou utilisée de manière très occasionnelle pour des réunions internes. Elle est dotée d’un PC et d’un système de vidéo-projection interactif. Son mobilier modulable permet de proposer plusieurs configurations et offre une capacité extensible jusqu’à 30 places.

  Aujourd’hui, la salle « Beryl » n’étant pas utilisée à pleine capacité, PRIXY souhaite pouvoir louer cet espace soit à des auto-entrepreneurs ne disposant d’aucun local ou à des petites entreprises souhaitant organiser des séminaires ou des présentations commerciales d’envergure par exemples.

  PRIXY souhaite disposer d’une solution logicielle permettant de gérer de manière efficace les réservations de la salle « Beryl ».

  CONTRAINTES FONCTIONNELLES ET TECHNIQUES

  Votre équipe participe au développement de l’application baptisée ResAPPLI. Votre chef de pôle vous communique les éléments suivants :

  D’un point de vue fonctionnel, l’application ResAPPLI devra permettre de :

  o Visualiser le planning des réservations de la salle « Beryl » ; une consultation par jour ou par semaine est souhaitable

  o Créer, modifier, supprimer une réservation

  L’entrevue réalisée avec la maîtrise d’ouvrage a permis de dégager les règles de gestion suivantes. En synthèse, la salle « Beryl » est réservée soit pour une session de formation prévue au catalogue, soit pour une réunion interne, soit par un client souhaitant utiliser cet équipement pour une durée déterminée (on parle dans ce cas de réservation externe).

  o Cas des sessions de formation : Toutes les formations théoriques prévues au catalogue des formations devant se dérouler dans la salle « Beryl » seront saisies dans l’application. Pour chacune, les informations suivantes seront saisies : intitulé de la formation et nom du formateur. Une formation théorique se déroule sur une ou plusieurs demi-journées consécutives. Généralement les horaires des formations théoriques sont les suivants : 9h-12h et 14h-17h. Afin de garantir les meilleures conditions de formation, il a été décidé de bloquer la ou les demi-journées exclusivement pour la formation (aucune autre réservation ne doit pouvoir s’intercaler).

  o Cas des réunions internes : Lorsqu’une réunion interne sera programmée, l’assistante administrative devra bloquer le créneau en créant une réservation. Pour cette réservation, elle devra préciser l’intitulé de la réunion ainsi que l’heure de début et la durée de celle-ci.

  o Cas des réservations externes : Lorsqu’un client fera une demande de location de la salle « Beryl », une réservation sera créée. L’assistante devra saisir les coordonnées du client (raison sociale, adresse complète, téléphone fixe et/ou mobile, adresse mail,...), le motif de la réservation ainsi que le nombre de personnes prévues. Une réservation à un client externe se fait exclusivement par demi-journée ou journée entière (les horaires sont identiques à ceux des formations). La facturation au client de cette prestation de location ne fait pas partie du périmètre fonctionnel de l’application ResAPPLI.

  ResAPPLI est une application de bureau (client-lourd) qui sera installée dans un premier temps sur le poste de l’accueil et utilisée principalement par L. Schmitt. A terme, l’application pourrait être déployée sur les postes de S. Millot et C. Joubert.

  L’application sera dotée d’une interface graphique. Son utilisation devra être simple et intuitive. Les données de l’application ResAPPLI seront, quant à elles, stockées dans une base de données, hébergée sur un serveur.

  Le développement de l’application ResAPPLI doit respecter les pratiques de la société EllaSIO :

  o Architecture logicielle : Afin de faciliter la maintenance corrective et évolutive de l’application, favoriser le travail collaboratif et la répartition des tâches, l’application ResAPPLI devra s’appuyer sur une architecture en couches.
